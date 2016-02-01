<?php
    namespace Admin\Model;
    use Think\Model;

    class ArticleModel extends Model{
    	
    	public function getArt(){
    		$user = D('User');          //实例化用户表
    		$category = D('Category');          //实例化分类表
    		$artlist=$this->select();

    		foreach ($artlist as $key => $value) {
    			$ulist=$user->where('id='.$value['user_id'])->find();            
                $artlist[$key]['user_name']=$ulist['name'];   //姓名
                $artlist[$key]['time']=date('Y-m-d',$value['time']);  //时间

                /*处理标签 字符串分割 例1，2，3*/
                $cid=$value['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid['name'];

                }

                $artlist[$key]['tag']=join(',',$cname);    //标签

                //审查

    		}
    		return $artlist;
    	}
    }
?>