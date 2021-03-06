<?php

/**
 * Ukz375199ontdgUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class User extends BaseUser
{
	public function regenerateToken() {
		$tokenTable = TokenTable::getInstance();
		$token = $tokenTable->getByUsername($this->username);
		$token->regenerate();
	}
	public function getToken(){
		$tokenTable = TokenTable::getInstance();
		$token = $tokenTable->getByUsername($this->username);
		return $token->getToken();
	}
	public function enableToken(){
		$tokenTable = TokenTable::getInstance();
		$tokenTable->enable($this->username);
	}
	public function disableToken(){
		$tokenTable = TokenTable::getInstance();
		$tokenTable->disable($this->username);
	}
	
}