<?php


/**
 * The Review Collection
 * @uri /reviews(/\?(.)*)?
 */
class ReviewsResource extends Resource {
	
	/**
 	* Handle a GET request for this resource
 	* @param Request request
 	* @return Response
 	*/
	function get($request) {
		$response = new Response($request);
		
		$etag = md5($request->uri);
		if ($request->ifNoneMatch($etag)) {
			
			$response->code = Response::NOTMODIFIED;
			
		} else {
			$response->code = Response::OK;
			$response->addHeader('Content-type', 'text/html; charset="UTF-8"');
			$headers = $this->selectHeaders($request);
			foreach($headers as $key => $value)
				$response->addHeader($key, $value);
			$response->addEtag($etag);
			$response->body = $this->selectBody($request);
		}
		return $response;		
	}
	
	private function selectHeaders($request) {
		$headers = array();
		$headers['Content-type'] = 'text/xml; charset="UTF-8"';
		$data = $this->getData($request);
		switch($data['format']) {
			case 'php':
				$headers['Content-type'] = 'application/php; charset="UTF-8"';
				break;
			case 'xml':
				$headers['Content-type'] = 'text/xml; charset="UTF-8"';
				break;
			case 'json':
				$headers['Content-type'] = 'application/json; charset="UTF-8"';
				break;
			case 'yml':
				$headers['Content-type'] = 'text/yml; charset="UTF-8"';
				break;
		}
		
		return $headers;
	}

	private function selectBody(Request $request) {
		//return serialize(array('lang' => $request->acceptLang, 'format' => $request->accept));
		
		
		$data = $this->getData($request);
		
		$tokenTable = TokenTable::getInstance();
		if (!$tokenTable->isValid($data['token'])) {
			$view = new View();
			$view->setTpl(Config::getROOT().'tpl/accessDenied.xml');
			return $view->render();
		}	
		
		try {
			$rs = $this->getReviews($data);
		} catch (Exception $e) {
			$rs = 'ERROR'; //Filtro non impostato
		}
		switch($data['format']) {
			case 'php':
				return serialize($rs);
			case 'xml':
				return $this->getAsXml($rs);
			case 'json':
				return json_encode($rs);
			case 'yml':
				$dumper = new sfYamlDumper();
				return $dumper->dump($rs,5);
		}	
		
		return $this->getAsXml($rs);
	}

	private function getSummary() {
		return 'Summary';
	}
	
	private function getAsXml($reviews){
//		if ($reviews=='ERROR') { 
//			$view = new View();
//			$view->setTpl(Config::getROOT().'tpl/noReviews.xml');
//		 	return $view->render();
//		}
		$view = new View();
		$view->setTpl(Config::getROOT().'tpl/reviews.xml');
		$cdata = array_flip(array('slack','contenuto','pro','contro','text'));
		$arrays = array_flip(array('slack','meccaniche','tipo'));
		$body = $view->render(array('reviews' => $reviews, 'cdata' => $cdata, 'arrays' => $arrays));
		return $body;	
	}
	
	
	private function getReviews($data) {
		switch ($data['filter']) {
			case 'letter':
				return $this->getReviewsByLetter($data['letter'], array(
					'lang' => $data['lang'],
					'sort' => $data['sort'],
				));
			case 'keyword':
				return $this->getReviewsByKeyword($data['keyword'], array(
					'lang' => $data['lang'],
					'sort' => $data['sort'],
				));
			case null:
			default:
				throw new Exception('Filter not set');
		}
	}
	
	private function getReviewsByLetter($letter, $options) {
		$reviewsTable = ReviewTable::getInstance();
		$reviews = $reviewsTable->getReviewsByLetter($letter, $options);

		$rs = array();
		foreach($reviews as $i => $review){
			$rs[$i] = $review->getData();
		}
		return $rs;
	}

	private function getReviewsByKeyword($keyword, $options) {
		$reviewsTable = ReviewTable::getInstance();
		$reviews = $reviewsTable->getReviewsByKeyword($keyword, $options);

		$rs = array();
		foreach($reviews as $i => $review){
			$rs[$i] = $review->getData();
		}
		return $rs;
	}
	
	private function getData(Request $request) {
		parse_str($request->data, $data);
		
		if (!$data['lang']) {
			foreach( $request->acceptLang as $lang ) {
				if ($lang[0]) $data['lang'] = $lang[0];
				break;
			}
		}

		if (!$data['format']) {
			$allowedFormats = array('xml', 'php', 'json', 'yml');
			foreach( $request->accept as $format ) {
				if (in_array($format[0],$allowedFormats)) {
					$data['format'] = $format[0];
					break;
				}
			}
		}
		return $data;
	}
}
