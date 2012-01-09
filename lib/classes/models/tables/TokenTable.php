<?php
/**
 */
class TokenTable extends Doctrine_Table
{
	public static function getInstance()
    {
        return Doctrine_Core::getTable('Token');
    }
    
	public function isValid($token){
    	$q = Doctrine_Query::create()
			->from("Token T")
			->where("T.token = ?", $token)
			->andWhere("T.enabled")
			->limit(1)
		;
		return (bool)$q->fetchOne();
    }
    public function enable($username){
    	$q = Doctrine_Query::create()
			->update("Token T")
			->set('enabled','true')
			->where("T.username = ?", $username)
			->limit(1)
		;
		$q->execute();
    }
    public function disable($username){
    	$q = Doctrine_Query::create()
			->update("Token T")
			->set('enabled','false')
			->where("T.username = ?", $username)
			->limit(1)
		;
		$q->execute();
    }
    
    public function getByUsername($username){
    	$q = Doctrine_Query::create()
			->from("Token T")
			->where("T.username = ?", $username)
			->limit(1)
		;
		if (!($token = $q->fetchOne())){
			$token = new Token();
			$token->username = $username;
			$token->enabled = true;
			$token->save();
		} 
		return $token;
    }

    public function getByToken($token){
    	$q = Doctrine_Query::create()
			->from("Token T")
			->where("T.token = ?", $token)
			->limit(1)
		;
		return $q->fetchOne();
    }
    
    public function getPublicToken() {
    	return $this->getByUsername('public_token');
    }

}