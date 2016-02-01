<?php
    namespace Home\Model;
    use Think\Model;

    class PlanModel extends Model{

        public function getNum(){

            $list = $this->select();

            $num = count($list);

            return $num;
        }

    	public function getAll(){
    		$list = $this->select();

            foreach($list as $key => $val){
                $list[$key]['desc'] = str_ireplace(',','<br>', substr($list[$key]['desc'], 0, strlen($list[$key]['desc']) - 1));
            }

    		return $list;
    	}
        
        public function deal(){

            $Fimg = D('Fenimg');
            $Co_plan =   D('Collectplan');

            $Plan = D('Plan');

            $list = $this->select();


            foreach ($list as $key => $val) {
                $map_im['lesson_id'] = -($val['id']);
                $list[$key]['path'] = $Fimg->where($map_im)->getField('name');


                $user_id = $_SESSION['home']['id'];

                if($user_id != null) {
                    $data['user_id'] = $user_id;
                    $data['plan_id'] = $val['id'];
                    $Mess = $Co_plan->where($data)->find();

                    if($Mess != null){

                        $list[$key]['name'] = '<i class="learned">已参加</i>'.$val['name'];

                    }

                    $per_num = $Co_plan->where('plan_id='.$val['id'])->getNum();

                    $list[$key]['per_num'] = $per_num;

                    //$list[$key]['cou_num'] = substr_count($val['list'],',');

                    $tmp1 = $Plan->where('pid='.$val['id'])->select();

                    $summ = 0;

                    foreach($tmp1 as $key=>$val ){

                        $tmp2 = $Plan->where('pid='.$val['id'])->select();

                        foreach($tmp2 as $key=>$val){

                            $summ += substr_count($val['list'],',');

                        }
                    }


                }
                $list[$key]['cou_num'] = $summ;


            }

            return $list;
        }

        public function deali(){

            $Fimg = D('Fenimg');

            $list = $this->find();


            $map_im['lesson_id'] = -($list['id']);
            $list['path'] = $Fimg->where($map_im)->getField('name');


            return $list;
        }



        public function pdeal(){


            $Zhang_c = D('Zhang');
            $Le_coll = D('Collectless');

            $info = $this->find();

            $arr = explode(',',$info['list']);

            $sums = 0;

            $prog = 0;

            foreach($arr as $key => $val){

                //计算总小节数
                $sums  += $Zhang_c->where('lesson_id='.$val['id'])->secnum();
                //计算已学小节数
                $data['user_id'] = $_SESSION['home']['id'];
                $data['lesson_id'] = $val['id'];
                $prog += $Le_coll->where($data)->getSum();

            }
            // 进度条

            $persent = ceil(($prog/$sums)*100);

            return $persent;




        }


    }
?>