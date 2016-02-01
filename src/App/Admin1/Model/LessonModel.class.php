<?php
    namespace Admin\Model;
    use Think\Model;

    class LessonModel extends Model{
     
     public function getAll(){
    		$list = $this->select();
            //dump($list);
            //exit;

    		//处理数据
    		$nandu = array('初级','中级','高级');
    		$ls = array('×','√');
    		$state = array('上架','下架');
    		foreach($list as $key=>$val){
    			$list[$key]['nandu'] = $nandu[  $val['nandu']-1 ];
    			$list[$key]['is_hot'] = $ls[  $val['is_hot'] ];
    			$list[$key]['is_new'] = $ls[  $val['is_new'] ];
    			$list[$key]['is_recom'] = $ls[  $val['is_recom'] ];
    			$list[$key]['state'] = $state[  $val['state'] ];
    		}

    		//$dis = array('×','√');
    		//foreach($list as $key=>$val){
    		//	$list[$key]['display'] = $dis[ $val['display'] ];
    		//}
    		return $list;
    	}
    }