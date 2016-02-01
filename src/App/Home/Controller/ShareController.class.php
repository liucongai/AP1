<?php
namespace Home\Controller;
use Think\Controller;
class ShareController extends Controller {
        public function index(){

            cookie('nav',2,array('expire'=>3600,'prefix'=>'ho_'));

            //遍历分享页的头部
            $share=D('Share');
            $share_list=$share->select();
             
            $lesson=M('Lesson');
            $total=$lesson->where('share_id>0')->count();
            //dump($total);
            //exit;
            $page  = new \Think\Page($total,6);
            //遍历课程nb
            
            
            /*按照大神所说图片不放在lesson中，并且课程名的字段不是name还是lesson*/
            $model=M();
            
            $lesson_list=$model->query("select l.id,l.lesson,f.name,l.nandu from ju_lesson l,ju_fenimg f where l.share_id >=1 and f.lesson_id=l.id  limit $page->firstRow,$page->listRows");
             $zhang=D('Zhang');
             $zizhang=D('zizhang');
             $Co_less=D('collectless');
             $nan = array('初级','中级','高级');
             foreach ($lesson_list as $key => $val) {
                  if($val['nandu'] != null){
                $lesson_list[$key]['nandu'] = $nan[$val['nandu']-1];
            }else{
                $lesson_list[$key]['nandu'] = '初级';
            }
                  $per_num = $Co_less->where('lesson_id='.$val['id'])->count('id');
                  $lesson_list[$key]['per_num'] = $per_num;
                  $chart=$zhang->where('lesson_id='.$val['id'])->getNum();
                  $chapter = $zhang->where('lesson_id='.$val['id'])->select();
                  $chapter['id']  = array_reverse($chapter)[0]['id'];
                  $section = $zizhang->where('zh_id='.$chapter['id'])->getNum();

                  $lesson_list[$key]['progress'] = '更新至'.$chart.'-'.$section;  
             }
             //dump($lesson_list);
            /******************模板里已经改过******************/
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
            $page->setConfig('first','首页');
            $page->setConfig('last','尾页'); 
            
            $pageButton  = $page->show();
            //分配数据
            $this->assign('pageButton',$pageButton);  
            $this->assign('lesson_list',$lesson_list);
            $this->assign('list',$share_list);
            $this->display();
             


        }
         //这两个方法可以合并，但是一开始没弄，就干脆不合了
        public function sharelist(){
            
            //遍历分享页的头部
            $share=D('Share');
            $share_list=$share->select();
            //dump($share_list);
            //exit;
            $this->assign('list',$share_list);
           
            

            //遍历各个企业的各自课程
        	$map['share_id']=$_GET['share_id'];
            $share_id=$_GET['share_id'];
            $lesson=M('Lesson');
            $total=$lesson->where($map)->count();
            $page  = new \Think\Page($total,6);
            //遍历课程
            $lesson_list=$lesson->where($map)->limit($page->firstRow.','.$page->listRows)->select();
            /***********************************************************************/
               
            $model=M();
             $lesson_list=$model->query("select l.id,l.lesson,f.name,l.nandu from ju_lesson l,ju_fenimg f where l.share_id =$share_id and f.lesson_id=l.id  limit $page->firstRow,$page->listRows");
             $zhang=D('Zhang');
             $zizhang=D('zizhang');
             $Co_less=D('collectless');
              $nan = array('初级','中级','高级');
             foreach ($lesson_list as $key => $val) {
                   // 难度为空初始化
            if($val['nandu'] != null){
                $lesson_list[$key]['nandu'] = $nan[$val['nandu']-1];
            }else{
                $lesson_list[$key]['nandu'] = '初级';
            }
                  $per_num = $Co_less->where('lesson_id='.$val['id'])->count('id');
                  $lesson_list[$key]['per_num'] = $per_num;
                  $chart=$zhang->where('lesson_id='.$val['id'])->getNum();
                  $chapter = $zhang->where('lesson_id='.$val['id'])->select();
                  $chapter['id']  = array_reverse($chapter)[0]['id'];
                  $section = $zizhang->where('zh_id='.$chapter['id'])->getNum();

                  $lesson_list[$key]['progress'] = '更新至'.$chart.'-'.$section;  
             }
             //dump($lesson_list);
            /************************************************************************/
            $this->assign('lesson_list',$lesson_list);
            
            //遍历各个企业的介绍
            $map1['id']=$_GET['share_id'];
            $share=$share->where($map1)->field('intro,img_big,color')->select();
            $share=$share['0']; 
             //dump($share);
             //exit;
            $this->assign('share',$share);
            $this->display();
          
               
        }


}