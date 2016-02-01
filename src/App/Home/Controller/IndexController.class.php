<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    /*

    public function __construct(){

        parent::__construct();
    }
    */



    public function index()
    {
        // 清楚导航按钮
        cookie('nav',8,array('expire'=>3600,'prefix'=>'ho_'));


        $Less_c = D('Lesson');
        $Fimg = D('Fenimg');
        $Co_less = D('Collectless');
        $Xiao_c = D('Zizhang');
        $Zhang_c = D('Zhang');


        $list = $Less_c->select();


        // 随机几个课程
        $rand = array_rand($list,8);

        for($i=0;$i<count($rand);$i++){

            $newlist[] = $list[$rand[$i]];

        }


        // 处理

        foreach ($newlist as $key => $val) {

            $newlist[$key]['fimg'] = $Fimg->where('lesson_id=' . $val['id'])->getField('name');


            // 处理已学课程

            if ($this->user_id != null) {
                $data['user_id'] = $this->user_id;
                $data['lesson_id'] = $val['id'];
                $Mess = $Co_less->where($data)->find();

                if ($Mess != null) {
                    $newlist[$key]['lesson'] = '<i hidden>已学</i>' . $val['lesson'];
                }

            }

            // 课程学习人数
            $per_num = $Co_less->where('lesson_id=' . $val['id'])->getNum();

            $newlist[$key]['per_num'] = $per_num;


            // 处理更新进度
            $chapnum = $Zhang_c->where('lesson_id='.$val['id'])->getNum();

            $chapter = $Zhang_c->where('lesson_id='.$val['id'])->progress();

            $newlist[$key]['progress'] = '更新至'.$chapnum.'-'.$chapter;

        }


        $this->assign('list',$newlist);


        $this->display();



    }
}