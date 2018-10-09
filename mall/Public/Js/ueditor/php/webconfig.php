<?php
	//编辑器加水印，连接数据库
	$con = mysql_connect("localhost","root","123456");
	mysql_select_db("weixint2",$con);
	mysql_query("set names utf8");
?>