<?php
	require_once('../inc/initialization.inc.php');

	//exit();
	$options = array('generateTableClasses' => true);
	Doctrine_Core::generateModelsFromYaml(Config::getROOT().'data/schema/tokenTable.yml', Config::getROOT().'lib/classes/models/tmp', $options);
	Doctrine_Core::createTablesFromModels(Config::getROOT().'lib/classes/models/tmp');
	Doctrine_Core::loadData(Config::getROOT().'data/schema/tokenTableData.yml');
