<?php
define('APP_NAME','cn');
define('APP_PATH','./cn/');
define('APP_DEBUG',true);
define ( "GZIP_ENABLE", function_exists ('ob_gzhandler'));
// ob_start ( GZIP_ENABLE ? 'ob_gzhandler': null );
define('HTML_PATH', './htm/');//生成静态页面的文件位置 
require("./ThinkPHP/ThinkPHP.php");
?>