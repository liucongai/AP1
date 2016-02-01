<?php
namespace Home\Controller;
use Think\Controller;
class PercenterController extends Controller
{
    /********************************个人资料修改********************************/
    //address修改的没做
    public function perset()
    {

        if (IS_POST) {
            D('User')->save($_POST);
        }
        $user = D('User');
        $id = $_SESSION['home']['id'];/*要看session那边怎么写的*/
        $map['id'] = $id;

        $userlist = $user->where($map)->field('id,nick,job,sex,sign')->select();
        $_SESSION['home']['nick']=$userlist['0']['nick'];

        $userlist = $userlist['0'];
        $this->assign('list', $userlist);
        $this->display();


    }

    /*********************************更换头像********************************/
    public function settou()
    {
        //头像的显示与修改
        $id = $_SESSION['home']['id'];/*要看session那边怎么写的*/
        $map['user_id'] = $id;
        $map['is_face'] = '1';
        if (IS_POST) {
            //现将此user所有的头像封面都变为0
            $model = M();
            $model->execute("update ju_touimg set `is_face`='0' where `user_id`='$id'");

            /*上传头像*/
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型
            $upload->savePath = './Public/Uploads/'; // 设置附件上传目录

            $info = $upload->uploadOne($_FILES['name']);
            $path = $info['savepath'] . $info['savename'];

            if (!$info) {
                // 上传错误提示错误信息
                $this->error($upload->getError());
            }
            //插入上传的图片到头像表，并把它的封面设为1
            $model->execute("insert into ju_touimg(`name`,`is_face`,`user_id`) values('$path','1','$id')");

        }
        //页面头像显示
        $touimg = D('Touimg');

        $img = $touimg->where($map)->field('id,name')->select();

        //dump($img);
        $img = $img['0'];
        $_SESSION['home']['img'] = $img['name'];
        $this->assign('img', $img);
        $this->display();
    }

    /***********************************修改密码start**********************************/
    public function setpwd()
    {
        $id = $_SESSION['home']['id'];/*要看前台那边怎么写的*/
        if (IS_POST) {
            $password = $_POST['confirm'];
            $password = md5($password);
            $model = M();
            $model->execute("update ju_user set `password`='$password' where id=$id");
            unset($_SESSION);/*看low的SESSION怎么写的*/
            $this->redirect('');/*看lowB把模态框的页面放在哪个控制器的某方法里*/
        } else {
            $this->display();
        }
    }

    //ajax验证密码
    public function ajaxPwd()
    {
        $pwd1 = $_GET['pwd1'];
        $pwd1 = md5($pwd1);

        $id = $_SESSION['home']['id'];/*要看前台那边怎么写的*/
        $map['id'] = $id;
        $user = D('User');
        $userpwd = $user->where($map)->field('password')->select();
        $userpwd = $userpwd['0']['password'];

        if ($pwd1 == $userpwd) {
            $this->ajaxReturn(1);
        } else {
            $this->ajaxReturn(0);
        }


    }

    /************************************修改密码end***********************************/

}