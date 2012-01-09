<?php
require_once(dirname(__FILE__).'/../../inc/initialization.inc.php');	
require_once 'PHPUnit/Framework.php';

new TestInitializationDoctrine();
Doctrine_Core::createTablesFromArray(array('User'));

class UserTest extends PHPUnit_Framework_TestCase {
	private $userTable; 
	private $user; 
	private $token; 
	private $username = 'myUsername';  

	protected function setUp() {	
		$this->userTable = UserTable::getInstance();
		$user = new User();
		$user->username = $this->username;
		$this->user = $user;
		$this->token = $this->user->getToken();
	}
	
	protected function tearDown(){
		$q = Doctrine_Query::create()
			->delete("User U");
		$q->execute();
	}
	
	public function test_token_generation_and_reganeration() {
		$this->assertEquals($this->token, $this->user->getToken());
		$this->user->regenerateToken();
		$this->assertNotEquals($this->token, $this->user->getToken());
	}
	
	public function test_IsValidToken() {
		$this->assertFalse($this->userTable->isValidToken('notExistingToken'));
		$this->assertTrue($this->userTable->isValidToken($this->token));
	}
		
	public function test_getUserByToken() {
		$this->assertEquals($this->user->username,$this->userTable->getByToken($this->token)->username);
	}
	
	public function test_enable_disable_token() {
		$this->user->disableToken();
		$this->assertFalse($this->userTable->isValidToken($this->token));
		$this->user->enableToken();
		$this->assertTrue($this->userTable->isValidToken($this->token));
	}
}
