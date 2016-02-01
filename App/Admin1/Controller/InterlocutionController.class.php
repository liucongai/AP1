<?php
namespace Admin\Controller;
use Think\Controller;
class InterlocutionController extends Controller {
	
	public function index(){
		$question=D('Ques');		//实例化问题表
		$user=D('User');		//实例化用户表
		
		//dump(I('get.'));
		/*姓名判断*/
		if(I('get.user')){
			
			$name=I('get.user');
			$map['name']=array('exp',"like '%$name%' ");
			$ulist=$user->where($map)->select();
			$name='';
			
			foreach ($ulist as $key => $value) {
				$name[$key]=$value['id'];
				
			}
			$where = join(" or 'user_id' = ", $name);
			$map['user_id'] = $where;
			unset($map['name']);
		}
		/*标题判断*/
		if(I('get.title')){
			$title=I('get.title');
			$map['ques']=array('exp',"like '%$title%' ");
		}




		$total = $question->where($map)->count();
    	$page = new \Think\Page($total,8);
		$qlist=$question->where($map)->limit($page->firstRow.','.$page->listRows)->getQues();
		
		$pageButton = $page->show();
		

        //dump($qlist);
		$this->assign('list',$qlist);
		$this->assign('pageButton',$pageButton);
		$this->display();
	}
	

	/**删除帖子*****/
	public function del(){
		$question=D('Ques');		//实例化问题表
		
		$answer=D('Answer');        //实例化回答表
		$anreply=D('Answ_reply');          //实例化回复表
		
		$qlist=$question->where('id='.I('get.id'))->find();
		//找到所有回复 删回复
		$anslist=$answer->where('ques_id='.$qlist[id])->select();
		
		foreach ($anslist as $key => $value) {
			//删回复
			//$replist=$anreply->where('answ_id='.$value[id])->select();
			$repdel=$anreply->where('answ_id='.$value[id])->delete();
			//dump($replist);
		}
		//删回答
		$ansdel=$answer->where('ques_id='.$qlist[id])->delete();
		//删帖子
		$qdel=$question->where('id='.I('get.id'))->delete();
		if($qdel){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}

	}




}
?>
