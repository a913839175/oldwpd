<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_L_DELIM'=>'<{', //修改左定界符
	'TMPL_R_DELIM'=>'}>', //修改右定界符
	
	'DB_PREFIX'=>'tp_',  //设置表前缀
	'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'hrcf_web', // 数据库名
    'DB_USER'   => 'hrcf_web', // 用户名
    'DB_PWD'    => '7i^53YY$', // 密码
    'DB_PORT'   => 3009, // 端口

//	'TOKEN_ON'=>true,  // 是否开启令牌验证
//	'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
//	'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
//	'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	
	
	
	
	//'DB_DSN'=>'mysql://root:123456@localhost:3306/test', //连接数据库
	'SHOW_PAGE_TRACE'=>false,//开启页面Trace
	"SHUIPF_FIELDS_PATH" => LIB_PATH . "Fields/",//字段地址，位于lib/Fields下
	'TMPL_ACTION_ERROR' => TMPL_PATH.'temp/error.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => TMPL_PATH.'temp/success.html', // 默认成功跳转对应的模板文件
	
	'TMPL_TEMPLATE_SUFFIX' => '.php', //模板后缀
);
?>