<?php

	//app/controllers/OrderController.php

	class OrderController extends BaseController {
		public function index()
		{
			return View::make('hello'); 
		}
		
		public function buytickets()
		{

			$orderid = Session::get('orderid', null);

			if($orderid == null) {
				// Create an order via OrderStart API call

				$params = array(
			        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
			        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
			        'corporgid' => '2338',
			        'buyerTypeID' => '163'
			    );
				$orderstart = $this->guzzleBody('OrderStart', $params);

				var_dump($orderstart);
			} else {
				/*
				// If an order ID exists, get the status to make sure it has not expired.
				$params = array(
			        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
			        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
			        'corporgid' => '2338',
			        'orderID' => '2339',
					'transactionID' => ''
			    );
				$orderstatus = $this->guzzleBody('OrderStatus', $params);
				var_dump($OrderStatus);
				*/
			}

			// $input = Input::all();
			// var_dump($input);

			// return "OrderStart or Continue";

		}
		
		private function guzzleBody($apicall, $params) {
			
			$query = 'https://prod5.agileticketing.net/api/sales.svc/xml/' . $apicall . '?' . http_build_query($params);
			
			$client = new Guzzle\Http\Client();
			$request = $client->get($query);
			$response = $request->send();

			$body = simplexml_load_string($response->getBody());
			
			return $body;
			
		}
}