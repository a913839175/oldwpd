<?php
	class ConclassModel extends Model{
		
		//自动验证
		protected $_validate=array(
			array('conclassname','require','分类名称不能为空'),
			
		);
		
		//自动完成
		protected $_auto=array(
			array('path',"tclm",3,'callback'),
		
		
		);
		
		function tclm(){
		
			$pid = isset($_POST['pid'])?(int)$_POST['pid']:0;
			if($pid==0){
				$data=0;
			}else{
				
				$list=$this->where("id=$pid")->find();
				
				
				$data=$list['path'].'-'.$list['id'];//子类的path为父类的path加上父类的id
			}
			return $data;
		}
	
	
	}
?>