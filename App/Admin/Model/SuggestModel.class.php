<?php
    namespace Admin\Model;
    use Think\Model;

    class SuggestModel extends Model{
           public function getAll(){
    		$list = $this->select();
   //dump($list);
            

    		//处理数据
    		$state= array('不显示','显示',);
    		foreach($list as $key=>$val){
    			$list[$key]['state'] = $state[  $val['state'] ];
    		}
    		return $list;


    }
}