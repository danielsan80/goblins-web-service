<?php
class ResourceState_reviews_filterBy extends ResourceSuperState {
	
	public function calculate(){
		$this->setAsCalculated();
		$options = $this->getOptions();
		$uri = $options['uri'];
		$data = $options['data'];
		
		$filter = Util::getFromQuerystring($data, 'filter');
		
		if (class_exists( $class = 'ResourceState_reviews_filterBy_'.$filter)) {
			$this->setSubstate(new $class($options));
			return;		
		}

		$link = new ResourceLink_filter('/reviews');
		$links[] = $link->get();
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('reviews_wrongFilter.message'));
		$message->setDescription($text->get('reviews_wrongFilter.description'));
		$messages = array($message->get());
		
		$this->setBody(array(
			'tplKey' => 'generic',
			'links' => $links,
			'messages' => $messages		
		));
	}
}