<?php
namespace Admin\Controller;
use Think\Controller;
class OpusController extends Controller {
	/*作品主页*/
	public function index(){
		$opus=D('Opus');		//实例化问题表
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




		$total = $opus->where($map)->count();
    	$page = new \Think\Page($total,8);
		$oplist=$opus->where($map)->limit($page->firstRow.','.$page->listRows)->getOpus();
		
		$pageButton = $page->show();
		

        //dump($oplist);
		$this->assign('list',$oplist);
		$this->assign('pageButton',$pageButton);
		$this->display();
	}
	

	/**删除作品*****/
	public function del(){
		$opus=D('Opus');		//实例化作品表
		$id=I('get.id');
		//删除上传文件 删除作品
		$oplist=$opus->field('opus')->where('id ='.$id)->find();
    	$opp='./Uploads'.$artlist['opus'];
    	/*删除图片*/
    	//dump($img);
    	@unlink($opp);
    	/*删除作品*/
    	$opdel=$opus->where('id ='.$id)->delete();

    	if($opdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
		
		

	}
}
