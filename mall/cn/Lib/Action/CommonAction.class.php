<?php
	class CommonAction extends Action{
		public function _initialize(){
			Load('extend'); //加载函数库
			import("@.Class.Getcate"); //加载分类处理类

			if($_SESSION['k_id']!=""&&$_SESSION['k_id']!=null&&$_SESSION['k_id']!=0&&$_SESSION['k_user']!=""&&$_SESSION['k_user']!=null){
				$con_user_credit_jifen['user_id']=$_SESSION['k_id'];
				$user_credit_jifen=M("Credit","hrcf_")->where($con_user_credit_jifen)->getField("credit");
				if($user_credit_jifen){
					$_SESSION['k_credit']=$user_credit_jifen;
				}else{
					$_SESSION['k_credit']=0;
				}
			}

			
			 //左侧产品中心
			
			 $left_pro_data = $this->getProList2("产品中心",1,0,1,0,0);  
			 foreach($left_pro_data as $k=>$vo){
			 	$left_pro_data[$k][child]=$this->getProList($vo[id],1,0,1,0,0);
			 }

			$this->assign("opage",M(Proclass)->field("id,pid,proclassname,path,addtime,audit,concat(path,'-',id) as bpath")->order('orderby ASC')->select());
	
			//$left_pro_data = Getcate::cateToArray($left_pro_type_all,'child',3);
			$this->assign("left_pro_data",$left_pro_data);

			
			//左侧联系我们
			//$left_contact_data = $this->signerpost(1,"左侧联系我们");
			//$this->assign("left_contact_data",$left_contact_data);

			//底部版权
			$footdata = $this->signerpost(1,"底部版权");
			$this->assign("footdata",$footdata);

			
			
			//logo取值
			$logodata = M("Siteinfo")->find();
			$this->assign("logodata",$logodata);

			//网站banner取值
			$banner_data = M("Atl")->where(array('atlname'=>'首页banner'))->order("orderby asc")->getField("savename",true);
			$this->assign("banner_data",$banner_data);

			//内页banner取值
			//$ny_banner_data = M("Atl")->where(array('atlname'=>'内页banner'))->order("orderby asc")->getField("savename",true);
			//$this->assign("ny_banner_data",$ny_banner_data);
			
			
			
			
				
			
		}
		//链接处理类别
		protected function add_querystring_var($url,$key,$value){
            $url=preg_replace('/(.*)(?|&)'.$key.'=[^&]+?(&)(.*)/i','$1$2$4',$url.'&');
            $url=substr($url,0,-1);
            if(strpos($url,'?')=== false){
                return($rul.'?'.$key.'='.$value);
            }else{
                return($url.'&'.$key.'='.$value);
            }
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
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
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
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$newData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
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
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
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
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$newData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign("page",$show);
			}
			return $newListData;

		}

		//新闻列表取值(传分类id)
		//$newsTypeId:分类id。为0表示查询所有;$language:语言版本;$newsLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getNews($newsTypeId=0,$language=1,$newsLine,$orderby=1,$isPage=0,$pageNum=10,$isrecom=0){
			$newData = array();
			$m = M("Content");

			$conarr = M("Conclass")->select();
            $conTypeAllId = Getcate::getChildsId($conarr,$newsTypeId);
            $conTypeAllId[]=$newsTypeId;

			if(is_array($conTypeAllId)){
				$where['cid']=array('in',$conTypeAllId);
			}

			
			$where['isshow']=1;

			$where['lang']=$language;

			if($isrecom!=0){
				$where['isrecom']=1;
			}

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

		//新闻列表取值(传分类name)
		//$newsTypeName:分类名称。为0表示查询所有;$language:语言版本;$newsLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getNews2($newsTypeName="",$language=1,$newsLine,$orderby=1,$isPage=0,$pageNum=10,$isrecom=0,$keywork=""){
			$newData = array();
			$newsTypeId = M("Conclass")->where(array('conclassname'=>$newsTypeName))->find();
			$m = M("Content");

			$conarr = M("Conclass")->select();
            $conTypeAllId = Getcate::getChildsId($conarr,$newsTypeId[id]);
            $conTypeAllId[]=$newsTypeId[id];

			if(is_array($conTypeAllId)){
				$where['cid']=array('in',$conTypeAllId);
			}
			
			$where['isshow']=1;

			$where['lang']=$language;

			if($keywork!=""){
				$where['title']=array('like','%'.$keywork.'%');
			}
			if($isrecom!=0){
				$where['isrecom']=1;
			}

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
			$where['audit']=1;
			if($orderby==1){
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
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
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$proListData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign("page",$show);
			}
			return $proListData;

		}
		//产品分类列表取值(传name)
		//$proListname:产品分类名称 ;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$numPage=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getProList2($proListname="",$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10){
			$proListData = array();
			$m = M("Proclass");
			$proclasswh['proclassname']=$proListname;
			$procla = $m->where($proclasswh)->field("id")->find();
			$proListId =$procla['id'];


			if($proListId!=0){
				$where['pid']=$proListId;
			}
			$where['lang']=$language;
			$where['audit']=1;
			if($orderby==1){
				$orderstr = "orderby asc";
			}else{
				$orderstr = "orderby desc";
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
				$page = new Page($count,$pageNum);
				$show = $page->show();
				$proListData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
				$this->assign("page",$show);
			}
			return $proListData;

		}

		//产品列表取值(传分类id)递归
		//$proTypeId:分类id。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getPro($proTypeId=0,$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10,$isrecomd=0,$proname,$integral,$opage,$min,$max,$orderbyname,$jingxuan,$keduih){
			$proData = array();
			$m = M("Product");
			
			$proarr = M("Proclass")->select();
                        $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId);
                        $proTypeAllId[]=$proTypeId;
			if(is_array($proTypeAllId)){
				$where['cid']=array('in',$proTypeAllId);
			}
			$where['isshow']=1;
			$where['lang']=$language;
			//推荐
                        if($isrecomd==1){
                            $where['isrecom']=1;
                        }
                        //头部搜索
                        if($proname!=""){
                            $where['proname']=array('like','%'.$proname.'%');
                            $this->assign('proname',$proname);
                        }
                        //精品推荐
                        if(!empty($jingxuan)){
                            $where['pro_jingxuan']=1;
                        }
                        //首页传值过来微币判断
                        if($integral){
                            switch ($integral) {
                                            case '1':
                                                    $where['pro_jifen']=array('lt',1000);
                                                    break;
                                            case '2':
                                                    $num=array(
                                                        (int)(1000),
                                                        (int)(9999)
                                                    );
                                                    $where['pro_jifen']=array('between',$num);
                                                    break;
                                            case '3':
                                                    $num=array(
                                                        (int)(10000),
                                                        (int)(29999)
                                                    );
                                                    $where['pro_jifen']=array('between',$num);
                                                    break;
                                            default:
                                                    $where['pro_jifen']=array('gt',30000);
                                                    break;
                                    }
                        }
                       
                        //判断是否为主分类
                        if(is_array($opage)){
                            $st="";
                                    foreach ($opage as $key => $value) {
                                            $st=$st.",".$value;

                                    }
                                    $st=substr($st, 1);
                            $where['cid']=array('in',$st);
                        }elseif(!empty($opage)){
                            if($opage==6){
                                $where['income_front']=1;
                            }else{
                              $where['cid']=$opage;  
                            }
                        }

                        //微币搜索限制搜索
                        if(!empty($min) && !empty($max)){
                            $where['pro_jifen']=array('between',''.$min.','.$max.'');
                        }
                        if(!empty($min) && empty($max)){
                            $where['pro_jifen']=array('gt',''.$min.'');
                        }
                        if(empty($min) && !empty($max)){
                            $where['pro_jifen']=array('lt',''.$max.'');
                        }

                        if($orderbyname==''){
                                            $orderbyname="orderby";
                                    }
                                    if($orderby==1){
                                            $orderstr = "$orderbyname asc";
                                    }elseif($orderbyname=="pro_jifen2"){
                                            $orderstr = "pro_jifen asc";
                                    }else{
                                            $orderstr = "$orderbyname desc";
                                    }
                                //可兑换
                                if($keduih){
                                    $where1=array(
                                        'pro_jifen'=>array('lt',$keduih),
                                        'income_front'=>1,
                                        '_logic'=>'or'
                                    );
                                    $where=array(
                                        $where,
                                        $where1,
                                        '_logic'=>'and'
                                    );
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
                                            $page -> setConfig('prev','&nbsp;&nbsp;上一页&nbsp;&nbsp;');
                                            $page -> setConfig('next','&nbsp;&nbsp;下一页&nbsp;&nbsp;');
                                            $page ->setConfig('theme',"%upPage% %linkPage% %downPage%");
                                            $show = $page->show();
                                            $proData = $m->where($where)->order($orderstr)->limit($page->firstRow.','.$page->listRows)->select();
                                            $this->assign("page",$show);
                                    }
                                            //计算收益开始
                                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEYEAR_2016'")->find();
                                            $current =time();
                                            $result2=M("Borrow_tender_reward","hrcf_")->where("`borrow_nid`='".$result['borrow_nid']."' and `start_time` < ".$current." and `end_time` > ".$current."")->find();
                                            $lastresult=array(
                                                'borrow_apr'=>$result['borrow_apr']+$result2['borrow_apr'],//年华率
                                                'borrow_period'=>$result['borrow_period'],//月数
                                                'borrow_nid'=>$result['borrow_nid'],
                                            );
                                            foreach ($proData as $key => $value) {
                                                $numb=(1+((100-$value['wgbl'])/$value['wgbl']));
                                                $reward_temp=($value['pro_jifen']/5)*$numb;
                                                $money=ceil((($reward_temp/3*100)/$lastresult['borrow_apr']+($value['pro_jifen']/5))/100)*100;
                                                $proData[$key]['reward_temp']=number_format(((($money-($value['pro_jifen']/5))*$lastresult['borrow_apr'])/100*3)-($value['pro_jifen']/5),2,'.','');
                                            }
                                            //收益计算结束
                                    return $proData;


                            }
		
		//产品列表取值(传分类id)递归
		//$proTypeId:分类id。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getProOrder($proTypeId=0,$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10,$isrecomd=0,$orderbyname="",$jingxuan){
			$proData = array();
			$m = M("Product");
			$proarr = M("Proclass")->select();
                        $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId);
                        $proTypeAllId[]=$proTypeId;
			if(is_array($proTypeAllId)){
				$where['cid']=array('in',$proTypeAllId);
			}
			$where['isshow']=1;

			$where['lang']=$language;
                        $where['income_front']=0;
			//推荐
                        if($isrecomd==1){
                            $where['isrecom']=1;
                        }
                        //精选
                        if($jingxuan==1){
                            $where['pro_jingxuan']=1;
                        }
                                    if($orderbyname==''){
                                            $orderbyname="orderby";
                                    }
                                    if($orderby==1){
                                            $orderstr = "$orderbyname asc";
                                    }else{
                                            $orderstr = "$orderbyname desc";
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
		//产品列表取值(传分类name)
		//$proTypeName:分类name。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
		//$orderby 1正序 0倒叙
		protected function getPro2($proTypeName="",$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10){
			$proData = array();
			$proTypeId = M("Proclass")->where(array('proclassname'=>$proTypeName))->find();
			$m = M("Product");
			if(is_array($proTypeId)){
				$where['cid']=$proTypeId[id];
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



		//产品列表取值(传分类name)
        //$proTypeName:分类name。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
        //$orderby 1正序 0倒叙
        protected function getPro3($proTypeName="",$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10,$isrecomd=0,$proname=""){
            $proData = array();
            
            $proTypeId = M("Proclass")->where(array('proclassname'=>$proTypeName))->find();
            $proarr = M("Proclass")->select();
            $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId[id]);

            $proTypeAllId[]=$proTypeId[id];

            $m = M("Product");
            if(is_array($proTypeAllId)){
                $where['cid']=array('in',$proTypeAllId);

            }
            $where['isshow']=1;

            $where['lang']=$language;

            //推荐
            if($isrecomd==1){
            	$where['isrecom']=1;
            }

             if($proname!=""){
            	$where['proname']=array('like','%'.$proname.'%');
            }

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

        //产品列表取值(传分类name,带查询条件)
        //$proTypeName:分类name。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
        //$orderby 1正序 0倒叙
        protected function getPro4($proTypeName="",$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10,$isrecomd=0,$proname=""){
            $proData = array();
            
            $proTypeId = M("Proclass")->where(array('proclassname'=>$proTypeName))->find();
            $proarr = M("Proclass")->select();
            $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId[id]);

            $proTypeAllId[]=$proTypeId[id];

            $m = M("Product");
            if(is_array($proTypeAllId)){
                $where['cid']=array('in',$proTypeAllId);

            }
            $where['isshow']=1;

            $where['lang']=$language;
            //推荐
            if($isrecomd==1){
            	$where['isrecom']=1;
            }
            if($proname!=""){
            	$where['proname']=array('like','%'.$proname.'%');
            }

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

        
        //产品列表取值(传分类name)
        //$proTypeName:分类name。为0表示查询所有;$language:语言版本;$proLine:显示条数;$isPage是否分页 0不分页 1分页;$pageNum=10一页十条数据
        //$orderby 1正序 0倒叙
        protected function getPro5($proTypeName="",$language=1,$proLine,$orderby=1,$isPage=0,$pageNum=10,$isrecomd=0,$proname=""){
            $proData = array();
            
            $proTypeId = M("Proclass")->where(array('proclassname'=>$proTypeName))->find();
            $proarr = M("Proclass")->select();
            $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId[id]);

            $proTypeAllId[]=$proTypeId[id];

            $m = M("Product");
            if(is_array($proTypeAllId)){
                $where['cid']=array('in',$proTypeAllId);

            }
            $where['isshow']=1;

            $where['lang']=$language;

            //推荐
       
            $where['isrecom']=$isrecomd;
            

             if($proname!=""){
            	$where['proname']=array('like','%'.$proname.'%');
            }

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
		
		
		//替换关键字方法
		//protected function keywords_link($content){
//			/*
//				1、把已有的关键字链接替换成文字 
//				2、把关键字从长至短排列 
//				3、从长至短替换关键字为链接，替换的同时查找有没有包含其他关键字，如果有，把其中子关键字替换成{子关键字的md5值} 
//				4、把{子关键字的md5值}替换回来
//
//			*/
//
//			$keydata = M("Keyword")->select();
//			$new_content = $content;
//
//			
//			
//			//关键字从长至短排序  
//			usort($keydata, function($a, $b) {
//            $al = strlen($a['key_name']);
//            $bl = strlen($b['key_name']);
//            if ($al == $bl)
//                return 0;
//            return ($al > $bl) ? -1 : 1;
//       		});
//
//			
//			$tmpKwds = array(); //存放暂时被替换的子关键字
//			 foreach ($keydata as $i => $v) {
//			 	$kwd = $v[key_name];
//			 	for($j=$i+1; $j<count($keydata); $j++) {  
//					  $subKwd = $keydata[$j][key_name];
//					  $replace_str="---$j";
//					   //如果包含其他关键字，暂时替换成其他字符串，如 茶叶 变成   
//					  if(strpos($kwd, $subKwd) !== false) {  
//					   $tmpKwd = $replace_str;  
//					   $kwd = str_replace($subKwd, $tmpKwd, $kwd);  
//					   $tmpKwds[subKwd][] = $subKwd;
//					   $tmpKwds[tmpKwd][] = $tmpKwd;
//
//					  }
//				}
//				
//    			if($v['no_follow']==1){
//					$no_follow_str="rel=\"nofollow\"";
//				}else{
//					$no_follow_str="";
//				}
//				if($v['new_window']==1){
//					$new_window_str="target=\"_blank\"";
//				}else{
//					$new_window_str="";
//				}
//
//				$str='<a href="'.$v[key_url].'" style="'.$v[key_style].'" '.$no_follow_str.' '.$new_window_str.' >'.$kwd.'</a>';
//				$new_content = preg_replace('/('.$v[key_name].')/i', "$str", $new_content, $v[match_num]);  // 所有的匹配项都会被替换	
//			  	
//
//			  
//			   }
//
//			  	//把代替子关键字的字符串替换回来  
//				foreach($tmpKwds[subKwd] as $k=>$kwd) {  
// 					$new_content = str_replace($tmpKwds[tmpKwd][$k],$kwd, $new_content);  
//				}  
//			
//			return $new_content;
//		}

		//传递父级分类id 返回所有子类id
		public function getChildsId($cate,$pid){
			$arr = array();
			foreach($cate as $v){
				if($v[pid]==$pid){
					$arr[]=$v[id];
					$arr = array_merge($arr,$this->getChildsId($cate,$v[id]));
				}
			}
			$arr[]=$pid;
			return $arr;
		}

		
	}
?>