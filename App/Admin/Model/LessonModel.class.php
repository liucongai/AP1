<?php
    namespace Admin\Model;
    use Think\Model;

    class LessonModel extends Model{
     
     public function getAll(){
    		$list = $this->select();

		 	$Chapter = D('Zhang');
		 	$Section = D('Zizhang');

            //dump($list);
            //exit;

    		//处理数据
    		$nandu = array('初级','中级','高级');
    		$ls = array('×','√');
    		$state = array('上架','下架');
    		foreach($list as $key=>$val){
    			$list[$key]['nandu'] = $nandu[  $val['nandu']-1 ];

				// 更新时间
    			$slist = $Chapter->where('lesson_id='.$val['id'])->getField('id',true);
				$time = $Section->where('zh_id='.end($slist))->getField('add_time',true);

				$list[$key]['time'] = date('m-d H:i:s',end($time));
    			$list[$key]['state'] = $state[  $val['state'] ];
    		}


    		return $list;
    	}
    }