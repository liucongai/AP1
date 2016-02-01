<?php
    namespace Home\Model;
    use Think\Model;

    class LessonModel extends Model{

        // 自动验证
        // 可以定义一些规则，以后修改数据的时候 会自动应用这里个的规则
        protected $_validate  = array(
            array('lesson','require','课程名不能为空'),
            array('cate_id','require','课程名不能为空'),
        );

        // 自动完成
        protected $_auto = array(
           // array('reg_time','time',1,'function'),
            //array('password','md5',3,'function')
        );

    	public function getAll(){
    		$list = $this->select();

    		$sex = array('女','男','人妖');
    		foreach($list as $key => $val){
    			$list[$key]['sex'] = $sex[  $val['sex'] ];
    		}

    		return $list;
    	}

        public function test(){
            //访问其他表
            $list = $this->table('__GOODS__')->select();

            return $list;
        }

        public function deal(){

            $Fimg = D('Fenimg');

            $list = $this->select();

            $nan = array('初级','中级','高级');
            foreach ($list as $key => $val) {

                $map['lesson_id'] = $val['id'];

                $list[$key]['fimg'] = $Fimg->where($map)->getField('name');
                // 难度为空初始化
                if($val['nandu'] != null){
                    $list[$key]['nandu'] = $nan[$val['nandu']-1];
                }else{
                    $list[$key]['nandu'] = '初级';
                }


            }

            return $list;

        }








    }
?>