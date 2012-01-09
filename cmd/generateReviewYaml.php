<?php
	require_once '../inc/initialization.inc.php';
	
	require_once Config::getRoot().'data/model/review/src/lang-combo_boxes.php';
	
	$out = array();
	$vars = array('generi', 'ambientazioni', 'meccaniche', 'tipi', 'gradidifficolta', 'collezionabilita', 'espandibilita');
	foreach($vars as $var){
		$array = $$var;
		foreach($array['italian'] as $key => $value ){
			$out[$var][$key]['it'] = $value;
		}
		foreach($array['english'] as $key => $value ){
			$out[$var][$key]['en'] = $value;
		}
	}
	
//	header('Content-Type: text/plain; charset="UTF-8"');
		
	$dumper = new sfYamlDumper();
	$yaml = $dumper->dump($out,3);
	//echo $yaml; 
	file_put_contents(Config::getRoot().'data/model/review/values.yaml', htmlentities($yaml));
	
	$parser = new sfYamlParser();
	print_r($parser->parse(file_get_contents(Config::getRoot().'data/model/review/values.yml')));

	//print_r($parser->parse(file_get_contents_utf8(ROOT.'data/model/review/data.yaml')));
	
	
//	function file_get_contents_utf8($fn) {
//		$content = file_get_contents($fn);
//		return mb_convert_encoding($content, 'UTF-8',
//			mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)
//		);
//	} 
	
