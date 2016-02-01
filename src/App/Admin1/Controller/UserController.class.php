<?php
namespace Admin\Controller;
//use Think\Controller;
class UserController extends CommonController {
    public function index(){
           
            if(!empty($_GET['name'])) $map['name'] = array('like',"%{$_GET['name']}%");
            if(strlen($_GET['sex'] ) > 0) $map['sex'] = $_GET['sex'];
            $user = D('user');
            $total=$user->where($map)->count();
            $page  = new \Think\Page($total,8);
            $userlist = $user->where($map)->limit($page->firstRow.','.$page->listRows)->getAll();
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
            $page->setConfig('first','首页');
            $page->setConfig('last','尾页');
           
            $pageButton  = $page->show();
            $this->assign('list',$userlist);
            $this->assign('pageButton',$pageButton);
            $this->display();
        }

        public function add(){
        
            $this->display();
        }
        
        public function doadd(){
         	$user = D('User');

    	    //不能连贯操作
    	    $info = $user->create();

          //dump($info);
          //exit;
    	    if($info){
                $user->add();
                $this->redirect('User/index');
    		//dump($info);
    	    }else{

    		$this->error($user->getError());
        	}
        }

        public function del(){
            $user = M('user');
            $id = $_GET['id'];
            $user->delete($id);
            $this->redirect('index');
        
        }
    
       public function edit(){
           $id =$_GET['id'];
           $user =  M('user');
        
           $userlist=$user->find($id);
           $this->assign('list',$userlist);
           $this->display();
       }
       public function doedit(){
            $user =  M('user');
            $user->save($_POST);
        
             $this->redirect('index');
        }  
    
       
    // 用于ajax验证
    public function ajaxName(){
        $map['name'] = $_GET['name'];
        $user = D('User');
        $info = $user->where($map)->find();

        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn(1);
        }


    }

    public function ajaxEmail(){
        $map['email'] = $_GET['email'];
        $user = D('User');
        $info = $user->where($map)->find();

        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn(1);
        }


    }

    public function ajaxPhone(){
        $map['phone'] = $_GET['phone'];
        $user = D('User');
        $info = $user->where($map)->find();

        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn(1);
        }


    }

    }




