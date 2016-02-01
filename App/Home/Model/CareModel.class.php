<?php
	namespace Home\Model;
    use Think\Model;

    class CareModel extends Model{

    	public function getAllmyquescare(){
    		$calist=$this->select();
			
			//关注问题标题 时间 标签 回答数 浏览数
    		$question=D('Ques');            //实例化问题表
            $category=D('Category');    	//实例化标签表

            foreach ($calist as $key => $value) {
        
                $qlist=$question->where('id='.$value['ques_id'])->find();            
                $calist[$key]['qt']=$qlist['title'];   //问题标题
                    
                $calist[$key]['time']=date('Y-m-d',$qlist['time']);  //时间
                $calist[$key]['acount']=$qlist['ans_count'];  //回答数
                $calist[$key]['abw']=$qlist['ans_bw'];  //浏览数

                /*处理标签 字符串分割 例1，2，3*/
                $cid=$qlist['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid;
                }
                $calist[$key]['tag']=$cname;    //标签
            }

    		return $calist;
    	}

        public function getAllmyopuscare(){
            $calist=$this->select();
            
            //关注问题标题 时间 标签 回答数 浏览数
            $opus=D('Opus');            //实例化问题表
            $category=D('Category');        //实例化标签表

            foreach ($calist as $key => $value) {
        
                $oplist=$opus->where('id='.$value['opus_id'])->find();            
                $calist[$key]['qt']=$oplist['title'];   //问题标题
                    
                $calist[$key]['time']=date('Y-m-d',$oplist['time']);  //时间
                $calist[$key]['acount']=$oplist['ans_count'];  //回答数
                $calist[$key]['abw']=$oplist['ans_bw'];  //浏览数

                /*处理标签 字符串分割 例1，2，3*/
                $cid=$oplist['cate_id'];
                $catevalue=explode(',',$cid);
                
                $cname=array();
                foreach($catevalue as $key2 => $caval){
                    $cid=$category->field('id,name')->where('id='.$caval)->find();
                    $cname[$cid['id']]=$cid;
                }
                $calist[$key]['tag']=$cname;    //标签
            }

            return $calist;
        }

        public function getAllmyartcare(){
            $calist=$this->select();
            
            //关注文章标题 时间 标签 回答数 浏览数
            $article=D('Article');                      //实例化文章表
            $category=D('Category');                    //实例化标签表

            foreach ($calist as $key => $value) {
        
                $oplist=$article->where('id='.$value['article_id'])->find();            
                $calist[$key]['qt']=$oplist['title'];   //问题标题
                    
                $calist[$key]['time']=date('Y-m-d',$oplist['time']);  //时间
                $calist[$key]['acount']=$oplist['ans_count'];  //回答数
                $calist[$key]['abw']=$oplist['ans_bw'];  //浏览数

                /*处理标签分类  */
                $cid=$oplist['cate_id'];;
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
                $calist[$key]['tag']=$a;    //标签

            }

            return $calist;
        }
    }