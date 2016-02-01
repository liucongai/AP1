<?php
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
	public function login(){
		if(IS_POST){
			//验证验证码
			/*
			$yzm = $_POST['yzm'];
			$Verify = new \Think\Verify();
			$result = $Verify->check($yzm);
			if(!$result) $this->error('验证码错误');
			*/
			$user = D('User');

			$map['name'] = $_POST['name'];
		    //$map['pwd'] = md5($_POST['pwd']);

			$info = $user->where($map)->find();

			if(empty($info)) $this->error('用户名不存在');
			/*
			$map['password'] = md5($_POST['password']);
			$info1 = $user->where($map)->find();

			if(empty($info1)) $this->error('密码错误');
			*/
			$baseinfo = array(
				'id' => $info['id'],
				'name' => $info['name']
			);

			if($info){
				//记录session  跳转
				$_SESSION['home'] = $baseinfo;

				$this->redirect('Index/index');
			}
		}
            else{
		     	$this->display();
		    }
	      }

	public function logout(){
		unset($_SESSION['home']);
		$this->redirect('Login/login');
	}

	public function yzm(){
		$config = array(
			'fontSize'    =>    20,    // 验证码字体大小    
			'length'      =>    4,     // 验证码位数    
			'useNoise'    =>    false, // 关闭验证码杂点
		    'imageW'      =>    200,
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}
}
