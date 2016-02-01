<?php
namespace Admin\Controller;
//use Think\Controller;
class  SuggestController extends CommonController {
   public function index(){
        
        if(!empty($_GET['user_id'])) $map['user_id'] = $_GET['user_id'];
        $suggest=D('Suggest');
        $total=$suggest->where($map)->count();
        $page  = new \Think\Page($total,5);
        $suggest = $suggest->where($map)->order('cre_time desc')->limit($page->firstRow.','.$page->listRows)->getAll();

        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页'); 
    	//dump($catelist);
        //exit;
        $pageButton  = $page->show();
        $this->assign('suggest',$suggest);  
        $this->assign('pageButton',$pageButton);   
		    $this->display();
      }
  public function edit(){
        $id =$_GET['id'];
        $suggest =  M('Suggest');
        
        $suggest_list=$suggest->find($id);
        $this->assign('list',$suggest_list);
        $this->display();
      }
  public function doedit(){
        $suggest =  M('Suggest');
        $suggest->save($_POST);
        $this->redirect('index');
      } 
  public function del(){
        $id=$_GET['id'];
        $suggest=M('suggest');
        $suggest->delete($id);
        $this->redirect('index');     
        
      }     
   public function state(){
             $id = $_GET['id'];
            $state = $_GET['state'];
            if($state=='不显示') $state=1;
            if($state=='显示') $state=0;

            $data['id']=$id;
            $data['state']=$state;
            //dump($data);
            //exit;
           D('Suggest')->save($data);              
          $this->redirect('Suggest/index');
     } 
}