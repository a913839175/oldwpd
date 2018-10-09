<?php
$config = array(
	//'配置项'=>'配置值'
	
	'URL_MODEL' => '3',

//	'TOKEN_ON'=>true,  // 是否开启令牌验证
//	'TOKEN_NAME'=>'__hash__',    // 令牌验证的表单隐藏字段名称
//	'TOKEN_TYPE'=>'md5',  //令牌哈希验证规则 默认为MD5
//	'TOKEN_RESET'=>true,  //令牌验证出错后是否重置令牌 默认为true
	
	
	
	
	//'DB_DSN'=>'mysql://root:123456@localhost:3306/test', //连接数据库
	'SHOW_PAGE_TRACE'=>false,//开启页面Trace
//	'SHOW_PAGE_TRACE'       =>  true,
	"SHUIPF_FIELDS_PATH" => LIB_PATH . "Fields/",//字段地址，位于lib/Fields下
	'TMPL_ACTION_ERROR' => TMPL_PATH.'temp/error.html', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => TMPL_PATH.'temp/success.html', // 默认成功跳转对应的模板文件
	
	'TMPL_TEMPLATE_SUFFIX' => '.php', //模板后缀
	
	
);
return array_merge(include './conf/conf.php',$config);
?>