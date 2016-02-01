<?php
    namespace Admin\Model;
    use Think\Model;

    class CategoryModel extends Model{

    	public function getAll(){
    		$list = $this->select();
            //exit;
    		//处理数据√':'×
    		$dis = array('×','√');
    		foreach($list as $key=>$val){
    			$list[$key]['display'] = $dis[$val['display']];
    		}
            //dump($list);
            //exit;

    		return $list;
    	}
    }
?>
