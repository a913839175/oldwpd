<?
	class PayAction extends CommonAction{
		public function _initialize(){
			vendor("Tenpay.classes.RequestHandler");
			vendor("Tenpay.classes.ResponseHandler");
			vendor("Tenpay.classes.function");
			vendor("Tenpay.classes.client.ClientResponseHandler");
			vendor("Tenpay.classes.client.TenpayHttpClient");
		}
		
		public function index(){

		$curDateTime = date("YmdHis");
		
		//4位随机数
		$randNum = rand(1000, 9999);
		$data=array(
		'orderid'=>$curDateTime . $randNum,
		'title'=>'TP的使用',
		'money'=>0.01,
		'remark'=>'这是备注，这是备注',
		);

			$this->tenpay($data);
		}
		public function tenpay($data){

			//获取参数
			$tenpay_config=C("tenpay_config");
			 /* 获取提交的订单号 */
	         $out_trade_no = $data["orderid"];

	         /* 获取提交的商品名称 */
	         $product_name = $data["title"];

	         /* 获取提交的商品价格 */
	         $order_price = $data["money"];

	         /* 获取提交的备注信息 */
	         $remarkexplain = $data["remark"];

	         /* 支付方式 即时到账 */
	         $trade_mode = 1;

	         $strDate = date("Ymd");
	         $strTime = date("His");

	         $partner = $tenpay_config['partner'];
	         
	        
	         $return_url = $tenpay_config['return_url'];
	         $notify_url = $tenpay_config['notify_url'];


	         /* 商品价格（包含运费），以分为单位 */
	         $total_fee = $order_price * 100;

	         /* 商品名称 */
	         $desc = "商品：" . $product_name . ",备注:" . $remarkexplain;

	         /* 创建支付请求对象 */
	         $reqHandler = new RequestHandler();
	         $reqHandler->init();
        	 $reqHandler->setKey(trim($tenpay_config['key']));
	         $reqHandler->setGateUrl("https://gw.tenpay.com/gateway/pay.htm");

	         //----------------------------------------
			//设置支付参数 
			//----------------------------------------
			$reqHandler->setParameter("partner", $partner);
			$reqHandler->setParameter("out_trade_no", $out_trade_no);
			$reqHandler->setParameter("total_fee", $total_fee);  //总金额
			$reqHandler->setParameter("return_url", $return_url);
			$reqHandler->setParameter("notify_url", $notify_url);
			$reqHandler->setParameter("body", $desc);
			$reqHandler->setParameter("bank_type", "DEFAULT");  	  //银行类型，默认为财付通
			//用户ip
			$reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);//客户端IP
			$reqHandler->setParameter("fee_type", "1");               //币种
			$reqHandler->setParameter("subject",$desc);          //商品名称，（中介交易时必填）

			//系统可选参数
			$reqHandler->setParameter("sign_type", "MD5");  	 	  //签名方式，默认为MD5，可选RSA
			$reqHandler->setParameter("service_version", "1.0"); 	  //接口版本号
			$reqHandler->setParameter("input_charset", "utf-8");   	  //字符集
			$reqHandler->setParameter("sign_key_index", "1");    	  //密钥序号

			//业务可选参数
			$reqHandler->setParameter("attach", "");             	  //附件数据，原样返回就可以了
			$reqHandler->setParameter("product_fee", "");        	  //商品费用
			$reqHandler->setParameter("transport_fee", "0");      	  //物流费用
			$reqHandler->setParameter("time_start", date("YmdHis"));  //订单生成时间
			$reqHandler->setParameter("time_expire", "");             //订单失效时间
			$reqHandler->setParameter("buyer_id", "");                //买方财付通帐号
			$reqHandler->setParameter("goods_tag", "");               //商品标记
			$reqHandler->setParameter("trade_mode",1);              //交易模式（1.即时到帐模式，2.中介担保模式，3.后台选择（卖家进入支付中心列表选择））
			$reqHandler->setParameter("transport_desc","");              //物流说明
			$reqHandler->setParameter("trans_type","1");              //交易类型
			$reqHandler->setParameter("agentid","");                  //平台ID
			$reqHandler->setParameter("agent_type","");               //代理模式（0.无代理，1.表示卡易售模式，2.表示网店模式）
			$reqHandler->setParameter("seller_id","");                //卖家的商户号



			//请求的URL
			$reqUrl = $reqHandler->getRequestURL();

			//获取debug信息,建议把请求和debug信息写入日志，方便定位问题
			/**/
			$debugInfo = $reqHandler->getDebugInfo();
			//echo "<br/>" . $reqUrl . "<br/>";
			//echo "<br/>" . $debugInfo . "<br/>";

			header("Location:$reqUrl");  //跳转
		}

		

		/*支付成功跳转处理*/
		 
     function tenreturnurl() {
        //删除__URL__参数
        unset($_GET['_URL_']);

         /* 创建支付应答对象 */
         $tenpay_config = C('tenpay_config');
         $resHandler = new ResponseHandler();
         $resHandler->setKey(trim($tenpay_config['key']));
 
		 //判断签名
         if ($resHandler->isTenpaySign()) {
             //通知id
             $notify_id = $resHandler->getParameter("notify_id");
             //商户订单号
             $out_trade_no = $resHandler->getParameter("out_trade_no");
             //财付通订单号
             $transaction_id = $resHandler->getParameter("transaction_id");
             //金额,以分为单位
             $total_fee = $resHandler->getParameter("total_fee");
             //如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
             $discount = $resHandler->getParameter("discount");
             //支付结果
             $trade_state = $resHandler->getParameter("trade_state");
             //交易模式,1即时到账
             $trade_mode = $resHandler->getParameter("trade_mode");
             //支付完成时间
             $time_end = $resHandler->getParameter("time_end");
             $parameter = array(
                 "out_trade_no" => $out_trade_no, //商户订单编号；
                 "trade_no" => $transaction_id, //财付通订单号；
                 "total_fee" => $total_fee, //交易金额；
                 "trade_status" => $trade_state, //交易状态
                 "notify_id" => $notify_id, //通知校验ID。
                 "notify_time" => $time_end, //通知的发送时间。
             );
             if ("1" == $trade_mode) {
                 if ("0" == $trade_state) {
                     //$status = CommonController::checkorderstatus($out_trade_no);
                     //if (!$status) {
                     //    CommonController::orderhandle($parameter);
                         //进行订单处理，并传送从支付宝返回的参数；
                     //}
                     $this->success("支付成功");
                 } else {
                     //当做不成功处理
                     $this->error("支付失败");
                 }
             }
         } else {
             $this->error("认证签名失败，" . $resHandler->getDebugInfo());
         }
     }


	/*财付通异步通知处理方法*/
    function tennotifyurl() {
         $tenpay_config = C('tenpay_config');
         /* 创建支付应答对象 */
         $resHandler = new ResponseHandler();
         $resHandler->setKey(trim($tenpay_config['key']));
         //判断签名
         if ($resHandler->isTenpaySign()) {
 
            //通知id
             $notify_id = $resHandler->getParameter("notify_id");
 
            //通过通知ID查询，确保通知来至财付通
             //创建查询请求
             $queryReq = new RequestHandler();
             $queryReq->init();
             $queryReq->setKey(trim($tenpay_config['key']));
             $queryReq->setGateUrl("https://gw.tenpay.com/gateway/simpleverifynotifyid.xml");
             $queryReq->setParameter("partner", trim($tenpay_config['partner']));
             $queryReq->setParameter("notify_id", $notify_id);
 
            //通信对象
             $httpClient = new TenpayHttpClient();
             $httpClient->setTimeOut(5);
             //设置请求内容
             $httpClient->setReqContent($queryReq->getRequestURL());
 
            //后台调用
             if ($httpClient->call()) {
                 //设置结果参数
                 $queryRes = new ClientResponseHandler();
                 $queryRes->setContent($httpClient->getResContent());
                 $queryRes->setKey(trim($tenpay_config['key']));
 
                if ($resHandler->getParameter("trade_mode") == "1") {
                     //判断签名及结果（即时到帐）
                     //只有签名正确,retcode为0，trade_state为0才是支付成功
                     if ($queryRes->isTenpaySign() && $queryRes->getParameter("retcode") == "0" && $resHandler->getParameter("trade_state") == "0") {
 
                        //通知id
                         $notify_id = $resHandler->getParameter("notify_id");
                         //商户订单号
                         $out_trade_no = $resHandler->getParameter("out_trade_no");
                         //财付通订单号
                         $transaction_id = $resHandler->getParameter("transaction_id");
                         //金额,以分为单位
                         $total_fee = $resHandler->getParameter("total_fee");
                         //如果有使用折扣券，discount有值，total_fee+discount=原请求的total_fee
                         $discount = $resHandler->getParameter("discount");
                         //支付结果
                         $trade_state = $resHandler->getParameter("trade_state");
                         //交易模式,1即时到账
                         $trade_mode = $resHandler->getParameter("trade_mode");
                         //支付完成时间
                         $time_end = $resHandler->getParameter("time_end");
                         $parameter = array(
                             "out_trade_no" => $out_trade_no, //商户订单编号；
                             "trade_no" => $transaction_id, //财付通订单号；
                             "total_fee" => $total_fee, //交易金额；
                             "trade_status" => $trade_state, //交易状态
                             "notify_id" => $notify_id, //通知校验ID。
                             "notify_time" => $time_end, //通知的发送时间。
                         );
                         //$status = CommonController::checkorderstatus($out_trade_no);
                        // if (!$status) {
                         //    CommonController::orderhandle($parameter);
                             //进行订单处理，并传送从支付宝返回的参数；
                        // }
                         echo "success";
                     } else {
 
                        echo "fail";
                     }
                 }
             } else {
                 //通信失败
                 echo "fail";
                 //后台调用通信失败,写日志，方便定位问题
                 echo "<br>call err:" . $httpClient->getResponseCode() . "," . $httpClient->getErrInfo() . "<br>";
             }
         } else {
             echo "<br/>" . "认证签名失败" . "<br/>";
             echo $resHandler->getDebugInfo() . "<br>";
         }
     }   


}
?>