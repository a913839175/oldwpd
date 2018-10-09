<?php
	class RoleAction extends CommonAction{
		//添加
		public function add(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->error("参数有错误");
				}
				if($post['rname']==""){
					$this->error("角色名称不可为空");
				}
				$post[check] = $_POST['check'];
				
				if(empty($post[check])){
					$this->error("所属菜单至少选择一个");
				}
				$m = M("Role");
				$m->create();
				$m->rshell=array_sum($post[check]);
				$m->addtime = time();
				if($m->add()){
					$this->success("添加成功");
				}else{
					$this->error("添加失败");
				}
				
			}else{
				//获取xmlpath的路径
				$xmlname = "menu.xml";
				$xmlpath = "./Public/Xml/";
				$xml=simplexml_load_file($xmlpath.$xmlname);
				$i=0;
				foreach($xml as $tmp){
					
					$xml_array[$i]['column']=$tmp->column;
					$xml_array[$i]['values']=$tmp->values;
					$i++;
				}
				//dump($xml_array);
				
				$this->assign("xml_array",$xml_array);
				
				$this->display();
			}
		}
		
		//列表
		public function rlist(){
			$m = M("Role");
			
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,20);
			$show = $page->show();
			
			$data = $m->limit($page->firstRow.','.$page->listRows)->select();
			
			
			
			
			//权限
			foreach($data as $v)
			{
				$dat="";
				if($v['rshell'] & 1){
					$dat.="新闻中心 ";
				}
				if($v['rshell'] & 2){
					$dat.="产品中心 ";
				}
				if($v['rshell'] & 4){
					$dat.="留言管理 ";
				}
				if($v['rshell'] & 8){
					$dat.="会员管理 ";
				}
				
				if($v['rshell'] & 16){
					$dat.="招聘管理 ";
				}
				
				if($v['rshell'] & 32){
					$dat.="下载管理 ";
				}
				if($v['rshell'] & 64){
					$dat.="图册管理 ";
				}
				
				if($v['rshell'] & 128){
					$dat.="内容管理 ";
				}
				if($v['rshell'] & 256){
					$dat.="系统设置 ";
				}
				if($v['rshell'] & 512){
					$dat.="自定义字段 ";
				}
				if($v['rshell'] & 1024){
					$dat.="SEO管理 ";
				}
				if($v['rshell'] & 2048){
					$dat.="栏目管理 ";
				}
				if($v['rshell'] & 4096){
					$dat.="题库管理 ";
				}
				
				
				$arr[] = $dat;
			}
			
			//将$arr放入$data数组中
			foreach($data as $k=>$v){
				$data[$k]['dat']=$arr[$k];
			}
			$this->assign("arr",$arr);
			$this->assign("data",$data); //绑定数据
			$this->assign("page",$show);//绑定分页
			$this->display();
		}
		
		//编辑
		public function edit(){
			if(IS_POST){
				$post = I("post.");
				if(empty($post)){
					$this->success("参数错误");
				}
				if(I("post.rname")==""){
					$this->error("角色名称不能为空");
				}
				if(empty($_POST['check'])){
					$this->error("至少选择一项所属菜单");
				}
				
				$id = I("post.editid");
				$data[rname] = trim(I("post.rname"));
				$data[isabled] = trim(I("post.isabled"));
				$data[rshell] = array_sum($_POST['check']);
				$data[rcontent] = trim(I("post.rcontent"));
				$data[updatetime]=time();
				$m = M("Role");
				if($m->where("rid=$id")->save($data)){
					$this->success("修改成功",U("Role/rlist"));
				}else{
					$this->error("修改失败");
				}
				
			}else{
				$id = I("id");
				$m = M("Role");
				$where['rid']=$id;
				
				$data = $m->where($where)->find();
				$this->assign('data',$data);
				
				//获取xmlpath的路径
				$xmlname = "menu.xml";
				$xmlpath = "./Public/Xml/";
				$xml=simplexml_load_file($xmlpath.$xmlname);
				$i=0;
				foreach($xml as $tmp){
					
					$xml_array[$i]['column']=$tmp->column;
					$xml_array[$i]['values']=$tmp->values;
					$i++;
				}
				//dump($xml_array);
				
				$this->assign("xml_array",$xml_array);
				
			}
			$this->display();
			
			
		}
		
		//删除
		public function delete(){
			$id = I("id");
			
			$m = M("Role");
			$n = M("User");
			$count = $n->where("roleid=$id")->count();
			if($count>0){
				$this->error("该角色下存在会员，不可删除！");
			}
			$where['rid']=$id;
			if($m->where($where)->limit(1)->delete()){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
			
			
		
		}
		
		//是否启用
		public function disabled(){
			$id = I("id");
			$isabled = I("isabled");
			$m = M("Role");
			$data['isabled']=$isabled;
			$where['rid']=$id;
			if($m->where($where)->limit(1)->save($data)){
				$this->success("操作成功");
			}else{
				$this->error("操作失败");
			}
		}
	}
?>