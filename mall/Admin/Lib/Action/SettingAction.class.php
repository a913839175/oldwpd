<?php
	//参数设置
	class SettingAction extends CommonAction{
		//是否开启水印
		//1开启 0关闭
		public function index(){
			if(IS_POST){
				$post = I("post.");
				
				if($post['is_watermark']==1  && $post['pic']==""){
					$this->error("水印图片不能为空");
				}
				
				$m = M("Config_info");
				if($m->create()){
					$m->updatetime=time();
					if($post['is_watermark']==0){
						$m->watertype=0;
						//$m->waterpic='';
						$m->waterword='';
					}else{
						if($post['watertype']==0){
							
							$m->waterpic=$post['pic'];
							$m->waterword='';
						}else{
							$m->waterpic='';
							$m->waterword=$post['waterword'];
						}
					}
					if($post['isstatic']==1){
						$m->static_connector=$post['static_connector'];
					}else{
						$m->static_connector='/';
					}
					$strconnector = $m->static_connector;
					
					if($m->save()){
						$this->urlconfig($strconnector);//修改urlconfig文件
						$this->success("设置成功");
					}else{
						$this->error("设置失败");
					}
				}else{
					$this->error($m->getError());
				}
				
				
			}else{
				$m = M("Config_info");
				$data = $m->find();
				$this->assign("data",$data);
			}
			$this->display();
		}
		
		//图片上传ajax
		public function Imgajax(){
			$maxwidth = $_POST['maxwidth'];
			$maxheight = $_POST['maxheight'];
			
			$this->maxwidth = $maxwidth;
			$this->maxheight = $maxheight;
			
			$info = $this->_upload();
			echo json_encode($info[0]);
		}
		
		
		//文件上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Setting/';// 设置附件上传目录
			$upload->thumb = true; //设置需要生成缩略图，仅对图像文件有效
			$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			$upload->thumbRemoveOrigin=true;//上传成功后删除原图
			
			$upload->thumbPrefix = 's_';  //生成1张缩略图
			
			//查询设置的最大高度、宽度
			
			if($this->maxwidth=="" && $this->maxheight ==""){
				$upload->thumbMaxWidth = '100';//最大宽度
				$upload->thumbMaxHeight = '100';//最大高度
			}else{
				$upload->thumbMaxWidth = $this->maxwidth;//最大宽度
				$upload->thumbMaxHeight = $this->maxheight;//最大高度
			}
			
			$upload->saveRule = uniqid;//设置上传文件规则
		
			
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
			}
		}
		
		//讲配置信息，写入home的config中
		public function urlconfig($str){
			$strcontent = file_get_contents("./Public/Xml/urlconfig.php");
			$strreplace = str_replace("<>",$str,$strcontent);
			file_put_contents("./Home/Conf/urlconfig.php",$strreplace); //写入前台urlconfig中
		}
		
		//批量导入
		public function batch_import(){
			$this->display();
		}

		//批量导入新闻ajax
		public function batchnews_ajax(){
			$data = M("Content")->select();
			$num=0;//标记
			foreach($data as $vo){
				if($vo[sjprocon]=="" && $vo[concon]!=""){
					$result = M("Content")->where(array('id'=>$vo[id]))->save(array('sjprocon'=>$vo[concon]));
					if($result !== false){
						$num++;
					}
				}
				
			}
			echo $num;
		}
		
		//批量导入产品ajax
		public function batchpro_ajax(){
			$data = M("Product")->select();
			$num=0;//标记
			foreach($data as $vo){
				if($vo[sjprocon]=="" && $vo[procontent]!=""){
					$result = M("Product")->where(array('id'=>$vo[id]))->save(array('sjprocon'=>$vo[procontent]));
					if($result !== false){
						$num++;
					}
				}
				
			}
			echo $num;
		}

		//批量导入单页面ajax
		public function batchdan_ajax(){
			$data = M("Pacontent")->select();
			$num=0;//标记
			foreach($data as $vo){
				if($vo[sjpacon]=="" && $vo[pacon]!=""){
					$result = M("Pacontent")->where(array('id'=>$vo[id]))->save(array('sjpacon'=>$vo[pacon]));
					if($result !== false){
						$num++;
					}
				}
				
			}
			echo $num;
		}

		public function product_import(){
			$this->display();
		}

		//中英文复制页面ajax
		public function productimport_ajax(){
			$left_lan = I("get.left_lan");
			$right_lan = I("get.right_lan");
			$all_arr = M("Product")->where(array('lang'=>$left_lan))->select();
			$i = 0;
			foreach($all_arr as $vo){
				

				//复制数据
				$data1 = M("Product")->where(array('id'=>$vo[id]))->find();
				$data1['lang']=$right_lan;
				$data1['id']="";
				$addnum = M("Product")->add($data1);
				if($addnum){
					$i++;
					//复制关联图片
					$img_arr = M("Img")->where(array('proid'=>$vo[id]))->select();
					foreach ($img_arr as $key => $value) {
						$img_data1['proid']=$addnum;
						$img_data1['img']=$value['img'];
						$img_data1['thumb_img1']=$value['thumb_img1'];
						$img_data1['thumb_img2']=$value['thumb_img2'];
						M("Img")->add($img_data1);
					}
				}
			}
			echo $i;
		}

		public function setlang(){
			$act = I("get.act");
			$m = M("Lang");
			if($act==""){
				$act='add';
			}
			switch ($act) {
				case 'add':
					//排序
					$orderby = M("Lang")->order("orderby DESC")->limit(1)->find();
				
					if($orderby){
						$orderbydata=$orderby[orderby]+1;
					}else{
						$orderbydata=1;
					}
					$this->assign("orderbydata",$orderbydata);
					break;
				case 'addsave':
					$lang_name = I("post.lang_name");
					$lang_val = I("post.lang_val");
					$isshow = I("post.isshow");
					$orderby = I("post.orderby");

					if($lang_name==""){
						$this->error("名称不能为空");
					}
					if($lang_val==""){
						$this->error("值不能为空");
					}
					if($m->add(array('lang_name'=>$lang_name,'lang_val'=>$lang_val,'isshow'=>$isshow,'orderby'=>$orderby,'addtime'=>time()))){
						$this->success("添加成功");
					}else{
						$this->error("添加失败");
					}

					break;
				case 'edit':
					$id = I("get.id");
					$editdata = $m->where(array('id'=>$id))->find();
					$this->assign("editdata",$editdata);
					break;
				case 'editsave':
					$editid = I("post.editid");
					$lang_name = I("post.lang_name");
					$lang_val = I("post.lang_val");
					$isshow = I("post.isshow");
					$orderby = I("post.orderby");

					if($lang_name==""){
						$this->error("名称不能为空");
					}
					if($lang_val==""){
						$this->error("值不能为空");
					}
					if($m->where(array('id'=>$editid))->save(array('lang_name'=>$lang_name,'lang_val'=>$lang_val,'isshow'=>$isshow,'orderby'=>$orderby,'updatetime'=>time()))){
						$this->success("修改成功");
					}else{
						$this->error("修改失败");
					}
					break;
				case 'del':
					$id = I("get.id");
					if($m->where(array('id'=>$id))->delete()){
						$this->success("删除成功");
					}else{
						$this->error("删除失败");
					}
				break;

				default:
					# code...
					break;
			}
			$data = $m->order("orderby asc")->select();
			$this->assign("data",$data);

			$this->display();
		}

		//公共静态方法，获取语言，可供其他页面调用
		public static function getLang(){
			$lang_data = M("Lang")->where(array('isshow'=>1))->order("orderby asc")->select();
			return $lang_data;
		}
	}
?>