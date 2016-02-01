<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    //文章主页
    public function index(){
        $article=D('Article');          //实例化文章表 
        $question=D('Ques');            //实例化文章表 

        if(I('get.pid') == null){
            cookie('pid',0,array('expire'=>10,'prefix'=>'art_'));
        }else{
            cookie('pid',I('get.pid'),array('expire'=>10,'prefix'=>'art_'));
        }
        if(I('get.qid') == null){
            cookie('qid',0,array('expire'=>10,'prefix'=>'art_'));
        }else{
            cookie('qid',I('get.qid'),array('expire'=>10,'prefix'=>'art_'));
        }
        $pid=I('get.pid');
        $qid=I('get.qid');
        $this->assign('pid',$pid);  
        $this->assign('qid',$qid);  

       
        $a='time desc';
        switch (I('get.qid')) { 
            case '1':
                $a ='ans_count desc,time desc';
                break;
        }
        if(I('get.pid')!=0){
            $map['cate_id']=I('get.pid');
        }

        $total = $question->where($map)->count();
        $page = new \Think\Page($total,8);
        //$artlist=$article->getallart();
        $artlist=$article->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getallart();

        
        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);
        //dump($artlist);
        $this->assign('list',$artlist);
    	$this->display();
    }
    

    /****上传写文章*******/
    public function wrt(){

        $this->display();
    }

    
    public function dowrt(){
    	//dump(I('post.'));
        //dump($_FILES);
    
        /***上传活动封面和其中的图片等****/
            
        $upload = new \Think\Upload();// 实例化上传类
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      '/article/'; // 设置附件上传目录
        
        if(IS_POST){            
            $info   =   $upload->upload();    
            if(!$info){                      // 上传错误提示错误信息        
              $this->error($upload->getError());    
            }else{                                // 上传成功        
                //$this->success('上传成功！'); 
            
                foreach($info as $file){        
                    $filename = $file['savepath'].$file['savename'];   
                }
                /**添加地址 用户  时间**/
                $_POST['name']=$filename;
                $_POST['user_id']=$_SESSION['home']['id'];//$_SESSION['id'];
                $_POST['time']=time();
                $_POST['cate_id']=$_POST['cate'];
                unset($_POST['cate']);

                /***上传的活动内容*****/
                //dump(I('post.'));  
            
                $article=D('Article');            //实例化文章表 
                if($article->create()){
                    $result=$article->add();
                    //$result=$activity->getAdd();
                    if($result){        
                        $insertId = $result;   
                        if($insertId>0){
                            $this->success('上传成功!','index');
                        }
                    }
                }   
            }
        }    

        //$this->display();
    }

    //文章详情处理页
    public function dodetail(){
        $answer=D('Answer');            //实例化回答表
        $article=D('Article');              //实例化文章表  

       // dump(I('post.'));
        $data['art_id']=I('post.art_id');
        $data['answ']=I('post.content');
        $data['user_id']=$_SESSION['home']['id'];
        //$data['user_id']=1;
        $data['time']=time();

        if($answer->create($data)){
            $result=$answer->add();
            $article->where('id='.I('post.art_id'))->setInc('ans_count');
            if($result){        
                $insertId = $result;   
                if($insertId>0){
                    $this->success('评论成功');
                }
            }
        }     
    }

    /**处理关注类**/
    public function docare(){
        $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];                                     //用户id
        $data['article_id']=I('get.art_id');                    //问题id
        
        $cid=I('get.care_id');                                  //关注？
        
        if($cid==1){
            $data['time']=time();                               //时间
            if($care->create($data)){
                $result=$care->add();
            }
        }else{
            $care->where($data)->delete();
        }  

    }

    //文章详情表
    public function detail(){
        $article=D('Article');              //实例化文章表 
        $answer=D('Answer');                //实例化回答表
        $care=D('Care');                    //实例化关注表
        //获得参数
        $id=I('get.id');                    //文章id
        $bw=I('get.bw');                    //热度
        $article->where('id='.$id)->setInc('ans_bw'); // 浏览数自加1
        //处理关注
        $data['user_id']=$_SESSION['home']['id'];                 //用户id
        $data['article_id']=$id;            //文章id
        $tlist=$care->where($data)->select();
        if($tlist){$tlist=1;}else{$tlist=0;} 
        $this->assign('tlist',$tlist);
        
        //帖子内容
        $artlist=$article->where('id='.$id)->getperart(); //文章内容
          
        //分页再说
        $alist=$answer->field('user_id,answ,time')->where('art_id='.$id)->getAllart();  //文章回答

        
        //dump($artlist);
        //dump($alist);
        $this->assign('artlist',$artlist);
        $this->assign('alist',$alist);
        $this->display();
    }
}
