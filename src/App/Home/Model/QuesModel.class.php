<?php
	namespace Home\Model;
    use Think\Model;

    class QuesModel extends Model{

    	public function getAll(){
    		$qlist=$this->select();
    		/**导出用户头像 姓名 积分**/
            /**导出问题的标题 标签 来源 时间 最新回答的人 内容**/
            $user = D('User');          //实例化用户表
            $timg=D('Touimg');          //实例化头像表
            $category=D('Category');    //实例化标签表
            $answer=D('Answer');        //实例化回答表
            $soncapter=D('Zizhang');        //实例化子章节表
            foreach ($qlist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $qlist[$key]['user_name']=$ulist['name'];   //姓名
                
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $qlist[$key]['user_pic']=$ilist['name'];    //头像
                
                /*处理标签 字符串分割 例1，2，3*/
                $cid=$value['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid;
                }
                $qlist[$key]['tag']=$cname;    //标签


                //时间
                $qlist[$key]['time']=date('Y-m-d',$value['time']);  //时间


                //对问题的回答处理
                //(时间戳判断) 最新回答 最赞回答 老师回答 已采纳回答
                $atype=$answer->field('max(type) type')->where('ques_id='.$value['id'])->find();
                
                
                switch ($atype['type']) {
                    case 3:
                        $qlist[$key]['ans_type']="最赞回答";       
                    break;

                    case 2:
                        $qlist[$key]['ans_type']="已采纳回答";       
                    break;

                    case 1:
                        $qlist[$key]['ans_type']="老师回答";       
                    break;
                            
                    default:
                        $qlist[$key]['ans_type']="最新回答";               
                    break;
                }        
                
                
                if($atype['type']>0){
                    $alist=$answer->where('ques_id='.$value['id'].'and type='.$atype['type'])->find();
                }else{
                    $atime=$answer->field('max(time) time')->where('ques_id='.$value['id'])->find();
                    $alist=$answer->where('time='.$atime['time'])->find();
                }
                if(empty($alist)){

                    $qlist[$key]['ans_content']='嗯～～，这个提问大家都在考虑......';     //无回答
                }else{
                    $answ = htmlspecialchars_decode($alist['answ']);
                    $answ = strip_tags($answ);
                    $qlist[$key]['ans_content'] = $answ;                    //回答内容处理
                    //$qlist[$key]['ans_content']=$alist['answ'];         //回答内容
                    $qlist[$key]['ans_id']=$alist['id'];         //回答id


                    $ulist2=$user->where('id='.$alist['user_id'])->find();  
                     $qlist[$key]['ans_user_id']=$ulist2['id'];         //回答者的id
                    $qlist[$key]['ans_user_name']=$ulist2['name'];      //回答者姓名
                
                    $ilist2=$timg->where('user_id='.$ulist2['id'])->find();               
                    $qlist[$key]['ans_user_pic']=$ilist2['name'];    //回答者头像
                
                }

                /**回答数 浏览数**/
                $acount=$answer->field('count(id) count')->where('ques_id='.$qlist[$key]['id'])->find();
                $qlist[$key]['ans_count']=$acount['count'];    //回答数
                
                /**来源**/
                if($value['zz_id'] != 0){
                    $splist=$soncapter->where('id='.$value['zz_id'])->find();
                    $qlist[$key]['zname']='源自:'.$splist['xi_name'];    //子章节名
                }
                
                
            }
    		return $qlist;
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
