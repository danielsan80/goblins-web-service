<?php
class ResourceSuperState extends ResourceState {
	
	protected $calculated=false;
	private $substate;
	protected function setSubstate($substate){
		$this->substate = $substate;
	}
	protected function setAsCalculated(){
		$this->calculated = true;
	}
	
	private $code;
	protected function setCode($code) { $this->code = $code; }
	public function getCode() {
		if (!$this->calculated) $this->calculate();
		if (isset($this->code)) return $this->code;
		if (isset($this->substate)) return $this->substate->getCode();
		return parent::getCode();
	}
	
	private $body;
	protected function setBody($body) { $this->body = $body; }
	public function getBody(){
		if (!$this->calculated) $this->calculate();
		if (isset($this->body)) return $this->body;
		if (isset($this->substate)) return $this->substate->getBody();
		return parent::getBody();
	}

	private $headers;
	protected function setHeaders($headers) { $this->headers = $headers; }
	public function getHeaders(){
		if (!$this->calculated) $this->calculate();
		if (isset($this->headers)) return $this->headers;
		if (isset($this->substate)) return $this->substate->getHeaders();
		return parent::getHeaders();
	}

	protected function calculate(){
		$this->setAsCalculated();
	}
}