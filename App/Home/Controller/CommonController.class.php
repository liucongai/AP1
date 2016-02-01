<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public $user_id;
	// 以后做验证
    public function _initialize(){
        //如果用户没有登录，就跳转到登录页面

        $this->user_id = $_SESSION['home']['id'];

    }

}