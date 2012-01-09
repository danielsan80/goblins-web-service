<?php
class ResourceState_reviews extends ResourceSuperState {
	
	public function calculate(){
		$this->setAsCalculated();
		$options = $this->getOptions();
		$uri = $options['uri'];
		$data = $options['data'];
		
		if (false) {
			$token = Util::getFromQuerystring($data, 'token');		
			if (!$token) {
				$this->setSubstate(new ResourceState_noToken($options));
				return;
			}
			
			$tokenTable = TokenTable::getInstance();
			if (!$tokenTable->isValid($token)){
				$this->setSubstate(new ResourceState_wrongToken($options));
				return;
			}
		}
		
		$filter = Util::getFromQuerystring($data, 'filter');
		
		if (!$filter) {
			$this->setSubstate(new ResourceState_reviews_noFilter($options));
			return;			
		}
		
		$this->setSubstate(new ResourceState_reviews_filterBy($options));
	}
}