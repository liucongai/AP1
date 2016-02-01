<?php
    namespace Home\Model;
    use Think\Model;

    class CollectplanModel extends Model{

      /*
        protected $_validate  = array(
            array('lesson','require','课程名不能为空'),
            array('cate_id','require','课程名不能为空'),
        );

        // 自动完成
        protected $_auto = array(
           // array('reg_time','time',1,'function'),
            //array('password','md5',3,'function')
        );

        */






    	public function getNum(){
    		$list = $this->select();


    		$num = count($list);

    		return $num;
    	}

        public function deal()
        {

            $Plan = D('Plan');
            $Img = D('Fenimg');

            $info = $this->select();


            foreach($info as $key => $val){

                $list[] = $val['plan_id'];

            }

            for($i=0;$i < count($list); $i++){

                $list[$i] = $Plan->where('id='.$list[$i])->find();

            }

            foreach($list as $key => $val){

                $list[$key]['img'] = $Img->where('lesson_id='.(-$val['id']))->getField('name');

                $list[$key]['pro'] = $Plan->where('id='.$val['id'])->pdeal();

            }



            return $list;
        }

    }
?>