<?php
require_once(dirname(__FILE__).'/../../inc/defineROOT.inc.php');	
require_once 'PHPUnit/Framework.php';

require_once(ROOT.'lib/autoloader/BaseAutoloaderConfig.php');
require_once(ROOT.'lib/autoloader/AutoloaderRegister.php');
require_once(ROOT.'lib/autoloader/Autoloader.php');

class AutoloaderTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		$register = AutoloaderRegister::getInstance(ROOT.'cache/test/classRegister.txt');
		$register->clear();
		if (file_exists(ROOT.'cache/test/classRegister.txt'))
			unlink(ROOT.'cache/test/classRegister.txt');
	}
	protected function tearDown(){
		Autoloader::clear();
		Autoloader::init();
	}
	
	public function testAutoloading() {
		Autoloader::init(new MyAutoloaderConfig());
		
		$this->assertTrue(class_exists('MyTestClass'));
		$this->assertFalse(class_exists('NotExistingMyTestClass'));
	}
	
	public function testRegister() {
		$this->assertFalse(file_exists(ROOT.'cache/test/classRegister.txt'));
		Autoloader::init(new MyAutoloaderConfig());
		new MyTestClass2();
		$this->assertTrue(file_exists(ROOT.'cache/test/classRegister.txt'));
		$array = unserialize(file_get_contents(ROOT.'cache/test/classRegister.txt'));
		$this->assertTrue(is_array($array));
		$this->assertEquals('test/data/autoloader/classes/MyTestClass2.php',$array['MyTestClass2']);		
	}
	
}

class MyAutoloaderConfig extends BaseAutoloaderConfig {
	
	public function configure(){
		$this->setRoot(ROOT);
		$this->setCachefile('cache/test/classRegister.txt');
		$this->addPath('test/data/autoloader/classes/',true);
	}
}

