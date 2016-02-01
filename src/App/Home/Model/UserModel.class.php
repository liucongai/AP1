<?php
    namespace Home\Model;
    use Think\Model;

    class UserModel extends Model{

              // 可以定义一些规则，以后修改数据的时候 会自动应用这里个的规则
        protected $_validate  = array(
            array('name','require','用户名不能为空'),
            array('email','email','邮箱格式不正确！'), 
            array('repassword','password','确认密码不正确',0,'confirm'),
            //array('phone','/^1[3-9]\d{9}/','手机号码错误! '), 
            //array('phone','/^1[3-9]\d{9}/','手机号码错误！','0','regex',1), 
             array('phone','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/','号码不正确',self::EXISTS_VALIDATE),
            //array('phone','/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/',-6,号码不正确), 
        );

        // 自动完成
        protected $_auto = array(
            array('reg_time','time',1,'function'),
            array('password','md5',3,'function')
        );


        public function deimg(){

            $Tou = D('Touimg');

            $info = $this->find();

            if($info['sign'] == null) $info['sign'] =' 这位童鞋很懒，什么也没有留下～～！';

            $data['user_id'] = $info['id'];
            $data['is_face'] = 1;


            $info['img'] = $Tou->where($data)->getField('name');


            $job = array('页面重构设计','交互设计师','产品经理','UI设计师','JS工程师','Web前端工程师','移动开发工程师','PHP开发工程师','软件测试工程师','Linux系统工程师','JAVA开发工程师','学生','其他');

            $info['job'] = $job[$info['job']-1];

            return $info;

        }

         public function getAll(){
    		$list = $this->select();
   //dump($list);
            

    		//处理数据
    		$sex = array('女','男','保密');
    		foreach($list as $key=>$val){
    			$list[$key]['sex'] = $sex[  $val['sex'] ];
    		}

            $job = array('','页面重构设计','交互设计师','产品经理','UI设计师','JS工程师','Web前端工程师','移动开发工程师','PHP开发工程师','软件测试工程师','Linux系统工程师','JAVA开发工程师','学生','其他');
            foreach($list as $key=>$val){
                $list[$key]['job'] = $job[  $val['job'] ];
            }
    		return $list;
    	}
   }
?>

