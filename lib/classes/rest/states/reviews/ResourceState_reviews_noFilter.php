<?php
class ResourceState_reviews_noFilter extends ResourceState {
	
	public function getBody(){
		$options = $this->getOptions();
		$uri = $options['uri'];
		$links = array();
		
		$link = new ResourceLink_filter('/reviews');
		$links[] = $link->get();
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('reviews_noFilter.message'));
		$message->setDescription($text->get('reviews_noFilter.description'));
		$messages = array($message->get());
		
		return array(
			'tplKey' => 'generic',
			'links' => $links,
			'messages' => $messages		
		);
	}
}