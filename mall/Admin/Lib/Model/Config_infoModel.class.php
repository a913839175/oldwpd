<?php
	class Config_infoModel extends Model{
		protected $_validate=array(
			array('pic','require','水印图片不能为空'),
		);
		
		
	}
?>