<?php
class ResourceState_review_notFound extends ResourceState {
	
	public function getBody(){
		$options = $this->getOptions();
		$uri = $options['uri'];
		$link = new ResourceLink_token($uri);		
		$links = array($link->get());
		
		$text = new ResourceText();
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('review_notFound.message'));
		$message->setDescription($text->get('review_notFound.description'));
		$messages = array($message->get());
		
		return array(
			'tplKey' => 'generic',
			'links' => $links,
			'messages' => $messages		
		);
	}
	public function getCode(){
		return Response::NOTFOUND;
	}
}