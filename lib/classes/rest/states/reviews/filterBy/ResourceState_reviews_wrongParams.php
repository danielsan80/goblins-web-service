<?php
// Inutilizzato
class ResourceState_reviews_wrongParams extends ResourceState {
	
	public function getBody(){
		$options = $this->getOptions();
		$uri = $options['uri'];
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('reviews_wrongParams.message'));
		$message->setDescription($text->get('reviews_wrongParams.description'));
		$messages = array($message->get());
		
		return array(
			'tplKey' => 'generic',
			'messages' => $messages		
		);
	}
	
	public function getCode() {
		return Response::BADREQUEST;
	}
}