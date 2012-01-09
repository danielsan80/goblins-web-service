<?php
require_once(dirname(__FILE__).'/../../inc/initialization.inc.php');	
require_once 'PHPUnit/Framework.php';

new TestInitializationDoctrine();
Doctrine_Core::createTablesFromArray(array('Token'));

class TokenTest extends PHPUnit_Framework_TestCase {
	private $tokenTable; 
	private $token; 
	private $tokenStr = 'myr4nd0mt0k3n'; 
	private $username = 'myUsername'; 

	protected function setUp() {	
		$this->tokenTable = TokenTable::getInstance();
		$token = new Token();
		$token->enabled = true;
		$token->username = $this->username;
		$token->token = $this->tokenStr;
		$token->save();
		$this->token = $token;
	}
	protected function tearDown(){
		$q = Doctrine_Query::create()
			->delete("Token T");
		$q->execute();
	}
	
	public function test_IsValid_if_exists() {
		$this->assertFalse($this->tokenTable->isValid('notExistingToken'));
		$this->assertTrue($this->tokenTable->isValid($this->tokenStr));
	}
		
	public function test_IsValid_if_enabled() {
		$this->token->disable();
		$this->assertFalse($this->tokenTable->isValid($this->tokenStr));
		$this->token->enable();
		$this->assertTrue($this->tokenTable->isValid($this->tokenStr));
	}
	
	public function test_enable_disable_by_username() {
		$this->tokenTable->disable($this->username);
		$this->assertFalse($this->tokenTable->isValid($this->tokenStr));
		$this->tokenTable->enable($this->username);
		$this->assertTrue($this->tokenTable->isValid($this->tokenStr));
	}
	
	public function test_regeneration() {
		$tokenStr = $this->token->getToken();
		$this->assertEquals($tokenStr,$this->token->getToken());
		$this->token->regenerate();
		$this->assertNotEquals($tokenStr,$this->token->getToken());
	}
	public function test_getByUsername(){
		$token = $this->tokenTable->getByUsername($this->username);
		$this->assertEquals($token->getToken(), $this->token->getToken());
		$count = $this->tokenTable->count();
		$token = $this->tokenTable->getByUsername('newUsername');
		$this->assertNotNull($token);
		$this->assertTrue((bool)$token->getToken());
		$this->assertEquals($count+1,$this->tokenTable->count());		
		$this->assertNotEquals($token->getToken(), $this->token->getToken());
	}
	public function test_getByToken(){
		$token = $this->tokenTable->getByToken($this->tokenStr);
		$this->assertEquals($token->getToken(), $this->token->getToken());
		$token = $this->tokenTable->getByToken('n0tEx1stingTok3n');
		$this->assertFalse((bool)$token);
	}
}
