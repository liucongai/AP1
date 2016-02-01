<?php
	namespace Home\Model;
    use Think\Model;

    class ArticleModel extends Model{
        
        public function getallart(){

            $artlist=$this->select();
            /**导出用户头像 姓名 积分**/
            /**导出文章的标题 标签 来源 时间 内容**/
            $user = D('User');          //实例化用户表
            $timg=D('Touimg');          //实例化头像表
            $category=D('Category');    //实例化标签表
            $answer=D('Answer');        //实例化回答表
            
            foreach ($artlist as $key => $value) {
                $ulist=$user->where('id='.$value['user_id'])->find();            
                $artlist[$key]['user_name']=$ulist['name'];   //姓名
                    
                $ilist=$timg->where('user_id='.$ulist['id'])->find();               
                $artlist[$key]['user_pic']=$ilist['name'];    //头像
                    
                /*处理标签分类  */
                $cid=$value['cate_id'];
                switch ($cid){ 
                    case '001':
                        $a ='前端开发';
                    break;
                    
                    case '002':
                        $a ='后端开发';
                    break;

                    case '003':
                        $a ='程序人生';
                    break;

                    case '004':
                        $a ='设计';
                    break;
                    case '005':
                        $a ='移动开发';
                    break;
                    case '006':
                        $a ='其他';
                    break;
            
                }
                $artlist[$key]['tag']=$a;    //标签

                //时间
                $artlist[$key]['time']=date('Y-m-d',$value['time']);  

                //处理封面
                $artlist[$key]['name']=$value['name'];            

                /*处理回复内容*/
                $answ = htmlspecialchars_decode($value['content']);
                $answ = strip_tags($answ);
                $artlist[$key]['content'] = $answ;


                /**回答数**/
                $acount=$answer->field('count(id) count')->where('art_id='.$artlist[$key]['id'])->find();
                $artlist[$key]['ans_count']=$acount['count'];    //回答数 

            }
            return $artlist;
        
        }

        public function getperart(){
            
            $artlist=$this->find();

            /**导出用户头像 姓名 积分**/
            /**导出问题的标题 标签 来源 时间 最新回答的人 内容**/
            $user = D('User');          //实例化用户表
            $timg=D('Touimg');          //实例化头像表
            $category=D('Category');    //实例化标签表
            $answer=D('Answer');        //实例化回答表

            $ulist=$user->where('id='.$artlist['user_id'])->find();            
            $artlist['user_name']=$ulist['name'];   //姓名
                    
            $ilist=$timg->where('user_id='.$ulist['id'])->find();               
            $artlist['user_pic']=$ilist['name'];    //头像

            /*处理标签 */
            $cid=$artlist['cate_id'];
            switch ($cid){ 
                case 1:
                    $a ='前端开发';
                break;
                
                case 2:
                    $a ='后端开发';
                break;

                case 3:
                    $a ='程序人生';
                break;

                case 4:
                    $a ='设计';
                break;
                case 5:
                    $a ='移动开发';
                break;
                case 6:
                    $a ='其他';
                break;
            }
            $artlist['tag']=$a;    //标签

            //时间
            $artlist['time']=date('Y-m-d H:i',$qlist['time']);



            return $artlist;
        }


        public function getAllmyart(){
            //文章标题 时间 标签 回答数 浏览数
            $artlist=$this->select();
 
            $category=D('Category');    //实例化标签表
            

            foreach ($artlist as $key => $value) {
                    
                /*处理标签分类  */
                $cid=$value['cate_id'];
                switch ($cid){ 
                    case '001':
                        $a ='前端开发';
                    break;
                    
                    case '002':
                        $a ='后端开发';
                    break;

                    case '003':
                        $a ='程序人生';
                    break;

                    case '004':
                        $a ='设计';
                    break;
                    case '005':
                        $a ='移动开发';
                    break;
                    case '006':
                        $a ='其他';
                    break;
            
                }
                $artlist[$key]['tag']=$a;    //标签

                //时间
                $artlist[$key]['time']=date('Y-m-d',$value['time']);  

                //处理封面
                //$artlist[$key]['name']=$value['name'];            

                /*浏览数*/


                /**回答数**/
                
            }
            
            return $artlist;
        }
    }
