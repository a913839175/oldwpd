<?php
	class PublicAction extends Action{
		//验证码方法
		public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(4,1,'png',65,22,'code');
		}	
	}
?>