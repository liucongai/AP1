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
        $actlist=$activity->field('id,title,user_id,cate_id,dis,bgtime,edtime,time')->where($map)->limit($page->firstRow.','.$page->listRows)->getAct();

        $pageButton = $page->show();

       // dump($actlist);
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
    
    /***删除活动****/
    public function del(){
        $activity=D('Activity');                  //实例化问题表
        $answer=D('Answer');                    //实例化回答表
        $anreply=D('Answ_reply');               //实例化回复表
        
        //$data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['act_id']=I('get.id');                        //文章id
        
        //找到所有回复 删回复
        $anslist=$answer->where($data)->select();
        
        foreach ($anslist as $key => $value) {
            //删回复
            $repdel=$anreply->where('answ_id='.$value[id])->delete();
        }
        //删回答
        $ansdel=$answer->where('act_id='.$aid)->delete();
        //删帖子
        $qdel=$activity->where('id='.I('get.id'))->delete();
        if($qdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        
    
    }


    /***添加活动****/
    public function doadd(){
    //	dump(I('post.'));   	
    //	dump($_FILES);
    
    	/***上传活动封面和其中的图片等****/
    		
		$upload = new \Think\Upload();// 实例化上传类
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath  =      '/activity/'; // 设置附件上传目录
		
        if(IS_POST){ 			
		  $info   =   $upload->upload();    
		  if(!$info) {						// 上传错误提示错误信息        
		      $this->error($upload->getError());    
		  }else{								// 上传成功        
		  
			foreach($info as $file){        
				$filename = $file['savepath'].$file['savename'];   
			}
            //dump($filename );
            
            /**添加地址 用户  时间**/
            $_POST['name']=$filename;
            $_POST['user_id']=$_SESSION['home']['id'];//$_SESSION['id'];
            
            $_POST['time']=time();
            $_POST['cate_id']=$_POST['alltag'];
            unset($_POST['alltag']);
            $bg=$_POST['bgtime'];
            $ed=$_POST['edtime'];
            /**处理开始时间 结束时间转化为时间戳**/
            $bg = changetime($bg);
            $ed = changetime($ed);
            $_POST['bgtime']=$bg;
            $_POST['edtime']=$ed;



            /***上传的活动内容*****/
            //dump(I('post.'));  
            
            $activity = D('Activity');// 实例化活动类
            if($activity->create()){
                $result=$activity->add();
                
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('发表成功','index');
                    }
                }
            }   
	    }
    }       
           
    }

  
}
