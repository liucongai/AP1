<?php
    namespace Home\Model;
    use Think\Model;

    class ZizhangModel extends Model{


    	public function getNum(){
    		$list = $this->select();

    		$num = count($list);

    		return $num;
    	}


    }
?>