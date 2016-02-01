<?php
namespace Home\Controller;
use Think\Controller;
class ActivityController extends Controller {
    public function index(){
    	$activity = D('Activity');	//实例化活动
        /**文章活动主体**/
        //dump(I('get.'));
        $now=time();
        if(I('get.overst')==-1){ 
            $map['edtime']=array('lt',$now);
            $pd=1;
        }else{
            $map['edtime']=array('gt',$now);
            $pd=0;
        }
        $this->assign('pd',$pd); 
        $total = $activity->where($map)->count();
        $page = new \Think\Page($total,8);
    	//$actlist = $activity->getAll(); 
        $actlist = $activity->where($map)->limit($page->firstRow.','.$page->listRows)->getAll(); 

        
        //dump($actlist);
        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);
    	$this->assign('list',$actlist); 
    	$this->display();
    }


    /*详情页处理*/
    public function dodetail(){
        $answer=D('Answer');              //实例化回答表
        $question=D('Ques');              //实例化问题表
        $activity=D('Activity');          //实例化活动表
        if(I('post.content')){
            $data['act_id']=I('post.qid');
            $data['answ']=I('post.content');
            $data['user_id']=$_SESSION['home']['id'];
            //$data['user_id']=1;
            $data['time']=time();

            if($answer->create($data)){
                $result=$answer->add();
                $activity->where('id='.I('post.qid'))->setInc('act_count');
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('发言成功');
                    }
                }
            }  
        } 

    }
   
    /**处理关注类**/
    public function docare(){
        $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=1;                                 //用户id
        $data['activity_id']=I('get.act_id');               //活动id
        
        $cid=I('get.care_id');                              //关注？
        
        if($cid==1){
            $data['time']=time();                               //时间
            if($care->create($data)){
                $result=$care->add();
            }
        }else{
            $care->where($data)->delete();
        }  

    }

    /**帖子详情页**/
    public function detail(){
        $question=D('Ques');              //实例化问题表
        $answer=D('Answer');              //实例化回答表
        $activity=D('Activity');          //实例化活动表
        $care=D('Care');                  //实例化关注表
        
        //得到所有参数    
        $bw=I('get.bw');    //热度
        $aid=I('get.aid'); //活动id
        $data['user_id']=$_SESSION['home']['id'];                     //用户id
        $data['activity_id']=$aid;              //活动id
        
        //关注从数据库判断
        $tlist=$care->where($data)->select(); 
        if($tlist){$tlist=1;}else{$tlist=0;} 


        $qid=I('get.ques');
        $bw=I('get.bw');    //热度
        $id=I('get.id');    //问题id
        $aid=I('get.aid'); //活动id
        
        $activity->where('id='.$aid)->setInc('act_bw'); // 浏览数自加1
        $qlist=$activity->where('id='.$aid)->getAll2();
        $a='time desc';   
        $map['act_id']=$aid;

        $total = $answer->where($map)->count();
        $page = new \Think\Page($total,8);
        $alist=$answer->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllanswer();
    
        //dump($aid);
        //dump($qlist);
        //dump($alist);
       

        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);
        $this->assign('tlist',$tlist);
        $this->assign('alist',$alist);
        $this->assign('qlist',$qlist);
        $this->display();
    }


















    
}
