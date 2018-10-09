<?php
	class CommonAction extends Action{
		public function _initialize(){
			Load('extend'); //加载函数库
		
			//左侧最新资讯
			
			$leftnewsdata = $this->getNews(0,1,9,1,1,10);
			//dump($leftnewsdata);
			$this->assign("leftnewsdata",$leftnewsdata);
			
			//左侧联系我们
			$leftcontact = M("Pacontent");
			$leftcontactwhere['paname']="联系方式";
			$leftcontactdata = $leftcontact->where($leftcontactwhere)->find();
			$this->assign("leftcontactdata",$leftcontactdata);
			
			//底部版权
			$footwhere['paname']="底部版权";
			$footdata = M("Pacontent")->where($footwhere)->find();
			$this->assign("footdata",$footdata);
			
			//左侧产品分类
			$product_center_data = $this->getProList(0,1,0,1,0,10);
			$this->assign("product_center_data",$product_center_data);

			//顶部导航
				
				//logo取值
				$logodata = M("Siteinfo")->find();
				$this->assign("logodata",$logodata);
				
				//关于公司列表
				$abwhere['conclname']="关于公司";
				$abconid = M("Concate")->where($abwhere)->field("id")->find();
				$abcondata = M("Concate")->where("pid=$abconid[id]")->select();
				$this->assign("abcondata",$abcondata);
				
				//产品展示列表
				$headprodata = M("Proclass")->where("pid=0")->limit(5)->select();
				$this->assign("headprodata",$headprodata);
				
				//新闻资讯
				$headnewsdata = M("Conclass")->where("pid<>0")->select();
				
				
				$this->assign("headnewsdata",$headnewsdata);
				
		}

		//新闻分类列表取值(传id)
		//$newsListId:新闻分类id ;$language:语言版本;$newsLine:显示条数;$isPage是否分页 0不分页 1分页;$numPage=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getNewsList($newsListId=0,$language=1,$newsLine,$orderby=1,$isPage=0,$numPage=10){
			$newListData = array();
			$m = M("Conclass");
			if($newsListId!=0){
				$where['pid']=$newsListId;
			}
			$where['lang']=$language;
			
			if($orderby==1){
				$orderstr = "id asc";
			}else{
				$orderstr = "id desc";
			}

			if($isPage==0){
				if($newsLine==0){
					$newListData=$m->where($where)->order($orderstr)->select();
				}else{
					$newListData=$m->where($where)->limit($newsLine)->order($orderstr)->select();
				}
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$numPage);
				$show = $page->show();
				$newListData=$m->where($where)->limit($page->firstRow.','.$page->listRows)->order($orderstr)->select();
				$this->assign("page",$show);
			}
			return $newListData;

		}
		//新闻分类列表取值(传name)
		//$newsListname:新闻分类名称 ;$language:语言版本;$newsLine:显示条数;$isPage是否分页 0不分页 1分页;$numPage=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getNewsList2($newsListname='',$language=1,$newsLine,$orderby=1,$isPage=0,$numPage=10){
			$newListData = array();

			$m = M("Conclass");
			$newsclasswh['conclassname']=$newsListname;
			$newcla = $m->where($newsclasswh)->field("id")->find();
			$newsListId =$newcla['id'];
			if($newsListId!=0){
				$where['pid']=$newsListId;
			}
			$where['lang']=$language;
			
			if($orderby==1){
				$orderstr = "id asc";
			}else{
				$orderstr = "id desc";
			}

			if($isPage==0){
				if($newsLine==0){
					$newListData=$m->where($where)->order($orderstr)->select();
				}else{
					$newListData=$m->where($where)->limit($newsLine)->order($orderstr)->select();
				}
				
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$numPage);
				$show = $page->show();
				$newListData=$m->where($where)->limit($page->firstRow.','.$page->listRows)->order($orderstr)->select();
				$this->assign("page",$show);
			}
			return $newListData;

		}

		//新闻列表取值(传分类id)
		//$newsTypeId:分类id。为0表示查询所有;$language:语言版本;$newsLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getNews($newsTypeId=0,$language=1,$newsLine,$orderby=1,$isPage=0,$pageNum=10){
			$newData = array();
			$m = M("Content");
			if($newsTypeId!=0){
				$where['cid']=$newsTypeId;
			}
			$where['isshow']=1;

			$where['lang']=$language;

			if($orderby==1){
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
			}
			if($isPage==0){
				if($newsLine==0){
				$newData=$m->where($where)->order($orderstr)->select();
				}else{
					$newData=$m->where($where)->limit($newsLine)->order($orderstr)->select();
				}
				
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$newData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign("page",$show);
				
			}
			return $newData;
			

		}

		//产品分类列表取值(传id)
		//$proListId:产品分类id ;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$numPage=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getProList($proListId=0,$language=1,$proLine,$orderby=1,$isPage=0,$numPage=10){
			$proListData = array();
			$m = M("Proclass");
			if($proListId!=0){
				$where['pid']=$proListId;
			}
			$where['lang']=$language;
			
			if($orderby==1){
				$orderstr = "id asc";
			}else{
				$orderstr = "id desc";
			}

			if($isPage==0){
				if($proLine==0){
					$proListData=$m->where($where)->order($orderstr)->select();
				}else{
					$proListData=$m->where($where)->limit($proLine)->order($orderstr)->select();
				}
				
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$numPage);
				$show = $page->show();
				$proListData=$m->where($where)->limit($page->firstRow.','.$page->listRows)->order($orderstr)->select();
				$this->assign("page",$show);
			}
			return $proListData;

		}
		//产品分类列表取值(传name)
		//$proListname:产品分类名称 ;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$numPage=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getProList2($proListname="",$language=1,$proLine,$orderby=1,$isPage=0,$numPage=10){
			$proListData = array();
			$m = M("Proclass");
			$proclasswh['proclassname']=$proListname;
			$procla = $m->where($proclasswh)->field("id")->find();
			$proListId =$procla['id'];


			if($proListId!=0){
				$where['pid']=$proListId;
			}
			$where['lang']=$language;
			
			if($orderby==1){
				$orderstr = "id asc";
			}else{
				$orderstr = "id desc";
			}

			if($isPage==0){
				if($proLine==0){
					$proListData=$m->where($where)->order($orderstr)->select();
				}else{
					$proListData=$m->where($where)->limit($proLine)->order($orderstr)->select();
				}
				
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$numPage);
				$show = $page->show();
				$proListData=$m->where($where)->limit($page->firstRow.','.$page->listRows)->order($orderstr)->select();
				$this->assign("page",$show);
			}
			return $proListData;

		}
		//产品列表取值(传分类id)
		//$proTypeId:分类id。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getPro($proTypeId=0,$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10){
			$proData = array();
			$m = M("Product");
			if($proTypeId!=0){
				$where['cid']=$proTypeId;
			}
			$where['isshow']=1;

			$where['lang']=$language;

			if($orderby==1){
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
			}
			if($isPage==0){
				if($proLine==0){
				$proData=$m->where($where)->order($orderstr)->select();
				}else{
					$proData=$m->where($where)->limit($proLine)->order($orderstr)->select();
				}
				
			}else{
				import("ORG.Util.Paged");
				$count = $m->where($where)->count();
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$proData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign("page",$show);
				
			}
			return $proData;
			

		}

		//单页面取值
		protected function signerpost($lan,$name){
			$m = M("Pacontent");
			$where['lang']=$lan;
			$where['paname']=$name;
			$data = $m->where($where)->find();
			return $data;
		}
		
		protected function keywords_link($content){
			$new_content = $content;
			$keydata = M("Keyword")->select();
			$m=array();
			foreach($keydata as $k=>$v){
				
					if($v['no_follow']==1){
						$no_follow_str="rel=nofollow";
					}else{
						$no_follow_str="";
					}
					if($v['new_window']==1){
						$new_window_str="target=_blank";
					}else{
						$new_window_str="";
					}
					$str='<a href="'.$v[key_url].'" style="'.$v[key_style].'" '.$no_follow_str.' '.$new_window_str.' >'.$v[key_name].'</a>';
					
					
					
					if($v['only_match_first']==1){
						$limit=1;
					}else{
						$limit=3;
					}

					

					if(!in_array($v[key_name],$m)){
						$new_content=preg_replace( '/'.$v[key_name].'/i',"$str",$new_content,$limit);
						$m[]=$v[key_name];
					}
					
				
					


				
			}
			return $new_content;
		}
	}
?>