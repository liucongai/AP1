<?php
namespace Home\Controller;
use Think\Controller;
class RegController extends Controller {
          
    
    public function ajaxName(){
        $map['name'] = $_GET['name'];
        $user = D('User');
        $info = $user->where($map)->find();

        if(empty($info)){
            // '0';
            $this->ajaxReturn(0);
        }else{
            //echo '1';
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

     public function reg(){
         	$user = D('User');

    	    //不能连贯操作
    	    $info = $user->create();
    	    if($info){
                $id=$user->add();
                $info['id']=$id;
                $_SESSION['home'] = $info;
                $this->redirect('Reg/complete');
    	    }else{
                $this->error($user->getError());
            }

     }
       



    public function complete(){
          //dump($_SESSION);
          $id=$_SESSION['home']['id'];/*要看session那边怎么写的*/
          
          if(IS_POST){
            //现将此user所有的头像封面都变为0
            $model=M();
            $model->execute("update ju_touimg set `is_face`='0' where `user_id`='$id'");

            /*上传头像*/ 
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =     3145728 ;// 设置附件上传大小    
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型    
            $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录   

            $info   =   $upload->uploadOne($_FILES['name']);
            $path = $info['savepath'].$info['savename'];

            if(!$info) {
              // 上传错误提示错误信息        
              $this->error($upload->getError());    
            }  
            //插入上传的图片到头像表，并把它的封面设为1
            $model->execute("insert into ju_touimg(`name`,`is_face`,`user_id`) values('$path','1','$id')");         
            
             }
            //页面资料修改
            if(IS_GET){
                D('User')->save($_GET);
                }
            //页面资料显示    
            $user= D('User');    
            $map1['id']=$id; 
            $userlist = $user->where($map1)->select();
           
            $userlist=$userlist['0'];
            $_SESSION['home'] = $userlist;
            $this->assign('list',$userlist); 
                //$this->display();
            //页面头像显示
            $touimg= D('Touimg');
            $map2['user_id']=$id;
            $map2['is_face']='1'; 
            $img=$touimg->where($map2)->field('id,name')->select();  
            //dump($img);      	
            $img=$img['0'];
            $_SESSION['home']['img'] = $img['name'];
            $this->assign('img',$img);
            $this->display();  
        }    

}
