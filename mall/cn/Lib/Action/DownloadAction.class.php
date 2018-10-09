<?php

class DownloadAction extends CommonAction {

	public function downpass(){
		
		$this->display();
	}

	public function downpass_save(){
		$downpass = I("get.downpass");
		$num = M("Config_info")->where(array('downpass'=>$downpass))->count();
		if($num>0){
			$_SESSION['down_pass']=$downpass;
			echo 1;
		}
		exit;
	}
    public function index(){
    		$down_pass_data = M("Config_info")->find();
			if($_SESSION['down_pass']!=$down_pass_data[downpass]){
				$this->redirect("Download/downpass");
			}
    		import("ORG.Util.Page_en");
			$count = M("Down")->where(array('isshow'=>1,'lang'=>0))->count();
			$page = new page($count,10);

			$data = M("Down")->where(array('isshow'=>1,'lang'=>0))->limit($page->firstRow.','.$page->listRows)->order("orderby asc")->select();
		
			$show = $page->show();
				$this->assign("data",$data);
				$this->assign("page",$show);
			$this->display();
    }
    public function down(){
    		$id = I("get.id","","trim");
			if($id<1){
				$this->error("参数错误");
			}
			$m = M("Down");
			$arr = $m->where("id=$id")->find();
			
			$filename = $arr['filecontent'];
			$realarr = explode(".",$filename);
			$realname = $arr['filename'].".".$realarr[count($realarr)-1];
			
			
			$filepath = './Public/Uploads/Down/File/'.$filename;
			if(!file_exists($filepath)){
				$this->error("文件不存在");
			}
			
			
			//解决不同浏览器下载中文乱码问题
			$ua = $_SERVER["HTTP_USER_AGENT"]; 
			 $encoded_realname = urlencode($realname);
			 $encoded_realname = str_replace("+", "%20", $encoded_realname);  
			
			header('Content-Type: application/octet-stream');
			if(preg_match("/MSIE/", $ua)){
				header('Content-Disposition: attachment; filename="' . $encoded_realname . '"');  
			} else if (preg_match("/Firefox/", $ua)){
				header('Content-Disposition: attachment; filename*="utf8\'\'' . $realname . '"');  
			} else {  
			header('Content-Disposition: attachment; filename="' . $realname . '"');   
			}  
			readfile($filepath);
			exit;
    }
}