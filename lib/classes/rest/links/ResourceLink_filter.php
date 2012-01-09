<?php
class ResourceLink_filter extends ResourceLink_token {
	
	function __construct($uri) {
		parent::__construct($uri);
		$this->addToQuerystring('filter={filter}');
		$this->setKeyType('filter', 'string');
		$this->setKeyValues('filter',array('letter','keyword'));		
	}
}