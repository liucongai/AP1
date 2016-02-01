<?php
	namespace Home\Model;
    use Think\Model;

    class ActivityModel extends Model{
    	public function getAll(){
            $actlist=$this->select();

            /**导出活动封面 标题 活动时间 热度**/
            foreach ($actlist as $key => $value){

                //处理封面
                $actlist[$key]['name']=$value['name']; 

                //开始时间 结束时间
                $actlist[$key]['bgtime']=date('Y年m月d日',$value['bgtime']);  
                $actlist[$key]['edtime']=date('Y年m月d日',$value['edtime']); 
            }
            return $actlist;
        }


        public function getAll2(){
            $qlist=$this->find();

        /**导出用户头像 姓名 积分**/
        /**导出问题的标题 标签 来源 时间 最新回答的人 内容**/
        $user = D('User');          //实例化用户表
        $timg=D('Touimg');          //实例化头像表
        $category=D('Category');    //实例化标签表
        $answer=D('Answer');

        $ulist=$user->where('id='.$qlist['user_id'])->find();            
        $qlist['user_name']=$ulist['name'];   //姓名
                
        $ilist=$timg->where('user_id='.$ulist['id'])->find();               
        $qlist['user_pic']=$ilist['name'];    //头像

        /*处理标签 字符串分割 例1，2，3*/
        $cid=$qlist['cate_id'];
        $catevalue=explode(',',$cid);
                
        $cname=array();
        foreach($catevalue as $key2 => $caval){
            $cid=$category->field('id,name')->where('id='.$caval)->find();
            $cname[$cid['id']]=$cid;
        }
        $qlist['tag']=$cname;    //标签

        //时间
        $qlist['time']=date('Y-m-d',$qlist['time']);

        /**回答数 浏览数**/
        $acount=$answer->field('count(id) count')->where('ques_id='.$qlist['id'])->find();
        $qlist['ans_count']=$acount['count'];    //回答数
            


            return $qlist;
        }

    }
?>
