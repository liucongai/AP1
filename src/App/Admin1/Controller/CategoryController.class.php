<?php
namespace Admin\Controller;
//use Think\Controller;
class CategoryController extends CommonController {
    public function index(){
    	$Category = D('Category');	//实例化分类
    	if(empty($_GET['pid'])){
        	$pid = 0;
    	}else{
        	$pid = $_GET['pid'];
        }
        $map['pid']=$pid;
        
        if(!empty($_GET['name'])) $map['name'] = array('like',"%{$_GET['name']}%");
        //dump($map['name']);
        //exit;
        $total=$Category->where($map)->count();
        //dump($total);
        //exit;
        $page  = new \Think\Page($total,5);
        $catelist = $Category->where($map)->limit($page->firstRow.','.$page->listRows)->getAll(); 
        $map1['id']=$map['pid'];
        //dump($map1);
        //exit;
        $pid=$Category->where($map1)->field('pid')->select();
        $gpid=$pid['0'];
        //dump($gpid);
        //exit;

        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页'); 
    	//dump($catelist);
        //exit;
        $pageButton  = $page->show();
        $this->assign('gpid',$gpid);  
        $this->assign('list',$catelist);  
        $this->assign('pageButton',$pageButton);   
		$this->display();
      
    }

    /***添加分类****/
    public function add(){
    	//$Category = D('Category');
		
      
		if(IS_POST){
			$Category = D('Category');	//实例化Category对象
						
            if($Category->create()){
            	$result=$Category->add();
            	if($result){        
            		$insertId = $result;   
            		if($insertId>0){
            			$this->redirect('Category/index');
            		}
            	}
            }		
            
		}else{
			// 如果是点击添加一级分类，这种情况，是不会有get传递 pid和path过来的。所以此时的pid 0  path 0,
    	// 如果用户是从分类列表点击添加子类过来的，这种情况就会有$_GET['pid']和$_GET['path']存在 
			$pid = empty($_GET['pid'])?0:$_GET['pid'];
      		$path = empty($_GET['path'])?'0,':$_GET['path'].$pid.',';
      		$list = array(
      			'pid' => $pid,
      			'path' =>  $path
      		);     
      		$this->assign($list);     
			$this->display();
		}
	}

	/****修改分类*****/
	public function edit(){
		$Category = D('Category');
		// 接收用户传递的id
    	$id = $_GET['id'];
    	
    	if(IS_POST){
            
            D('Category')->save($_POST);
    		$this->redirect('index');
            
    	}else{
    		
    		$editlist = $Category->where('id='.$id)->select();  
    		$editlist = $editlist[0];
    		
    		$this->assign('list',$editlist);     
			$this->display();
    	}
	}

       public function dis(){
             $id = $_GET['id'];
            $display = $_GET['display'];
            if($display=='×') $display=1;
            if($display=='√') $display=0;

            $data['id']=$id;
            $data['display']=$display;
            //dump($data);
            //exit;
           D('Category')->save($data);              
          $this->redirect('Category/index');
     }


      public function del(){
            $category = M('category');
            $id = $_GET['id'];
            $list = $category->where('pid='.$id)->select();  
             //dump($list);
             //exit;
            if(!empty($list)){
                 $this->error('该分类下有子类，不能删除!');
            }
            // 不要忘了这个课程表设计好后，还要在这里检测该分类下是否有商品 


            $category->delete($id);
            $this->redirect('index');
      }
}
