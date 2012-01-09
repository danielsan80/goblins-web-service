<?php
require_once(dirname(__FILE__).'/../../inc/initialization.inc.php');

class ViewTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {}
	protected function tearDown(){}
	
	public static function provider_tplKey_filename() {
		return array(
			array('tpl.html', 'test/data/tpl/tpl.html'),
			array('A/tpl.html', 'test/data/tpl/A/tpl.html'),
			array('C/tpl.html', 'test/data/tpl/C/tpl.html'),
			array('A/C/D/tpl.html', 'test/data/tpl/A/C/D/tpl.html'),
			array('A/B/C/D/tpl.html', 'test/data/tpl/A/B/C/D/tpl.html'),
			array('D/tpl.html', 'test/data/tpl/A/C/D/tpl.html'),
			array('C/B/tpl.html', 'test/data/tpl/A/C/B/D/tpl.html'),
		);
	}
	
	public function testBaseUse() {
		$view = new View();
		$view->setTpl('test/data/tpl/tpl.html');		
		$this->assertEquals('1', $view->render());

	}
	
	/**
     * @dataProvider provider_tplKey_filename
     */	
	public function testTplRetrive($key, $filename) {
		$view = new MyView();
		$this->assertEquals($filename, $view->getTplFilename('test/data/tpl/',$key));
	}
	
	public function testAdvancedUse() {
		$root = Config::getROOT();
		$view = new View();
		$view->setTplPath('test/data/tpl/');
		$view->addTplKey('A/tpl.html', 'notExisting.html');
		$this->assertEquals(file_get_contents($root.'test/data/tpl/A/tpl.html'), $view->render());
		
		$view = new View();
		$view->setTpl('test/data/tpl/A/tpl.html');
		$view->setTplPath('test/data/tpl/');
		$view->addTplKey('notExisting.html');
		$this->assertEquals(file_get_contents($root.'test/data/tpl/A/tpl.html'), $view->render());
	}
	
}


class MyView extends View {
	public function getTplFilename($tplPath,$tplKeys) {
		return parent::getTplFilename($tplPath, $tplKeys);
	}
}