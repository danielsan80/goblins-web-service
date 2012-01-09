<?php
class ResourceResolver {
	private $response;
	
	function __construct($resourceCode, Request $request){
		
		$response = new Response($request);
        
        $etag = md5($request->uri);
        if ($request->ifNoneMatch($etag)) {
            $response->code = Response::NOTMODIFIED;
        } else {
        	$class = 'ResourceState_'.$resourceCode;
        	
          	$state = new $class($this->getOptions($request));
			$formatter = new ResourceFormatter($state->getBody(), $this->getFormat($request));
			
			$body = $formatter->getBody();
			$headers = $formatter->getHeaders();
			
            $response->code = $state->getCode();
            
            foreach($headers as $key => $value)
	            $response->addHeader($key, $value);
            $response->addEtag($etag);      
            $response->body = $body;			
        }
        
        $this->response = $response;
	}
	
	function getResponce(){ return $this->response; }
	
	private function getFormat($request){
    	$data = $request->data;
		$format = Util::getFromQuerystring($data, 'format');
		if (!$format) {
			$allowedFormats = array('xml', 'php', 'json', 'yml');
			foreach( $request->accept as $formats ) {
				if (in_array($formats[0],$allowedFormats)) {
					$format = $formats[0];
					break;
				}
			}
		}
		return $format;
    }
    
    private function getOptions($request){
    	$options = array();
        $uri = substr($request->uri, strlen($request->baseUri));
        $options['uri'] = $uri;
        $options['data'] = $request->data;
        
		foreach( $request->acceptLang as $langs ) {
			if ($langs[0]) $options['lang'] = $langs[0];
				break;
		}
		return $options;
    }
}