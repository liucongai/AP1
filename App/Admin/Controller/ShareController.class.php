<?php
namespace Admin\Controller;
//use Think\Controller;
class ShareController extends CommonController {
     public function index(){
     	if(!empty($_GET['name'])) $map['name'] = array('like',"%{$_GET['name']}%");
        $share=D('Share');
        $share_list=$share->where($map)->select();
        $this->assign('list',$share_list);
        $this->display();                                                                                            
   }

    public function add(){
         
      $this->display();

    }

    public  function doadd(){
        
         //分享企业的头部图片上传
         $upload = new \Think\Upload();// 实例化上传类    
         $upload->maxSize   =     3145728 ;// 设置附件上传大小    
         $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型    
         $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录   
         
         //dump($_FILES);
         //exit; 
         $info1   =   $upload->uploadOne($_FILES['img']);
         $info2   =   $upload->uploadOne($_FILES['img_big']);
         //dump($info1);
         //dump($info2);
         //exit;
         $path1 = $info1['savepath'].$info1['savename'];
         $path2 = $info2['savepath'].$info2['savename'];
        // dump($path1);
         //dump($path2);
         //exit;
         


         //dump($path);
         if(!$info1||!$info2) {
             // 上传错误提示错误信息        
             $this->error($upload->getError());    
         }else{
             // 上传成功        
              //echo $path;    
         }   
         //写入分享表
         $name=$_POST['name'];           
         $intro=$_POST['intro'];
         $color=$_POST['color'];  
         //$sql="insert into ju_share(`name`,`img`,`img_big`,`color`,`intro`) values('$name','$path1','$path2','$color','$intro')";
         //dump($sql);
         //exit;         
         $model = M();
         $model->execute("insert into ju_share(`name`,`img`,`img_big`,`color`,`intro`) values('$name','$path1','$path2','$color','$intro')");
         $this->redirect('index');
    }


    public function del(){
        $id = $_GET['id'];
        /*注意先删除该计划的课程*/
        

        /********************************/
        $share = M('share');
        $share->delete($id);

        $this->redirect('index');

    }

    public function edit(){
         $id =$_GET['id'];
         $share =  M('share');
        
         $sharelist=$share->find($id);
         $this->assign('list',$sharelist);
         $this->display();
         
    }

    public function doedit(){
         $share =  M('share');
         $share->save($_POST);
        
         $this->redirect('index');

         
    }
}