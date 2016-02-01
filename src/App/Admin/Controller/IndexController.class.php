<?php
namespace Admin\Controller;

class IndexController extends CommonController {
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


}