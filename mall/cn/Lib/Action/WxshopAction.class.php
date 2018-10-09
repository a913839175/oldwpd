<?php
class WxshopAction extends Action {

	public function test(){
		header("Content-type: text/html; charset=utf-8");
		// $arr=array('arg0'=>1,'arg1'=>'1.00','userId'=>4001,'cmd'=>420203,'clientIp'=>'115.217.163.95','sign'=>'sssdsadsadasd');
		// $js=json_encode($arr);
		$id=1;
		$amount=1.00;
		$userId=4135;//4001
		$cmd=420203;
		$clientIp='115.217.163.95';
		$sign=md5($userId.$cmd.$clientIp);
		$webs_param=array();
		$webs_param['id']=$id;
		$webs_param['amount']=$amount;
		$webs_param['userId']=$userId;
		$webs_param['cmd']=$cmd;
		$webs_param['clientIp']=$clientIp;
		$webs_param['sign']=$sign;

		$webs_json=json_encode($webs_param);

		// $webs_arr=array('arg0'=> $webs_param);
		$webs_arr=array('arg0'=> $webs_json);

		// $webs_arr=array('arg0'=> array('id'=>$id,'amount'=>$amount,'userId'=>$userId,'cmd'=>$cmd,'clientIp'=>$clientIp,'sign'=>$sign));

		$soap=new SoapClient('http://192.168.1.153/appweb/webservice/phpClient?wsdl');
		// $webservice_result=$soap->requestData(array($webs_arr));
		$webservice_result=$soap->__call("requestData",array($webs_arr));
		// $webservice_result=$soap->__call("requestData",array($arr));

		// print_r($webservice_result);
		// print_r((array)$webservice_result);
		$result_array=(array)$webservice_result;
		// print_r((array)$webservice_result);
		$result_json=$result_array['return'];
		// print_r($result_array['return']);
		$result_arr=(array)json_decode($result_json);
		$result_resultCode=$result_arr['resultCode'];
		$resultMessage=$result_arr['resultMessage'];
		// print_r($result_arr['resultCode']);
		// echo $result_arr['resultCode'];
		// echo $result_array['return'];

		echo $result_resultCode;
		echo "<br/>";
		echo $resultMessage;
		// print_r($soap->__getFunctions());
		// print_r($soap->__getTypes());
		// $xx=$soap->requestData(array($arr));
		// print_r($soap->__call("requestData",array($arr)));
		//requestObject
		//requestData
	}

	function object_array($array){
	   if(is_object($array)){
	   		$array = (array)$array;
	   }
	   if(is_array($array)){
	    	foreach($array as $key=>$value){
	    		$array[$key] = object_array($value);
	    	}
	   }
	   return $array;
	}

	public function goodslist(){

		$user_id =  $_SESSION['k_id'];
		$con_user_jifen['user_id']=$user_id;
		if($user_id==''||$user_id==null){
			$myscore=0;
		}else{
			$my_credit_res=M("Credit","hrcf_")->where($con_user_jifen)->find();
			$my_credit=$my_credit_res['credit'];
			if($my_credit==null||$my_credit==""){
				$myscore=0;
			}else{
				$myscore=$my_credit;
			}
		}

		$p=$_REQUEST['page'];
		if($p==null||$p==''){
			$p=1;
		}

		$proTypeId=1;//微币商品
		$productlist=$this->getprolist($proTypeId,$p,10,'orderby DESC');


		$this->assign("productlist",$productlist);
		$this->assign("myscore",$myscore);
		$this->display();

	}

	public function searchgoods(){
		$p=$_REQUEST['page'];
		if($p==null||$p==''){
			$p=1;
		}

		$proTypeId=1;//微币商品
		$productlist=$this->getprolist($proTypeId,$p,10,'orderby DESC');


		if($productlist){
			$returndata['data']=$productlist;
            $returndata['info']=$p;
            $returndata['status']=1;
            $this->ajaxReturn($returndata,'JSON');
		}else{
			$returndata['data']=null;
            $returndata['info']="无更多数据";
            $returndata['status']=0;
            $this->ajaxReturn($returndata,'JSON');
		}
	}

	public function goodsdetail(){
		$productid=$_REQUEST['productid'];

		if($productid==null||$productid==''){
			// $this->error("页面错误",U('Wxshop/goodslist'));
			$info="页面错误";
			$button_info="返回";
			$tourl=U('Wxshop/goodslist');
			$this->assign("info",$info);
			$this->assign("tourl",$tourl);
			$this->assign("button_info",$button_info);
			$this->display('msg');
		}else{
			$user_id =  $_SESSION['k_id'];
			$con_user_jifen['user_id']=$user_id;

			if($user_id==''||$user_id==null){
				$myscore=0;
			}else{
				$my_credit_res=M("Credit","hrcf_")->where($con_user_jifen)->find();
				$my_credit=$my_credit_res['credit'];
				if($my_credit==null||$my_credit==""){
					$myscore=0;
				}else{
					$myscore=$my_credit;
				}
			}
			
			$con['id']=$productid;
			$con['cid']=1;//微币商品
			$con['isshow']=1;
			$con['lang']=1;
			$product = M("Product")->where($con)->find();
			if($product){
				$this->assign("product",$product);
				$this->assign("myscore",$myscore);
				$this->display();
			}else{
				// $this->error("商品不存在",U('Wxshop/goodslist'));
				$info="商品不存在";
				$button_info="返回";
				$tourl=U('Wxshop/goodslist');
				$this->assign("info",$info);
				$this->assign("tourl",$tourl);
				$this->assign("button_info",$button_info);
				$this->display('msg');
			}
		}
	}

	// public function msg(){
	// 	$this->display();
	// }


	public function exchange_jifen(){
		
		$user_id =  $_SESSION['k_id'];
		if($user_id==''||$user_id==null){
			// $this->error("请先登录",U('Member/login'));
			$productid=I("post.productid");
			$info="请先登录";
			$button_info="登录";

			$from=U('Wxshop/goodsdetail',array('productid'=>$productid));
			$fromurl=urlencode($from);

			$tourl=U('Wxshop/login',array('from'=>$fromurl));

			$this->assign("info",$info);
			$this->assign("tourl",$tourl);
			$this->assign("button_info",$button_info);
			$this->display('msg');
		}else{
			$productid=I("post.productid");
			$address=I("post.address");
			//判断用户微币是否能都兑换此产品
			/**垮库操作*/
			if($productid==''||$productid==null){
				$info="商品错误";
				$button_info="返回";
				$tourl=U('Wxshop/goodslist');
				$this->assign("info",$info);
				$this->assign("tourl",$tourl);
				$this->assign("button_info",$button_info);
				$this->display('msg');
			}else{
				$con_pro['id']=$productid;
				$con_pro['cid']=1;//微币商品
				$con_pro['isshow']=1;
				$con_pro['lang']=1;
				$product = M("Product")->where($con_pro)->find();

				if($product){
					$pro_jifen=$product['pro_jifen'];
					$con_user_jifen['user_id']=$user_id;
					// $user_credit_res=M("Credit","hrcf_",C('DB_CONFIG1'))->where($con_user_jifen)->find();
					$user_credit_res=M("Credit","hrcf_")->where($con_user_jifen)->find();
					$user_credit=$user_credit_res['credit'];
					if($user_credit<$pro_jifen){
						// $this->error("您的微币不足，不能兑换此产品",U('Product/proinfo',array('id'=>$pid)));	
						$info="您的微币不足，不能兑换此产品";
						$button_info="返回";
						$tourl=U('Wxshop/goodsdetail',array('productid'=>$productid));
						$this->assign("info",$info);
						$this->assign("tourl",$tourl);
						$this->assign("button_info",$button_info);
						$this->display('msg');
					}else{
						if($address==""||$address==null){
							// $this->error("配送地址不能为空",U('Product/proinfo',array('id'=>$pid)));
							$info="配送地址不能为空";
							$button_info="返回";
							$tourl=U('Wxshop/goodsdetail',array('productid'=>$productid));
							$this->assign("info",$info);
							$this->assign("tourl",$tourl);
							$this->assign("button_info",$button_info);
							$this->display('msg');
						}else{
							$con_user['user_id']=$user_id;
							// $user_info=M("Users_info","hrcf_",C('DB_CONFIG1'))->where($con_user)->find();
							$user_info=M("Users_info","hrcf_")->where($con_user)->find();

							$data_order['name']=$user_info['realname'];
							$data_order['address']=$address;
							$data_order['niname']=$user_info['niname'];
							$data_order['user_id']=$user_info['user_id'];
							$data_order['phone']=$user_info['niname'];
							$data_order['addtime']=time();
							$data_order['pid']=$productid;
							$data_order['tradeid']=date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
							// $result_order=M("order","tp_",C('DB_CONFIG2'))->data($data_order)->add();
							$result_order=M("order")->data($data_order)->add();
							if($result_order){
								//去除对应的微币
								/**垮库操作*/

								$now_credit=$user_credit-$pro_jifen;
								$credits_unsea=unserialize($user_credit_res['credits']);
								$credits_unsea[0]['num']=(string)$now_credit;

								$data_cre['credit']=$now_credit;
								$data_cre['credits']=serialize($credits_unsea);
								$con_cre['user_id']=$user_id;

								// $result_cre=M("Credit","hrcf_",C('DB_CONFIG1'))->where($con_cre)->save($data_cre);
								$result_cre=M("Credit","hrcf_")->where($con_cre)->save($data_cre);

								$con_hit['id']=$productid;
								$data_hit['hits']=array('exp','hits+1');
								$result_hit=M('Product')->where($con_hit)->save($data_hit);
								
								// $this->success("兑换成功",U('Product/index'));
								$info="兑换成功";
								$button_info="返回";
								$tourl=U('Wxshop/goodslist');
								$this->assign("info",$info);
								$this->assign("tourl",$tourl);
								$this->assign("button_info",$button_info);
								$this->display('msg');
							}else{
								// $this->error("兑换失败",U('Product/index'));

								$info="兑换失败";
								$tourl=U('Wxshop/goodsdetail',array('productid'=>$productid));
								$this->assign("info",$info);
								$this->assign("tourl",$tourl);
								$this->assign("button_info",$button_info);
								$this->display('msg');
								 
							}
						}
					}
				}else{
					$info="商品不存在";
					$button_info="返回";
					$tourl=U('Wxshop/goodslist');
					$this->assign("info",$info);
					$this->assign("tourl",$tourl);
					$this->assign("button_info",$button_info);
					$this->display('msg');
				}
			}
		}
			
	}


	protected function getprolist($proTypeId,$p=1,$pagenum=10,$orderstr='orderby DESC'){

		Load('extend'); //加载函数库
		import("@.Class.Getcate"); //加载分类处理类

		$proarr = M("Proclass")->select();
        $proTypeAllId = Getcate::getChildsId($proarr,$proTypeId);


        $proTypeAllId[]=$proTypeId;

       
		if(is_array($proTypeAllId)){
			$where['cid']=array('in',$proTypeAllId);
		}
		$where['isshow']=1;

		$where['lang']=1;

		import("ORG.Util.Paged");
		$count = M('Product')->where($where)->count();
		$page = new Page($count,$pagenum);
		$productlist = M('Product')->where($where)->order($orderstr)->page($p.','.$pagenum)->select();

		return $productlist;
	}

	public function login(){
		$from=$_GET['from'];
		if($from!=null&&$from!=""){
			$fromurl=urldecode($from);
		}else{
			$fromurl=U('Wxshop/goodslist');
		}
		$this->assign("fromurl",$fromurl);
		$this->display();
	}


	public function dologin(){
		$username=I("post.j_username");
		$password=I("post.password");
		

		if($username==""||$username==null){
			$returndata['status']=1;
			$returndata['info']="用户名不能为空";
			$returndata['data']=null;
			$this->ajaxReturn($returndata,'JSON');
		}

		if($password==""||$password==null){
			$returndata['status']=2;
			$returndata['info']="密码不能为空";
			$returndata['data']=null;
			$this->ajaxReturn($returndata,'JSON');
		}
		

		$con['username']=$username;
		$con['password']=md5($password);

		$result =M("Users","hrcf_")->where($con)->find();
		
		if(count($result)>0){
			$_SESSION['k_user']=$result['username'];
			$_SESSION['k_id']=$result['user_id'];

			$returndata['status']=0;
			$returndata['info']="登录成功";
			$returndata['data']=null;
			$this->ajaxReturn($returndata,'JSON');
		}else{
			$returndata['status']=3;
			$returndata['info']="用户名或者密码错误";
			$returndata['data']=null;
			$this->ajaxReturn($returndata,'JSON');
		}
	}





	
	
}