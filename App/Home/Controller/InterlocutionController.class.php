<?php
namespace Home\Controller;
use Think\Controller;
class InterlocutionController extends Controller {
    
    /*问答主页面*/
    public function index(){
    	$user=D('User');	          //实例化用户表 
    	$question=D('Ques');	      //实例化问题表
        $category=D('category');      //实例化分类
        $answer=D('Answer');          //实例化回答表

        
        if(I('get.id') == null){
            cookie('id',0,array('expire'=>10,'prefix'=>'wd_'));
        }else{
            cookie('id',I('get.id'),array('expire'=>10,'prefix'=>'wd_'));
        }
        if(I('get.cid') == null){
            cookie('cid',0,array('expire'=>10,'prefix'=>'wd_'));
        }else{
            cookie('cid',I('get.cid'),array('expire'=>10,'prefix'=>'wd_'));
        }   
        $id= I('get.id');
        $cid= I('get.cid');
        $this->assign('id',$id);   
        $this->assign('cid',$cid);   
       
        if(I('get.id')==1){
            $map['zz_id'] = 0;     
        }elseif(I('get.id')==2){
            $map['zz_id'] = array('neq',0 );
            //$map= 'zz_id != 0';        
        }

        $a='time desc';
        switch (I('get.cid')) { 
            case '1':
                $a ='ans_count desc,time desc';
                break;
            case '2':
                $map['ans_count'] = 0;
                break;
        }
        //dump($map);
        $total = $question->where($map)->count();
        $page = new \Think\Page($total,8);
    	$qlist=$question->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAll();
        //$qlist=$question->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->select();



        $pageButton = $page->show();

        $clist=$category->field('id,name')->where('pid != 0')->select();
        

        $this->assign('tlist',$clist);
        $this->assign('list',$qlist);
        $this->assign('pageButton',$pageButton);
    	$this->display();
    }

     /**处理标签关注类**/
    public function dotagcare(){
        $care=D('Care');                  //实例化标签表
        $category=D('Category');                  //实例化标签表
        //关注人数+1 关注标签
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['cate_id']=I('get.cate_id');                  //标签id
        $cid=I('get.care_id');                              //关注？
        
        if($cid==1){
            $data['time']=time();                               //时间
            if($care->create($data)){
                $result=$care->add();
            }
            $category->where('id='.I('get.cate_id'))->setInc('care'); // 浏览数自加1
        }else{
            $care->where($data)->delete();
            $category->where('id='.I('get.cate_id'))->setDec('care'); // 浏览数自减1
        }  

    }


    /*分类问题页*/
    public function tag(){
        $user=D('User');                //实例化用户表 
        $question=D('Ques');            //实例化问题表
        $category=D('category');        //实例化分类
        $answer=D('Answer');            //实例化回答表
        $catdetail=D('catedetail');     //实例化分类详情表
        $care=D('Care');                //实例化关注类
        
        $data['user_id']=$_SESSION['home']['id'];                        //用户id
        $data['cate_id']=I('get.tid');                                    //问题id
        //关注    
       $tlist=$care->where($data)->select();
        if($tlist){$tlist=1;}else{$tlist=0;} 
        $this->assign('carelist',$tlist);
        


        if(I('get.tid') == null){
            cookie('tid',0,array('expire'=>10,'prefix'=>'wd_'));
        }else{
            cookie('tid',I('get.id'),array('expire'=>10,'prefix'=>'wd_'));
        }
        $tid=I('get.tid');
        $this->assign('tid',$tid); 
        
        
        //分类表
        $cdlist=$category->where('id='.$tid)->find();
       

        if(I('get.cid') == null){    
            cookie('cid',0,array('expire'=>10,'prefix'=>'tg_'));
        }else{    
            cookie('cid',I('get.cid'),array('expire'=>10,'prefix'=>'tg_'));
        }
        
        $map['cate_id']  = array('exp'," like '%,$tid' or `cate_id` like '$tid,%' or `cate_id` like '%,$tid,%' or `cate_id` = '$tid' ");

        $a='time desc';
        switch (I('get.cid')) { 
            case '1':
                $a ='ans_count desc,time desc';
                break;
            case '2':
                $map['ans_count'] = 0;
                break;
        }
        //dump($map);
        $total = $question->where($map)->count();
        $page = new \Think\Page($total,8);
        $qlist=$question->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAll();

        $pageButton = $page->show();

        $clist=$category->field('id,name')->where('pid != 0')->select();
        
        //dump($qlist);$cdlist
        $this->assign('id',$id);        
        $this->assign('cdlist',$cdlist);        
        $this->assign('tlist',$clist);
        $this->assign('list',$qlist);
        $this->assign('pageButton',$pageButton);
        $this->display();

    }

    /*验证码*/
    public function yzm(){
        
        $config = array(
            'imageW'      =>    130,  // 验证码字体宽
            'imageH'      =>    40,  // 验证码字体高
            'fontSize'    =>    18,    // 验证码字体大小    
            'length'      =>    4,     // 验证码位数位数    
            'useNoise'    =>    false, // 关闭验证码杂点
            'useCurve'    =>    false, // 关闭干扰线
        );
        
        $Verify = new \Think\Verify($config);
        $yzm = $Verify->entry();     
    }

    /*提出问题页*/
    public function question(){
        $category=D('category');      //实例化分类
        $clist=$category->field('id,name')->where('pid != 0')->select();

        //$content =  htmlspecialchars(stripslashes($_POST['content']));  
        //dump($_SESSION);
        $this->assign('yzm',$yzm);
        $this->assign('tlist',$clist);
        $this->display();

        
        
    }
    /*处理问题页*/
    public function doques(){
        if(I('post.')){
            
            // 检查验证码  
            $verify = I('post.yzm');  
            if(!check_verify($verify)){  
                $this->error("亲，验证码输错了哦！",$this->site_url,9);  
            }      

            //dump(I('post.'));
            $question=D('Ques');          //实例化问题表
            $data['title']=I('post.title');
            $data['cate_id']=I('post.alltag');
            $data['content']=I('post.content');
            //$data['user_id']=$_SESSION['id'];
            $data['user_id']=$_SESSION['home']['id'];
            $data['time']=time();

            if($question->create($data)){
                $result=$question->add();
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('发表成功','index');
                    }
                }
            }   
        }


    }

    
    /*详情页处理*/
    public function dodetail(){
        $answer=D('Answer');              //实例化回答表
        $question=D('Ques');              //实例化问题表
        $category=D('category');      //实例化分类
        
        if(I('post.content')){
            $data['ques_id']=I('post.qid');
            $data['answ']=I('post.content');
            //$data['user_id']=$_SESSION['id'];
            $data['user_id']=$_SESSION['home']['id'];
            $data['time']=time();

            if($answer->create($data)){
                $result=$answer->add();
                $question->where('id='.I('post.qid'))->setInc('ans_count'); 
                
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
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['ques_id']=I('get.ques_id');                  //问题id
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
        $category=D('category');      //实例化分类
        //得到的参数 
        $qid=I('get.ques');
        $bw=I('get.bw');    //热度
        $id=I('get.id');    //问题id
        
          
        $data['user_id']=$_SESSION['home']['id'];                //用户id
        $data['ques_id']=$id;                                    //问题id
        //关注   
        $tlist=$care->where($data)->select();
        if($tlist){$tlist=1;}else{$tlist=0;} 



        $question->where('id='.$id)->setInc('ans_bw'); // 浏览数自加1
        $qlist=$question->where('id='.$id)->getAll2();
        $a='time desc';   
        $map['ques_id']=$id;

        $total = $answer->where($map)->count();
        $page = new \Think\Page($total,8);
        $alist=$answer->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllanswer();
        //dump($aid);
        //dump($qlist);
        //dump($alist);
       $clist=$category->field('id,name')->where('pid != 0')->select();
        
        $this->assign('tlist',$clist);

        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);
        $this->assign('ttlist',$tlist);
        $this->assign('alist',$alist);
        $this->assign('qlist',$qlist);
        $this->display();
    }



    //处理详情回答类
    public function doreplyit(){
        //dump(I('post.'));
        $replyit=I('post.replyit');
        $checkreply=strtok($replyit,' ');
        if($checkreply=='回复'){
            $treply=explode(':',$replyit,2);
            $treply=$treply[1];
        }else{
            $treply=$replyit;  
        }
        
        $reply=D('Answ_reply');              //实例化回复表
        
        if(I('post.replyit')){
            $data['answ_id']=I('post.answ_id');

            $data['reply']=$treply;
            //$data['user_id']=$_SESSION['id'];
            $data['user_id']=$_SESSION['home']['id'];
            $data['time']=time();
            $data['before_id']=I('post.before_id');

            if($reply->create($data)){
                $result=$reply->add();
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('回答成功');
                    }
                }
            }  
        } 
    }
}
