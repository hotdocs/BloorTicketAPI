<?php

	//app/controllers/EventController.php

	class EventController extends BaseController {
		public function index()
		{
			return View::make('hello'); 
		}
		
		public function eventlist() {

			// GRAB THE XML FEED
			$events = $this->guzzleFeed();

			$films = array();

		    foreach($events->ArrayOfShows->Show as $event) {

		        $film = array();
		        $film['Id']    =   $event->ID;
		        $film['Name']  =   (string)$event->Name;
		        $film['ShortDescription']  =   (string)$event->ShortDescription;
		        $film['EventImage']	=	(string)$event->EventImage;
				$film['AgileLink']	=	(string)$event->InfoLink;
				$film['HotDocsLink']	=	'/films/' . $event->ID;
				array_push($films, $film);

		    }

		    $data = array();
		    $data['films'] = $films;

			return View::make('events', $data);

		}
		
		public function eventdetails($eventid) {

			// GRAB THE XML FEED
			$events = $this->guzzleFeed();

			$film = array();

		    foreach($events->ArrayOfShows->Show as $event) {

				if($event->ID == $eventid) {

			        $film['Id']    =   $event->ID;
			        $film['Name']  =   (string)$event->Name;
					$film['EventImage']	=	(string)$event->EventImage;
					$film['CurrentShowings'] = $event->CurrentShowings;
			        /*
					$film['ShortDescription']  =   (string)$event->ShortDescription;
			        $film['EventImage']	=	(string)$event->EventImage;
					$film['AgileLink']	=	(string)$event->InfoLink;
					$film['HotDocsLink']	=	'/films/' . $event->ID;
					*/
				}

		    }

			// THEN GET THE DESCRIPTION INFORMATION WHICH IS INTENTIONALLY LEFT OUT OF THE EVENTGET TO SAVE VOLUME
			$params = array(
		        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
		        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
		        'corporgid' => '2338',
		        'eventorgid' => '2339',
		        'eventid' => $eventid
		    );
			$eventdescription = $this->guzzleBody('EventGetDescription', $params);

			$film['EventDescription'] = $eventdescription[0];

			$data = array();
		    $data['films'] = $film;

			return View::make('eventdetails', $data);

		}
		
		public function eventprice($eventid) {

			$params = array(
		        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
		        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
		        'corporgid' => '2338',
		        'eventorgid' => '2339',
				'buyertypeid' => '163',
		        'eventid' => $eventid
		    );
			$eventprices = $this->guzzleBody('EventListPrices', $params);

			$data = array();
		    $data['TicketType'] = (string)$eventprices['Tier']->Prices->EventPrice->TicketType;
			$data['BasePrice'] = money_format('%i', (double)$eventprices['Tier']->Prices->EventPrice->BasePrice);
			$data['MinPerOrder'] = (string)$eventprices['Tier']->Prices->EventPrice->MinPerOrder;
			$data['MaxPerOrder'] = (string)$eventprices['Tier']->Prices->EventPrice->MaxPerOrder;
			$data['CountPerOrder'] = array();
			for ($x=$data['MinPerOrder']; $x<=$data['MaxPerOrder']; $x++) {
				$data['CountPerOrder'][$x] = (int)$x;
			} 

			return View::make('eventprices', $data);
		}
		
		private function guzzleBody($apicall, $params) {
			
			$query = 'https://prod5.agileticketing.net/api/sales.svc/xml/' . $apicall . '?' . http_build_query($params);
			
			$client = new Guzzle\Http\Client();
			$request = $client->get($query);
			$response = $request->send();

			$body = simplexml_load_string($response->getBody());
			
			return $body;
			
		}
		
		private function guzzleFeed() {
			
			$query = 'http://prod5.agileticketing.net/WebSales/feed.ashx?guid=6395d239-7dd9-47d4-a22f-81a783873e12&showslist=TRUE';
			
			$client = new Guzzle\Http\Client();
			$request = $client->get($query);
			$response = $request->send();

			$body = simplexml_load_string($response->getBody());
			
			return $body;
			
		}
		
		/* ******************** DEPRECATED METHODS ******************** */
		
		/*
		
		// THIS IS THE API VERSION OF THE EVENT LIST. IT IS REPLACED WITH THE 'XML FEED' 
		// VERSION AND THIS VERSION SHOULD BE CONSIDERED DEPRECATED. LEFT FOR ARCHIVAL PURPOSES
		
		public function eventlist()
		{
			
			$params = array(
		        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
		        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
		        'corporgid' => '2338',
		        'eventorgid' => '2339',
		        'buyertypeid' => '163',
				'startdate' => date("n/j/Y"),
				'enddate' => date("n/j/Y", strtotime('+20 day'))
		    );
			$events = $this->guzzleBody('EventList', $params);
            
			var_dump($events);
			exit();
            
			$screenings = array();
            
		    foreach($events as $event) {
            
		        $screening = array();
		        $screening['Id']    =   $event->EventID;
		        $screening['Name']  =   (string)$event->Name;
		        $screening['Time']  =   date("g:i a", strtotime($event->StartDate));
		        // $screening['Url']   =   'http://prod5.agileticketing.net/WebSales/pages/info.aspx?evtinfo=' . $event->EventID . '~fff311b7-cdad-4e14-9ae4-a9905e1b9cb0&epguid=6395d239-7dd9-47d4-a22f-81a783873e12&';
		        $screening['Url']	=	'http://bloordata.dev/films/' . $event->EventID;
            
				array_push($screenings, $screening);
            
		    }
            
		    $data = array();
		    $data['screenings'] = $screenings;
		}
		*/
}