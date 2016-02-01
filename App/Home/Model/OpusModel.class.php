<?php
	namespace Home\Model;
    use Think\Model;

    class OpusModel extends Model{

    	public function getAllopus(){

    		$oplist=$this->select();
	    	//姓名 头像 标题 内容 标签  收藏
	        $user=D('User');	           //实例化用户表
	        $timg=D('Touimg');             //实例化头像表 
	        $category=D('Category');       //实例化分类
	        $care=D('Care');       //实例化收藏类

	        foreach ($oplist as $key => $value) {
	            $ulist=$user->where('id='.$value['user_id'])->find();            
	            $oplist[$key]['user_name']=$ulist['name'];   //姓名
	            
	            $ilist=$timg->where('user_id='.$ulist['id'])->find();               
	            $oplist[$key]['user_pic']=$ilist['name'];    //头像
	            
	            /*处理标签 字符串分割 例1，2，3*/
	            $cid=$value['cate_id'];
	            $catevalue=explode(',',$cid);
	            
	            $cname=array();
	            foreach($catevalue as $key2 => $caval){
	                $cid=$category->field('id,name')->where('id='.$caval)->find();
	                $cname[$cid['id']]=$cid;
	               
	            }
	            $oplist[$key]['tag']=$cname;    //标签


	            
	            //收藏
	            $calist=$care->field('count(id) count')->where('opus_id='.$value['id'])->find();            
	            $oplist[$key]['fav']=$calist['count'];   //收藏
	    
	        }
	        return $oplist;
    	}

    	public function getperopus(){

    		$oplist=$this->find();
    		//用户头像 姓名 标签 作品数
    		$opus=D('Opus');      //实例化作品类
	        $user = D('User');          //实例化用户表
	        $timg=D('Touimg');          //实例化头像表
	        $category=D('Category');    //实例化标签表
	        $answer=D('Answer');        //实例化标签表
	        

	        $ulist=$user->where('id='.$oplist['user_id'])->find();            
	        $oplist['user_name']=$ulist['name'];   //姓名
	                
	        $ilist=$timg->where('user_id='.$ulist['id'])->find();               
	        $oplist['user_pic']=$ilist['name'];    //头像

	        /*处理标签 字符串分割 例1，2，3*/
	        $cid=$oplist['cate_id'];
	        $catevalue=explode(',',$cid);
	                
	        $cname=array();
	        foreach($catevalue as $key2 => $caval){
	            $cid=$category->field('id,name')->where('id='.$caval)->find();
	            $cname[$cid['id']]=$cid;
	        }
	        $oplist['tag']=$cname;    //标签

	        //源码路径
	        $oplist['opus']=$oplist['opus'];

	        //作品数
	        $opl=$opus->field('count(id) count')->where('user_id='.$oplist['user_id'])->find();
	        $oplist['opus_count']=$opl['count'];
	        return $oplist;    
    	}

    	public function getAllmyopus(){
    		$category=D('Category');    //实例化标签表
    		$oplist=$this->select();
    		//作品标题 时间 标签 回答数 浏览数
    		foreach ($oplist as $key => $value) {
	            
	            /*处理标签 字符串分割 例1，2，3*/
	            $cid=$value['cate_id'];
	            $catevalue=explode(',',$cid);
	            
	            $cname=array();
	            foreach($catevalue as $key2 => $caval){
	                $cid=$category->field('id,name')->where('id='.$caval)->find();
	                $cname[$cid['id']]=$cid;
	               
	            }
	            $oplist[$key]['tag']=$cname;    //标签
	            $oplist[$key]['time']=date('Y-m-d',$value['time']);  //时间
	       	}
    		return $oplist;  
    	}
    	
    }