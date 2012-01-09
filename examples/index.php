<?php
	require_once 'lib/GoblinsClient.php';
	header('Content-Type: text/plain; charset="UTF-8"');

	
	$client = new GoblinsClient();
	
	$reviews = $client->getReviewsByLetter('a',array('page'=>'0,5'));
	
	print_r($reviews);