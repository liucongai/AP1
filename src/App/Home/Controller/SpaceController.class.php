<?php
namespace Home\Controller;
use Think\Controller;
class SpaceController extends CommonController {

    public function __construct(){

        parent::__construct();

        // 用户信息
        $User = D('User');
        $Cole = D('Collectless');
        $Copl = D('Collectplan');

        $inf = $User->where('id='.$this->user_id )->deimg();

        // 我的课程数

        $lenum = $Cole->where('user_id='.$this->user_id)->getNum();
        $plnum = $Copl->where('user_id='.$this->user_id)->getNum();

        $this->assign('inf',$inf);
        $this->assign('lenum',$lenum);
        $this->assign('plnum',$plnum);


    }

    public function index()
    {

        $Att = D('Att');
        $Less = D('Lesson');
        $Fimg = D('Fenimg');
        $Co_less = D('Collectless');
        $Section = D('Zizhang');
        $Chapter = D('Zhang');
        $Video = D('Video');

        $uid = $this->user_id;
        // 分页 按钮
        $count = $Att->where('user_id='.$uid)->count();
        $Page       = new \Think\Page($count,8);
        $show       = $Page->show();
        $course_list = $Att->where('user_id='.$uid)->limit($Page->firstRow.','.$Page->listRows)->select();

        $data['user_id'] = $uid;

        // 填充课程信息
        foreach($course_list as $key => $val){

            $data['lesson_id'] = $val['lesson_id'];

            $course_list[$key]['name'] = $Less->where('id='.$val['lesson_id'])->getField('lesson');


            $course_list[$key]['fimg'] = $Fimg->where('lesson_id='.$val['lesson_id'])->getField('name');

            $zz_id = $Co_less->where($data)->getField('zz_id');

            // 课程进度
            // 进度条
            //计算总小节数
            $sums = $Chapter->where('lesson_id='.$val['lesson_id'])->secnum();
            //计算已学小节数
            $prog = $Co_less->where($data)->getSum();

            $course_list[$key]['pro'] = ceil(($prog/$sums)*100);


            if($zz_id != null) {

                $course_list[$key]['progress'] = $Section->where('id=' . $zz_id)->getField('xi_name');

                $course_list[$key]['video'] = $Video->where('zz_id=' . $zz_id)->getField('id');

            }else{
                //  伪初始化记忆章节

                $z_detail = $Chapter->where('lesson_id='.$val['lesson_id'])->getField('id');

                $course_list[$key]['progress'] = $Section->where('zh_id='.$z_detail)->getField('xi_name');

                $zz_id = $Section->where('zh_id='.$z_detail)->getField('zz_id');

                $course_list[$key]['video'] = $Video->where('zz_id=' . $zz_id)->getField('id');
            }
        }

        $this->assign('list',$course_list);
        $this->assign('page',$show);

        $this->display();



    }

    public function learned(){


        $Att = D('Att');
        $Less = D('Lesson');
        $Fimg = D('Fenimg');
        $Co_less = D('Collectless');

        $Zhang_c = D('Zhang');
        $Xiao_c = D('Zizhang');


        $uid = $this->user_id;


        // 分页 按钮
        $count = $Co_less->where('user_id='.$uid)->count();
        $Page       = new \Think\Page($count,8);
        $show       = $Page->show();
        $list = $Co_less->where('user_id='.$uid)->order('time')->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach ($list as $key => $val) {
            // 处理封面图 处理难度
            $nan = array('初级', '中级', '高级');

            $detail = $Less->where('id=' . $val['lesson_id'])->select();

            $list[$key]['name'] = $detail['name'];

            $list[$key]['fimg'] = $Fimg->where('lesson_id=' . $val['lesson_id'])->getField('name');

            $list[$key]['desc'] = $detail['lesson_desc'];

            if ($detail['nandu'] != null) {
                $list[$key]['nandu'] = $nan[$detail['nandu']];
            } else {
                $list[$key]['nandu'] = '初级';
            }


            // 课程学习人数
            $per_num = $Co_less->where('lesson_id=' . $val['lesson_id'])->getNum();

            $list[$key]['per_num'] = $per_num;


            // 处理更新进度
            $chapter = $Zhang_c->where('lesson_id=' . $val['lesson_id'])->getNum();
            $section = $Xiao_c->where('zh_id=' . $chapter['id'])->getNum();

            $list[$key]['progress'] = '更新至' . $chapter . '-' . $section;


            // 课程进度
            // 进度条
            //计算总小节数
            $data['user_id'] = $uid;
            $data['lesson_id'] = $val['lesson_id'];

            $sums = $Zhang_c->where('lesson_id='.$val['lesson_id'])->secnum();
            //计算已学小节数
            $prog = $Co_less->where($data)->getSum();

            $list[$key]['pro'] = ceil(($prog/$sums)*100);

        }




        // 按日期分割重组
        foreach($list as $key => $val){
            $test3[] = date("Y-m-d",$val['time']);
        }

        $result = array_count_values($test3);

        for($i=0;$i < count(array_values($result));$i++){
            $test4[] = array(array_values($result)[$i],array_keys($result)[$i]);
        }

        foreach($test4 as $key => $val ){
            $test5[] = array_slice($list,0,$val[0]);
            array_splice($list,0,$val[0]);
        }

        $test5 = array_reverse($test5);

        foreach($test5 as $key => $val){

            $time = $test5[$key][0]['time'];
            $year = date("Y",$time) ;
            $mouth = date("m",$time);
            $day = date("d",$time);

            $test5[$key][0]['time'] = '<b>'.$year.'年</b><br><em>'.$mouth.'月'.$day.'日</em>';

        }




        $this->assign('list',$test5);
        $this->assign('page',$show);

        $this->display();
    }

    public function myplan(){

        $Copl = D('Collectplan');

        $data['user_id'] = $this->user_id;
        $data['type'] = $_GET['type'];

        // 分页 按钮
        $count = $Copl->where($data)->count();
        $Page  = new \Think\Page($count,8);
        $show  = $Page->show();

        $info = $Copl->where($data)->limit($Page->firstRow.','.$Page->listRows)->deal();

        $this->assign('info',$info);
        $this->assign('page',$show);

        $this->display();
    }


    public function cont(){


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
        $fenimg->add($img_data);

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

        $this->redirect('Space/mycou');
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


    public function mycou(){



        $Cate_c = D('Category');    //实例化分类
        $Less_c = D('Lesson');
        $Fimg = D('Fenimg');
        $Co_less = D('Collectless');
        $Xiao_c = D('Zizhang');
        $Zhang_c = D('Zhang');

        $les['user_id'] = $this->user_id;

        $count = $Less_c->where($les)->count();
        $Page       = new \Think\Page($count,6);
        $show       = $Page->show();
        $lesson = $Less_c->where($les)->limit($Page->firstRow.','.$Page->listRows)->select();


        foreach ($lesson as $key => $val) {

            $map_im['lesson_id'] = $val['id'];

            $lesson[$key]['fimg'] = $Fimg->where($map_im)->getField('name');


            // 课程学习人数
            $per_num = $Co_less->where('lesson_id=' . $val['id'])->getNum();

            $lesson[$key]['per_num'] = $per_num;

            // 处理更新进度
            $chapnum = $Zhang_c->where('lesson_id=' . $val['id'])->getNum();

            $chapter = $Zhang_c->where('lesson_id=' . $val['id'])->progress();


            $lesson[$key]['progress'] = '更新至' . $chapnum . '-' . $chapter;




        }
        $this->assign('lesson', $lesson);
        $this->assign('page', $show);
        $this->assign('num', $count);

        $this->display();
    }


    public function ajaxNamex(){

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
        $this->redirect('Space/mycou');
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
        $this->redirect('Space/mycou');
    }



}