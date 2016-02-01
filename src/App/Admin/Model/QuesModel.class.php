<?php
    namespace Admin\Model;
    use Think\Model;

    class QuesModel extends Model{
    	
    	public function getQues(){
            $user = D('User');          //实例化用户表
            $category = D('Category');          //实例化分类表
            $soncapter = D('Zizhang');          //实例化子章节表
            $capter = D('Zhang');          //实例化章节表
            $lesson = D('Lesson');          //实例化课程表

    		$qlist=$this->select();
    		
            foreach ($qlist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $qlist[$key]['user_name']=$ulist['name'];   //姓名
                $qlist[$key]['time']=date('Y-m-d',$value['time']);  //时间
                
                /*处理标签 字符串分割 例1，2，3*/
                $cid=$value['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid['name'];

                }

                $qlist[$key]['tag']=join(',',$cname);    //标签
               


                //来源
                $result=$value['zz_id'];
                if($result==0){
                    $qlist[$key]['zz_id']='来源自论坛问答';
                }else{
                    $zzid = $qlist[$key]['zz_id'];
                    $soncapid =$soncapter->field('zhang_id')->where( 'id' == $zzid )->find();
                    $zid=$soncapid['zhang_id'];
                    $capid =$capter->field('lesson_id')->where( 'id' == $zid )->find();
                    $lid=$capid['lesson_id'];
                    $llist =$lesson->field('lesson')->where( 'id' == $lid )->find();
                    $qlist[$key]['zz_id']=$llist['lesson']; 
                }


            }
            
    		return $qlist;
    	}
    }
?>