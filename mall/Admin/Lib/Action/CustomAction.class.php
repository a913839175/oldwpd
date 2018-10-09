<?php
	class CustomAction extends CommonAction{
		//模块列表
		public function index(){
			$this->display();	
		}	
		
		//添加字段
		public function add(){
			if(IS_POST){
				$m = D("Ziding");
				$modules = $_POST['modules'];
				$data = $m->create();
				if($data){
					$m->addtime=time();
					if(!$m->addfield($data)){
						$this->error("该字段在表中已经存在！");
					}
					$add_id=$m->add();
					
					if($add_id){
						if(!isset($_POST['submit1'])){
								$typedata = M("Ziding")->where("id=$add_id")->find();
								if($typedata){
									$this->success("添加成功",U("Custom/add",array('id'=>$_POST[modules],'ccid'=>$typedata[cid])));
								}else{
									$this->success("添加成功",U("Custom/add",array('id'=>$_POST[modules])));
								}
								

								
						}else{
							$this->success("添加成功",U("Custom/index"));
						}
						
					}else{
						$this->error("添加失败");
					}
					
				}else{
					$this->error($m->getError());
				}
			}else{

				$m = M("Ziding");
				$modules = I("get.id");
				$databool = $m->order("orderby DESC")->field("orderby")->where("modules=$modules")->limit()->find();
				//排序自动增长
				if($databool){
					$orderbydata=$databool[orderby]+1;
				}else{
					$orderbydata = 1;
				}
				//分类初始绑定数据
				
				switch($modules){
					case 1:
						//新闻分类
						$dataclass = M("Conclass")->where("isshow=1")->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

					case 2:
						//产品分类
						$dataclass = M("Proclass")->where("audit=1")->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

					case 3:
						//留言
						$dataclass=0;

					break;

					case 4:
						//招聘
						$dataclass=0;

					break;

					case 5:
						//内容
						$dataclass= M("Concate")->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

					case 6:
						//订单
						$dataclass=0;
					break;
					case 7:
						//下载
						$dataclass= M("Downclass")->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;
					case 8:
						//图册
						$dataclass= M("Atlclass")->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

				}
				
				



				$this->assign("orderbydata",$orderbydata);
				$this->assign("dataclass",$dataclass);
			}
			$this->display();
		}
		
		//字段列表
		public function flist(){
			$m = M("Ziding");
			$id = I("get.id");
			if($id<=0){
				$this->error("参数错误");
			}
			$data = $m->where("modules=$id")->order("orderby ASC")->select();
			
			foreach($data as $key=>$vo){
				if($vo[modules]==1){ //判断是否是有分类的数据，如果是，则查出该分类的名称，如果否，则直接输出模块名
					if($vo[cid]!=0){
						$newsdata = M("Conclass")->where("id=$vo[cid]")->find();
						$data[$key][cname]="新闻管理-".$newsdata['conclassname'];
					}else{
						$data[$key][cname]="新闻管理";
					}
				
				}else if($vo[modules]==2){
					if($vo[cid]!=0){
						$prodata = M("Proclass")->where("id=$vo[cid]")->find();
						$data[$key][cname]="产品管理-".$prodata['proclassname'];
					}else{
						$data[$key][cname]="产品管理";
					}
				}else if($vo[modules]==3){
					$data[$key][cname]="留言管理";
				}else if($vo[modules]==4){
					$data[$key][cname]="招聘管理";
				}else if($vo[modules]==5){
					if($vo[cid]!=0){
						$padata = M("Concate")->where("id=$vo[cid]")->find();
						$data[$key][cname]="内容管理-".$padata['conclname'];
					}else{
						$data[$key][cname]="内容管理";
					}
				}else if($vo[modules]==6){
					$data[$key][cname]="订单管理";
				}else if($vo[modules]==7){
					if($vo[cid]!=0){
						$padata = M("Downclass")->where("id=$vo[cid]")->find();
						$data[$key][cname]="下载管理-".$padata['downclassname'];
					}else{
						$data[$key][cname]="下载管理";
					}
				}else if($vo[modules]==8){
					if($vo[cid]!=0){
						$padata = M("Atlclass")->where("id=$vo[cid]")->find();
						$data[$key][cname]="图册管理-".$padata['atlclassname'];
					}else{
						$data[$key][cname]="图册管理";
					}
				}else{

				}
			}
			
			$this->assign("data",$data);
			$this->display();
		
		}
		//修改字段
		public function edit(){
			if(IS_POST){
				$id = I("post.id");
				$modules = I("post.modules");
				$m = D("Ziding");
					$tablename = $this->tablenamecheck($_POST[modules]);  //获取表名
					$oldfield = $m->where("id=$id")->field("name,type")->find();	//
					$oldfieldname = $oldfield[name];//获取老字段名
					$newfieldname = I("post.name"); //获取新字段名
					$type = $_POST[type]; //获取新字段类型    //注：该问题浪费了大量的时间，应该是取最新的type值，而不是数据中的
					
					//dump($oldfieldname);
					//dump($newfieldname);
					
					$m->editfield($tablename,$oldfieldname,$newfieldname,$type); //修改表中字段
					
				//判断是否为数据库系统字段
				$system_bool = $this->system_field($modules,$newfieldname);
				if(!$system_bool){
					$this->error("该字段为系统字段,不可修改！");
				}
				
				if($m->create()){
					
					$m->updatetime=time();//修改时间
					if($m->save()){
						$this->success("修改成功",U("Custom/flist",array('id'=>$_POST[modules])));
					}else{
						$this->error("修改失败");
					}
				}else{
					$this->error($m->getError());
				}
				
			}else{
				$modules = I("get.modules");
				$id = I("get.id","","trim");
				if($id<=0){
					$this->error("参数错误");
				}
				$m = M("Ziding");
				$data = $m->where("id=$id")->find();
				
				//分类初始绑定值
				switch($modules){
					case 1:
						//新闻分类
						$dataclass = M("Conclass")->where("isshow=1")->field("id,pid,conclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

					case 2:
						//产品分类
						$dataclass = M("Proclass")->where("audit=1")->field("id,pid,proclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

					case 3:
						//留言
						$dataclass=0;

					break;

					case 4:
						//招聘
						$dataclass=0;

					break;

					case 5:
						//内容
						$dataclass= M("Concate")->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;
					case 6:
						//订单
						$dataclass=0;

					break;
					case 7:
						//下载
						$dataclass= M("Downclass")->field("id,pid,downclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;
					case 8:
						//图册
						$dataclass= M("Atlclass")->field("id,pid,atlclassname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
						
						foreach($dataclass as $key=>$value){
							$dataclass[$key]['count']=count(explode('-',$value['bpath']));
						}
					break;

				}
				$this->assign("data",$data);
				$this->assign("dataclass",$dataclass);
			}
			$this->display();
		}
		
		//分类ajax
		public function ajax(){
			$cid = I("get.cid");
			$modules_id = I("get.modules_id");
			switch ($modules_id) {
				case 1:
					$count = M("Conclass")->where("pid=$cid")->count();
					if($count>0){
						echo "0";
					}else{
						echo "1";
					}
				break;
				case 2:
					$count = M("Proclass")->where("pid=$cid")->count();
					if($count>0){
						echo "0";
					}else{
						echo "1";
					}
				break;
				case 5:
					$count = M("Concate")->where("pid=$cid")->count();
					if($count>0){
						echo "0";
					}else{
						echo "1";
					}
				break;
				case 7:
					$count = M("Downclass")->where("pid=$cid")->count();
					if($count>0){
						echo "0";
					}else{
						echo "1";
					}
				break;
				case 8:
					$count = M("Atlclass")->where("pid=$cid")->count();
					if($count>0){
						echo "0";
					}else{
						echo "1";
					}
				break;
				default:
					
				break;
			}
			
		}
		//字段显示隐藏
		public function isshow(){
			$m = M("Ziding");
			$id = I("get.id","","trim");
			$modules = I("get.modules");
			$data[isshow] = I("get.isshow");
			$savebool = $m->where("id=$id")->save($data);
			if($savebool){
				$this->success("操作成功");
			}else{
				$this->error("操作失败");
			}
		}
		
		//字段删除
		public function delete(){
			$id = I("get.id");
			$modules = I("get.modules");
			if($id<=0){
				$this->error("参数错误");
			}
			$del = M("Ziding");
			
			
			$tablename = $this->tablenamecheck($modules);
			$deledata = $del->where("id=$id")->find();
			
			//判断是否为数据库系统字段
			$system_bool = $this->system_field($modules,$deledata[name]);
			if(!$system_bool){
				$this->error("该字段为系统字段,不可删除！");
			}
			//删除数据库表字段
			$delbool = $del->query("alter table $tablename drop column ".$deledata[name]."");
		
			
			//删除数据表值
				$delbool2 = $del->where("id=$id")->delete();
				if($delbool2){
					$this->success("删除成功");
				}else{
					$this->error("删除失败");
				}
			
		}
		
		//表名判断
		public function tablenamecheck($modeles){
			switch($modeles){
				case 1 :
					return C("DB_PREFIX")."content";
				break;
				case 2 :
					return C("DB_PREFIX")."product";
				break;
				case 3 :
					return C("DB_PREFIX")."guest";
				break;
				case 4 :
					return C("DB_PREFIX")."job";
				break;
				case 5 :
					return C("DB_PREFIX")."pacontent";
				break;
				case 6 :
					return C("DB_PREFIX")."order";
				break;
				case 7 :
					return C("DB_PREFIX")."down";
				break;
				case 8 :
					return C("DB_PREFIX")."atl";
				break;
			
			}
		}
		
		//排序
		public function order_by_field(){
			if(IS_POST){
				$post = $_POST;
				if(empty($post)){
					$this->error("没有数据，不能排序");
				}
					foreach($post as $v){
						//dump($v[order]);
						//dump($v[id]);
					
						for($i=0;$i<count($v[order]);$i++){
							$id = $v[id][$i];
							$data['orderby']=$v[order][$i];
							M("ziding")->where("id=$id")->save($data);
						}
						$this->success("排序成功");
					}
				
			}
		}
		
		public function system_field($modules,$tablefield){
			if($modules==1){
				$arr = array(
							"id",
							"cid",
							"title",
							"contype",
							"title_href",
							"coninfo",
							"concon",
							"author",
							"source",
							"keyword1",
							"isphoto",
							"conphoto",
							"conthumb1",
							"conthumb2",
							"showdate",
							"orderby",
							"isshow",
							"isrecom",
							"lang",
							"issj",
							"sjprocon",
							"opti",
							"yetitle",
							"keywords",
							"descri",
							"hits",
							"addtime",
							"updatetime",
				);
			}else if($modules==2){
				$arr = array(
							"id",
							"cid",
							"lang",
							"proname",
							"isphoto",
							"prophoto",
							"prothumb1",
							"prothumb2",
							"prointo",
							"procontent",
							"isshow",
							"isrecom",
							"orderby",
							"issj",
							"sjprocon",
							"opti",
							"yetitle",
							"keywords",
							"descri",
							"hits",
							"addtime",
							"updatetime",
				
				);
			}else if($modules==3){
				$arr = array(
							"id",
							"username",
							"sex",
							"qq",
							"telphone",
							"eurl",
							"email",
							"content",
							"reply",
							"audit",
							"addtime",
							"replytime",
							"addip",
							"address",
				
				);
			}
			else if($modules==4){
				$arr = array(
							"id",
							"jobname",
							"jobspe",
							"age",
							"sex",
							"num",
							"jobeduc",
							"workhours",
							"salary",
							"endtime",
							"orderby",
							"lang",
							"isshow",
							"other",
							"addtime",
							"updatetime",
							
				
				);
			}
			else if($modules==5){
				$arr = array(
							"id",
							"cid",
							"paname",
							"lang",
							"pacon",
							"issj",
							"sjpacon",
							"opti",
							"yetitle",
							"keywords",
							"descri",
							"isshow",
							"addtime",
							"updatetime",
				
				);
			}
			else if($modules==6){
				$arr = array(
							"id",
							"name",
							"company_name",
							"phone",
							"email",
							"address",
							"mobile",
							"remank",
							"lang",
							"addtime",
							"updatetime",
				
				);
			}
			else if($modules==7){
				$arr = array(
							"id",
							"cid",
							"lang",
							"filename",
							"filecontent",
							"createtime",
							"filedescription",
							"keywords",
							"ispic",
							"pic",
							"picthumb",
							"isshow",
							"isrecom",
							"orderby",
							"addtime",
							"updatetime",
				
				);
			}
			else if($modules==8){
				$arr = array(
							"id",
							"atlname",
							"cid",
							"atldes",
							"savename",
							"savenamethumb",
							"picname",
							"picdes",
							"pichref",
							"isshow",
							"isrecom",
							"orderby",
							"createtime",
							"lang",
							"addtime",
							"updatetime",
				
				);
			}
			if(!in_array($tablefield,$arr)){
				return true;
			}else{
				return false;
			}
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}
?>