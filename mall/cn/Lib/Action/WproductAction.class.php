<?php
class WproductAction extends CommonAction {
    public function index(){
    	

    	/*$tid = I("get.tid");
    	if($tid==""){
    		$tid = M("Proclass")->where(array('pid'=>1,'lang'=>1))->order("orderby asc")->getField("id");
    	}
    	//一级分类名称
    	$one_type_name = M("Proclass")->where(array('id'=>$tid))->getField("proclassname");
		$this->assign("one_type_name",$one_type_name);

    	//二级分类
    	$two_type_data = $this->getProList($tid,1,0,1,0,0);
    	$this->assign("two_type_data",$two_type_data);

    	//产品取值
    	$id = I("get.id");
    	if($id==""){
    		$id = M("Proclass")->where(array('pid'=>$tid))->order("orderby asc")->getField("id");
    	}*/
		$sort=I("get.sort");
		if($sort==""){
    		$pro_data = $this->getPro2("微币兑换",1,0,0,1,15);
		}else{
			$pro_data = $this->getProOrder(7,1,0,0,1,15,0,$sort);
			
		}
		
    	$this->assign("pro_data",$pro_data);
    	$this->display();

	}
	public function exchange(){
		
		$user_id =  $_SESSION['k_id'];
		if($user_id==''){
			$this->error("请先登录",U('Member/login'));	
		}else{
			$pid=I("post.pid");
//                        dump($pid);
			$address=I("post.address");
			//判断用户微币是否能都兑换此产品
			/**垮库操作*/
                        $pro_weibi = M("Product")->where(array('id'=>$pid))->getField("pro_weibi");
//                        dump($pro_weibi);
//                        exit;
			//$credit=M("Credit","think_","DB_CONFIG1")->query("select credit from hrcf_credit where user_id=$user_id limit 1");
			// $user_credit=M("Credit","hrcf_","DB_CONFIG1")->where("user_id=$user_id")->getField("weibi");
			$user_credit=M("Credit","hrcf_")->where("user_id=$user_id")->getField("weibi");
			
			
			if($user_credit<$pro_weibi){
				$this->error("您的微币不足，不能兑换此产品",U('Wproduct/proinfo',array('id'=>$pid)));		
			}else{
					
			}
		
			// $m = M("Order","tp_","DB_CONFIG2");
			$m = M("Order");
			// $u=M("Users_info","hrcf_","DB_CONFIG1");
			$u=M("Users_info","hrcf_");
			$user_info=$u->where("user_id=$user_id")->find();
			//dump($user_info);
			//exit;
			if($address==""){
				$this->error("配送地址不能为空",U('Wproduct/proinfo',array('id'=>$pid)));
			}
			if($m->create()){
				$m->name=$user_info['realname'];
				$m->niname=$user_info['niname'];
				$m->user_id=$user_info['user_id'];
				$m->phone=$user_info['phone'];
				$m->addtime=time();
				$m->pid=$pid;
				$m->tradeid=date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
				if($m->add()){
					//去除对应的微币
					/**垮库操作*/
					// M("Credit","hrcf_","DB_CONFIG1")->execute("update hrcf_credit set weibi=weibi-$pro_weibi where user_id=$user_id");
					M("Credit","hrcf_")->execute("update hrcf_credit set weibi=weibi-$pro_weibi where user_id=$user_id");
					// M("Product","tp_","DB_CONFIG2")->execute("update tp_product set hits=hits+1 where id=$pid");
					M("Product")->execute("update tp_product set hits=hits+1 where id=$pid");
					
					$this->success("兑换成功",U('Product/index'));
				}else{
					$this->error("兑换失败",U('Product/index'));
				}
			}
		}
			
	}
	//微币搜索
	public function search(){
		$min=I("request.min");
		$max=I("request.max");
		$m=M('Product');
		if($min>=20000&&$max==''){
			$where['pro_jifen'] = array(array('egt',$min));
		}else if($min!='' &&$max!='' ){
			$where['pro_jifen'] = array(array('egt',$min),array('elt',$max));	
		}
		$where['isshow']=1;
		$where['lang']=1;

		import("ORG.Util.Paged");
		
		$count = $m->where($where)->count();
		$page = new Page($count,$pageNum);
		$show = $page->show();
		$pro_data = $m->where($where)->order("orderby desc")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("page",$show);
		$this->assign("pro_data",$pro_data);
		//dump($m->getLastSql());
    	$this->display();
		
	}
	//下载中心
	public function down(){
		$qid = I("get.qid");
		switch ($qid) {
			case '':
			case 1:
				$tid = 23;
			break;
			case 2:
				$tid = 24;
			break;
			case 3:
				$tid = 25;
			break;
			
			default:
				# code...
				break;
		}
		
		import("ORG.Util.Paged");
		$count = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->count();
		$page = new page($count,10);

		

		$data = M("Down")->where(array('isshow'=>1,'lang'=>1,'cid'=>$tid))->limit($page->firstRow.','.$page->listRows)->order("orderby asc")->select();
		
		$show = $page->show();
		$this->assign("data",$data);
		$this->assign("page",$show);
		$this->display();
	}

	
	public function brand(){
		//品牌口碑
		$brand_video_data = $this->getPro3("品牌口碑",1,3,1,0,0);
		$this->assign("brand_video_data",$brand_video_data);

		//口碑分享
		$brand_share_data = $this->getPro3("口碑分享",1,9,1,0,0);
		$this->assign("brand_share_data",$brand_share_data);

		$this->display();
	}

	//口碑分享加载更多
	public function brand_share_ajax(){
		$mark = I("get.mark");

		//当前页码
		$page = $mark;


		//每页多少条
		$pagesize = 9;

		$page_start = $pagesize*($page-1);

		$Dao = M();
		$data = $Dao->query("select * from tp_product where lang=1 and isshow=1 and cid=17 order by orderby asc limit $page_start,$pagesize");
		
		foreach($data as $k=>$vo){
			$data[$k][time]=date("Y-m-d",$vo[addtime]);
		}

		echo json_encode($data);
		
	}

	

	public function proinfo(){
		
		$id = I("get.id");
		
		  $data = M("Product")->where(array('id'=>$id))->find();
		

		

		//获取父类（一级分类）
		$pro_child_id = M("Proclass")->where(array('id'=>$data[cid]))->getField("id");
		$pro_parent_id = M("Proclass")->where(array('id'=>$pro_child_id))->getField("pid");
		$pro_parent_data = M("Proclass")->where(array('id'=>$pro_parent_id))->find();

		//二级分类
    	$two_type_data = $this->getProList($pro_parent_data[id],1,0,1,0,0);
    	$this->assign("two_type_data",$two_type_data);

		//M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

		//关联图片取值
		$other_img = M("Img")->where(array('proid'=>$id))->getField("img");

		//相关产品
		//$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();
	
		$prevwhere['cid']=$data[cid];
		$prevwhere['isshow']=1;
		$prevwhere['lang']=1;
		$prevwhere['id']=array("lt",$id);
		$prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
			
		$nextwhere['cid']=$data[cid];
		$nextwhere['isshow']=1;
		$nextwhere['lang']=1;
		$nextwhere['id']=array("gt",$data[id]);
		$nextdata = M("Product")->where($nextwhere)->find();

		
		$this->assign("data",$data);

		//dump($data);
		$this->assign("prevdata",$prevdata);
		$this->assign("nextdata",$nextdata);
		$this->assign("other_img",$other_img);
		//$this->assign("other_pro",$other_pro);
		$this->assign("pro_parent_data",$pro_parent_data);

		$this->display();
	}

	public function brand_info(){
		
		$id = I("get.id");
		
		$data = M("Product")->where(array('id'=>$id))->find();
		

		

		//获取分类名称
		//$pro_type_name = M("Proclass")->where(array('id'=>$data[cid]))->getField("proclassname");

		M("Product")->execute("update tp_product set pro_dianjiliang=pro_dianjiliang+1 where id=$id");

		//关联图片取值
		$other_img = M("Img")->where(array('proid'=>$id))->getField("img",true);

		//相关产品
		//$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();
	
		$prevwhere['cid']=$data[cid];
		$prevwhere['isshow']=1;
		$prevwhere['lang']=1;
		$prevwhere['id']=array("lt",$id);
		$prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
			
		$nextwhere['cid']=$data[cid];
		$nextwhere['isshow']=1;
		$nextwhere['lang']=1;
		$nextwhere['id']=array("gt",$data[id]);
		$nextdata = M("Product")->where($nextwhere)->find();

		
		$this->assign("data",$data);


		$this->assign("prevdata",$prevdata);
		$this->assign("nextdata",$nextdata);
		$this->assign("other_img",$other_img);
		//$this->assign("other_pro",$other_pro);
		//$this->assign("pro_type_name",$pro_type_name);

		$this->display();
	}

	public function fc_info(){
		
		$id = I("get.id");
		
		  $data = M("Product")->where(array('id'=>$id))->find();
		

		

		//获取分类名称
		$pro_type_name = M("Proclass")->where(array('id'=>$data[cid]))->getField("proclassname");

		//M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

		//关联图片取值
		//$other_img = M("Img")->where(array('proid'=>$id))->getField("img");
		//M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

		//相关产品
		//$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();
	
		$prevwhere['cid']=$data[cid];
		$prevwhere['isshow']=1;
		$prevwhere['lang']=1;
		$prevwhere['id']=array("lt",$id);
		$prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();
			
		$nextwhere['cid']=$data[cid];
		$nextwhere['isshow']=1;
		$nextwhere['lang']=1;
		$nextwhere['id']=array("gt",$data[id]);
		$nextdata = M("Product")->where($nextwhere)->find();

		
		$this->assign("data",$data);


		$this->assign("prevdata",$prevdata);
		$this->assign("nextdata",$nextdata);
		//$this->assign("other_img",$other_img);
		//$this->assign("other_pro",$other_pro);
		$this->assign("pro_type_name",$pro_type_name);

		$this->display();
	}

	public function prolist_ajax(){
		$pro_id = I("get.pro_id");
		$start_i = I("get.start_i");
		//每页条数
		$size = 10;

		$total_count = M("guest")->where(array('audit'=>1,'pro_id'=>$pro_id))->order("addtime DESC")->count();
		//总页数
		$total_pages = ceil($total_count/$size);
		if($start_i<=$total_pages){
			$comments_data = M("guest")->where(array('audit'=>1,'pro_id'=>$pro_id))->limit(($start_i-1)*$size,$size)->order("addtime DESC")->select();
		}
		
		//改变日期格式
		foreach($comments_data as $k=>$vo){
				//判断是否显示为刚刚
				if(time()-$vo[addtime]<=60){
					$comments_data[$k][addtime]="刚刚";
					
				}else{
					$comments_data[$k][addtime]=date("Y-m-d H:i:s",$vo[addtime]);
				}
				
		}

		echo json_encode($comments_data);
	}

	public function ajax_feed(){
		$tl_area = I("get.tl_area");
		$pro_id = I("get.pro_id");
		$user_id = I("get.user_id");


		$m = M("Guest");
		$data['username']='[客户评论]';
		$data['sex']=1;
		$data['audit']=1;
		$data['addip']=get_client_ip();
		$data['addtime']=time();
		$data['content']=$tl_area;
		$data['pro_id']=$pro_id;
		$data['pro_name']=M('Product')->where(array('id'=>$pro_id))->getField("proname");
		$data['user_id']=$user_id;
		$data['user_name']=M('User')->where(array('id'=>$user_id))->getField("username");


		if($m->add($data)){
			$comments_data = M("guest")->where(array('audit'=>1,'pro_id'=>$pro_id))->limit(10)->order("addtime DESC")->select();
			
			foreach($comments_data as $k=>$vo){
				//判断是否显示为刚刚
				if(time()-$vo[addtime]<=60){
					$comments_data[$k][addtime]="刚刚";
					
				}else{
					$comments_data[$k][addtime]=date("Y-m-d H:i:s",$vo[addtime]);
				}
				
			}

			echo json_encode($comments_data);
		}else{
			echo "0";
		}
			

	}



	//文件下载
		public function download(){
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