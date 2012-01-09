<?php
	//require_once(dirname(__FILE__) . '/lib/Doctrine.compiled.php');	
	require_once(dirname(__FILE__) . '/lib/Doctrine.php');	
	spl_autoload_register(array('Doctrine', 'autoload'));
