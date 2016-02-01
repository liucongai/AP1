<?php
namespace Home\Controller;
use Think\Controller;
class CourseController extends CommonController {
    public function index()
    {

        cookie('nav',0,array('expire'=>3600,'prefix'=>'ho_'));
        // #############
        $Cate_c = D('Category');    //实例化分类
        $Less_c = D('Lesson');
        $Fimg = D('Fenimg');
        $Co_less = D('Collectless');
        $Xiao_c = D('Zizhang');
        $Zhang_c = D('Zhang');


        $fangx = $Cate_c->where('pid=0')->limit('5')->select();

        // 单击方向
        if ($_GET['fx_id'] != null) {
            // dump(I('get.'));
            $fx_id = $_GET['fx_id'];

            cookie('fx',$_GET['fx_id'],array('expire'=>3600,'prefix'=>'co_'));

            // 向难度传值
            $this->assign('fx_id', $fx_id);

            $classlist = $Cate_c->where('pid=' . $fx_id)->select();

        } else {
            cookie('fx',0,array('expire'=>3600,'prefix'=>'co_'));
            $classlist = $Cate_c->where('pid!=0')->select();
        }

        // 仅单击方向,拼接where查询字符串
        if ($_GET['fx_id'] != null && empty($_GET['ca_id'])) {

            $str_t = '';
            foreach ($classlist as $val) {
                $str_t .= $val['id'] . ',';
            }
            $str_t = substr($str_t, 0, strlen($str_t) - 1);

            $map_c['cate_id'] = array('in', $str_t);

        }

        // 单击分类
        if ($_GET['ca_id'] != null) {

            $ca_id = $_GET['ca_id'];

            $this->assign('ca_id', $ca_id);

            // 找爹
            $Cate_tx = D('Category');
            $cap_tx['id'] = $_GET['ca_id'];

            $cap['pid'] = $Cate_tx->where($cap_tx)->getField('pid');

            // Cookie
            cookie('fx',$cap['pid'],array('expire'=>3600,'prefix'=>'co_'));

            $this->assign('fx_id', $cap['pid']);

            $classlist = $Cate_tx->where($cap)->field('id,name')->select();

            foreach($classlist as $key => $val){
                $newlist[] = $val['id'];
            }
            $nober = array_search($_GET['ca_id'],$newlist);

            cookie('cat',$nober+1,array('expire'=>3600,'prefix'=>'co_'));

            $map_c['cate_id'] = $_GET['ca_id'];
        }else{
            cookie('cat',0,array('expire'=>3600,'prefix'=>'co_'));
        }

        // 监测难度
        if ($_GET['nandu'] > 0) {

            $this->assign('nandu', $_GET['nandu']);

            $map_c['nandu'] = $_GET['nandu'];

            cookie('diff',$_GET['nandu'],array('expire'=>3600,'prefix'=>'co_'));
        }else{
            cookie('diff',0,array('expire'=>3600,'prefix'=>'co_'));
        }

        // 监测排序
        switch($_GET['sort']){

            case 2:
                $rule = 'hot desc';
                $this->assign('sort', 2);
                break;
            case 1:
                $rule = 'time desc';
                $this->assign('sort', 1);
                break;
            default:
                $rule = '';

        }

        // 分页 按钮
        $count = $Less_c->where($map_c)->count();
        $Page       = new \Think\Page($count,16);
        $show       = $Page->show();
        $lesson = $Less_c->where($map_c)->order($rule)->limit($Page->firstRow.','.$Page->listRows)->select();

        // 处理封面图 处理难度
        $nan = array('初级','中级','高级');
        foreach ($lesson as $key => $val) {

            $map_im['lesson_id'] = $val['id'];

            $lesson[$key]['fimg'] = $Fimg->where($map_im)->getField('name');

            // 难度为空初始化
            if($val['nandu'] != null){
                $lesson[$key]['nandu'] = $nan[$val['nandu']-1];
            }else{
                $lesson[$key]['nandu'] = '初级';
            }


            // 处理已学课程

            if($this->user_id != null) {
                $data['user_id'] = $this->user_id;
                $data['lesson_id'] = $val['id'];
                $Mess = $Co_less->where($data)->find();

                if($Mess != null){

                    $lesson[$key]['lesson'] = '<i class="learned">已学</i>'.$val['lesson'];



                }


            }

            // 课程学习人数
            $per_num = $Co_less->where('lesson_id='.$val['id'])->getNum();

            $lesson[$key]['per_num'] = $per_num;

            // 处理更新进度
            $chapnum = $Zhang_c->where('lesson_id='.$val['id'])->getNum();

            $chapter = $Zhang_c->where('lesson_id='.$val['id'])->progress();


            $lesson[$key]['progress'] = '更新至'.$chapnum.'-'.$chapter;


            if($_GET['hide'] == 1 && $Mess != null){

                unset($lesson[$key]);

            }

        }


        // 隐藏按钮
        if($_GET['hide'] != null){
            cookie('hide',1,array('expire'=>3600,'prefix'=>'co_'));
        }else{
            cookie('hide',0,array('expire'=>3600,'prefix'=>'co_'));
        }







        $this->assign('fangx', $fangx);
        $this->assign('cate', $classlist);
        $this->assign('lesson', $lesson);
        $this->assign('page', $show);
        $this->display();



    }
}