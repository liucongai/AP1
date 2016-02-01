<?php
namespace Admin\Controller;
//use Think\Controller;
class LessonController extends CommonController {

    /*
    public function detail(){
        $lesson = D('Lesson');
        $lefo = $lesson->where('id='.$_GET['id'])->select();

        $this->assign('lesson',$lefo);
        $this->display();
    }
    */

    public function index(){


     if(!empty($_GET['name'])) $map['lesson'] = array('like',"%{$_GET['name']}%");
        //if(strlen($_GET['sex'] ) > 0) $map['sex'] = $_GET['sex'];
        $lesson = D('Lesson');
        $total=$lesson->where($map)->count();
        $page  = new \Think\Page($total,5);
        $lesson_list = $lesson->where($map)->limit($page->firstRow.','.$page->listRows)->getAll();
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');

        $pageButton  = $page->show();
        $this->assign('list',$lesson_list);
        $this->assign('pageButton',$pageButton);


        // 计划开始
        $Plan = D('Plan');

        $pl_list = $Plan->where('pid=0')->select();

        $this->assign('pl_list',$pl_list);

        // 分享开始

        $Share = D('Share');

        $sh_list = $Share->select();

        $this->assign('sh_list',$sh_list);

        $this->display();

        }

    public  function add(){
        $cate = D('Category');
        $map['pid'] = 0;
        $info = $cate->where($map)->field('id,name')->select();
        $this->assign('fangx',$info);

        $this->display();

    }

    // 计划
    public function pl_ajaxName(){

        $Plan = D('Plan');
        $info = $Plan->where('pid='.$_GET['id'])->field('id,name')->select();
        //  $this->success($info, 'Lesson/index',5);
        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

    }

    public function pl2_ajaxName(){

        $Plan = D('Plan');
        $info = $Plan->where('pid='.$_GET['id'])->field('id,name')->select();
        //  $this->success($info, 'Lesson/index',5);
        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

    }

    // 拼接计划表List字段
    public function addplan(){

        $Plan = D('Plan');

        $lis = $Plan->where('id='.$_POST['pp_id'])->getField('list');

        $lis .= $_GET['id'].',';

        $data['id'] = $_POST['pp_id'];
        $data['list'] = $lis;

        $Plan->save($data);

        $this->redirect('index');
    }

    // 计划结束



    // 加入分享
    public function addshare(){

        $Lesson = D('Lesson');


        $data['id'] = $_GET['id'];
        $data['share_id'] = $_POST['share'];


        $Lesson->save($data);

        dump($data);
        //$this->redirect('index');
        $this->display('add');
    }

    // 分享结束




    public  function doadd(){


        //写入课程表
        $lesson = D('Lesson');
        $info = $lesson->create();
        if($info){
            // 获取课程ID
            $lesson_id =  $lesson->add();
            dump($info);
        }else{
            $this->error($lesson->getError());
        }
// 封面图片上传，获取图片路径名
        $upload = new \Think\Upload();
        $upload->maxSize   =     3145728 ;
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        $upload->savePath  =      './Public/Uploads/';
        $info   =   $upload->uploadOne($_FILES['fimg']);
        $path = $info['savepath'].$info['savename'];
        if(!$info) {

            $this->error($upload->getError());
        }else{
            echo $path;
        }
// 写入封面图片表，获取封面ID
        $fenimg = D('Fenimg');
        $img_data['name'] = $path;
        $img_data['lesson_id'] = $lesson_id;
        $fimg_id = $fenimg->add($img_data);

// 更新课程表封面ID
       // $lesson-> where('id='.$lesson_id)->setField('fimg_id',$fimg_id);
//写入章节表
        $zhang = D('Zhang');
        $info = $zhang->create();
        if($info){
            // 获取章节ID
            $zh_id =  $zhang->add();
            dump($info);
        }else{
            $this->error($zhang->getError());
        }
// 更新章节表课程ID
        $zhang-> where('id='.$zh_id)->setField('lesson_id',$lesson_id);

// 写入小节表
        $xiaojie = D('Zizhang');
        $xi_data['xi_name'] = $_POST['xi_name'];
        $xi_data['zh_id'] = $zh_id;
        $xi_data['add_time'] = time();
        $xi_id =$xiaojie->add($xi_data);

// 上传视频
        unset($_FILES['fimg']);

        $setting=C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload($_FILES);
        $a = $info['video']['url'];
        $b = "yanqingju.qiniudn.com";
        //dump($a);
        $str = str_replace($b, "7xo3l8.com1.z0.glb.clouddn.com",$a);
// 写入视频表
        $video = D('Video');
        $vi_data['name'] = $str;
        $vi_data['zz_id'] = $xi_id;
        $vi_id =$video->add($vi_data);
// 更新小节表视频ID
        $xiaojie-> where('id='.$xi_id)->setField('video_id',$vi_id);


        $this->redirect('index');
    }

    public function ajaxName(){
        $map['pid'] = $_GET['id'];
        $cate = D('Category');
        $info = $cate->where($map)->field('id,name')->select();
        //  $this->success($info, 'Lesson/index',5);
        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }



   }

  
   public function is_new(){
             $id = $_GET['id'];
            $is_new = $_GET['is_new'];
            if($is_new=='×') $is_new=1;
            if($is_new=='√') $is_new=0;

            $data['id']=$id;
            $data['is_new']=$is_new;
            //dump($data);
            //exit;
           D('Lesson')->save($data);              
          $this->redirect('index');
     }

     public function is_hot(){
             $id = $_GET['id'];
            $is_hot = $_GET['is_hot'];
            if($is_hot=='×') $is_hot=1;
            if($is_hot=='√') $is_hot=0;

            $data['id']=$id;
            $data['is_hot']=$is_hot;
            //dump($data);
            //exit;
           D('Lesson')->save($data);              
          $this->redirect('index');
     }

     public function is_recom(){
             $id = $_GET['id'];
            $is_recom = $_GET['is_recom'];
            if($is_recom=='×') $is_recom=1;
            if($is_recom=='√') $is_recom=0;

            $data['id']=$id;
            $data['is_recom']=$is_recom;
            //dump($data);
            //exit;
           D('Lesson')->save($data);              
          $this->redirect('index');
     }

      public  function state(){
            $id = $_GET['id'];
            $state = $_GET['state'];
            //dump($nandu);
            //exit;

            if($state=='上架') $state = 1;
            if($state=='下架') $state = 0;
            //if($state=='睡觉') $state=0;

            $data['id']=$id;
            $data['state']=$state;
            //dump($data);
            //exit;
           D('Lesson')->save($data);              
          $this->redirect('index');
   }
   
   public function del(){
       /*
            $Lesson = D('Lesson');
            $Zhang = D('Zhang');
            $Zizha = D('Zizhang');

            $id = $_GET['id'];


            $lesson->delete($id);
       */
            $this->redirect('index');
        
        }
    
       public function edit(){
           $id =$_GET['id'];
           $lesson =  D('Lesson');

           // 输送分类下拉框
           $cate = D('Category');
           $map['pid'] = 0;
           $info = $cate->where($map)->field('id,name')->select();
           $this->assign('fangx',$info);



           // 输送分类默认值
           $cate_id = $lesson->where('id='.$_GET['id'])->getField('cate_id');
           $cat_id = $cate->where('id='.$cate_id)->getField('pid');

           // 输出子分类下拉框
           $infoo = $cate->where('pid='.$cat_id)->field('id,name')->select();
           $this->assign('category',$infoo);

           cookie('fx',$cat_id,array('expire'=>3600,'prefix'=>'ad_'));
           cookie('ca',$cate_id,array('expire'=>3600,'prefix'=>'ad_'));

            // 输出章节
           $zhang = D('Zhang');
           $info_z = $zhang->where('lesson_id='.$_GET['id'])->order('id')->field('id,zh_name')->select();


           $lesson_list=$lesson->find($id);

           $this->assign('list',$lesson_list);
           $this->assign('info_z',$info_z);

           $this->assign('lesson_id',$id);
           $this->display();
       }

    public function xi_ajaxName(){

        //echo 'heheda';
        $map['zh_id'] = $_GET['id'];
        $zhang = D('Zizhang');
        $info = $zhang->where($map)->order('id desc')->field('id,xi_name')->select();
        //  $this->success($info, 'Lesson/index',5);
        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

    }

    public function doedit(){
        $Lesson = D("Lesson");
        $data['id'] = $_POST['id'];
        $data['lesson'] = $_POST['name'];
        $data['lesson_desc'] = $_POST['desc'];
        $data['cate_id'] = $_POST['cate_id'];
        $Lesson->save($data);

        $this->redirect('index');
    }

    public function zhangadd(){
//写入章节表

        $zhang = D('Zhang');
        $info = $zhang->create();
        if($info){
            // 获取章节ID
            $zh_id =  $zhang->add();
            dump($info);
        }else{
            $this->error($zhang->getError());
        }
// 写入小节表
        $xiaojie = D('Zizhang');
        $xi_data['xi_name'] = $_POST['xi_name'];
        $xi_data['zh_id'] = $zh_id;
        $xi_data['add_time'] = time();
        $xi_id =$xiaojie->add($xi_data);

// 上传视频

        $setting=C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload($_FILES);
        $a = $info['video']['url'];
        $b = "yanqingju.qiniudn.com";

        $str = str_replace($b, "7xo3l8.com1.z0.glb.clouddn.com",$a);
// 写入视频表
        $video = D('Video');
        $vi_data['name'] = $str;
        $vi_data['zz_id'] = $xi_id;
        $vi_id =$video->add($vi_data);
// 更新小节表视频ID
        $xiaojie-> where('id='.$xi_id)->setField('video_id',$vi_id);
        $this->redirect('index');
    }

    public function xiaoadd(){
// 写入小节表
        $xiaojie = D('Zizhang');
        $xi_data['xi_name'] = $_POST['xi_name'];
        $xi_data['zh_id'] = $_POST['zh_id'];
        $xi_data['add_time'] = time();
        $xi_id =$xiaojie->add($xi_data);

// 上传视频

        $setting=C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload($_FILES);
        $a = $info['video']['url'];
        $b = "yanqingju.qiniudn.com";

        $str = str_replace($b, "7xo3l8.com1.z0.glb.clouddn.com",$a);
// 写入视频表
        $video = D('Video');
        $vi_data['name'] = $str;
        $vi_data['zz_id'] = $xi_id;
        $vi_id =$video->add($vi_data);
// 更新小节表视频ID
        $xiaojie-> where('id='.$xi_id)->setField('video_id',$vi_id);
        $this->redirect('index');
    }



}

?>