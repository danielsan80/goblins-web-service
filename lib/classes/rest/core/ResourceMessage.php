<?php
class ResourceMessage {
	private $type = 'notice';
	private $code;
	private $message;
	private $description;
	
	public function setType($value) { $this->type = $value; }
	public function setCode($value) { $this->code = $value; }
	public function setMessage($value) { $this->message = $value; }
	public function setDescription($value) { $this->description = $value; }
	
	public function get() {
		$out = array();
		$out['type'] = $this->type;
		if ($this->code)
			$out['code'] = $this->code;
		if ($this->message)
			$out['message'] = $this->message;
		if ($this->description)
			$out['description'] = $this->description;
		return $out;
	}
}