<?php
    namespace Admin\Model;
    use Think\Model;

    class LecturerModel extends Model{
        public function getAll(){
            $list = $this->select();
    		
    		$exam = array('未考核','考核失败','考核成功');
    		foreach($list as $key=>$val){
    			$list[$key]['exam'] = $exam[ $val['exam'] ];
    		}
    		return $list; 
        }
    }




?>