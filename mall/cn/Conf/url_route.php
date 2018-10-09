<?php
	return array(
			'URL_ROUTER_ON'=>true,
		    'URL_ROUTE_RULES'=>array(
			//'/^a_(\w+)$/'=>'Index/index?id=:1',
			'index'=>'Index/index',
			'spider'=>'Index/spider',
			'/^about$/'=>'About/index',
			'c'=>'Join/index',
			'd'=>'Case/index',
			'e'=>'Product/index',
			'new'=>'News/index',
			'g'=>'Contact/index',
			'/^b_(\d+)$/'=>'About/index?gid=:1',
			'/^c_(\d+)$/'=>'Join/index?gid=:1',
			'/^c_f$/'=>'Join/feed',
			'/^d_(\d+)$/'=>'Case/index?id=:1',
			'/^e_(\d+)$/'=>'Product/index?id=:1',
			//'/^f_(\d+)$/'=>'News/newsinfo?id=:1',
			//'news/:year/:month/:day/:id'=>'News/newsinfo?id=:1',
			'/^news\/(\d+)\/(\d+)\/(\d+)\/(\d+)$/'=>'News/newsinfo?year=:1&month=:2&day=:3&id=:4',
		),
	);

?>