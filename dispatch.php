<?php
	require_once 'inc/initialization.inc.php';
	
	require_once Config::getRoot().'lib/classes/rest/resources/RootResource.php';
	require_once Config::getRoot().'lib/classes/rest/resources/ReviewsResource.php';
	require_once Config::getRoot().'lib/classes/rest/resources/ReviewResource.php';

// handle request
$request = new Request(
	$config = array( 'baseUri' => '/wsGoblins' )
);

//echo $request->uri;
try {
    $resource = $request->loadResource();
    $response = $resource->exec($request);

} catch (ResponseException $e) {
    switch ($e->getCode()) {
    case Response::UNAUTHORIZED:
        $response = $e->response($request);
        $response->addHeader('WWW-Authenticate', 'Basic realm="Tonic"');
        break;
    default:
        $response = $e->response($request);
    }
}
$response->output();
