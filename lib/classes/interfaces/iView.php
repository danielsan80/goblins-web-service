<?php
interface iView {
	public function setData($data=array());
	public function setDataKey($key, $value);
	public function setTpl($tpl);
	public function render($data=null);
	
}