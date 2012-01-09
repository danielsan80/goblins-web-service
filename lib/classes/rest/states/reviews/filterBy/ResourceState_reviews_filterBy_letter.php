<?php
class ResourceState_reviews_filterBy_letter extends ResourceState {
	
	public function getBody(){
		$options = $this->getOptions();
		$uri = $options['uri'];
		$data = $options['data'];
		
		$link = new ResourceLink_filter_letter('/reviews');
		$links[] = $link->get();
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('reviews_filterBy.message'));
		$message->setDescription($text->get('reviews_filterBy.description'));
		$messages = array($message->get());
		
		$letter = Util::getFromQuerystring($data, 'letter');
		$lang = Util::getFromQuerystring($data, 'lang');
		$sort = Util::getFromQuerystring($data, 'sort');
		$page = Util::getFromQuerystring($data, 'page');
		
		if ($options['lang']) $lang = $options['lang']; 
		
		$result = array();
		if ($letter) {
			$reviewsTable = ReviewTable::getInstance();
			$reviews = $reviewsTable->getReviewsByLetter($letter, array(
				'lang' => $lang,
				'sort' => $sort,
				'page' => $page,
			));
			
			foreach($reviews as $i => $review) {
				$review = array('link' => null) + $review->getData();
				$link = new ResourceLink_review('reviews/'.$review['id']);
				$review['link'] = $link->get();
				$result[$i] = $review;
			}
		}
		
		return array(
			'tplKey' => 'reviews',
			'links' => $links,
			'messages' => $messages,
			'reviews' => $result		
		);	
	}
}