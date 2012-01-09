<?php
class ResourceLink_filter_keyword extends ResourceLink_token {
	
	function __construct($uri) {
		parent::__construct($uri);
		$this->addToQuerystring('filter=keyword&keyword={keyword}&lang={lang}&sort={sort}&page={page}');
		$this->setKeyType('keyword', 'string');
		$this->setKeyValues('keyword',array('*'));
		$this->setKeyType('lang', 'string');
		$this->setKeyValues('lang',array('it','en'));
		$this->setKeyType('sort', 'string');
		$this->setKeyValues('sort',array('asc','desc'));
		$this->setKeyType('page', 'int,int');
		$this->setKeyValues('page',array('start,step','0,10','10,10','20,10','...'));		
	}
}