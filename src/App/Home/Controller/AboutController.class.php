<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends Controller {
     public function  us(){
       $this->display();
     }
   
     public function group(){
       $this->display();
     }

     public function job(){
       $this->display();
     }

     public function teacher(){
       $this->display();
     } 

     public function contact(){
       $this->display();
     }

     /***********************************意见反馈start********************************/
    
     public function suggest1(){
        $id=$_SESSION['home']['id'];
        if(IS_POST){
       	  //建议表内容
          $suggest=$_POST['suggest'];
          $cont_info=$_POST['cont_info'];
          $user_id=$id;
          $cre_time=time();
          //把建议内容插入到ju_suggest表中
          $model=M();
          $model->execute("insert into ju_suggest(`suggest`,`cont_info`,`user_id`,`cre_time`) values('$suggest','$cont_info','$user_id','$cre_time')");
          }
          //意见反馈的遍历
          $suggest=D('suggest');
          $map['user_id']=$id;
          $map['state']=1;
          $total=$suggest->where($map)->count();
          $page  = new \Think\Page($total,5);
          $list=$suggest->where($map)->order('cre_time desc')->limit($page->firstRow.','.$page->listRows)->field('suggest,cre_time,reply')->select();
          $page->setConfig('prev','上一页');
          $page->setConfig('next','下一页');
          $page->setConfig('first','首页');
          $page->setConfig('last','尾页');
           
          $pageButton  = $page->show();
          
          //dump($list);
          $this->assign('list',$list);
          $this->assign('pageButton',$pageButton);
          $this->display();
     }

     public function suggest2(){
        $id=$_SESSION['home']['id'];
        if(IS_POST){
          //建议表内容
          $suggest=$_POST['suggest'];
          $cont_info=$_POST['cont_info'];
          $user_id=$id;
          $cre_time=time();
          //把建议内容插入到ju_suggest表中
          $model=M();
          $model->execute("insert into ju_suggest(`suggest`,`cont_info`,`user_id`,`cre_time`) values('$suggest','$cont_info','$user_id','$cre_time')");
          }
          //意见反馈的遍历
          $suggest=D('suggest');
          $map['user_id']=$id;
          $map['state']=1;
          $total=$suggest->where('user_id!='.$id)->count();
          $page  = new \Think\Page($total,5);
          $list=$suggest->where('user_id!='.$id)->order('cre_time desc')->limit($page->firstRow.','.$page->listRows)->field('suggest,cre_time,reply')->select();
          $pageButton  = $page->show(); 
          $this->assign('list',$list);
          $this->assign('pageButton',$pageButton);
          
          $this->display();
     }

     public function suggest(){
        if(IS_POST){
          //建议表内容
          $suggest=$_POST['suggest'];
          $cont_info=$_POST['cont_info'];
          //$user_id=$id;
          $cre_time=time();
          //把建议内容插入到ju_suggest表中
          $model=M();
          $model->execute("insert into ju_suggest(`suggest`,`cont_info`,`user_id`,`cre_time`) values('$suggest','$cont_info','0','$cre_time')");
          }
          //意见反馈的遍历
          $suggest=D('suggest');
          $map['state']=1;
          $total=$suggest->where($map)->count();
          $page  = new \Think\Page($total,5);
          $list=$suggest->where($map)->order('cre_time desc')->limit($page->firstRow.','.$page->listRows)->field('suggest,cre_time,reply')->select();
          $pageButton  = $page->show();  
          $this->assign('list',$list);
          $this->assign('pageButton',$pageButton);
          
          $this->display();
     } 
     /************************************意见反馈end*********************************/
     /**************************************友情链接**********************************/
     public function friendly(){
       $this->display();
     }

     /*************************************申请讲师***********************************/
     public function lecturer(){
     	//头像的插入
     	$id=$_SESSION['home']['id'];/*看lowb写的登陆决定*/
     	$map['user_id']= $id;
        $map['is_face']='1';
        $img=D('Touimg');
        $img=$img->where($map)->field('name')->select();
       
        $map1['id']=$id;        
        $user=D('User');
        $username=$user->where($map1)->field('nick')->select(); 
        $username=$username['0'];
        $img=$img['0'];
        $this->assign('img',$img);
        $this->assign('username',$username);
        
        if(IS_POST){
          $user_intro=$_POST['user_intro'];
          $rel_name=$_POST['rel_name'];
          $cont_intro=$_POST['cont_intro'];
          $video=$_POST['video'];
          $user_id=$id; 
          //把审核内容插入到ju_lecturer表中
          $model=M();
          $model->execute("insert into ju_lecturer(`user_intro`,`rel_name`,`cont_intro`,`video`,`user_id`) values('$user_intro','$rel_name','$cont_intro','$video','$user_id')");
          }
          
          $this->display();
     }
   /**********************************************************************************/
 }
