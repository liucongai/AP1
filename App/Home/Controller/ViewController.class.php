<?php
namespace Home\Controller;
use Think\Controller;
class ViewController extends CommonController {
    public function index()
    {

        $Cate_c = D('Category');
        $Less_c = D('Lesson');
        $Zhang_c = D('Zhang');
        $Section = D('Zizhang');
        $Le_coll = D('Collectless');
        $Att = D('Att');
        $Timg = D('Touimg');
        $User = D('User');

        // 判断是否跳页至继续学习
        if($this->user_id != null){

            $col_data['user_id'] = $this->user_id;
            $col_data['lesson_id'] = $_GET['view'];
            $Mess2 = $Le_coll->where($col_data)->find();

        }
        if($Mess2 != null){
            $this->redirect('View/learn', array('lesson_id' => $_GET['view']));
        }


        // 讲师信息
        $lesson = $Less_c->where('id='.$_GET['view'])->getField();


        // 顶端快捷路径
        $lesson = $Less_c->where('id='.$_GET['view'])->field('id,cate_id,lesson,nandu,lesson_desc')->deal();

        $category = $Cate_c->where('id='.$lesson[0]['cate_id'])->field('id,name,pid')->select();

        $fangx = $Cate_c->where('id='.$category[0]['pid'])->field('id,name')->select();



        $this->assign('cate',$category[0]);
        $this->assign('fangx',$fangx[0]);
        $this->assign('lesson',$lesson[0]);


        // 章节开始
        $z_detail = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->field('id,zh_name,zh_desc')->select();
        $this->assign('z_detail',$z_detail);


        $sums = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->secnum();


        // 学习人数

        $per_num = $Le_coll->where('lesson_id='.$_GET['view'])->getNum();


        // 关注
        $url = __ROOT__."/Public/img/info_s.png";
        if($this->user_id != null){
            $data['user_id'] = $this->user_id;
            $data['lesson_id'] = $_GET['view'];
            $Mess = $Att->where($data)->find();


            if($Mess == null){
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " >关注</span>';
            }else{
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -157px;width:30px;padding-left:25px;cursor:pointer " >已关注</span>';
            }

            $button = '开始学习';

        }else{

            $attr = '<ul style="width:55px;right:170px;" class="main_nav"><a href="#0" data-cmd="follow" class="follow-action r js-follow-action" style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " data-cid="9"> 关注</a></ul>';

            $button = '体验学习';
        }




        //评论 问答









        $this->assign('button',$button);

        $this->assign('attr',$attr);

        $this->assign('per_num',$per_num);

        $this->assign('sums',$sums);

        $this->display();
    }

    // 关注
    public function attention(){


        $Att = D('Att');
        $data['user_id'] = $this->user_id;
        $data['lesson_id'] = $_GET['id'];

        $Att->add($data);

    }

    // 取消关注
    public function reat(){

        $Att = D('Att');
        $data['user_id'] = $this->user_id;
        $data['lesson_id'] = $_GET['id'];

        $Att->where($data)->delete();


    }




    public function learn()
    {
        $Cate_c = D('Category');
        $Less_c = D('Lesson');
        $Zhang_c = D('Zhang');
        $Section = D('Zizhang');
        $Le_coll = D('Collectless');

        $Att = D('Att');



        // 顶端快捷路径
        $lesson = $Less_c->where('id='.$_GET['lesson_id'])->field('id,cate_id,lesson,nandu,lesson_desc')->deal();

        $category = $Cate_c->where('id='.$lesson[0]['cate_id'])->field('id,name,pid')->select();

        $fangx = $Cate_c->where('id='.$category[0]['pid'])->field('id,name')->select();


        // 处理难度
        $nan = array('初级','中级','高级');
        foreach ($lesson as $key => $val) {
        $lesson[$key]['nandu'] = $nan[$key];
    }


        $this->assign('cate',$category[0]);
        $this->assign('fangx',$fangx[0]);
        $this->assign('lesson',$lesson[0]);


        // 章节开始
        $z_detail = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->select();


        $this->assign('z_detail',$z_detail);


        // 学习人数
        $per_num = $Le_coll->where('lesson_id='.$_GET['view'])->getNum();


        // 更新课程表hot

        $hota['id'] =  $_GET['lesson_id'];
        $hota['hot'] = $per_num;
        $Less_c->save($hota);


        $this->assign('per_num',$per_num);




        // 关注
        $url = __ROOT__."/Public/img/info_s.png";
        if($this->user_id != null){
            $data['user_id'] = $this->user_id;
            $data['lesson_id'] = $_GET['lesson_id'];
            $Mess = $Att->where($data)->find();


            if($Mess == null){
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " >关注</span>';
            }else{
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -157px;width:30px;padding-left:25px;cursor:pointer " >已关注</span>';
            }

            $mask3 = 'block';
            $mask4 = 'none';
        }else{

            // 非登录下记忆课程ID
            cookie('learn',$_GET['lesson_id'],array('expire'=>3600,'prefix'=>'co_'));

            $attr = '<ul style="width:55px;right:170px;" class="main_nav"><a href="#0" data-cmd="follow" class="follow-action r js-follow-action" style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " data-cid="9"> 关注</a></ul>';

            $mask4 = 'block';
            $mask3 = 'none';
        }


        $this->assign('attr',$attr);

        $this->assign('mask3',$mask3);
        $this->assign('mask4',$mask4);



        // 继续学习下方小节记忆
        $user_id = $this->user_id;
        $m_data['user_id'] = $user_id;
        $m_data['lesson_id'] = $_GET['lesson_id'];
        $memory = $Le_coll->where($m_data)->getField('zz_id');


        // 进度条
        //计算总小节数
        $sums = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->secnum();
        //计算已学小节数
        $prog = $Le_coll->where($m_data)->getSum();

        $persent = ceil(($prog/$sums)*100);



        if($memory == null){

            // 课程 学习初始化第一节

            $m_data['zz_id'] = $Section->where('zh_id='.$z_detail[0]['id'])->getField('id');

            // 用户课程学习添加

            $m_data['time'] = time();

            $Le_coll->add($m_data);

            $memory = $m_data['zz_id'];

        }

        $info = $Section->where('id='.$memory)->field('id,xi_name,video_id')->select();



        

 


        $Cate_c = D('Category'); //实例化表




        $this->assign('memory',$info[0]);

        $this->assign('progress',$persent);

        $this->display();
    }




    public function learn2()
    {
        $Cate_c = D('Category');
        $Less_c = D('Lesson');
        $Zhang_c = D('Zhang');
        $Section = D('Zizhang');
        $Le_coll = D('Collectless');

        $Att = D('Att');



        // 顶端快捷路径
        $lesson = $Less_c->where('id='.$_GET['lesson_id'])->field('id,cate_id,lesson,nandu,lesson_desc')->deal();

        $category = $Cate_c->where('id='.$lesson[0]['cate_id'])->field('id,name,pid')->select();

        $fangx = $Cate_c->where('id='.$category[0]['pid'])->field('id,name')->select();


        // 处理难度
        $nan = array('初级','中级','高级');
        foreach ($lesson as $key => $val) {
        $lesson[$key]['nandu'] = $nan[$key];
    }


        $this->assign('cate',$category[0]);
        $this->assign('fangx',$fangx[0]);
        $this->assign('lesson',$lesson[0]);


        // 章节开始
        $z_detail = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->select();


        $this->assign('z_detail',$z_detail);


        // 学习人数
        $per_num = $Le_coll->where('lesson_id='.$_GET['view'])->getNum();


        // 更新课程表hot

        $hota['id'] =  $_GET['lesson_id'];
        $hota['hot'] = $per_num;
        $Less_c->save($hota);


        $this->assign('per_num',$per_num);




        // 关注
        $url = __ROOT__."/Public/img/info_s.png";
        if($this->user_id != null){
            $data['user_id'] = $this->user_id;
            $data['lesson_id'] = $_GET['lesson_id'];
            $Mess = $Att->where($data)->find();


            if($Mess == null){
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " >关注</span>';
            }else{
                $attr = '<span style=" background: url('.$url.') no-repeat 0 -157px;width:30px;padding-left:25px;cursor:pointer " >已关注</span>';
            }

            $mask3 = 'block';
            $mask4 = 'none';
        }else{

            // 非登录下记忆课程ID
            cookie('learn',$_GET['lesson_id'],array('expire'=>3600,'prefix'=>'co_'));

            $attr = '<ul style="width:55px;right:170px;" class="main_nav"><a href="#0" data-cmd="follow" class="follow-action r js-follow-action" style=" background: url('.$url.') no-repeat 0 -37px;width:30px;padding-left:25px;cursor:pointer " data-cid="9"> 关注</a></ul>';

            $mask4 = 'block';
            $mask3 = 'none';
        }


        $this->assign('attr',$attr);

        $this->assign('mask3',$mask3);
        $this->assign('mask4',$mask4);



        // 继续学习下方小节记忆
        $user_id = $this->user_id;
        $m_data['user_id'] = $user_id;
        $m_data['lesson_id'] = $_GET['lesson_id'];
        $memory = $Le_coll->where($m_data)->getField('zz_id');


        // 进度条
        //计算总小节数
        $sums = $Zhang_c->where('lesson_id='.$lesson[0]['id'])->secnum();
        //计算已学小节数
        $prog = $Le_coll->where($m_data)->getSum();

        $persent = ceil(($prog/$sums)*100);



        if($memory == null){

            // 课程 学习初始化第一节

            $m_data['zz_id'] = $Section->where('zh_id='.$z_detail[0]['id'])->getField('id');

            // 用户课程学习添加

            $m_data['time'] = time();

            $Le_coll->add($m_data);

            $memory = $m_data['zz_id'];

        }

        $info = $Section->where('id='.$memory)->field('id,xi_name,video_id')->select();



        
        //评论问答
        $map['zz_id']=I('get.lesson_id');
        $comment = D('Comment'); //实例化评论表
        $user = D('User'); //实例化用户表
        $timg = D('Touimg'); //实例化头像表
        $scapter=D('Zizhang'); //子章节表
        $total = $comment->where($map)->count();
        $page = new \Think\Page($total,8);
        $comlist=$comment->where($map)->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();  

        //用户姓名 头像 评论 时间 来源
        foreach ($comlist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $comlist[$key]['user_name']=$ulist['name'];   //姓名
                
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $comlist[$key]['user_pic']=$ilist['name'];    //头像

                $comlist[$key]['time']=date('Y-m-d',$value['time']);  //时间

                $ulist=$scapter->where('id='.$value['zz_id'])->find(); 
                $comlist[$key]['zname']=$ulist['xi_name'];
        }
        $pageButton = $page->show();
        //dump($comlist);
        $this->assign('comlist',$comlist);
        $this->assign('pageButton',$pageButton);
 


        $Cate_c = D('Category'); //实例化表
        $this->assign('memory',$info[0]);
        $this->assign('progress',$persent);
        $this->display();
    }

    public function dolearn2(){

        //dump(I('get.'));

        //ajax评论
        $comment = D('Comment'); //实例化评论表
        $data['user_id']=$_SESSION['home']['id'];           //用户id
        $data['comment']=I('get.comment');                  //评论内容
        $data['zz_id']=I('get.zz_id');                      //章节id     
        $data['time']=time();                               //时间
            if($comment->create($data)){
                $result=$comment->add();
                if($result){        
                    $insertId = $result;   
                    if($insertId>0){
                        $this->success('评论成功');
                    }
                }
            }
    }













    public function xi_ajaxName(){

        //echo 'heheda';
        $map['zh_id'] = $_GET['id'];
        $zhang = D('Zizhang');
        $info = $zhang->where($map)->order('id desc')->field('id,xi_name,video_id')->select();
        //  $this->success($info, 'Lesson/index',5);

        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

    }



    public function video()
    {

        $Video_c = D('Video');
        $Xiao_c = D('Zizhang');
        $Zhang_c = D('Zhang');
        $Less_c = D('Lesson');
        $Le_coll = D('Collectless');
        $User = D('User');

        // 章节开始

        $v_detail = $Video_c->where('zz_id='.$_GET['id'])->getField('name');

        // 头部路径

        $xi_de = $Xiao_c->where('id='.$_GET['id'])->field('xi_name,zh_id')->select();

        $le_id = $Zhang_c->where('id='.$xi_de[0]['zh_id'])->getField('lesson_id');
        $le_na = $Less_c->where('id='.$le_id)->getField('lesson');


        // 用户课程学习添加

        $col_data['user_id'] = $this->user_id;
        // $col_data['zz_id'] = $_GET['id'];
        // $col_data['lesson_id'] = $le_id;

        $tmp['user_id'] = $col_data['user_id'];
        $tmp['lesson_id'] = $le_id;

        $data4['zz_id'] = $_GET['id'];
        $data4['time'] = time();


        // 更新progress

        $lis = $Le_coll->where($tmp)->getField('progress');

        $arr = explode(',',$lis);

        if(in_array($_GET['id'],$arr) == null){

            $lis .= $_GET['id'].',';

        }

        $data4['progress'] = $lis;


        $Le_coll->where($tmp)->save($data4);
        // 更新结束


        // 同学头像

        $tist = $Le_coll->where('lesson_id='.$le_id)->getField('user_id',true);

        $usernum = count($tist);
        foreach($tist as $key => $val){

            $tist[$key] = $User->where('id='.$val)->deimg();

        }

        // 头像结束


        //评论 问答
        //评论问答
        $map['zz_id']=I('get.lesson_id');
        $comment = D('Comment'); //实例化评论表
        $user = D('User'); //实例化用户表
        $timg = D('Touimg'); //实例化头像表
        $scapter=D('Zizhang'); //子章节表
        $total = $comment->where($map)->count();
        $page = new \Think\Page($total,8);
        $comlist=$comment->where($map)->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();

        //用户姓名 头像 评论 时间 来源
        foreach ($comlist as $key => $value) {
            $ulist=$user->where('id='.$value['user_id'])->find();
            $comlist[$key]['user_name']=$ulist['name'];   //姓名

            $ilist=$timg->where('user_id='.$ulist['id'])->find();
            $comlist[$key]['user_pic']=$ilist['name'];    //头像

            $comlist[$key]['time']=date('Y-m-d',$value['time']);  //时间

            $ulist=$scapter->where('id='.$value['zz_id'])->find();
            $comlist[$key]['zname']=$ulist['xi_name'];
        }
        $pageButton = $page->show();
        //dump($comlist);
        $this->assign('comlist',$comlist);
        $this->assign('pageButton',$pageButton);



        $this->assign('video',$v_detail);
        $this->assign('usernum',$usernum);
        $this->assign('tist',$tist);
        $this->assign('le_na',$le_na);
        $this->assign('xi_na',$xi_de[0]['xi_name']);

        $this->display();
    }


    /*

    public function video()
    {

        $Video_c = D('Video');
        $Xiao_c = D('Zizhang');
        $Zhang_c = D('Zhang');
        $Less_c = D('Lesson');
        $Le_coll = D('Collectless');

        // 章节开始

        $v_detail = $Video_c->where('zz_id='.$_GET['id'])->getField('name');

        // 头部路径

        $xi_de = $Xiao_c->where('id='.$_GET['id'])->field('xi_name,zh_id')->select();

        $le_id = $Zhang_c->where('id='.$xi_de[0]['zh_id'])->getField('lesson_id');
        $le_na = $Less_c->where('id='.$le_id)->getField('lesson');



        // 用户课程学习添加

        $col_data['user_id'] = $this->user_id;
       // $col_data['zz_id'] = $_GET['id'];
       // $col_data['lesson_id'] = $le_id;

        $tmp['user_id'] = $col_data['user_id'];
        $tmp['lesson_id'] = $le_id;

        $data4['zz_id'] = $_GET['id'];
        $data4['time'] = time();


        // 更新progress

        $lis = $Le_coll->where($tmp)->getField('progress');

        $arr = explode(',',$lis);

        if(in_array($_GET['id'],$arr) == null){

            $lis .= $_GET['id'].',';

        }

        $data4['progress'] = $lis;


        $Le_coll->where($tmp)->save($data4);
        // 更新结束





        //评论 问答
        //评论问答
        $map['zz_id']=I('get.lesson_id');
        $comment = D('Comment'); //实例化评论表
        $user = D('User'); //实例化用户表
        $timg = D('Touimg'); //实例化头像表
        $scapter=D('Zizhang'); //子章节表
        $total = $comment->where($map)->count();
        $page = new \Think\Page($total,8);
        $comlist=$comment->where($map)->order('time desc')->limit($page->firstRow.','.$page->listRows)->select();  

        //用户姓名 头像 评论 时间 来源
        foreach ($comlist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $comlist[$key]['user_name']=$ulist['name'];   //姓名
                
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $comlist[$key]['user_pic']=$ilist['name'];    //头像

                $comlist[$key]['time']=date('Y-m-d',$value['time']);  //时间

                $ulist=$scapter->where('id='.$value['zz_id'])->find(); 
                $comlist[$key]['zname']=$ulist['xi_name'];
        }
        $pageButton = $page->show();
        //dump($comlist);
        $this->assign('comlist',$comlist);
        $this->assign('pageButton',$pageButton);




        $this->assign('video',$v_detail);
        $this->assign('le_na',$le_na);
        $this->assign('xi_na',$xi_de[0]['xi_name']);

        $this->display();
    }
    */


}