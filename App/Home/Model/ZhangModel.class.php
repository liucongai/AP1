<?php
    namespace Home\Model;
    use Think\Model;

    class ZhangModel extends Model{


    	public function getNum(){
    		$list = $this->select();

    		$num = count($list);

    		return $num;
    	}

		// 计算总小节数
		public function secnum(){

			$Section = D('Zizhang');

			$list = $this->select();

			$sum = 0;
			foreach($list as $key => $val){

				$sum += $Section->where('zh_id='.$val['id'])->getNum();

			}

			return $sum;

		}

		public function progress(){

			$Xiao = D('Zizhang');

			$list = $this->select();

			$chapter['id']  = array_reverse($list)[0]['id'];

			$section = $Xiao->where('zh_id='.$chapter['id'])->getNum();

			return $section;
		}


    }
?>