<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController {
    public function index()
    {

        $Less = D('Lesson');
        $Fimg = D('Fenimg');
        $Seme = D('Seme');
        if(!empty($_GET['words'])) {
            $map['lesson'] = array('like',"%{$_GET['words']}%");

            // 搜索记忆

            $se_data['user_id'] = $this->user_id;
            $se_data['contain'] = strtolower($_GET['words']);

            $Se_sear = $Seme->where($se_data)->getField('id');

            if($Se_sear) {
                $Seme->where($se_data)->delete();
                $Seme->add($se_data);
            }else{
                $Seme->add($se_data);

            }
        }





        // 分页 按钮
        $count = $Less->where($map)->count();
        $Page       = new \Think\Page($count,8);
        $show       = $Page->show();
        $result = $Less->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

        foreach($result as $key => $val) {
            $str = $val['lesson'];

            $tmp = substr(stristr($str, $_GET['words']), 0, strlen($_GET['words']));

            $result[$key]['lesson'] = (str_ireplace($_GET['words'], '<span style="color:red">' . $tmp . '</span>', $str));

            $desc = $val['lesson_desc'];

            $tmp = substr(stristr($desc, $_GET['words']), 0, strlen($_GET['words']));

            $result[$key]['lesson_desc'] = (str_ireplace($_GET['words'], '<span style="color:red">' . $tmp . '</span>', $desc));

            $map_im['lesson_id'] = $val['id'];

            $result[$key]['fimg'] = $Fimg->where($map_im)->getField('name');
        }

        // 热门搜索
        $Se_hot = $Seme->getField('contain',true);
        $ts1 = array_count_values($Se_hot);
        arsort($ts1);
        $tag = array_keys($ts1);


        $this->assign('detail',$result);
        $this->assign('words',$_GET['words']);
        $this->assign('page', $show);
        $this->assign('tag', $tag);

        // 搜索结果条目数
        $this->assign('count', $count);
        $this->display();



    }

    public function se_ajaxName(){

        if($this->user_id != null) {
            $map['user_id'] = $this->user_id;
            $Seme = D('Seme');
            $info = $Seme->where($map)->order('id desc')->limit(4)->getField('contain', true);
        }

        if(empty($info)){
            $this->ajaxReturn(0);

        }else{
            $this->ajaxReturn($info);
        }

    }
}