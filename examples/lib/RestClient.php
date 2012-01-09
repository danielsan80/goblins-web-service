<?php
require_once(dirname(__FILE__).'/BaseRestClient.php');

class RestClient extends BaseRestClient {
	protected function configure() {
		$this->host = 'webserver'; // 'www.goblins.net';
		$this->baseUri = '/wsGoblins'; // '/webservices';
	}	
}