<?php
    
/*
 *  处理开始时间 结束时间转化为时间戳
 * * */

        function changetime($bg){
            $bg2=explode('-',$bg);
            $bgy=$bg2[0];
            $bgm=$bg2[1];
            $bgd=$bg2[2];
            switch ($bgm) {
                case '1':
                    $bgm=January;
                    break;
                case '2':
                    $bgm=February;
                    break;
                case '3':
                    $bgm=March;
                    break;
                case '4':
                    $bgm=April;
                    break;
                case '5':
                    $bgm=May;
                    break;
                case '6':
                    $bgm=June;
                    break;
                case '7':
                    $bgm=July;
                    break;
                case '8':
                    $bgm=August;
                    break;
                case '9':
                    $bgm=September;
                    break;
                case '10':
                    $bgm=October;
                    break;
                case '11':
                    $bgm=November;
                    break;
                case '12':
                    $bgm=December;
                    break;
            }
            $bg=strtotime("$bgd $bgm $bgy");





           return $bg; 
    }




?>
