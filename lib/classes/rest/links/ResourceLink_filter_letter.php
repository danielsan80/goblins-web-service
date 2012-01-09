<?php
class ResourceLink_filter_letter extends ResourceLink_token {
	
	function __construct($uri) {
		parent::__construct($uri);
		$this->addToQuerystring('filter=letter&letter={letter}&lang={lang}&sort={sort}&page={page}');
		$this->setKeyType('letter', 'char');
		$this->setKeyValues('letter',array('a..z','0-9'));
		$this->setKeyType('lang', 'string');
		$this->setKeyValues('lang',array('it','en'));
		$this->setKeyType('sort', 'string');
		$this->setKeyValues('sort',array('asc','desc'));	
		$this->setKeyType('page', 'int,int');
		$this->setKeyValues('page',array('start,step','0,10','10,10','20,10','...'));	
	}
}