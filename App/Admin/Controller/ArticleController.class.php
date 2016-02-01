<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    /*文章主页*/
    public function index(){
    	$article=D("Article");   //实例化文章类
    	$user=D('User');		//实例化用户表

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
			$map['title']=array('exp',"like '%$title%' ");
		}


		$total = $article->where($map)->count();
    	$page = new \Think\Page($total,8);
    	//$artlist=$article->field('id,title,user_id,cate_id,dis,time')->select();
    	$artlist=$article->field('id,title,user_id,cate_id,dis,time')->where($map)->limit($page->firstRow.','.$page->listRows)->getArt();

    	$pageButton = $page->show();

    	//dump($artlist);
    	$this->assign('list',$artlist);
    	$this->assign('pageButton',$pageButton);
    	$this->display();
    }

    /*删除文章*/
    public function del(){
    	$article=D("Article");   //实例化文章类

    	$id=I('get.id');
    	//$id='2';
        $artlist=$article->field('name')->where('id ='.$id)->find();
        //dump($artlist);
    	$img='./Uploads'.$artlist['name'];
    	/*删除图片*/
    	//dump($img);
    	@unlink($img);
    	/*删除文章*/
    	$artdel=$article->where('id ='.$id)->delete();

        if($artdel){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

}
