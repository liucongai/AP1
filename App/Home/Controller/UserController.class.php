<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends CommonController {

   public function index(){

       $lesson = D('Lesson');
       $les['user_id'] = $this->user_id;
       $lefo = $lesson->where($les)->field('id,lesson,cate_id')->select();

       if(!empty($lefo)){
           $this->assign('lesson',$lefo);
       }else{
           $lefo = "<a href='{:U('Lesson/index')}'>添加课程</a>";
           $this->assign('no_lesson',$lefo);
       }
       $this->display();
   }
    public function ajaxName(){

        //echo 'heheda';
        $map['lesson_id'] = $_GET['id'];
        $zhang = D('Zhang');
        $info = $zhang->where($map)->order('id desc')->field('id,zh_name')->select();
        //  $this->success($info, 'Lesson/index',5);
        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

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