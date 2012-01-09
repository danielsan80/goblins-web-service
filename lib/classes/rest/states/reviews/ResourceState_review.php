<?php
class ResourceState_review extends ResourceSuperState {
	
	protected function calculate(){
		$this->setAsCalculated();
		$options = $this->getOptions();
		$uri = $options['uri'];
		$data = $options['data'];
		
		$tmp = explode('/',$uri);
		for($i=0; $i<count($tmp);$i++){
			if ($tmp[$i]=='reviews'){
				$id = $tmp[$i+1];
				break;				
			}
		}
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('reviews_view.message'));
		$message->setDescription($text->get('reviews_view.description'));
		$messages = array($message->get());
		
		$reviewsTable = ReviewTable::getInstance();
		$review = $reviewsTable->find($id);
		
		if (!$review) {
			$this->setSubstate(new ResourceState_review_notFound($options));
			return;
		}
			
		$this->setBody(array(
			'tplKey' => 'review',
			//'links' => $links,
			'messages' => $messages,
			'review' => $review->getData()		
		));	
	}
}