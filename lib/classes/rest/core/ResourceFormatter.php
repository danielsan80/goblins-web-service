<?php
class ResourceFormatter {
	private $body;
	private $headers;
	
	public function __construct($content, $format) {
		$method = 'formatAs_'.$format;

		if (method_exists($this,$method)) {
			$this->$method($content);
		} else {
			$this->formatAs_json($content);
		} 
	}
	
	private function formatAs_php($content){
		$this->headers['Content-type'] = 'application/php; charset="UTF-8"';
		unset($content['tplKey']);
		$this->body = serialize($content);
	}
	
	private function formatAs_json($content){
		$this->headers['Content-type'] = 'application/json; charset="UTF-8"';
		unset($content['tplKey']);
		$this->body = json_encode($content);
	}
	
 	private function formatAs_yml($content){
		$this->headers['Content-type'] = 'text/yml; charset="UTF-8"';
		unset($body['tplKey']);
		$dumper = new sfYamlDumper();
		$this->body = $dumper->dump($content,5);
	}
	
 	private function formatAs_xml($content){
		$this->headers['Content-type'] = 'text/xml; charset="UTF-8"';
		$view = new View();
		$view->setTplPath(Config::getROOT().'tpl/');
		$view->setTplKey($content['tplKey'].'.xml');
		unset($content['tplKey']);
		$view->setData($content);
		$this->body = $view->render();
 	}
	
	public function getBody(){
		return $this->body;
	}
	public function getHeaders(){
		return $this->headers;
	}
}