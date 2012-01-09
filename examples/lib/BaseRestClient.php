<?php
abstract class BaseRestClient {
	protected $attempts = 5;
	protected $attemptSleepTime = 5;
	protected $host;
	protected $baseUri = '';

	abstract protected function configure();
	
	public function __construct() { $this->configure(); }

	public function get($uri) {
		$i=0; $fp=null;
		while (!$fp) {
			$fp = fsockopen($this->host, 80, $errno, $errstr, 30);
			if($i++ > $this->attempts) throw new Exception("$errstr ($errno)<br />\n");
			else sleep($this->attemptSleepTime);
		}
		$req = "GET ".$this->baseUri.$uri." HTTP/1.1\r\n";
    	$req .= "Host: ".$this->host. "\r\n";
    	$req .= "Accept: application/php\r\n";    	
    	$req .= "Accept-Language: it\r\n";    	
    	$req .= "Accept-Encoding: compress\r\n";    	
    	$req .= "Connection: Close\r\n\r\n";
    	
    	fwrite($fp, $req);    	
	    while (!feof($fp)) {
	        $str .= fgets($fp, 128);
	    }
    	fclose($fp);
    	$str = explode("\r\n\r\n", $str,2);
		$body = $str[1];
		$body = @gzuncompress($body);
		return unserialize($body);
	}
	
	function gzdecode($data){
	  $g=tempnam('/tmp','ff');
	  @file_put_contents($g,$data);
	  ob_start();
	  readgzfile($g);
	  $d=ob_get_clean();
	  return $d;
	}
	
}