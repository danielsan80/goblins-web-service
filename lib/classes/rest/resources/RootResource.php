<?php


/**
 * The Root
 * @uri (/\?(.)*)?
 */
class RootResource extends Resource {
    
    /**
     * Handle a GET request for this resource
     * @param Request request
     * @return Response
     */
    function get($request) {        
    	$resolver = new ResourceResolver('root', $request);    	
    	return $resolver->getResponce();
    }
}
