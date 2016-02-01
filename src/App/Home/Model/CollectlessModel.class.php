<?php
    namespace Home\Model;
    use Think\Model;

    class CollectlessModel extends Model{

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


        public function getSum(){

            $list = $this->getField('progress');

            $arr = explode(',',$list);

            $num = count($arr) - 1;

            return $num;
        }


        public function deal()
        {

            $Fimg = D('Fenimg');
            $Co_less = D('Collectless');
            $Zhang_c = D('Zhang');
            $Xiao_c = D('Zizhang');
            $Less = D('Lesson');

            $uid = $_SESSION['home']['id'];

            // 分页 按钮
            $count = $Co_less->where('user_id='.$uid)->count();
            $Page       = new \Think\Page($count,8);
            $show       = $Page->show();
            $list = $this->where('user_id='.$uid)->order('time')->limit($Page->firstRow.','.$Page->listRows)->select();

            foreach ($list as $key => $val) {
                // 处理封面图 处理难度
                $nan = array('初级', '中级', '高级');

                $detail = $Less->where('id='.$val['lesson_id']) ->select();

                $list[$key]['name'] = $detail['name'];

                $list[$key]['fimg'] = $Fimg->where('lesson_id=' . $val['lesson_id'])->getField('name');

                $list[$key]['desc'] = $detail['lesson_desc'];

                if($detail['nandu'] != null){
                    $list[$key]['nandu'] = $nan[$detail['nandu']];
                }else{
                    $list[$key]['nandu'] = '初级';
                }


                // 课程学习人数
                $per_num = $Co_less->where('lesson_id=' . $val['lesson_id'])->getNum();

                $list[$key]['per_num'] = $per_num;


                // 处理更新进度
                $chapter = $Zhang_c->where('lesson_id=' . $val['lesson_id'])->getNum();
                $section = $Xiao_c->where('zh_id=' . $chapter['id'])->getNum();

                $list[$key]['progress'] = '更新至' . $chapter . '-' . $section;


            }
            return $list;
        }




    }
?>