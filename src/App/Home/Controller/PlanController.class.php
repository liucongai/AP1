<?php
namespace Home\Controller;
use Think\Controller;
class PlanController extends CommonController {
    public function index()
    {

        cookie('nav',1,array('expire'=>3600,'prefix'=>'ho_'));
        $Plan = D('Plan');
        $Fimg = D('Fenimg');
        $Co_plan =   D('Collectplan');

        // 读取前四个
        $map['pid'] = 0;
        $map['id'] = array('lt',5);

        $planlist = $Plan->where($map)->deal();

        // 计划补充
        $map_a['pid'] = 0;
        $map_a['id'] = array('gt',5);

        $catelist = $Plan->where($map_a)->select();



        // 是时候展现真正的技术了！
        // 单击方向
        if ($_GET['px_id'] == null) {
            cookie('px',0,array('expire'=>3600,'prefix'=>'pl_'));
            $classlist = $catelist;

            $str_t = '';
            foreach ($classlist as $val) {
                $str_t .= $val['id'] . ',';
            }
            $str_t = substr($str_t, 0, strlen($str_t) - 1);


            $map_c['pid'] = array('in', $str_t);

        } else {
            $map_c['pid'] = $_GET['px_id'];

            foreach($catelist as $key => $val){
                $newlist[] = $val['id'];
            }

            $nober = array_search($_GET['px_id'],$newlist);

            cookie('px',$nober+1,array('expire'=>3600,'prefix'=>'pl_'));
        }


        // 监测排序
        if (!empty($_GET['sort'])) {
            $rule = $_GET['sort'];
        } else {
            $rule = '';
        }


        // 分页 按钮
        $count = $Plan->where($map_c)->count();
        $Page       = new \Think\Page($count,8);
        $show       = $Page->show();
        $planlist_a = $Plan->where($map_c)->order($rule)->limit($Page->firstRow.','.$Page->listRows)->deal();




        $this->assign('planlist',$planlist);
        $this->assign('planlist_a',$planlist_a);
        $this->assign('catelist',$catelist);
        $this->assign('page',$show);

        $this->display();
    }

    public function plandetail(){
        $Plan = D('Plan');

        $program = $Plan->where('id='.$_GET['id'])->deali();
        $detail = $Plan->where('pid='.$_GET['id'])->select();

        foreach($detail as $key => $val){

            $detail_x = $Plan->where('pid='.$val['id'])->getAll();
            $detail[$key]['path'] = $detail_x;
         }

        $this->assign('program',$program);
        $this->assign('detail',$detail);

        // 计划状态
        $Co_plan =   D('Collectplan');

        if($this->user_id != null){
            $data['user_id'] = $this->user_id;
            $data['plan_id'] = $_GET['id'];
            $Mess = $Co_plan->where($data)->find();
        }else{
            $Mess = null;
        }

        if($Mess == null){
            $mask1 = 'none';
            $mask2 = 'block';
        }else{
            $mask1 = 'block';
            $mask2 = 'none';
        }
        $this->assign('mask1',$mask1);
        $this->assign('mask2',$mask2);



        $this->display();
    }


    public function plandetail2(){
        $Plan = D('Plan');

        $program = $Plan->where('id='.$_GET['id'])->deali();
        $detail = $Plan->where('pid='.$_GET['id'])->select();

        $this->assign('program',$program);
        $this->assign('detail',$detail);


        // 计划状态
        $Co_plan =   D('Collectplan');

        if($this->user_id != null){
            $data['user_id'] = $this->user_id;
            $data['plan_id'] = $_GET['id'];
            $Mess = $Co_plan->where($data)->find();
        }else{
            $Mess = null;
        }

        if($Mess == null){
            $mask1 = 'none';
            $mask2 = 'block';
        }else{
            $mask1 = 'block';
            $mask2 = 'none';
        }
        $this->assign('mask1',$mask1);
        $this->assign('mask2',$mask2);



        $this->display();
    }

    public function pl_ajaxName(){

        $Less = D('Lesson');
        $Fimg = D('Fenimg');
        $Plan = D('Plan');

        $list = $Plan->where('id='.$_GET['id'])->getField('list');
        $list = substr($list, 0, strlen($list) - 1);

        $map['id'] = array('in', $list);

        $info = $Less->where($map)->select();
        //  $this->success($info, 'Lesson/index',5);

        $nan = array('初级','中级','高级');
        foreach ($info as $key => $val) {
            $map_im['lesson_id'] = $val['id'];

            $info[$key]['fimg'] = $Fimg->where($map_im)->getField('name');

            $info[$key]['nandu'] = $nan[$key];
        }

        if(empty($info)){
            $this->ajaxReturn(0);
        }else{
            $this->ajaxReturn($info);
        }

    }


    // 参加计划
    public function join_plan(){

        $Co_plan =   D('Collectplan');
        $Plan = D('Plan');

        $data['user_id'] = $this->user_id;
        $data['plan_id'] = $_GET['id'];

        $pid = $Plan->where('id='.$_GET['id'])->getField('pid');
        if($pid == 0) {
            $data['type'] = 2;
        }else{
            $data['type'] = 0;
        }


        $Co_plan->add($data);

    }


    // 取消计划
    public function re_join(){

        $Co_plan =   D('Collectplan');


        $data['user_id'] = $this->user_id;
        $data['plan_id'] = $_GET['id'];



        $Co_plan->where($data)->delete();


    }
}