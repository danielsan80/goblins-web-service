<?php
class ResourceText {
	private $xml;
	
	function __construct(){
		$xml = file_get_contents(Config::getROOT().'data/rest/text.xml');
		$xml = new SimpleXMLElement($xml);
		$this->xml = $xml;
	}
	
	function get($key){
		$key = explode('.',$key);
		$text = $this->xml->xpath("//state[@id='".$key[0]."']//text[@id='".$key[1]."']"); $text = (string)$text[0];
		$text = strtr($text, array( "\t" => ''));
		$text = preg_replace('/[ ]+/',' ', $text);
		return trim($text);	
	}
}