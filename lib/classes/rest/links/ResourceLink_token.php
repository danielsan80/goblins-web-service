<?php
class ResourceLink_token extends ResourceLink {	
	/*function __construct($uri) {
		$tokenTable = TokenTable::getInstance();
		$token = $tokenTable->getPublicToken();
		parent::__construct($uri);
		$this->addToQuerystring('token={token}');
		$this->setKeyType('token', 'string');
		$this->setKeyValues('token',array($token->token,'*'));
	}*/
}