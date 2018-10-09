<?php
	class PaconclaAction extends CommonAction{
		//列表
		public function paconlist(){
			$m = D("Concate");
			$count = $m->count();
			import("ORG.Util.Paged");
			$page = new Page($count,20);
			$show = $page->show();
			
			
			$list = $m->field("id,pid,conclname,path,addtime,isshow,concat(path,'-',id) as bpath")->limit($page->firstRow.','.$page->listRows)->order('bpath')->select();
			//dump($list);
			foreach($list as $key=>$value){
				$list[$key]['count']=count(explode('-',$value['bpath']));
			}
			
			
			
			$this->assign("data",$list);//数据项
			$this->assign("page",$show);//分页
			$this->display();
		}
		
		//添加
		public function add(){
		if(IS_POST){
			$m = D("Concate");
			if($_POST['conclname']==""){
				$this->error("分类名称不能为空");
			}
			if($m->create()){
				$m->addtime=time();
				if($m->add()){
					if(isset($_POST['submit1'])){
						$this->success("添加成功",U("Paconcla/paconlist"));
					}else{
						$this->success("添加成功");
					}
					
				}else{
					$this->error("添加失败");
				}
			}else{
			$this->error($m->getError());
			}
		}else{
			$m = M("Concate");
			$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
			//dump($list);
			foreach($list as $key=>$value){
				$list[$key]['count']=count(explode('-',$value['bpath']));
			}
			//dump($list);
			$this->assign("alist",$list);
			//语言版本取值
			$lang_data = SettingAction::getLang();
			$this->assign("lang_data",$lang_data);
		}
		
			$this->display();
		
		}
		
		//修改
		public function edit(){
			if(IS_POST){
				$m = M("Concate");
				if($m->create()){
				$m->updatetime = time();
				
					if($m->save()){
						$this->success("修改成功",U("Paconcla/paconlist"));
					}else{
						$this->error("修改失败");
					}
				}
			
			}else{
				$m = M("Concate");
				$list = $m->field("id,pid,conclname,path,concat(path,'-',id) as bpath")->order('bpath')->select();
				//dump($list);
				foreach($list as $key=>$value){
				$list[$key]['count']=count(explode('-',$value['bpath']));
				}
				
				$this->assign("alist",$list);
				
				$id = I("get.id","trim");
				$data = $m->where("id=$id")->find();
				$this->assign("data",$data);
				//语言版本取值
				$lang_data = SettingAction::getLang();
				$this->assign("lang_data",$lang_data);
			}
			
			$this->display();
		
		
		}
		
		//删除
		public function delete(){
			//删除判断
			$id = I("get.id");
			$m = M("Concate");
			$count = $m->where("pid=$id")->count();
			if($count>0){
				$this->error("删除失败，该分类下存在子分类");
			}
			
			$n = M("Pacontent");
			$count2 = $n->where("cid=$id")->count();
			if($count2>0){
				$this->error("删除失败,该分类下存在内容");
			}
			
			if($m->where("id=$id")->delete()){
				$this->success("删除成功");
			}else{
				$this->error("删除失败");
			}
			
		}
		
		
		//是否显示
		public function isshow(){
			$id = I("get.id","trim");
			$issh = I("get.issh","trim");
			$where['id']=$id;
			$data['isshow']=$issh;
			$m = M("Concate");
			if($m->where($where)->save($data)){
				$this->success("操作成功",U("Paconcla/paconlist"));
			}
			
		}
		
	}
?>