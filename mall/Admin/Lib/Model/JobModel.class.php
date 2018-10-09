<?php
	class JobModel extends Model{
		protected $_validate=array(
			array('jobname','require','招聘职位不能为空'),
			array('orderby','checkNum','排序不能为空且必须是整数',0,callback),
		
		);
		
		protected function checkNum($data){
			if($data=="" || !is_numeric($data)){
				return false;
			}else{
				return true;
			}
		}
	}
	









?>