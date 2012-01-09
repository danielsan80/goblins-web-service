<?php
class ResourceState_root extends ResourceSuperState {
	public function calculate(){
		$this->setAsCalculated();
		$options = $this->getOptions();
		$uri = $options['uri'];
		$data = $options['data'];
		$token = Util::getFromQuerystring($data, 'token');
		
		if(false) {
			if (!$token) {
				$this->setSubstate(new ResourceState_noToken(array('uri'=>$uri)));
				return; 
			}
			
			$tokenTable = TokenTable::getInstance();
			if (!$tokenTable->isValid($token)){
				$this->setSubstate(new ResourceState_wrongToken(array('uri'=>$uri)));
				return;
			}
		}
		
		$text = new ResourceText();
		
		$options = $this->getOptions();
		$uri = $options['uri'];
		$link = new ResourceLink_token('/reviews');
		$links = array($link->get());
		
		$message = new ResourceMessage();
		$message->setType('notice');
		$message->setMessage($text->get('root.message'));
		$message->setDescription( $text->get('root.description'));
		$messages = array($message->get());

		$this->setBody(array(
			'tplKey' => 'generic',
			'links' => $links,
			'messages' => $messages		
		));
	}
}