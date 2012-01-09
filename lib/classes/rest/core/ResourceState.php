<?php
class ResourceState {
	private $options;
	
	public function __construct($options = array()){
		if (!is_array($options)) throw new Exception('$options must be an array');
		$this->options = $options;
	}
	
	public function getOptions() { return $this->options; }
	public function getCode() { return Response::OK; }
	public function getBody(){ return array(); }
	public function getHeaders(){return array(); }
		
}