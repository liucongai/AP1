<?php

/** 
 * 验证码检查 
 */  
function check_verify($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
}  
    
/*
 *  处理职业
 * * */

        function myjob($job){
           
            switch ($job) {
                case '1':
                    $job='页面重构设计';
                    break;
                case '2':
                   $job='交互设计师';
                    break;
                case '3':
                    $job='产品经理';
                    break;
                case '4':
                     $job='UI设计师';
                    break;
                case '5':
                    $job='JS工程师';
                    break;
                case '6':
                    $job='Web前端工程师';
                    break;
                case '7':
                    $job='移动开发工程师';
                    break;
                case '8':
                    $job='PHP开发工程师';
                    break;
                case '9':
                    $job='软件测试工程师';
                    break;
                case '10':
                     $job='Linux系统工程师';
                    break;
                case '11':
                     $job='JAVA开发工程师';
                    break;
                case '12':
                     $job='学生';
                     break;
                case '13':
                     $job='其他';
                    break;
            }
           
           return  $job; 
    }



?>
