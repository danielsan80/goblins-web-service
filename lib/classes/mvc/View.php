<?php
class View implements iView, iAdvancedView {
	private $cache = 'cache/twig';
	private $tpl;
	private $data=array();
	
	private $tplPath;
	private $tplKeys = array();
	
	public function __construct() {}
	
	public function setData($data=array()) {
		if (!$this->isArray($data))
			throw new Exception('Argument is not an Array!');
		$this->data = $data;
	}
	
	public function setDataKey($key, $value){
		$this->data[$key] = $value;
	}
	
	public function setTpl($tpl) {
		$root = Config::getROOT();
		if (!file_exists($root.$tpl)) throw new Exception('File not found!');
		$this->tpl = $tpl;
	}
	
	public function render($data=null) {		
		if (!is_null($data)) $this->setData($data);
		
		$tpl = $this->selectTpl();
		$root = Config::getROOT();
		$loader = new Twig_Loader_Filesystem($root.'.');
		$twig = new Twig_Environment($loader, array('cache' => $root.'cache/twig', 'auto_reload' => true));		
		$tpl = $twig->loadTemplate($tpl);
		return $tpl->render($this->data);
	}
	
	public function setTplPath($path) {
		$root = Config::getROOT();
		if(!(file_exists($root.$path)&& is_dir($root.$path))) throw new Exception($path.' is not e valid tplPath');
		$this->tplPath = $path;
	}
	
	public function setTplKey($key) {
		$this->tplKeys = array($key);
	}
	public function addTplKey($key) {
		$this->tplKeys[] = $key;
	}

	private function isArray($array) {
		return is_array($array) || ($array instanceof ArrayAccess && $array instanceof Iterator );
	}
		
	protected function getTplFilename($tplPath,$tplKey) {
		$root = Config::getROOT();
		$queue = array('');
		$context = explode('/',$tplKey);
		$key = array_pop($context);
		$context = implode('/',$context);
		
		while (!is_null($path = array_shift($queue))) {
			if ($this->matchContext($path, $context)) {
				if (file_exists($root.$tplPath.$path.$key))
					return $tplPath.$path.$key; 
			}
			
			if (!$dir = opendir($root.$tplPath.$path))
				throw new Exception('Path '.$path.' opening failed');
				
			while($filename = readdir($dir)) {
				if ( Config::isCommentedFile($filename) ) continue;
				if (is_dir($root.$tplPath.$path.$filename)) {
					
					$queue[] = $path.$filename.'/';
				}
			}
		}	
	}
	
	private function selectTpl(){
		$tpl = null;
		if ($this->tplKeys) {
			$tplKeys = $this->tplKeys;
			$tplKeys = array_reverse($tplKeys);
			foreach($tplKeys as $tplKey) { 
				if ($tpl = $this->getTplFilename($this->tplPath,$tplKey)) break;
			}
		}
		if (!$tpl) $tpl = $this->tpl;
		return $tpl;
	}
	
	private function matchContext($path, $context){
		$ppath = $path;
		$ccontext = $context;
		if (!$context) return true;
		
		$context = explode('/',$context);		
		$path = explode('/',$path);
		$i=0;
		$ok=true;
		foreach($context as $c){
			for ($j=$i; $j<count($path);$j++){
				if ($c==$path[$j]){
					$i = $j+1;
					continue 2;
				}
			}
			$ok=false;
			break;
		}
		return $ok;
	}
}