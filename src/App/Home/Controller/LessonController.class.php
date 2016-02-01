<?php
namespace Home\Controller;
use Admin\Controller\CommonController;
use Think\Controller;
class LessonController extends CommonController {

    public function index(){
        $cate = D('Category');
        $lesson = D('Lesson');

        $les['user_id'] = $this->user_id;

        $map['pid'] = 0;

        $info = $cate->where($map)->field('id,name')->select();

        $lefo = $lesson->where($les)->field('id,lesson')->select();

        if(!empty($lefo)){
            $this->assign('lesson',$lefo);
        }else{
            $lefo = "<button>添加课程</button>";
            $this->assign('lesson',$lefo);
        }
        $this->assign('fangx',$info);

        $this->display();
    }
    public function lessadd(){

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
        $fimg_id =$fenimg->add($img_data);
// 更新课程表封面ID
        $lesson-> where('id='.$lesson_id)->setField('fimg_id',$fimg_id);
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

        $this->redirect('User/index');
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
}