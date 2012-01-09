<?php
require_once(dirname(__FILE__).'/BaseRestClient.php');
require_once(dirname(__FILE__).'/RestClient.php');

class GoblinsClient {
	private $restClient;
	private $token = '1234567890';
	
	public function __construct() {
		$this->restClient = new RestClient();
	}
	
	public function getReviewsByLetter($letter, $options = array()){
		$reviews = $this->restClient->get('/reviews/?token='.$this->token.'&filter=letter&letter='.$letter.'&format='.$options['format'].'&lang='.$options['lang'].'&sort='.$options['sort'].'&page='.$options['page']);
		return $reviews;
	}	
	
	public function getReviewsByKeyword($key, $options = array()){
		$reviews = $this->restClient->get('/reviews/?token='.$this->token.'&filter=keyword&key='.$keyword.'&format='.$options['format'].'&lang='.$options['lang'].'&sort='.$options['sort'].'&page='.$options['page']);
		return $reviews;
	}
}