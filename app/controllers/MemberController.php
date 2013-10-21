<?php

	//app/controllers/MemberController.php

	class MemberController extends BaseController {
		public function index()
		{
			return View::make('hello'); 
		}
		
		public function buyertypes() {
			
			// https://prod1.agileticketing.net/api/sales.svc/xml/BuyerTypeList?appkey={APPKEY}&userkey={USERKEY}&corporgid={CORPORGID}
			$params = array(
		        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
		        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
		        'corporgid' => '2338',
		    );
			$buyertypes = $this->guzzleBody('BuyerTypeList', $params);

			var_dump($buyertypes);
			
		}
		
		public function registrationform()
		{
			$data = array();

			return View::make('registrationform', $data);
		}
		
		public function addmember()
		{
			return "Adding Member";
		}
		
		public function spazsquatchlookup()
		{
			// THIS SHOLD BE OBVIOUS, BUT IS ONLY FOR TESTING.
			// REMOVE BEFORE GOING TO PRODUCTION
			$params = array(
		        'appkey' => '6395d239-7dd9-47d4-a22f-81a783873e12',
		        'userkey' => '6bc2f3cc-c652-40cd-9857-f7b4be7f9d74',
		        'corporgid' => '2338',
		        'username' => 'Spazsquatch',
				'password' => 'bopski'
		    );
			$customerlookup = $this->guzzleBody('AuthenticateCustomer', $params);

			var_dump($customerlookup);
			exit();

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