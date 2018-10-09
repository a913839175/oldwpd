<?php
// 空模块
class EmptyAction extends CommonAction{
	public function _initialize(){
        parent::_initialize();//引用公共类common的构造函数
    }
    public function index(){
        $this->_empty();
    }
    public function _empty(){
        header('HTTP/1.1 404 Not Found');  
        $this->display('Public:404');
    }
}