<?php
	class ProductAction extends CommonAction{
		//产品列表

		public function plist(){
		if(IS_POST){
			$searchtype = $_REQUEST[searchtype];
			$keyword = $_REQUEST[keyword];
			$isshow = $_REQUEST[isshow];
			$isrecom = $_REQUEST[isrecom];
			$cid = $_REQUEST[cid];
			$lang = $_REQUEST[lang];
			$income_front = $_REQUEST[income_front];
			if($searchtype==1 && $keyword!=""){
				$where2['proname']=array("like","%".$keyword."%");
			}else if($searchtype==2 && $keyword!=""){
				$where2['procontent']=array("like","%".$keyword."%");
			}
			if($isshow!=2){
				$where2['isshow']=$isshow;
			}
			if($isrecom!=2){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0){
				$where2['cid']=$cid;
			}
			if($lang!=2){
				$where2['tp_product.lang']=$lang;
			}
                        if($income_front!=2){
				$where2['tp_product.income_front']=$income_front;
			}
			$m = M("Product");
			import("ORG.Util.Paged");
			$count = $m->where($where2)->count();//总条数
			
			$page = new Page($count,20);

			foreach($where2 as $key=>$val) {
			    $page->parameter .="$key=".urlencode($val).'&';
			}
			$show = $page->show();


			$data = $m->order("orderby asc")->where($where2)->join('tp_proclass on tp_proclass.id=tp_product.cid')->field('tp_proclass.proclassname,tp_product.*')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign("data",$data); //列表数据绑定
			$this->assign("page",$show);
			
			$n = M("Proclass");
				
				$dataclass = $n->where("audit=1")->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dat',$dataclass); //查询条件绑定
				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
		
		}else{

			$searchtype = I("get.searchtype");
			$keyword = I("get.keyword");
			$isshow = I("get.isshow");
			$isrecom = I("get.isrecom");
			$cid = I("get.cid");
			$lang = I("get.tp_product_lang");

			
			if($searchtype==1 && $keyword!=""){
				$where2['proname']=array("like","%".$keyword."%");
			}else if($searchtype==2 && $keyword!=""){
				$where2['procontent']=array("like","%".$keyword."%");
			}
			if($isshow!=2 && $isshow!=""){
				$where2['isshow']=$isshow;
			}
			if($isrecom!=2 && $isrecom!=""){
				$where2['isrecom']=$isrecom;
			}

			if($cid!=0 && $cid!=""){
				$where2['cid']=$cid;
			}
			if($lang!=2 && $lang!=""){
				$where2['tp_product.lang']=$lang;
			}

			$m = M("Product");
			import("ORG.Util.Paged");//导入分页类
			$count = $m->where($where2)->count();
			$page = new Page($count,20);
			$show = $page->show(); //分页显示输出


			$data = $m->where($where2)->order("orderby asc")->join('tp_proclass on tp_product.cid = tp_proclass.id')->field('tp_proclass.proclassname,tp_product.* ')
			->limit($page->firstRow.','.$page->listRows)->select();
			
			$this->assign("data",$data);  //列表绑定
			$this->assign('page',$show);// 赋值分页输出

				$n = M("Proclass");
				$where['audit']=1;
				
				$dataclass = $n->where($where)->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign('dat',$dataclass); //查询条件绑定

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
		}
		
			
				$this->display();
		}
		
		//产品添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数错误");
				}
				if(empty($post[proname])){
					$this->error("产品名称不能为空");
				}
				
				
				$cid = I("post.cid");
				$count = M("Proclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("产品排序不能为空且必须是整数");
				}
                                //产品处理
				if($_POST['pro_product']!=NULL){
                                    foreach($_POST['pro_product'] as $k=>$v){
                                        $pro_product=$pro_product.$v.",";
                                    }
                                   $post['pro_product'] = substr($pro_product,0,strlen($pro_product)-1);//适用产品
                                }
				$m = M("Product");
				$m->create();
				if($_FILES){
					
					
				
				
					$info = $this->upload();  //加载upload方法
					$m->prophoto=$info[0][savename];
					$m->prothumb1="s_".$info[0][savename];
					$m->prothumb2="m_".$info[0][savename];
					
					//加水印
					$settingimg = M("Config_info")->find();
					//判断是否开启
					if($settingimg[is_watermark]==1 && $settingimg[waterpic]!=""){
						import('ORG.Util.Imaged');
						$image = new Imaged();
						
						//添加水印  原图片,水印图片,添加后图片名,水印透明度,定位：
						/*
						*0 右下角
						*1 居中
						*2 左上角
						*3 右上角
						*4 左下角
						*/
						//$postnum = M("Config_info")->field("position")->find();//取得位置字段
						$image->water('./Public/Uploads/Product/'.$info[0]['savename'],'./Public/Uploads/Setting/'.$settingimg[waterpic],'',80,$settingimg[position]);
					}
					
				
				}
				
				
				
				$m->addtime = time();
//				TODO 添加时 修改时间不为空 2016/1/12 BY 小施
				$m->updatetime=time();

				$m->sjprocon=$_POST['sjprocon'];

				//标签添加
				$tag_all_arr = $_POST[tag_name1];
				$m->tag_id=implode(",", $tag_all_arr);
				$m->pro_product=$post['pro_product'];
				$add_pro_id = $m->add();

				if($add_pro_id){
					if(isset($_POST['submit1'])){
						
						$this->success("添加成功",U("Product/plist"));
					}else{
						$protypedata = M("Product")->where("id=$add_pro_id")->find();
						
						$this->success("添加成功",U("Product/add",array('ccid'=>$protypedata[cid],'llang'=>$protypedata[lang])));
					}
					
				}else{
					$this->error("添加失败");
				}
			}else{
				
				
				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				
				//$this->Value='';//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				
				//初始绑定数据
				$m = M("Proclass");
				$where['audit']=1;
				
				$dataclass = $m->where($where)->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$orderby1 = M("Product")->order("orderby DESC")->limit(1)->find();
				
				if($orderby1){
					$orderbydata=$orderby1[orderby]+1;
				}else{
					$orderbydata=1;
				}
				
				//调用Content模块的getAllField方法 有参 2代表产品  获得数组
				//$zdydata = R('Content/getAllField',array("2"));
				
				//dump($zdydata);
				//$this->assign('zdydata',$zdydata);
				$this->assign('dataclass',$dataclass);
				$this->assign("orderbydata",$orderbydata);
				//标签赋值
				$tag_data_new = M("Tag")->where(array('type'=>2))->select();
				$this->assign("tag_data_new",$tag_data_new);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
			}
			$this->display();
			
			
		}
		//自定义字段ajax_添加
		public function add_custom_ajax(){
			$cid = I("get.cid");
			$bool = M("Proclass")->where("pid=$cid")->find();
			if($bool){
				echo "0";
			}else{
				$num_i=time();//加入时间戳，保证id每次都不重复
				$zdydata = $this->getAllField(2,$cid,$num_i);
				echo json_encode($zdydata);
			}
			
			
		}
		
		//产品修改
		public function edit(){
			if(IS_POST){
				$post = I("post.");
				
				$files = $_FILES;
				if(empty($post)){
					$this->error("参数错误");
				}
				if(empty($post[proname])){
					$this->error("产品名称不能为空");
				}
				
				$cid = I("post.cid");
				$count = M("Proclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
				}
				
				if(!is_numeric($post[orderby]) || $post[orderby]==""){
					$this->error("产品排序不能为空且必须是整数！");
				}
                                //产品处理
				if($_POST['pro_product']!=NULL){
                                    foreach($_POST['pro_product'] as $k=>$v){
                                        $pro_product=$pro_product.$v.",";
                                    }
                                   $post['pro_product'] = substr($pro_product,0,strlen($pro_product)-1);//适用产品
                                }
				$m = M("Product");
				$m->create();
				
				
				if(!empty($files['prophoto'])){
					$info = $this->upload();
					$m->prophoto=$info[0]['savename'];
					$m->prothumb1="s_".$info[0]['savename'];
					$m->prothumb2="m_".$info[0]['savename'];
					
					//加水印
					$settingimg = M("Config_info")->find();
					//判断是否开启
					if($settingimg[is_watermark]==1 && $settingimg[waterpic]!=""){
						import('ORG.Util.Imaged');
						$image = new Imaged();
						
						//添加水印  原图片,水印图片,添加后图片名,水印透明度,定位：
						/*
						*0 右下角
						*1 居中
						*2 左上角
						*3 右上角
						*4 左下角
						*/
						//$postnum = M("Config_info")->field("position")->find();//取得位置字段
						$image->water('./Public/Uploads/Product/'.$info[0]['savename'],'./Public/Uploads/Setting/'.$settingimg[waterpic],'',80,$settingimg[position]);
					}
					
					
					
				}else{
					if($post['isphoto']==0){
					$m->prophoto="";
					$m->prothumb1="";
					$m->prothumb2="";
					}
				}

                                
				$m->updatetime=time();
				$m->sjprocon=$_POST['sjprocon'];
                                $m->pro_product=$post['pro_product'];
				//标签修改
					$tag_all_arr = $_POST[tag_name1];
					$m->tag_id=implode(",", $tag_all_arr);

				if($m->save()){
					$this->success("修改成功",U("Product/plist",array("p"=>$_POST['p'])));
				}else{
					$this->error("修改失败");
				}
			
			}else{
				
			
			
				//初始页面数据绑定
				$id = I("get.id");
				$m = M("Product");
				$data = $m->where(array('id'=>$id))->find();
				if($data['pro_product']!=""){
                                    $data['pro_product']=explode(',',$data['pro_product']);
                                }
				
				
				
				//编辑器
				//vendor("Fckeditor.fckeditor");	
				//$editor= new FCKeditor(); //实例化FCKeditor对象 
				//$editor->Width='408';//设置编辑器实际需要的宽度。此项省略的话，会使用默认的宽度。 
				//$editor->Height='262';//设置编辑器实际需要的高度。此项省略的话，会使用默认的高度。
				//$editor->ToolbarSet="Basic";
				//if($data['issj']==0){
				//	$editor->Value="";
				//}else{
				//	$editor->Value=$data['sjprocon'];//设置编辑器初始值。也可以是修改数据时的设定值。可以置空。
				//}
					
				//$editor->InstanceName='sjeditor';
				//$html=$editor->Createhtml();//创建在线编辑器html代码字符串,并赋值给字符串变量$html. 
				//$this->assign('html',$html);//将$html的值赋给模板变量$html.在模板里通过{$html}可以直接引用
				
				
				//相关新闻绑定值
				$othernewswhere['id']=array("in",$data[othernews]);
				$othernewsdata = M("Content")->where($othernewswhere)->select();
				foreach($othernewsdata as $key=>$v){
					$othernewsdata[$key]=$v[title];
				}
				$othernewsstr = implode("<br>",$othernewsdata);
				$this->assign("othernewsstr",$othernewsstr);
				
				
				//相关产品绑定值
				$otherprowhere['id']=array("in",$data[otherpro]);
				$otherprodata = $m->where($otherprowhere)->select();
				foreach($otherprodata as $key=>$v){
					$otherprodata[$key]=$v[proname];
				}
				$otherprostr = implode("<br>",$otherprodata);
				$this->assign("otherprostr",$otherprostr);
				
				//相关下载绑定值
				$otherdownwhere['id']=array("in",$data[otherdown]);
				$otherdowndata = M("Down")->where($otherdownwhere)->select();
				foreach($otherdowndata as $key=>$v){
					$otherdowndata[$key]=$v[filename];
				}
				$otherdownstr = implode("<br>",$otherdowndata);
				$this->assign("otherdownstr",$otherdownstr);

				//相关题库绑定值
				$otheranswerwhere['id']=array("in",$data[otheranswer]);
				$otheranswerdata = M("Answertype")->where($otheranswerwhere)->select();
				foreach($otheranswerdata as $key=>$v){
					$otheranswerdata[$key]=$v[typeName];
				}
				$otheranswerstr = implode("<br>",$otheranswerdata);
				$this->assign("otheranswerstr",$otheranswerstr);
				
				
				$n = M("Proclass");
				
				$dataclass = $n->where("audit=1")->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}

				//当前新闻的标签
				$news_tag_data = M("Tag")->where(array('id'=>array('in',$data[tag_id])))->select();
				$this->assign("news_tag_data",$news_tag_data);
				
				//调用Content模块的editAllField方法 有参 2代表产品  获得数组
				
				//$zdydata = R('Content/editAllField',array($data,'2'));
				
				$this->assign('data',$data);
				$this->assign('dataclass',$dataclass);
				//$this->assign('zdydata',$zdydata);

				//标签赋值
				$tag_data_new = M("Tag")->where(array('type'=>2))->select();
				$this->assign("tag_data_new",$tag_data_new);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);

			}
		
		
			$this->display();
		
		}
		//自定义字段ajax_修改
		public function edit_custom_ajax(){
			$cid = I("get.cid");//取得产品分类id
			
			$bool = M("Proclass")->where("pid=$cid")->find();
			if($bool){
				echo "0";
			}else{
				$id = I("get.id"); //取得产品id
				$num_i=time();//取得时间戳，保证id不重复
				$data = M("Product")->where(array('id'=>$id))->find();
				$zdydata = $this->editAllField($data,1,$cid,$num_i);
				echo json_encode($zdydata);
			}
			
			
		}
		
		
		//产品删除
		public function delete(){
			$id = I("get.id");
			if($id>0){
				$m = M("Product");
				$del = $m->where(array('id'=>$id))->limit(1)->delete();
				if($del){
					$this->success("删除成功",U("Product/plist"));
				}else{
					$this->error("删除失败");
				}
			}
		
		}
		
		//产品排序
		public function orderby(){
			if(IS_POST){
				$post=$_POST;
				if(empty($post) || $post==""){
					$this->error("没有数据，不能排序");
				}
				//dump($_POST);
				
				
				$orderarr = $post[orderby][order];
				$idarr = $post[orderby][id];
				for($i=0;$i<count($orderarr);$i++){
							$id = $idarr[$i];
							$data['orderby']=$orderarr[$i];
							M("Product")->where("id=$id")->save($data);
				}
				$this->success("排序成功");
				
			}
		}
		
		//是否显示
		public function isshow(){
			$id = I("get.id");
			$isshow = I("get.isshow");
			
			if(isset($id) && $id>0){
				$m = M("Product");
				$where['id']=$id;
				$data['isshow']=$isshow;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Product/plist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		
		//是否推荐
		public function isrecom(){
			$id = I("get.id");
			$isrecom = I("get.isrecom");
			if(isset($id) && $id>0){
				$m = M("Product");
				$where['id']=$id;
				$data['isrecom']= $isrecom;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Product/plist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		//是否精选
		public function jingxuan(){
			$id = I("get.id");
			$jingxuan = I("get.pro_jingxuan");
			
			if(isset($id) && $id>0){
				$m = M("Product");
				$where['id']=$id;
				$data['pro_jingxuan']=$jingxuan;
				$boo = $m->where($where)->save($data);
				if($boo){
					$this->success("操作成功",U("Product/plist"));
				}else{
					$this->error("操作失败");
				}
			}
		}
		
		//分类ajax
		public function ajax(){
			$cid = I("get.cid");
				$count = M("Proclass")->where("pid=$cid")->count();
				if($count>0){
					echo "0";
				}else{
					echo "1";
				}
			
		}
		
		//分类ajax1
		public function ajax1(){
			$id = I("get.id");
			$proid = I("get.proid");
			if($id==0){
			exit;
			}
			
			if($id>0){
				$m = M("Proclass");
				$where['audit']=1;
				$where['pid']=$id;
				$arr = $m->where($where)->select();
				if(empty($arr)){
				exit;
				}
				
				$da = M("Product")->where("id=$proid")->limit(1)->find();//获取产品信息
				
				$str = "<select id=\"sele2\" name=\"sele2\">";
				foreach($arr as $v){
				if($v['id']==$da['cid']){
					$str.="<option value=\"$v[id]\" selected=\"selected\">".$v['proclassname']."</option>";
				}else{
					$str.="<option value=\"$v[id]\">".$v['proclassname']."</option>";
				}
					
				
				}
				$str.="</select>";
				echo $str;
			}
			
		}
		
		//文件上传
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
			$upload->savePath =  './Public/Uploads/Product/';// 设置附件上传目录
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
			 
		//批量删除
		public function pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Product");
			$where['id']=array("in",$str);
			if($m->where($where)->delete()){
				echo "1";
			}else{
				echo "0";
			}
		}
		//批量显示
		public function plshow(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Product");
			
			$where['id']=array("in",$str);
			$data['isshow']=1;
			$data['updatetime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
		}
		
		//批量隐藏
		public function plhidden(){
		
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Product");
			
			$where['id']=array("in",$str);
			$data['isshow']=0;
			$data['updatetime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
		}
		
		//批量移动
		public function list_class(){
			
			if(IS_POST){
			$lang = I("post.lang");
			$str = I("post.str");
			$str = $str."0";//补0
			$m = M("Product");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Proclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			$where['id']=array("in",$str);
			$data1['cid']=$cid;
			$data1['lang']=$lang;
			$data1['updatetime']=time();
			if($m->where($where)->save($data1)){
				$this->success("移动成功");
				
			}else{
				$this->error("移动失败");
			}
			
			}else{
				//绑定分类
				$m = M("Proclass");
				$data = $m->select();
				$list = $m->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
			}
			
			
			$this->display();
			
		}
		
		//批量复制
		public function list_class2(){
			
			if(IS_POST){
			$str = I("post.str");
			$str = $str."0";//补0
			$m = M("Product");

			$lang = I("post.lang");
		
			$cid = I("post.cid");
			if($cid=="" || !isset($cid)){
				$this->error("必须要选择一项");
			}
			$count = M("Proclass")->where("pid=$cid")->count();
				if($count>0){
					$this->error("该分类不是终极分类，操作失败");
			}
			
			
			$arr = explode(",",$str);
			
			$i=0;
			foreach($arr as $v){
					
				if($v!=0){
					$data1 = $m->where("id=$v")->find();
					$data1['cid']=$cid;
					$data1['id']="";
					$data1['lang']=$lang;
					//$data1['addtime']=time();
					//$data1['updatetime']="";
					if($m->add($data1)){
						$i=$i+1;
					}
					
				}
			}
			if($i>0){
				$this->success("共有".$i."个复制成功");
			}else
			{
				$this->error("复制失败");
			}
			
			
			
			
			exit;
			
			
			
			}else{
				//绑定分类
				$m = M("Proclass");
				$data = $m->select();
				$list = $m->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($list as $key=>$value){
					$list[$key]['count']=count(explode('-',$value[bpath]));
				}
				$this->assign("alist",$list);

				//语言版本取值
				$lang_data = SettingAction::getLang();
					
				$this->assign("lang_data",$lang_data);
			}
			
			
			$this->display();
			
		}
		
		//快速编辑产品显示
		public function quickedit(){
			
				$id = I("get.id","","trim");
				if($id==""){
					$this->error("参数错误");
				}
				$data = M("Product")->where("id=$id")->find();
				$this->assign("data",$data);
				$this->display();
			
		}
		//快速编辑产品保存
		public function quickeditsave(){
				$proid = I("get.proid","","trim");
				$proname = I("get.proname","","trim");
				
				if($proname==""){
					$this->redirect("Product/quickedit");
				}
				
				$dat['proname']=$proname;
				$dat['updatetime']=time();
				$proquickbool = M("Product")->where("id=$proid")->save($dat);
				
				if($proquickbool){
					echo "1";
					
				}else{
					echo "0";
				}
		
		}

		//批量翻译
		
		// public function plTrans(){
		// 	$str = I("post.str");
		// 	$str = $str."0";//补0
		// 	$trans_arr = M("Product")->where(array('lang'=>1,'id'=>array('in',$str)))->select();

		// }

		// public function baidu_trans(){
		// 	$cnstr = "我叫徐宁";
		// 	$ch = curl_init();
		//     $url = 'http://apis.baidu.com/apistore/tranlateservice/dictionary?query=我叫徐宁&from=zh&to=en';
		//     $header = array(
		//         'apikey: 901305be75dd3468a95e036887ac3efc',
		//     );
		//     // 添加apikey到header
		//     curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
		//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//     // 执行HTTP请求
		//     curl_setopt($ch , CURLOPT_URL , $url);
		//     $res = curl_exec($ch);

		//     $arr = json_decode($res,true);
		//     if($arr[errNum]==0 && ){
		//     	$means = $arr[retData][dict_result][symbols][0][parts][0][means][0];
		//     	//return $means;
		//     }
		//     print_r($arr);
		// }
		
		
		//产品预览（模型预览）
		public function preview(){
			if(IS_POST){
				
			}else{
				
				
				
				
				
				//初始绑定数据
				$m = M("Proclass");
				$where['audit']=1;
				
				$dataclass = $m->where($where)->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
				}
				//调用Content模块的getAllField方法 有参 2代表产品  获得数组
				$zdydata = R('Content/getAllField',array("2"));
				
				//dump($zdydata);
				$this->assign('zdydata',$zdydata);
				$this->assign('dataclass',$dataclass);
				
			}
			$this->display();
			
			
		}
		
		
		//相关新闻
		public function other_news(){
			if(IS_POST){
				//初始绑定数据(分类)
				$m = M("Conclass");
				$where['isshow']=1;
				$dataclass = $m->where($where)->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				//绑定初始数据（产品）
				$cid = I("get.cid","","trim");
				$searchtype = I("post.searchtype");
				$keyword = I("post.keyword");
				
				if($searchtype==1 && $keyword!=""){
					$conwh['title']=array("like","%".$keyword."%");
				}else if($searchtype==2 && $keyword!=""){
					$conwh['concon']=array("like","%".$keyword."%");
				}
				if($cid!=""){
					$conwh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Content")->where($conwh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datacon = M("Content")->order("orderby asc")->where($conwh)
				->join('tp_conclass on tp_conclass.id=tp_content.cid')
				->field('tp_conclass.conclassname,tp_content.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datacon",$datacon);
				$this->assign("page",$show);
			}else{
				//初始绑定数据(分类)
				$m = M("Conclass");
				$where['isshow']=1;
				$dataclass = $m->where($where)->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				//绑定初始数据（新闻）
				$cid = I("get.cid","","trim");
				if($cid!=""){
					$conwh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Content")->where($conwh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datacon  = M("Content")->order("orderby asc")->where($conwh)
				->join('tp_conclass on tp_conclass.id=tp_content.cid')
				->field('tp_conclass.conclassname,tp_content.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datacon",$datacon);
				$this->assign("page",$show);
			}
			$this->display();
		}
		
		
		//相关产品
		public function other_pro(){
			if(IS_POST){
				//初始绑定数据(分类)
				$m = M("Proclass");
				$where['audit']=1;
				$dataclass = $m->where($where)->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				//绑定初始数据（产品）
				$cid = I("get.cid","","trim");
				$searchtype = I("post.searchtype");
				$keyword = I("post.keyword");
				
				if($searchtype==1 && $keyword!=""){
					$prowh['proname']=array("like","%".$keyword."%");
				}else if($searchtype==2 && $keyword!=""){
					$prowh['procontent']=array("like","%".$keyword."%");
				}
				if($cid!=""){
					$prowh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Product")->where($prowh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datapro  = M("Product")->order("orderby asc")->where($prowh)
				->join('tp_proclass on tp_proclass.id=tp_product.cid')
				->field('tp_proclass.proclassname,tp_product.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datapro",$datapro);
				$this->assign("page",$show);
			}else{
				//初始绑定数据(分类)
				$m = M("Proclass");
				$where['audit']=1;
				$dataclass = $m->where($where)->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				//绑定初始数据（产品）
				$cid = I("get.cid","","trim");
				if($cid!=""){
					$prowh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Product")->where($prowh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datapro  = M("Product")->order("orderby asc")->where($prowh)
				->join('tp_proclass on tp_proclass.id=tp_product.cid')
				->field('tp_proclass.proclassname,tp_product.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datapro",$datapro);
				$this->assign("page",$show);
			}
			$this->display();
		}
		
		//相关下载
		public function other_down(){
			if(IS_POST){
				//初始绑定数据(分类)
				$m = M("Downclass");
				$where['isshow']=1;
				$dataclass = $m->where($where)->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				//绑定初始数据（下载）
				$cid = I("get.cid","","trim");
				$searchtype = I("post.searchtype");
				$keyword = I("post.keyword");
				
				if($searchtype==1 && $keyword!=""){
					$downwh['filename']=array("like","%".$keyword."%");
				}
				if($cid!=""){
					$downwh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Down")->where($downwh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datadown = M("Down")->order("orderby asc")->where($downwh)
				->join('tp_downclass on tp_downclass.id=tp_down.cid')
				->field('tp_downclass.downclassname,tp_down.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datadown",$datadown);
				$this->assign("page",$show);
			}else{
				//初始绑定数据(分类)
				$m = M("Downclass");
				$where['isshow']=1;
				$dataclass = $m->where($where)->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
			
				foreach($dataclass as $key=>$value){
					$dataclass[$key]['count']=count(explode('-',$value['bpath']));
					$boolnum = $m->where("pid=$value[id]")->count();
					if($boolnum>0){
						$dataclass[$key]['bool']=1;
					}else{
						$dataclass[$key]['bool']=0;
					}
				}
				
				
				//绑定初始数据（下载）
				$cid = I("get.cid","","trim");
				if($cid!=""){
					$downwh['cid']=$cid;
				}
				
				
				import("ORG.Util.Paged");
				$count = M("Down")->where($downwh)->count();//总条数
				
				$page = new Page($count,15);
				$show = $page->show();


				$datadown  = M("Down")->order("orderby asc")->where($downwh)
				->join('tp_downclass on tp_downclass.id=tp_down.cid')
				->field('tp_downclass.downclassname,tp_down.*')->limit($page->firstRow.','.$page->listRows)
				->select();
				
				$this->assign("dataclass",$dataclass);
				$this->assign("datadown",$datadown);
				$this->assign("page",$show);
			}
			$this->display();
		}


		//相关题库
		public function other_answer(){
			
			$keyword = I("post.keyword");
			if($keyword!=""){
				$where['typeName']=array('like','%'.$keyword.'%');
			}
			$where['isShow']=1;

			//绑定初始数据题目
				
			import("ORG.Util.Paged");
			$count = M("Answertype")->where($where)->count();//总条数
				
			$page = new Page($count,100);
			$show = $page->show();


			$data_ans  = M("Answertype")->where($where)->order("orderby asc")->limit($page->firstRow.','.$page->listRows)
			->select();
				
			$this->assign("data_ans",$data_ans);
			$this->assign("page",$show);
			
			$this->display();
		}


		//产品图片列表
		public function otherimg(){
			$proid = I("get.proid");
			
			
				import("ORG.Util.Paged");
				$count = M("Img")->where("proid=$proid")->count();//总条数
				
				$page = new Page($count,25);
				$show = $page->show();
				$imagedata = M("Img")->where("proid=$proid")->limit($page->firstRow.','.$page->listRows)
				->select();

			$this->assign("imagedata",$imagedata);
			$this->assign("page",$show);
			$this->display();
		}

		//产品图片（多张）
		public function imgupload(){
			$info = $this->_upload();
			$proid = I("get.proid"); //产品id
				$m = M("Img");
				$data[proid]=$proid;
				$data[img]=$info[0][savename];
				$data[thumb_img1]="m_".$info[0][savename];
				$data[thumb_img2]="s_".$info[0][savename];
				$pro_data_save[is_other_img]=1;//修改产品
				M("Product")->where("id=$proid")->save($pro_data_save);
				$imgid = $m->add($data);//插入数据库

				$info[0][imgid]=$imgid;
				echo json_encode($info[0]);
				
				
			
		}
		//产品图片ajax删除
		public function img_del(){
			$id = I("get.id");
			$proid = M("Img")->where("id=$id")->find();
			$count = M("Img")->where("proid=$proid[proid]")->count();

			if($count==1){
				$pro_data_save[is_other_img]=0;//修改产品
				M("Product")->where("id=$proid[proid]")->save($pro_data_save);
			}

			if(M("Img")->where("id=$id")->delete()){
				echo "1";
			}else{
				echo "0";
			}
			
		}

		//产品订单列表
		public function orderlist(){
			$m = M("order");
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();
			$data = $m->table("tp_order a")
			->join("`tp_product` b ON b.id = a.pid")
                        ->join("`hrcf_borrow_tender` c ON a.id = c.order_id")
			->field('a.`id`,b.`proname`,a.`lang`,a.`name`,a.`niname`,a.`phone`,a.`tradeid`,a.`addtime`,a.`fahuo_status`,c.id as tender_id')
			->order('a.fahuo_status ASC,a.addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign("data",$data);
			$this->assign("page",$show);
			$this->display();
		}

			//发货
			public function order_fahuo(){
				$id = I("get.id");
                                $kuaidiname=I("get.kuaidiname");
                                $kuaididan=I("get.kuaididan");
				if($id>0 && $kuaidiname!="" && $kuaididan!=""){
					$data['id']=$id;
                                        $data['kuaidiname']=$kuaidiname;
                                        $data['kuaididan']=$kuaididan;
                                        $data['updatetime']=time();
					$data['fahuo_status']=1;
					M("Order")->save($data);//更新发货状态为已发货
				}
			}


		//产品订单删除
		public function order_del(){
			$id = I("get.id");
			if($id>0){
				M("Order")->where("id=$id")->delete();//删除对应主表记录
				M("Orderdetail")->where("OrderID=$id")->delete(); //删除对应副表记录
			}
		}
		//产品订单批量删除
		public function order_pldelete(){
			$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Order");
			$n = M("Orderdetail");
			$where['id']=array("in",$str);
			$where1['OrderID']=array("in",$str);
			//2017-0105杨阳修改if(($m->where($where)->delete()) && ($n->where($where1)->delete())){
                        $result=$m->where($where)->delete();
                        if($result){
                            
				echo "1";
			}else{
				echo "0";
			}
		}
                //订单批量导出
                public function order_export(){
                    /*导出数据为excel表格
                    *@param $data    一个二维数组,结构如同从数据库查出来的数组
                    *@param $title   excel的第一行标题,一个数组,如果为空则没有标题
                    *@param $filename 下载的文件名
                    *@examlpe
                     
                    $m = M ('Order');
                    $arr = $m -> select();
                    exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
                    */
                    
                    $title=array('订单编号','姓名','兑换物品','类别','兑换数量','联系电话','兑换时间','发布状态','收货人','邮编','手机','快递名称','快递单号','送货地址','是否微购');
                    $sql="SELECT a.`tradeid`,a.`name`,c.`proname`,e.`proclassname`,a.`lang`,a.`phone`,a.`addtime`,a.`fahuo_status`,b.`consignee`,b.`address_code`,a.address as `detailed_address`,b.`postal_code`,b.`con_phone`,a.`kuaidiname`,a.`kuaididan`,d.`id` as tender_id from tp_order as a 
                    LEFT JOIN `tp_address` as b on a.consignee_msg=b.id
                    LEFT JOIN `tp_product` as c on a.pid=c.id
                    LEFT JOIN `tp_proclass` as e on c.cid=e.id
                    LEFT JOIN `hrcf_borrow_tender` d ON a.id = d.order_id
                    where 1=1
                    ORDER BY a.`id` desc,a.`fahuo_status` ASC";
                    $list=M("Order")->query($sql);
                    foreach ($list as $k=>$v){
                        $list[$k]['sh_address']=$v['address_code'].$v['detailed_address'];
                        if($v['fahuo_status']==1){
                            $list[$k]['fahuo_status']="已发货";
                        }else{
                            $list[$k]['fahuo_status']="未发货";
                        }
                        $list[$k]['addtime']=date("Y-m-d H:i:s",$v['addtime']);
                        if($v['tender_id']!=0 && $v['tender_id']!=""){
                            $list[$k]['weigou']="是";
                        }else{
                            $list[$k]['weigou']="否";
                        }
                        unset($list[$k]["address_code"]);
                        unset($list[$k]["detailed_address"]);
                        unset($list[$k]["tender_id"]);
                    }
                    $data=$list;

                    $filename="订单列表";
                    header("Content-type:application/octet-stream");
                    header("Accept-Ranges:bytes");
                    header("Content-type:application/vnd.ms-excel");  
                    header("Content-Disposition:attachment;filename=".$filename.".xls");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    //导出xls 开始
                    if (!empty($title)){
                        foreach ($title as $k => $v) {
                            $title[$k]=iconv("UTF-8", "GBK",$v);
                        }
                        $title= implode("\t", $title);
                        echo "$title\n";
                    }
                    if (!empty($data)){
                        foreach($data as $key=>$val){
                            foreach ($val as $ck => $cv) {
                                $data[$key][$ck]=iconv("UTF-8", "GBK", $cv);
                            }
                            $data[$key]=implode("\t", $data[$key]);
                        }
                        echo implode("\n",$data);
                    }
                }

		//产品订单查看
		public function order_view(){
			Load('extend');
			$id = I("get.id");//获取订单id
			$m = M("Order");
			$where["id"]=$id;
			//订单取值
			$data = $m->where($where)->find(); 

			//订单详情取值
		
			$count = M("Product")->where("id=$data[pid]")->count();
			import("ORG.Util.Paged");
			$page = new Page($count,10);
			$show = $page->show();
			$datadetail = M("Product")->where("id=$data[pid]")->limit($page->firstRow.','.$page->listRows)->select();

			//自定义字段显示
			//调用Content模块的editAllField方法 有参 6代表订单  获得数组
				
			$zdydata = R('Content/edit_order_AllField',array($data,'6'));

			//语言版本取值
			$lang_data = SettingAction::getLang();

//			用户所选地址信息
			$addressid=$data['consignee_msg'];
			$con_msg=M("Address")->where("`id`='".$addressid."'")->find();
			$this->assign("con_msg",$con_msg);

			$this->assign("lang_data",$lang_data);
                     ;
			$this->assign("datadetail",$datadetail);
			$this->assign("data",$data);
			$this->assign("page",$show);
			$this->assign("zdydata",$zdydata);
			$this->display();
		}

		//添加标签ajax
		public function add_tag(){
			$tagname = I("get.tagname");
			$tag_data = M("Tag")->where(array('type'=>2))->select();
			$mark=0;
			foreach($tag_data as $v){
				if($tagname==$v[tag_name]){
					$mark=1;
				}
				
			}
			if($mark==1){
				echo 0;
			}else{
				$add_arr = array('type'=>2,'tag_name'=>$tagname,'click'=>1,'addtime'=>time());
				$add_id = M("Tag")->add($add_arr);
				$add_data = M("Tag")->where(array('id'=>$add_id))->find();
				echo json_encode($add_data);
			}
		
		}

		//删除标签
		public function del_tag(){
			$id = I("get.data_i");
			M("Tag")->query("update tp_tag set click=click-1 where id=$id");//将使用数减1
			echo 1;
			
		}

		//标签库赋值
		public function tag_library(){
			$id = I("get.id");
			M("Tag")->query("update tp_tag set click=click+1 where id=$id");//将使用数减1
			$data = M("Tag")->where(array('id'=>$id))->find();
			echo json_encode($data);
		}


		
	}
?>