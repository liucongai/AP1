<?php
    namespace Admin\Model;
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



 

    	   public function getAll(){
    		$list = $this->select();
   //dump($list);
            

    		//处理数据
    		$sex = array('女','男','妖');
    		foreach($list as $key=>$val){
    			$list[$key]['sex'] = $sex[  $val['sex'] ];
    		}
    		return $list;
    	}
    }
?>

