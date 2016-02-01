<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
	public function index(){
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
			//if($info&&$info1){
			if($info){
                //记录session  跳转
                  
                $info_intro=$user->where($map)->select();

                 $_SESSION['home'] = $info_intro['0'];
                 $touimg= D('Touimg');
                 $map2['user_id']=$_SESSION['home']['id'];
                 $map2['is_face']='1'; 
                 $img=$touimg->where($map2)->field('name')->select();
                // dump($img);
                 $_SESSION['home']['img'] = $img['0']['name'];

				if($_COOKIE['co_learn'] != null){

					$this->redirect('View/learn',array('lesson_id'=>$_COOKIE['co_learn']));

				}


				$this->redirect('Index/index');
			}

		}else{
			$this->redirect('Index/index');
		}

	}

	public function logout(){
		unset($_SESSION['home']);
		$this->redirect('Index/index');
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
