<?php
require_once(dirname(__FILE__).'/../../inc/defineROOT.inc.php');	
require_once 'PHPUnit/Framework.php';

require_once(ROOT.'lib/autoloader/BaseAutoloaderConfig.php');

class AutoloaderConfigTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {}
	protected function tearDown(){}
	
	public function test1() {
		$config = new MyAutoloaderConfig2();
		$config->setRoot(ROOT);
		$config->addPath('classes1');
		$config->addPath('classes2', false, 'default');
		$config->addClassFilenameMethod('symfony');
		$this->assertEquals(array(
			array('path'=>'classes1', 'recursive'=>true, 'filenames'=>
				array('MyClass.php', 'MyClass.class.php')
			),
			array('path'=>'classes2', 'recursive'=>false, 'filenames'=>
				array('MyClass.php')
			)
		), $config->getPaths('MyClass'));
		
	}
}

class MyAutoloaderConfig2 extends BaseAutoloaderConfig {
	
	public function configure(){}
	
	public function getClassFilename_symfony($class){	
		return $class.'.class.php';
	}
}
