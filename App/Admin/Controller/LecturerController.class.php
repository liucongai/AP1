<?php
namespace Admin\Controller;
class  LecturerController extends CommonController {
    public function index(){
          
        if(!empty($_GET['user_id'])) $map['user_id'] = $_GET['user_id'];
        $lecturer=D('Lecturer');
        $total=$lecturer->where($map)->count();
        $page  = new \Think\Page($total,5);
        $lecturer = $lecturer->where($map)->order('id desc')->limit($page->firstRow.','.$page->listRows)->getAll();

        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页'); 
    	//dump($lecturer);
        //exit;
        $pageButton  = $page->show();
        $this->assign('lecturer',$lecturer);  
        $this->assign('pageButton',$pageButton);   
		$this->display();
        
    }
    public function del(){
        $id=$_GET['id'];
        $lecturer=M('Lecturer');
        $lecturer->delete($id);
        $this->redirect('index');     
    }     
    /********************************慕课主管考核讲师**********************************/
    public function ceshi(){
    	
        $exam=$_GET['exam'];
        $user_id=$_GET['user_id'];
        $id=$_GET['id']; 
        if($exam=='未考核'){ 
            $date['exam']='1';
            $date['id']=$id;
            $lecturer=D('Lecturer');
            $lecturer->save($date);
            $model=M();
            $model->execute("update ju_user set `type`='3' where `id`= '$user_id' ");
        }
        
        if($exam=='考核失败'){ 
            $date['exam']='2';
            $date['id']=$id;
            $lecturer=D('Lecturer');
            $lecturer->save($date);
            $model=M();
            $model->execute("update ju_user set `type`='4' where `id`= '$user_id' ");
        }

        if($exam=='考核成功'){ 
            $date['exam']='0';
            $date['id']=$id;
            $lecturer=D('Lecturer');
            $lecturer->save($date);
            $model=M();
            $model->execute("update ju_user set `type`='3' where `id`= '$user_id' ");
        }
        $this->redirect('index');
    }


}