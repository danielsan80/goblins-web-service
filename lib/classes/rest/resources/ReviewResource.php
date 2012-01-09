<?php


/**
 * Reviews
 * @uri /reviews/([0-9]+)(/\?(.)*)?
 */
class ReviewResource extends Resource {
    
    /**
     * Handle a GET request for this resource
     * @param Request request
     * @return Response
     */
    function get($request) {        
    	$resolver = new ResourceResolver('review', $request);    	
    	return $resolver->getResponce();
    }
}
