<?php
namespace Admin\Controller;

class IndexController extends CommonController {
    public function index(){
    	$this->display();
    }

    public function footer(){
    	echo '后台测试';
    }
}