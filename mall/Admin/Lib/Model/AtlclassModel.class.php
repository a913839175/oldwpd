<?php
	class AtlclassModel extends Model{
		protected $_validate=array(
			array('atlclassname','require','分类名称不能为空'),
			array('pic','require','分类图片不能为空'),
		);
		
		
		protected $_auto=array(
			array('path',"tclm",3,'callback'),
			array('addtime','time',3,'function'),
		
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