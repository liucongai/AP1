<?php
	namespace Home\Model;
    use Think\Model;

    class AnswerModel extends Model{

    	public function getAllanswer(){
    		
    	/**导出回答者头像 姓名 积分**/
        /**导出回答的 时间  内容 赞**/
        $question=D('Ques');          //实例化问题表
        $answer=D('Answer');          //实例化回答表

        $alist=$this->select();

        $user = D('User');                  //实例化用户表
        $timg=D('Touimg');          //实例化头像表
        $anreply=D('Answ_reply');          //实例化回复表



        foreach ($alist as $key => $value) {
            $ulist=$user->where('id='.$value['user_id'])->find();            
            $alist[$key]['user_name']=$ulist['name'];   //姓名
                
            $ilist=$timg->where('user_id='.$ulist['id'])->find();               
            $alist[$key]['user_pic']=$ilist['name'];    //头像

            //时间
            $alist[$key]['time']=date('Y-m-d',$value['time']);

            /**导出回复者头像 姓名 **/
            /**导出回复时间  内容 **/
            $replylist=$anreply->where('answ_id='.$value['id'])->order('time asc')->select();
            
            foreach ($replylist as $key2 => $value2) {
                
                $ulist2=$user->where('id='.$value2['user_id'])->find();            
                $replylist[$key2]['reply_name']=$ulist2['name'];   //回复者姓名
                
                $ilist2=$timg->where('user_id='.$ulist2['id'])->find();               
                $replylist[$key2]['reply_pic']=$ilist2['name'];    //回复者头像

                $ulist2=$user->where('id='.$value2['before_id'])->find();            
                $replylist[$key2]['reply_qname']=$ulist2['name'];   //前姓名


                //时间
                $replylist[$key2]['time']=date('Y-m-d',$value2['time']);
            }

            $alist[$key]['reply']=$replylist;
            //dump($replylist);
        }

        	return $alist;
    	}


        public function getAllart(){
            $alist=$this->select();

            /**导出回答者头像 姓名 积分**/
            /**导出回答的 时间  内容 赞**/
            $question=D('Ques');            //实例化问题表
            $answer=D('Answer');            //实例化回答表
            $user = D('User');              //实例化用户表
            $timg=D('Touimg');              //实例化头像表
            $anreply=D('Answ_reply');       //实例化回复表

            foreach ($alist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $alist[$key]['user_name']=$ulist['name'];   //姓名
                    
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $alist[$key]['user_pic']=$ilist['name'];    //头像

                //时间
                $alist[$key]['time']=date('Y-m-d',$value['time']);
            }
            return $alist;

        }


        public function getAllopus(){
            $anslist=$this->select();
            //姓名 头像 内容 时间
            $user = D('User');          //实例化用户表
            $timg=D('Touimg');          //实例化头像表
            
            foreach ($anslist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $anslist[$key]['user_name']=$ulist['name'];   //姓名
                    
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $anslist[$key]['user_pic']=$ilist['name'];    //头像

                $anslist[$key]['time']=date('Y-m-d',$value['time']);  //时间

            }
            return $anslist;
        }


        public function getAllmyques(){

            /**导出个人的所有回答**/
            /**导出回答的 时间  内容 赞**/
            $question=D('Ques');            //实例化问题表
            $answer=D('Answer');            //实例化回答表
            $category=D('Category');    //实例化标签表
            
            $anwlist=$this->select();

            
            foreach ($anwlist as $key => $value) {
        
                $qlist=$question->where('id='.$value['ques_id'])->find();            
                $anwlist[$key]['qt']=$qlist['title'];   //问题标题
                    
                $anwlist[$key]['time']=date('Y-m-d',$qlist['time']);  //时间
                $anwlist[$key]['acount']=$qlist['ans_count'];  //回答数
                $anwlist[$key]['abw']=$qlist['ans_bw'];  //浏览数

                /*处理标签 字符串分割 例1，2，3*/
                $cid=$qlist['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid;
                }
                $anwlist[$key]['tag']=$cname;    //标签

                //$anwlist[$key]['tag']=$qlist['cate_id'];  //标签
                
                //$alist[$key]['answ']=htmlspecialchars($value['answ']);  //内容剥离标签strip_tags()
                $a='time desc';                 //按时间排序 
                $map['user_id']=$value['user_id'];
                $map['ques_id']=$value['ques_id'];
                $anwlist2=$answer->where($map)->order($a)->select();
                $answ = htmlspecialchars_decode($anwlist2[0]['answ']);
                $answ = strip_tags($answ);
                $anwlist[$key]['answ'] = $answ;
                 $anwlist[$key]['ans_id'] = $anwlist2[0]['id'];//id
            }

                return $anwlist;

        }
    	
    	
    }
