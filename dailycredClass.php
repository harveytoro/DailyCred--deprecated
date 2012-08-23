<?php

class dailycred {

	private $oauth_url = 'https://www.dailycred.com/oauth/';
	private $graph_url = 'https://www.dailycred.com/graph/me.json?';
	private $client_id = 'Add client id here';
	private $client_secret = 'Add client secret here';

	public function generate_url($param){
	
	$signin_url = $this->oauth_url.'authorize?action='.$param.'&client_id='.$this->client_id;
	
	return $signin_url;
	
	
	}

	
	private function exchange_code($code){
	
		$exchange_url = $this->oauth_url.'access_token?code='.$code.'&client_secret='.$this->client_secret;
		
		$atoken_json = $this->get_with_curl($exchange_url);
		
		if($atoken_json->worked === true){
			
			$access_token = $atoken_json->access_token;
			return $access_token;
			
		}
	}
	
	public function graph_request($code){
		
		$get_a_token = $this->exchange_code($code);
		
		
		
		$graph_request_url = $this->graph_url.'access_token='.$get_a_token;
		
		$get_response = $this->get_with_curl($graph_request_url);
		
		return $get_response;
	
	}
	
	
	private function get_with_curl($url){
	
	$ch = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
    
    curl_close($ch);
	
	$obj = json_decode($data);
	
	return $obj;
	}

}







?>