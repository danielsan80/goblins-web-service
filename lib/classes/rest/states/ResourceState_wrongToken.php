<?php
class ResourceState_wrongToken extends ResourceState {
	
	public function getBody(){
		$options = $this->getOptions();
		$uri = $options['uri'];
		$link = new ResourceLink_token($uri);		
		$links = array($link->get());
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('wrongToken.message'));
		$message->setDescription($text->get('wrongToken.description'));
		$messages = array($message->get());
		
		return array(
			'tplKey' => 'generic',
			'links' => $links,
			'messages' => $messages		
		);
	}
	public function getCode(){
		return Response::FORBIDDEN;
	}
}