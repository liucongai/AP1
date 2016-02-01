<?php
	namespace Admin\Model;
    use Think\Model;

    class ActivityModel extends Model{
    	public function getAct(){
    		$user = D('User');          //实例化用户表
    		$category = D('Category');          //实例化分类表
    		$actlist=$this->select();

    		foreach ($actlist as $key => $value) {
    			$ulist=$user->where('id='.$value['user_id'])->find();            
                $actlist[$key]['user_name']=$ulist['name'];   //姓名
                $actlist[$key]['time']=date('Y-m-d',$value['time']);  //时间
                $actlist[$key]['bgtime']=date('Y-m-d',$value['bgtime']);  //时间
                $actlist[$key]['edtime']=date('Y-m-d',$value['edtime']);  //时间

                /*处理标签 字符串分割 例1，2，3*/
                $cid=$value['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid['name'];

                }

                $actlist[$key]['tag']=join(',',$cname);    //标签

                //审查

    		}
    		return $actlist;
    	}
    }
?>