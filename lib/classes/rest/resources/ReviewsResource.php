<?php


/**
 * Reviews
 * @uri /reviews(/\?(.)*)?
 */
class ReviewsResource extends Resource {
    
    /**
     * Handle a GET request for this resource
     * @param Request request
     * @return Response
     */
    function get($request) {        
    	$resolver = new ResourceResolver('reviews', $request);    	
    	return $resolver->getResponce();
    }
}
