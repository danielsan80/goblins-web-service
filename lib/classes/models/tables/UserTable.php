<?php
/**
 */
class UserTable extends Doctrine_Table
{
	
	/**
     * Returns an instance of this class.
     *
     * @return object UsersTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('User');
    }
    
    public function isValidToken($token) {
    	$tokenTable = TokenTable::getInstance();
    	return $tokenTable->isValid($token);
    }
    
    public function getByToken($token) {
    	$tokenTable = TokenTable::getInstance();
    	return $tokenTable->getByToken($token);
    }
    
}