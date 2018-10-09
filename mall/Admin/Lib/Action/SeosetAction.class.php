<?php
	class SeosetAction extends CommonAction{
		public function keywords(){
			if(IS_POST){
				$post = $_POST;
				$m = M("Keyword");
				$data = array(
					'key_name'=>I("post.key_name"),
					'key_url'=>I("post.key_url"),
					'key_style'=>I("post.key_style"),
					'no_follow'=>I("post.no_follow"),
					'match_num'=>I("post.match_num"),
					'new_window'=>I("post.new_window"),
					'addtime'=>time(),
				);
				if($m->add($data)){
					$this->success("保存成功");
				}else{
					$this->error("保存失败");
				}
				
				
				
			}else{
				$m = M("Keyword");
				
				import("ORG.Util.Paged");
				$count = $m->count();
				$page = new Page($count,15);
				$show = $page->show();
				$keywords_data = $m->limit($page->firstRow.','.$page->listRows)->order("id DESC")->select();
				

				$this->assign("page",$show);
				$this->assign("keywords_data",$keywords_data);
			}
			$this->display();
		}
		
		public function edit(){
			if(IS_POST){
				
				$id = I("post.id");
				$m = M("Keyword");
				$data = array(
					'key_name'=>I("post.key_name"),
					'key_url'=>I("post.key_url"),
					'key_style'=>I("post.key_style"),
					'no_follow'=>I("post.no_follow"),
					'match_num'=>I("post.match_num"),
					'new_window'=>I("post.new_window"),
					'updatetime'=>time(),
				);
				if($m->where(array('id'=>$id))->save($data)){
					$this->success("保存成功");
				}else{
					$this->error("保存失败");
				}
				
				
				
			}else{
				//列表取值
				$m = M("Keyword");
				import("ORG.Util.Paged");
				$count = $m->count();
				$page = new Page($count,15);
				$show = $page->show();
				$keywords_data = $m->limit($page->firstRow.','.$page->listRows)->order("id DESC")->select();
				
				//页面取值
				$id = I("get.id");
				$edit_keywords = $m->where(array('id'=>$id))->find();
				$this->assign("edit_keywords",$edit_keywords);
				
				$this->assign("page",$show);
				$this->assign("keywords_data",$keywords_data);
			}
			$this->display();
		}



		public function keywords_ajax(){
			$i = I("get.i");
			$str = '
				<tr class="second_'.$i.'">
                  <th width="100">关键字</th>
                  <td>
                      <input type="text" class="input key_name" name="key_name[]"  placeholder="请输入关键字"/>

                      <a href="javascript:void(0)" class="del" dataid="'.$i.'">删除</a>
                  </td>
                </tr>
                
                <tr class="second_'.$i.'">
                  <th width="100">URL</th>
                  <td>
                      <input type="text" class="input" name="key_url[]" placeholder="请输入URL地址" />
                  </td>
                </tr>

                <tr class="second_'.$i.'">
                  <th width="100">样式</th>
                  <td>
                      <textarea class="keyword_style" name="key_style[]" placeholder="输入CSS样式"></textarea>
                  </td>
                </tr>
			';
			echo $str;
		}
		
		
		public function del(){
			$id = I("get.id");
			if(M("Keyword")->where(array('id'=>$id))->delete()){
				$this->success("删除成功");
			}else{
				$this->success("删除失败");
			}
			
		}
		
		
		
		
		public function upload(){
			if(!empty($_FILES)){
				return $this->_upload();
			}
		
		}
		
		
		//文件上传方法(带缩略图)
		public function _upload(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();// 实例化上传类
			$upload->maxSize  = 3145728 ;// 设置附件上传大小
			$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->savePath =  './Public/Uploads/Siteinfo/';// 设置附件上传目录
			$upload->thumb = true; //设置需要生成缩略图，仅对图像文件有效
			$upload->imageClassPath = 'ORG.Util.Image';//设置引用图片类库包路径
			$upload->thumbPrefix = 'm_,s_';  //生成2张缩略图
			$upload->thumbMaxWidth = '400,100';//最大宽度
			$upload->thumbMaxHeight = '400,100';//最大高度
			$upload->saveRule = uniqid;//设置上传文件规则
			
			
			
			
			
			if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
			}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
			}
		}

		public function cache(){
			$this->display();
		}

		public function ajax_cache(){
			$dir = "./htm/";
			//删除目录下的文件：
			  $dh=opendir($dir);
			  while ($file=readdir($dh)) {
			    if($file!="." && $file!="..") {
			      $fullpath=$dir."/".$file;
			      if(!is_dir($fullpath)) {
			          unlink($fullpath);
			      } else {
			          deldir($fullpath);
			      }
			    }
			  }
			  echo "1";
		}

		public function robots(){
			$filename = "robots.txt";
			if(IS_POST){
				$robots_content = I("post.robots_content");
				file_put_contents($filename,$robots_content);
				$this->success("生成成功！");
			}else{
				$robots_content=file_get_contents($filename);
				$this->assign("robots_content",$robots_content);
			}
			$this->display();
		}

		public function catelist(){
			$m = M("Seo_cate");
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();
			$data = $m->field("id,pid,catename,url,module_name,rules,path,addtime,isshow,concat(path,'-',id) as bpath")->order('bpath')->limit($page->firstRow.','.$page->listRows)->select();
			
			foreach($data as $key=>$value){
					$data[$key]['count']=count(explode('-',$value['bpath']));
			}
			
			if($data){
				$this->assign("data",$data);
				$this->assign("page",$show);
			}
			$this->display();
		}

		public function cateadd(){
			if(IS_POST){
				$m = D("Seo_cate");
				if($m->create()){
					$m->addtime = time();
					if($m->add()){
						if(isset($_POST['submit1'])){
							$this->success("添加成功",U("Seoset/catelist"));
						}else{
							$this->success("添加成功",U("Seoset/cateadd"));
						}
						
					}else{
					$this->error("添加失败");
					}
				}
			}else{
				//绑定数据
				$m = M("Seo_cate");
				$list = $m->field("id,pid,catename,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign("alist",$list);
			}
			$this->display();
		}

		public function catedel(){
			$id = I("get.id");
			$m =M("Seo_cate");
			$count = $m->where("pid=$id")->count();
			if($count>0){
				$this->error("删除失败，该分类下存在子分类");
			}
			if($id>0){
				if($m->where(array('id'=>$id))->delete()){
					$this->success("删除成功");
				}else{
					$this->error("删除失败");
				}
			}
		}

		public function cateedit(){
			if(IS_POST){
					$m = M("Seo_cate");
					if($m->create()){
						$m->updatetime=time();
						
						
						if($m->save()){
							$this->success("修改成功",U("Seoset/catelist"));
						}else
						{
							$this->error("修改失败");
						}
					}else{
						$this->error($m->getError());
					}
					
	
				
				
			}else{
			//数据绑定
				$m = M("Seo_cate");
				$id = I("get.id");
				
				if(isset($id) && $id>0){
					$where['id']=$id;
					$data = $m->where($where)->find();
					$this->assign("data",$data);
				}

				//分类数据
				$list = $m->field("id,pid,catename,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign("alist",$list);


				
			}
		
		
			$this->display();
		}

		public function cache_html(){
			$str="";
			$m = M("Seo_cate");
			$data = $m->where(array('isshow'=>1))->select();
			
			$str.="
			<?
			return array(
			'HTML_CACHE_ON'=>true,

		    'HTML_CACHE_RULES'=>array(
		    ";
		    foreach($data as $v){
		    	$str.="'".$v[module_name].":'=>array('".$v[rules]."',0),";
		    }
			//'Index:index'=>array('{:module}_{:action}',0),
			//'About:index'=>array('{:module}_{:action}',0),
			//'join:newsinfo'=>array('{:module}_{:action}_{id}',0),
			//'News:'=>array('{:module}_{:action}_{id}',0),
			//'Index:'=>array('{:module}_{:action}_{id}',0),
			//'About:'=>array('{:module}_{:action}_{gid}',0),
			//'Join:'=>array('{:module}_{:action}_{gid}',0),
			//'Case:'=>array('{:module}_{:action}_{id}',0),
			//'Product:'=>array('{:module}_{:action}',0),
			//'Contact:'=>array('{:module}_{:action}',0),
			//'News:newsinfo'=>array('{:module}_{:action}_{id}',0),
			//'News:newsinfo'=>array('{:module}_{:action}_{id}',0),
		$str.="),";
		$str.=");";
		$str.="?>";

			
			$filename = './Home/Conf/cache_html.php'; 
			if (!is_writable($filename)) { 
				echo '0';  //文件不可写
			} else { 
				file_put_contents($filename, $str);
				echo '1';
			} 
			
		}

		public function sitemap(){
			$str="";
			$m = M("Seo_cate");
			$data = $m->where(array('isshow'=>1))->select();
			
			$str.='
				<?xml version="1.0" encoding="UTF-8"?>
				<urlset
				      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
				      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
				      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
				            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
				<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->
			';

			foreach($data as $v){
		    	$str.='<url>';
		    	$str.='<loc>'.$v[url].'</loc>';
		    	$str.='</url>';
		    }
		    $str.='</urlset>';

			
			$filename = './sitemap.xml'; 
			if (!is_writable($filename)) { 
				echo '0';  //文件不可写
			} else { 
				file_put_contents($filename, $str);
				echo '1';
			} 
			
		}
	}
?>