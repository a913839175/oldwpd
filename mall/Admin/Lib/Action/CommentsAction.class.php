<?php
class CommentsAction extends CommonAction{
	//列表显示
	public function mlist(){
		Load('extend');
		if(IS_POST){
			$searchtype = I("post.searchtype");
			$keyword = I("post.keyword");

			if($searchtype==1 && !empty($keyword)){
				$where['username']=array('like','%'.$keyword.'%');
			}else if($searchtype==2 && !empty($keyword)){
				$where['content']=array('like','%'.$keyword.'%');
			}
			
			$m = M("Guest");
			import("ORG.Util.Paged");
			$count = $m->where($where)->count();
			$page = new Page($count,"20");
			$show = $page->show();

			$data = $m->where($where)->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('data',$data);// 赋值数据集
			$this->assign("page",$show);//分页数据
			
			
			$this->display();
		}else{

			$m = M("Guest");
			import("ORG.Util.Paged");
			$count = $m->count();
			$page = new Page($count,"20");
			$show = $page->show();


			$data = $m->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('data',$data);// 赋值数据集
			$this->assign("page",$show);//分页数据
			
			
			$this->display();
		}
	

	}
	
	//删除
	public function delete(){
		$id = I("get.id");

		if(isset($id) && $id>0){
			$m = M("Guest");
			$where['id']=$id;
			if($m->where($where)->delete()){
				$this->success("删除成功");
			}else{
				$this->success("删除失败");
			}
			
		}
	}
	//回复
	public function replyguest(){
		if(IS_POST){


			$id = I("post.editid");
			$m = M("Guest");
			if($m->create()){
				$m->reply=$_POST['reply'];
				$m->replytime= time();
				if($m->where("`id`=$id")->limit(1)->save()){
				$this->success("操作成功",U("Comments/mlist"));
				}else{
					$this->error("操作失败");
				}
			}else{
				$this->error($m->getError());
			}
			
			
			$this->display();
		}else{

			

			$id = I("get.id");
			//更新标记
			M("Guest")->where(array('id'=>$id))->save(array('mark'=>0));
			$m = M("Guest");
			$data = $m->where("`id`=$id")->find();
			
			//调用Content模块的editAllField方法 有参 3代表留言  获得数组
			$zdydata = R('Content/editAllField',array($data,'3'));
			
			$this->assign("data",$data);
			$this->assign("zdydata",$zdydata);
			$this->display();
		}
	
	
		
	}
	
	//预览
	public function preview(){
		if(IS_POST){
			
		}else{
			$id = I("get.id");
			$m = M("Guest");
			$data = $m->where("`id`=$id")->find();
			
			//调用Content模块的editAllField方法 有参 3代表留言  获得数组
			$zdydata = R('Content/editAllField',array($data,'3'));
			
			$this->assign("data",$data);
			$this->assign("zdydata",$zdydata);
			$this->display();
		}
	
	
		
	}
	
	
	
	//审核 取消审核
	public function isaduit(){
		$id = I("get.id");
		$aduit = I("get.aduit");
		$m = M("Guest");
		
		$data['audit']=$aduit;
		
		if($m->where("`id`=$id")->save($data)){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	
	
	}
	
	//批量删除
	public function pldelete(){
		$str = I("get.str");
			$str = $str."0";//补0
			$m = M("Guest");
			$where['id']=array("in",$str);
			if($m->where($where)->delete()){
				echo "1";
			}else{
				echo "0";
			}
		
	}
	
	//批量审核
	public function pladuit(){
		$str = I("get.str");
			
			$str = $str."0";//补0
			
			$m = M("Guest");
			
			$where['id']=array("in",$str);
			$data['audit']=1;
			$data['replytime']=time();
			if($m->where($where)->save($data)){
				echo "1";
			}else{
				echo "0";
			}
	}

	public function feed_mail(){
		if(IS_POST){
			$smtp_to = $_POST['smtp_to'];

			$m = M("Mail");
			if($m->count()){
				$m->create();
				
				$m->config_time=time();
				$m->id = $m->getField("id");
			
				if($m->where($mail_id)->save()){
					//清空表
					M("Mail_info")->query("delete from tp_mail_info");	
					foreach($smtp_to as $vo){
						M("Mail_info")->add(array('smtp_to'=>$vo));
					}
					$this->success("修改成功");
				}
			}else{
				$m->create();
				$m->config_time=time();

				if($m->add()){
					//清空表
					M("Mail_info")->query("delete from tp_mail_info");	
					foreach($smtp_to as $vo){
						M("Mail_info")->add(array('smtp_to'=>$vo));
					}
					$this->success("修改成功");
				}
				

			}

		}

		$data = M("Mail")->find();
		$data_info = M("Mail_info")->select();
		$this->assign("data",$data);
		$this->assign("data_info",$data_info);

		$this->display();
	}

	public function feed_mail_ajax(){
		$mail_time = time().I("get.i");
		$str='<tr id="tr_'.$mail_time.'"><th width="100">收件人邮箱</th>';
		$str.='<td><input type="text" name="smtp_to[]" value="" class="input" id="" size="30" placeholder="如123456@qq.com">';
		$str.='<font color="#333">&nbsp;<a href="javascript:void(0)" class="tomaildel" dataid='.$mail_time.'>删除</a></font></td></tr>';
		echo $str;
	}
	

	public function feed_mail_edit_ajax(){
		$arr = M("Mail_info")->select();
		$str = "";
		unset($arr[0]); //去除数组第一个元素
		foreach($arr as $v){
			$str.='<tr id="tr_'.$v[id].'"><th width="100">收件人邮箱</th>';
			$str.='<td><input type="text" name="smtp_to[]" value="'.$v[smtp_to].'" class="input" id="" size="30" placeholder="如123456@qq.com">';
			$str.='<font color="#333">&nbsp;<a href="javascript:void(0)" class="tomaildel" dataid='.$v[id].'>删除</a></font></td></tr>';
		}
		
		echo $str;
	}
}

?>