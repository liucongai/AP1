<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends Controller {
    /*活动主页*/
    public function index(){
        $activity=D("Activity");   //实例化活动类
        $user=D('User');        //实例化用户表

        
        /*标题判断*/
        if(I('get.title')){
            $title=I('get.title');
            $map['title']=array('exp',"like '%$title%' ");
        }


        $total = $activity->where($map)->count();
        $page = new \Think\Page($total,8);
        //$actlist=$activity->field('id,title,user_id,cate_id,dis,bgtime,edtime')->select();
        //$actlist=$activity->select();
        $actlist=$activity->field('id,title,user_id,cate_id,dis,bgtime,edtime')->where($map)->limit($page->firstRow.','.$page->listRows)->getAct();

        $pageButton = $page->show();

        dump($actlist);
        $this->assign('list',$actlist);
        $this->assign('pageButton',$pageButton);
        $this->display();

        
        
    }

    public function add(){

        $category=D('category');      //实例化分类
        $clist=$category->field('id,name')->where('pid != 0')->select();

        //$content =  htmlspecialchars(stripslashes($_POST['content']));  
        //dump($_SESSION);
        $this->assign('yzm',$yzm);
        $this->assign('tlist',$clist);
        $this->assign('list',$content);
        $this->display();   
    }

    /***添加活动****/
    public function doadd(){
    	//dump(I('post.'));   	
    	//dump($_FILES);
    	
    	/***上传活动封面和其中的图片等****/
    		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =      '/'; // 设置附件上传目录
		
        if(IS_POST){ 			
		  $info   =   $upload->upload();    
		  if(!$info) {						// 上传错误提示错误信息        
		      $this->error($upload->getError());    
		  }else{								// 上传成功        
			//$this->success('上传成功！'); 
            
			foreach($info as $file){        
				$filename = $file['savepath'].$file['savename'];   
			}
            /**添加地址 用户  时间**/
            $_POST['name']=$filename;
            $_POST['user_id']='1';//$_SESSION['id'];
            $_POST['time']=time();
            $_POST['cate_id']=$_POST['alltag'];
            unset($_POST['alltag']);

            /***上传的活动内容*****/
            dump(I('post.'));  
            
            $activity = D('Activity');// 实例化活动类
            if($activity->create()){
                $result=$activity->add();
                //$result=$activity->getAdd();
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->redirect('Activity/add');
                    }
                }
            }   
	    }
    }       
            //$this->display();	
    }

    public function dowrt(){

        dump(I('post.'));
        dump($_FILES);
    }

}