<?php
return array(
	//'配置项'=>'配置值'
    // 数据库类型
    'DB_TYPE'   => 'mysql',
    // 服务器地址
    'DB_HOST'   => '127.0.0.1',
    // 数据库名
    'DB_NAME'   => 'articledb',
    // 用户名
    'DB_USER'   => 'root',
    // 密码
    'DB_PWD'    => 'root',
    // 端口
    'DB_PORT'   => 3306,
	
//    // 数据库表前缀
//    'DB_PREFIX' => 'think_',

    // 字符集
    'DB_CHARSET'=> 'utf8',
	'TMPL_CACHE_ON' => false,//禁止模板编译缓存 
    'HTML_CACHE_ON' => false,//禁止静态缓存 
	
	'SESSION_AUTO_START'=>true
	 
//    自动加载公共函数
    //'LOAD_EXT_FILE' => 'function',
);