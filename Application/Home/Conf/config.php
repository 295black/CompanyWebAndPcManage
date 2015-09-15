<?php
return array(
    'URL_MODEL'		=>	2, // 如果你的环境不支持PATHINFO 请设置为3
    'DB_TYPE'		=>	'mysql',
    'DB_HOST'		=>	'127.0.0.1',
    'DB_NAME'		=>	'db_laboratory',
    'DB_USER'		=>	'root',
    'DB_PWD'		=>	'',
    'DB_PORT'		=>	'3306',
    'DB_PREFIX'		=>	'db_',
    'DEFAULT_TIMEZONE'=>'Asia/Singapore',

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__IMG__'    => __ROOT__ . '/Public/images',
        '__CSS__'    => __ROOT__ . '/Public/css',
        '__JS__'     => __ROOT__ . '/Public/js',
        '__PUBLIC__'     => __ROOT__ . '/Public',
    ),
);