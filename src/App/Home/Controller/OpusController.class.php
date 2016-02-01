<?php
namespace Home\Controller;
use Think\Controller;
class OpusController extends Controller {

    //作品主页
    public function index(){
        $opus=D('Opus');	          //实例化作品表 
        $category=D('category');      //实例化分类
       
        $tid=I('get.cid');
        $tagit=$category->field('id,name')->where('id='.$tid)->find();
        $this->assign('tagit',$tagit);
        //dump($tagit);
        if($tid){
        $map['cate_id']  = array('exp'," like '%,$tid' or `cate_id` like '$tid,%' or `cate_id` like '%,$tid,%' or `cate_id` = '$tid' ");
        }
        $a='time desc';
        $total = $opus->where($map)->count();
        $page = new \Think\Page($total,8);
        $oplist=$opus->where($map)->order($a)->limit($page->firstRow.','.$page->listRows)->getAllopus();
        //$oplist=$opus->where($map)->limit($page->firstRow.','.$page->listRows)->select();
        //标签
        $clist=$category->field('id,name')->where('pid != 0')->select();
        $this->assign('clist',$clist);

        $pageButton = $page->show();
        //dump($oplist);
        $this->assign('list',$oplist);
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

    //上传作品
    public function create(){
    	$category=D('category');      //实例化分类
        $clist=$category->field('id,name')->where('pid != 0')->select();
        //dump($clist);
        $this->assign('yzm',$yzm);
        $this->assign('tlist',$clist);
    	$this->display();
    }

    //上传作品
    public function docreate(){
       // dump(I('post.'));
       // dump(I('get.'));
       // dump($_FILES);
        
        
        /***上传源码****/
        $upload = new \Think\Upload();// 实例化上传类
        //$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath    =      '/opus/'; // 设置附件上传目录
        
        if(IS_POST){            
            $info   =   $upload->upload();    
            if(!$info){                      // 上传错误提示错误信息        
              $this->error($upload->getError());    
            }else{                                // 上传成功        
                //$this->success('上传成功！'); 
            
                foreach($info as $file){        
                    $filename = $file['savepath'].$file['savename'];   
                }
               // dump($filename);
                /**添加地址 用户  时间**/
                $_POST['opus']=$filename;
                $_POST['user_id']=$_SESSION['home']['id'];
                $_POST['time']=time();
                $_POST['cate_id']=$_POST['alltag'];
                unset($_POST['cate']);

                /***上传的活动内容*****/
                //dump(I('post.'));  
        
                $opus=D('Opus');            //实例化作品表 
                if($opus->create()){
                    $result=$opus->add();
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
    }




    /**处理关注类**/
    public function docare(){
        $care=D('Care');                  //实例化关注表
        //得到参数
        $data['user_id']=$_SESSION['home']['id'];                                     //用户id
        $data['opus_id']=I('get.opus_id');                      //作品id

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


    /*处理详情页*/
    public function dodetail(){
        //dump(I('post.'));
        $answer=D('Answer');              //实例化回答表
        $opus=D('Opus');              //实例化作品表 
        
        if(I('post.content')){
            $data['opus_id']=I('post.opus_id');
            $data['answ']=I('post.content');
            $data['user_id']=$_SESSION['home']['id'];
            //$data['user_id']=1;
            $data['time']=time();

            if($answer->create($data)){
                $result=$answer->add();
                $opus->where('id='.I('post.opus_id'))->setInc('ans_count');
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('发言成功');
                    }
                }
            }  
        } 

    }


    /*详情页*/
    public function detail(){
        $opus=D('Opus');      //实例化作品类
        $answer=D('Answer');                //实例化回答表
        $care=D('Care');                    //实例化关注表

        //获得参数
        $oid=I('get.oid');                  //作品id
        $bw=I('get.bw');                    //热度
        $opus->where('id='.$oid)->setInc('ans_bw'); // 浏览数自加1
        //处理关注
        $data['user_id']=$_SESSION['home']['id'];                 //用户id
        $data['opus_id']=$oid;              //文章id
        $tlist=$care->where($data)->select();
        if($tlist){$tlist=1;}else{$tlist=0;} 
        $this->assign('tlist',$tlist);


        //作品内容
        $oplist=$opus->where('id='.$oid)->getperopus();
        
        //用户评论
        $anslist=$answer->where('opus_id='.$oid)->getAllopus();
        
        
        
        //dump($_SESSION);
        //dump($oplist);
        //dump($anslist);
        $this->assign('anslist',$anslist);
        $this->assign('list',$oplist);
        $this->display();
    }

}
