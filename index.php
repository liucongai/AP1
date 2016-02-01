<?php
	header("content-type:text/html;charset=utf-8");
	
    //定义项目目录
    define('APP_PATH','./App/');

    //开启调试模式
    define('APP_DEBUG',True);

    //关闭目录安全文件
    define('BUILD_DIR_SECURE', false);

    //包含框架主入口
    require './ThinkPHP/ThinkPHP.php';
    //require 'vendor/autoload.php';
    //require 'path_to_sdk/vendor/autoload.php';
?>
