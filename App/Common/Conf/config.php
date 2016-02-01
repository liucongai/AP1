<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'ju_project',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123',          // 密码
    'DB_PREFIX'             =>  'ju_',    // 数据库表前缀

    'SHOW_PAGE_TRACE' 		=>   TRUE,
    'URL_MODEL'				=>   2,
    'UPLOAD_SITEIMG_QINIU' => array (
        'maxSize' => 10000 * 1024 * 1024,
        'rootPath' => './',
        'saveName' => array ('uniqid', ''),
        'driver' => 'Qiniu',
        'driverConfig' => array (
            'secretKey' => '5xQuDy_sh3hnUgu2gN7Ubq8E-JDF2pP_HaA73VpV',
            'accessKey' => 'Lso-ZttN0Z_8Od107ilrC7lJo7psvRWdlgZNcSgB',
            'domain' => 'yanqingju.qiniudn.com',
            'bucket' => 'yanqingju',
        )
    )
);