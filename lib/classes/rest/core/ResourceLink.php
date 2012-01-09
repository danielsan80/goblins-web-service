<?php
class ResourceLink {
	private $uri;
	private $keys = array();
	
	function __construct($href, $rel="related") {
		$this->href = $href;
		$this->rel = $rel;
	}
	
	public function get(){
//		$php_self = explode('/',$_SERVER[PHP_SELF]);
//		unset($php_self[count($php_self)-1]);
//		$php_self = implode('/',$php_self).'/';
//		$url = 'http://'.$_SERVER[HTTP_HOST].$this->uri;
		$out = array(
			//'url' => $url,
			'href' => $this->href,
			'rel' => $this->rel
		);
		if ($this->keys)
			$out['keys'] = $this->keys;
		return $out;
	}
	
	public function setKeyType($key, $type) {
		$this->checkKey($key);
		$this->keys[$key]['type'] = $type;
	}

	public function setKeyValues($key, $values) {
		$this->checkKey($key);
		$this->checkValues($values);
		$this->keys[$key]['values'] = $values;
	}
	
	private function checkKey($key){
		if (!in_array($key, $this->getKeys()))
			throw new Exception('{'.$key.'} doesn\'t exists in uri');
	}
	private function checkValues($values){
		if (!is_array($values))
			throw new Exception('keyValues must be an array');
	}
	
	private function getKeys() {
		$pattern = "/{([^}]*)}/";
		preg_match_all($pattern, $this->uri, $matches);
		return $matches[1];
	}
	
	public function addToQuerystring($str) {
		$uriParts = explode('?',$this->uri);
		if (substr($uriParts[0],-1)!='/') $uriParts[0] .= '/';
		
		$uriParts[1] = Util::addToQuerystring($uriParts[1], $str);
		if (!$uriParts[1]) unset($uriParts[1]);
		$this->uri = implode('?', $uriParts);
	}
	
}