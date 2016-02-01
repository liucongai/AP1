<?php
namespace Home\Controller;
use Think\Controller;
class MyclubController extends Controller {
   
   	//我的问题表
    public function index(){
    	$question=D('Ques');	      //实例化问题表

    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$a='time desc';					//按时间排序
    	//问答 回复 关注
    	$total = $question->where($map)->count();
        $page = new \Think\Page($total,8);
    	$qlist=$question->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAll();

    	$pageButton = $page->show();

        //dump($_SESSION);
        //标签啦
        $ppd=0;
        $this->assign('ppd',$ppd);

        //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);
    	//dump($qlist);
        $this->assign('list',$qlist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**删除帖子*****/
    public function delques(){
        $question=D('Ques');        //实例化问题表
        $answer=D('Answer');        //实例化回答表
        $anreply=D('Answ_reply');          //实例化回复表
        
        $qlist=$question->where('id='.I('get.id'))->find();
        //找到所有回复 删回复
        $anslist=$answer->where('ques_id='.$qlist[id])->select();
        
        foreach ($anslist as $key => $value) {
            //删回复
            //$replist=$anreply->where('answ_id='.$value[id])->select();
            $repdel=$anreply->where('answ_id='.$value[id])->delete();
            //dump($replist);
        }
        //删回答
        $ansdel=$answer->where('ques_id='.$qlist[id])->delete();
        //删帖子
        $qdel=$question->where('id='.I('get.id'))->delete();
        if($qdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //我的回答表
    public function myanswer(){
        $answer=D('Answer');          //实例化回答表

    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$map['ques_id']=array('neq','0');
    	$a='time desc';					//按时间排序
    	//问答 回复 关注
    	$total = $answer->where($map)->count();
        $page = new \Think\Page($total,8);
    	$anwlist=$answer->distinct(true)->field('ques_id,user_id')->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyques();

    	$pageButton = $page->show();

    	//dump($anwlist);

         //标签啦
        $ppd=1;
        $this->assign('ppd',$ppd);

         //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);

        //dump($anwlist);
        $this->assign('list',$anwlist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**删除回复*****/
    public function delans(){
        $question=D('Ques');                //实例化问题表
        $answer=D('Answer');                //实例化回答表
        $anreply=D('Answ_reply');          //实例化回复表
        
        //删回答
        $ansdel=$answer->where('id='.I('get.id'))->delete();
        if($ansdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }


    //我的问答关注表
    public function mywdcare(){
    	$care=D('Care');          //实例化关注表

    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
        $map['ques_id']=array('neq','0');
    	$a='time desc';					//按时间排序
    	$total = $care->where($map)->count();
        $page = new \Think\Page($total,8);

    	$calist=$care->field('ques_id')->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyquescare();

    	//dump($calist);

         //标签啦
        $ppd=2;
        $this->assign('ppd',$ppd);


         //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);

        //dump($calist);
    	$pageButton = $page->show();
    	$this->assign('list',$calist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**取消关注*****/
    public function delwdcare(){
         $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['ques_id']=I('get.id');                  //问题id
        $care->where($data)->delete();   
    }
  
   	//我的作品表
    public function myopus(){
        $opus=D('Opus');	          	//实例化作品表 
    	
    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$a='time desc';					//按时间排序
    	
    	$total = $opus->where($map)->count();
        $page = new \Think\Page($total,8);
    	$oplist=$opus->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyopus();

    	$pageButton = $page->show();

         //标签啦
        $ppd=0;
        $this->assign('ppd',$ppd);

          //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);

    	//dump($oplist);
        $this->assign('list',$oplist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**删除作品*****/
    public function delopus(){
        $opus=D('Opus');        //实例化作品表
        $answer=D('Answer');                    //实例化回答表
        $anreply=D('Answ_reply');               //实例化回复表
        $id=I('get.id');
        //删除上传文件 删除作品
        $oplist=$opus->field('opus')->where('id ='.$id)->find();
        $opp='./Uploads'.$artlist['opus'];
        /*删除图片*/
        //dump($img);
        @unlink($opp);
        
        $opdel=$opus->where('id ='.$id)->delete();
     
        $data['opus_id']=$id;                        //文章id
        
        //找到所有回复 删回复
        $anslist=$answer->where($data)->select();
        
        foreach ($anslist as $key => $value) {
            //删回复
            $repdel=$anreply->where('answ_id='.$value[id])->delete();
        }
        //删回答
        $ansdel=$answer->where('opus_id='.$id)->delete();
        //删帖子
        $opdel=$opus->where('id ='.$id)->delete();
        if($opdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        

    }

    //我的作品关注表
    public function myopuscare(){
    	$care=D('Care');          //实例化关注表

    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$map['opus_id']=array('neq','0');
    	$a='time desc';					//按时间排序
    	$total = $care->where($map)->count();
        $page = new \Think\Page($total,8);

    	$calist=$care->field('opus_id')->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyopuscare();


         //标签啦
        $ppd=1;
        $this->assign('ppd',$ppd);

         //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);
    	//dump($calist);
        //dump($ppd);
    	$pageButton = $page->show();
    	$this->assign('list',$calist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**取消关注*****/
    public function delopuscare(){
         $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['opus_id']=I('get.id');                  //作品id
        $care->where($data)->delete();   
    }



   	//我的文章表
    public function myarticle(){
        $article=D('Article');	          	//实例化文章表 
    	
    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$a='time desc';					//按时间排序
    	
    	$total = $article->where($map)->count();
        $page = new \Think\Page($total,8);
    	$artlist=$article->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyart();

    	$pageButton = $page->show();

         //标签啦
        $ppd=0;
        $this->assign('ppd',$ppd);

         //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);
    	//dump($artlist);
        $this->assign('list',$artlist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**删除文章*****/
    public function delart(){
        $article=D('Article');                  //实例化问题表
        $answer=D('Answer');                    //实例化回答表
        $anreply=D('Answ_reply');               //实例化回复表
        
        //$data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['art_id']=I('get.id');                        //文章id
        
        //找到所有回复 删回复
        $anslist=$answer->where($data)->select();
        
        foreach ($anslist as $key => $value) {
            //删回复
            $repdel=$anreply->where('answ_id='.$value[id])->delete();
        }
        //删回答
        $ansdel=$answer->where('art_id='.$aid)->delete();
        //删帖子
        $qdel=$article->where('id='.I('get.id'))->delete();
        if($qdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        
    }


    //我的文章关注表
    public function myarticlecare(){
    	$care=D('Care');          //实例化关注表

    	//获得参数
    	//$id=$_SESSION['id'];
    	$uid=$_SESSION['home']['id'];
    	$map['user_id']=$uid;
    	$map['article_id']=array('neq','0');
    	$a='time desc';					//按时间排序
    	$total = $care->where($map)->count();
        $page = new \Think\Page($total,8);

    	$calist=$care->field('article_id')->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllmyartcare();


        //标签啦
        $ppd=1;
        $this->assign('ppd',$ppd);

         //职业
        $ujob=$_SESSION['home']['job'];
        $myjob=myjob($ujob);
        $this->assign('myjob',$myjob);
    	//dump($calist);
    	$pageButton = $page->show();
    	$this->assign('list',$calist);
        $this->assign('pageButton',$pageButton);
        $this->display();
    }

    /**取消关注*****/
    public function delartcare(){
         $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['art_id']=I('get.id');                        //作品id
        $care->where($data)->delete();   
    }

}
