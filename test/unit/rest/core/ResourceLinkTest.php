<?php
require_once(dirname(__FILE__).'/../../../inc/initialization.inc.php');

class ResourceLinkTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {}
	protected function tearDown(){}
	
	public function test_simpleLink() {
		$uri = '/';
		$link = new ResourceLink($uri);
		$this->assertEquals(
			array( 'uri' => $uri ), $link->get()
		);
	}	

	public function test_specify_a_not_existing_key() {
		$uri = '/reviews/?filter={filter}';
		$link = new ResourceLink($uri);
		try {
			$tmp = $link->setKeyType('fitter', 'string');
			$ok = true;
		} catch (Exception $e) {
			$this->assertEquals('{fitter} doesn\'t exists in uri',$e->getMessage());
			$ok = false;
		}
		if ($ok) $this->fail();
	}	

	public function test_values_is_an_array() {
		$uri = '/reviews/?filter={filter}';
		$link = new ResourceLink($uri);
		try {
			$tmp = $link->setKeyValues('filter', 'letter');
			$ok = true;
		} catch (Exception $e) {
			$this->assertEquals('keyValues must be an array',$e->getMessage());
			$ok = false;
		}
		if ($ok) $this->fail();
	}	

	public function test_templateLink() {
		$uri = '/reviews/?filter={filter}';
		$link = new ResourceLink($uri);
		$link->setKeyType('filter','string');
		$link->setKeyValues('filter',array('letter','keyword'));
		$this->assertEquals(array(
			'uri' => $uri,
			'keys' => array(
				'filter' => array(
					'type' => 'string',
					'values' => array('letter','keyword')					
				)
			)
		),$link->get());
	}	
}