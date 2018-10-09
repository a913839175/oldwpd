<?php

class ProductAction extends CommonAction
{
    public function index()
    {


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
        //固定微币搜素
        if(I("get.integral")){
            $integral=I("get.integral");
        }
        //头部搜索
        if(I("post.proname")){
            $proname=I("post.proname");
        }elseif(I("get.proname")){
            if(I("get.proname")=="可兑换"){
                $user_id=$_SESSION['k_id'];
                if($user_id){
                    $credit=M("credit","hrcf_")->where(array('user_id'=>$user_id))->find();
                    $keduih=(int)($credit['credit']);
                }
            }else{
                $proname=I("get.proname");
            }
        }
        //微币最小最大值
        if(I("post.min")){
            $min = I("post.min");
            $this->assign("min",$min);
        }elseif(I("get.min")){
            $min = I("get.min");
            $this->assign("min",$min);
        }
        if(I("post.max")){
            $max = I("post.max");
            $this->assign("max",$max);
        }elseif(I("get.max")){
            $max = I("get.max");
            $this->assign("max",$max);
        }
        if($min!="" || $max!=""){
            $integral=NULL;
        }
        //精品推荐
        if(I("get.jingxuan")!=""){
            $jingxuan=I("get.jingxuan");
        }
        //类别搜索
/*        if(I("get.opage")){
            $opage=I("get.opage");
            $m=M("Proclass");
            $tpage=$m->where("`id`='".$opage."'")->find();
            $topage=$m->where("`id`='".$tpage['pid']."'")->find();
            if($topage['id']==1){
                 $topage=$m->where("`id`='".$opage."'")->find();
                  $opaget=$m->where("`pid`='".$opage."'")->select();
                  $opage=array();
                  foreach ($opaget as $k => $v) {
                      $opage[]=$v['id'];
                  }
            }
            $this->assign("topage",$topage);
            $this->assign("tpage",$tpage);
        }*/
        if(I("get.opage")){
            $opage=I("get.opage");
        }
        $sort = I("get.sort");
        //if ($sort == "") {
        if($opage==6){
            $pro_data = $this->getPro(1, 1, 0, 0, 1, 10,0,$proname,$integral,$opage,$min,$max,$sort,$jingxuan,$keduih);
        }else{
            $pro_data = $this->getPro(1, 1, 0, 0, 1, 24,0,$proname,$integral,$opage,$min,$max,$sort,$jingxuan,$keduih);
        }

        //} else {
        //    $pro_data = $this->getProOrder(1, 1, 0, 0, 0, 15, 0, $sort);

        //}
        $this->assign("pro_data", $pro_data);


        $this->display();

    }

//	TODO  确认地址
    public function address()
    {
        $user_id = $_SESSION['k_id'];
//        $id = I("get.id");
//        $data = M("Product")->where(array('id' => $id))->find();
        if ($user_id == '') {
            $this->error("请先登录", "https://old.weipaidai.com/?user&q=login");
        } else {
            $proid = I("post.proid");
//            dump($proid);
//            $pro_guige = I("post.pro_guige");

            //判断用户是否有权限能兑换此产品  2017.7.19 周秋浩
            if($proid == 168){
                if($_REQUEST['lang'] > 1){
                    $this->error("此产品只能兑换一个", U('Product/proinfo', array('id' => $proid)));
                }

                $zhebiao = ProductAction::check_user_tender();
                if($zhebiao < 300000){
                    $this->error("您没有权限兑换此产品", U('Product/proinfo', array('id' => $proid)));
                }

                $result = M("Order")->where(array('pid'=>168,'user_id'=>$user_id))->find();
                if($result){
                    $this->error("您已兑换此产品", U('Product/proinfo', array('id' => $proid)));
                }
            }

            //判断用户微币是否能都兑换此产品
            /**垮库操作*/
            $Product = M("Product")->where(array('id' => $proid))->find();
            $user_credit = M("Credit", "hrcf_")->where("user_id=$user_id")->getField("credit");
            $lang=$_REQUEST['lang'];
            if(I("post.jf_weibd")==1){
                $qixian=I("post.qixian");
                $cp=$qixian;
                $vb=($Product["pro_jifen"]*$lang)-$user_credit;
                if($vb<0){
                    $vb=0;
                }else{
                    $Product['pro_jifen']=$user_credit;
                }
                $balance=M("Account","hrcf_")->where ("user_id=$user_id")->find();

                    //计算收益开始
                    if($cp=="6"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDSIXMONTH_2016'")->find();
                    }elseif($cp=="12"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDYEAR_2016'")->find();
                    }elseif($cp=="24"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTWOYEAR_2016'")->find();
                    }elseif($cp=="36"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEYEAR_2016'")->find();
                    }elseif($cp=="1"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDONEMONTH_2016'")->find();
                    }elseif($cp=="3"){
                        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEMONTH_2016'")->find();
                    }else{
                        $this->error("非法参数", U('Product/proinfo', array('id' => $proid)));
                    }
                    $current =time();
                    $result2=M("Borrow_tender_reward","hrcf_")->where("`borrow_nid`='".$result['borrow_nid']."' and `start_time` < ".$current." and `end_time` > ".$current."")->find();
                    $lastresult=array(
                        'borrow_apr'=>$result['borrow_apr']+$result2['borrow_apr'],//年华率
                        'borrow_period'=>$result['borrow_period'],//月数
                        'borrow_nid'=>$result['borrow_nid'],
                    );
                    $days_year = date("Y")%4==0 ? 366 : 365;
                    $addtime=  time();
                    $num=(1+((100-$Product['wgbl'])/$Product['wgbl']));
                    if($cp=="6"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2*100)/(6*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(6*30/$days_year)/100-($vb/5),2,'.','');
                        $editime=$addtime+(6*30*24*3600);
                    }elseif($cp=="12"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100)-($vb/5),2,'.','');
                        $editime=strtotime("+ 1 year");
                    }elseif($cp=="24"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2/2*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100*2)-($vb/5),2,'.','');
                        $editime=strtotime("+ 2 year");
                    }elseif($cp=="36"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2/3*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100*3)-($vb/5),2,'.','');
                        $editime=strtotime("+ 3 year");
                    }elseif($cp=="1"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2*100)/(1*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(1*30/$days_year)/100-($vb/5),2,'.','');
                        $editime=$addtime+(1*30*24*3600);
                    }elseif($cp=="3"){
                        $reward_temp2=($vb/5)*$num;
                        $money=ceil((($reward_temp2*100)/(3*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                        $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(3*30/$days_year)/100-($vb/5),2,'.','');
                        $editime=$addtime+(3*30*24*3600);
                    }


                    if($balance['balance']-$money<0){
                       $this->error("账户余额不足，请充值", "https://old.weipaidai.com/?user&q=code/account/recharge_new");
                    }

                    $borrow_list=array(
                        "total"=>$money,
                        "reward_temp"=>$reward_temp,
                        "endtime"=>$editime,
                        "qixian"=>$cp,
                        "product"=>$Product['proname'],
                        "jifen"=>$Product['pro_jifen']
                    );
                    $this->assign("borrow_list",$borrow_list);
           }
            // $user_credit = M("Credit", "hrcf_", "DB_CONFIG1")->where("user_id=$user_id")->getField("credit");

           if($vo==0){
               if(I("post.jf_weibd")==1 || I("post.jf_zhij")==1){
                   if ($user_credit < $Product['pro_jifen']) {
                    $this->error("您的微币不足，不能兑换此产品", U('Product/proinfo2', array('id' => $proid)));
                }
               }else{
                   if ($user_credit < $Product['pro_jifen']) {
                    $this->error("您的微币不足，不能兑换此产品", U('Product/proinfo', array('id' => $proid)));
                }
               }

           }
            // $addresses = M("Address", "tp_", "DB_CONFIG2")->where("user_id=$user_id and address_status=1")->select();
            $addresses = M("Address")->where("user_id=$user_id and address_status=1")->select();
            // $default_address = M("Users", "hrcf_", "DB_CONFIG1")->where("user_id=$user_id")->getField("default_address");
            $default_address = M("Users", "hrcf_")->where("user_id=$user_id")->getField("default_address");
            $this->assign("Product", $Product);
            $this->assign("address", $addresses);
            $this->assign("default_address", $default_address);
            $this->assign("data", $_REQUEST);
//        热销推荐  查询所有分类，点击数由高到低排序
            $rxtj = $this->getProOrder(0, 1, 4, 0, 0, 0, 0, "hits");
            $this->assign("rxtj", $rxtj);
            $this->display();


        }
    }


    //	TODO  新增地址
    public function create_address()
    {

        $user_id = $_SESSION['k_id'];

        if ($user_id == '') {
            $this->error("请先登录", U('Member/login'));
        } else {
            // $c=M("Address", "tp_", "DB_CONFIG2")->where("user_id=$user_id and address_status=1")->count();
            $c=M("Address")->where("user_id=$user_id and address_status=1")->count();
            if($c<=2){
                $count=1;
                $arr['consignee'] = $_POST['consignee'];
                $arr['address_code'] = $_POST['address_code'];
                $arr['detailed_address'] = $_POST['detailed_address'];
                $arr['postal_code'] = $_POST['postal_code'];
                $arr['con_phone'] = $_POST['con_phone'];
                $arr['user_id'] = $user_id;

                // $add = M("Address", "tp_", "DB_CONFIG2")->add($arr);
                $add = M("Address")->add($arr);
                if ($add) {
                    $check = $_POST['check'];
                    if ($check == "true") {
                        // $update = M("Users", "hrcf_", "DB_CONFIG1")->execute("update hrcf_users set default_address=$add where user_id=$user_id");
                        $update = M("Users", "hrcf_")->execute("update hrcf_users set default_address=$add where user_id=$user_id");
//                    dump($update);
                    } else {
                        $update = 2;
                    }
                }else{
                    $update = 3;
                }
            }else{
                $count=2;
            }

//update 0:添加成功，更改不成功  1：添加成功，更改成功  2：添加成功，无需更改  3：添加不成功，无从更改
            //            返回的数组
            $n=M("Address")->where("user_id=$user_id and address_status=1")->count();
            $result['add'] = $add;
            $result['update'] = $update;
            $result['c'] = $count;
            $result['n'] = $n;
            $json = json_encode($result);
            echo urldecode($json);

        }
    }

//	TODO  修改地址
    public function update_address()
    {

        $user_id = $_SESSION['k_id'];

        if ($user_id == '') {
            $this->error("请先登录", U('Member/login'));
        } else {
            $arr['id'] = $_POST['id'];
            $arr['consignee'] = $_POST['consignee'];
            $arr['address_code'] = $_POST['address_code'];
            $arr['detailed_address'] = $_POST['detailed_address'];
            $arr['postal_code'] = $_POST['postal_code'];
            $arr['con_phone'] = $_POST['con_phone'];
            $arr['user_id'] = $user_id;
            // $save = M("Address", "tp_", "DB_CONFIG2")->save($arr);
            $save = M("Address")->save($arr);

            $check = $_POST['check'];
            if ($check == "true") {
                $address_id=$_POST['id'];
                // $update = M("Users", "hrcf_", "DB_CONFIG1")->execute("update hrcf_users set default_address=$address_id where user_id=$user_id");
                $update = M("Users", "hrcf_")->execute("update hrcf_users set default_address=$address_id where user_id=$user_id");
            } else {
                $update = 0;
            }

//update,chg  00:更新不成功，更改不成功  11：更新成功，更改成功  10：更新成功，无需更改或不成功  01：更新不成功，更改成功
            //            返回的数组
            $result['update'] = $save;
            $result['chg'] = $update;
            $json = json_encode($result);
            echo urldecode($json);

        }
    }



//    TODO 删除地址
    public function del_address(){
        $user_id = $_SESSION['k_id'];

        if ($user_id == '') {
            $this->error("请先登录", U('Member/login'));
        } else {
            $id = $_POST['id'];
            $arr['id']= $id;
            $arr['address_status']= 0;
            // $del = M("Address", "tp_", "DB_CONFIG2")->save($arr);
            $del = M("Address")->save($arr);
            //            返回的数组
            $result['d'] = $del;
            $json = json_encode($result);
            echo urldecode($json);
        }
    }

//    TODO 修改默认地址
    public function change_default_address(){
        $user_id = $_SESSION['k_id'];

        if ($user_id == '') {
            $this->error("请先登录", U('Member/login'));
        } else {
            $address_id=$_POST['id'];
            // $update = M("Users", "hrcf_", "DB_CONFIG1")->execute("update hrcf_users set default_address=$address_id where user_id=$user_id");
            $update = M("Users", "hrcf_")->execute("update hrcf_users set default_address=$address_id where user_id=$user_id");

            //            返回的数组
            $result['update'] = $update;
            $json = json_encode($result);
            echo urldecode($json);
        }
    }


    public function exchange()
    {
        $user_id = $_SESSION['k_id'];
        if ($user_id == '') {
            $this->error("请先登录", U('Member/login'));
        } else {
            $pid = I("post.proid");
            $address = I("post.address");
            $pro_guige = I("post.pro_guige");
            $pro_style = I("post.pro_style");
            $qixian = I("post.qixian");
            $total = I("post.total");
            $lang=I("post.lang");
            if($lang<1){
                $this->error("产品不能为空", U('Product/proinfo', array('id' => $pid)));
            }
            if($total!="" && $qixian !=6 && $qixian !=12 && $qixian !=24 && $qixian !=36){
                $reconten['msg']=0;
                $reconten['content']='期限选择错误';
                $result=json_encode($reconten);
                echo $result;
                exit;
            }
            //判断用户微币是否能都兑换此产品
            /**垮库操作*/
            // $pro_jifen = M("Product")->where(array('id' => $pid))->getField("pro_jifen");
            $user_credit = M("Credit", "hrcf_")->where("user_id=$user_id")->getField("credit");
            $pro_info = M("Product")->where(array('id' => $pid))->find();
            if($total){
                $jifen=($pro_info['pro_jifen']*$lang)-$user_credit;
                if($jifen<0){
                   $jifen=0;
                }else{
                    $pro_jifen=$user_credit;
                }
            }else{
               $pro_jifen=$pro_info['pro_jifen']*$lang;
            }
            //$credit=M("Credit","think_","DB_CONFIG1")->query("select credit from hrcf_credit where user_id=$user_id limit 1");
            // $user_credit = M("Credit", "hrcf_", "DB_CONFIG1")->where("user_id=$user_id")->getField("credit");
            if($pro_info['pro_store']<$lang){
                $this->error("库存不足，不能兑换此产品", U('Product/proinfo', array('id' => $pid)));
            }
            if($jifen==0){
                if ($user_credit < $pro_jifen) {
                    $this->error("您的微币不足，不能兑换此产品", U('Product/proinfo', array('id' => $pid)));
                }
            }

            // $m = M("Order", "tp_", "DB_CONFIG2");
            $m = M("Order");
            // $u = M("Users_info", "hrcf_", "DB_CONFIG1");
            $u = M("Users_info", "hrcf_");
            $user_info = $u->where("user_id=$user_id")->find();
            $balance=M("Account","hrcf_")->where ("user_id=$user_id")->find();
            if($balance['balance']-$total<0){
                $reconten['msg']=0;
                $reconten['content']='余额不足';
                $result=json_encode($reconten);
                echo $result;
                exit;
            }
            //$duihuanma = M("Duihuanma", "tp_", "DB_CONFIG2");
            //$duihuanma = M("Duihuanma");
            //$duihuan = $duihuanma->where("productid=$pid and status=0")->limit(1)->getField("duihuanma");

            if ($m->create()) {
                $address_con['id']=$_POST['consignee_msg'];
                $address_info=M("address")->where($address_con)->find();
                $m->name = $user_info['realname'];
                $m->niname = $user_info['niname'];
                $m->user_id = $user_info['user_id'];
                $m->address = $address_info['address_code'].$address_info['detailed_address'];
                if($user_info['phone']!=""){
                    $m->phone = $user_info['phone'];
                }else{
                    $m->phone = $user_info['niname'];
                }
                $m->addtime = time();
                $m->lang = $lang;
                $m->pid = $pid;
                $m->tradeid = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
                $m->fahuo_status=0;
                $m->duihuanma = $duihuan;
                $m->pro_style = $pro_style;
                $product_id=$m->add();
                if ($product_id) {
                    //去除对应的微币
                    /**垮库操作*/
                    // M("Credit", "hrcf_", "DB_CONFIG1")->execute("update hrcf_credit set credit=credit-$pro_jifen where user_id=$user_id");
                    $ax=M("Credit", "hrcf_")->execute("update hrcf_credit set credit=credit-($pro_jifen) where user_id=$user_id");
                    // M("Product", "tp_", "DB_CONFIG2")->execute("update tp_product set hits=hits+1 where id=$pid");
                    M("Product")->execute("update tp_product set hits=hits+1 ,pro_store=pro_store-".$lang." where id=$pid");
		        $arr_temp['user_id'] = $user_id;
                	$arr_temp['code'] = "borrow";
                	$arr_temp['type'] = "tender";
                	$arr_temp['article_id'] = "999";
                	$arr_temp['nid'] = "tender_success";
                	$arr_temp['value'] = -$pro_jifen;
                	$arr_temp['credit'] = -$pro_jifen;
                	$arr_temp['remark'] = "web微币兑换";
                	$arr_temp['addtime'] = time();
                    $add = M("Credit_log", "hrcf_")->add($arr_temp);

                    //发送红包
                    if(!(strpos($pro_info['proname'],"红包")===false)){

/*                    	if(!(strpos($pro_info['proname'],"1000元")===false)){
                    		$hongbao_total_temp="1000";
                    		$hongbao_type_temp="HONGBAOSEVEN";
                    	}elseif(!(strpos($pro_info['proname'],"3000元")===false)){
                    		$hongbao_total_temp="3000";
                    		$hongbao_type_temp="HONGBAOSANQIAN";
                    	}elseif(!(strpos($pro_info['proname'],"7000元")===false)){
                    		$hongbao_total_temp="7000";
                    		$hongbao_type_temp="HONGBAOQIQIAN";
                    	}elseif(!(strpos($pro_info['proname'],"10000元")===false)){
                    		$hongbao_total_temp="10000";
                    		$hongbao_type_temp="HONGBAOYIWANG";
                    	}elseif(!(strpos($pro_info['proname'],"30000元")===false)){
                    		$hongbao_total_temp="30000";
                    		$hongbao_type_temp="HONGBAOSANWANG";
                    	}elseif(!(strpos($pro_info['proname'],"50000元")===false)){
                    		$hongbao_total_temp="50000";
                    		$hongbao_type_temp="HONGBAOWUWANG";
                    	}elseif(!(strpos($pro_info['proname'],"70000元")===false)){
                    		$hongbao_total_temp="70000";
                    		$hongbao_type_temp="HONGBAOQIWANG";
                    	}elseif(!(strpos($pro_info['proname'],"100000元")===false)){
                    		$hongbao_total_temp="100000";
                    		$hongbao_type_temp="HONGBAOSHIWANG";
                    	}*/
                        if(!(strpos($pro_info['proname'],"加息")===false)){
                            $hongbao_type_temp="加息红包";
                            $hongbao_temp['apr']=$pro_info['pro_apr'];
                        }elseif(!(strpos($pro_info['proname'],"现金")===false)){
                            $hongbao_type_temp="现金红包";
                             $hongbao_temp['total']=$pro_info['pro_account'];
                        }elseif(!(strpos($pro_info['proname'],"投资")===false)){
                            $hongbao_type_temp="投资红包";
                            $hongbao_temp['total']=$pro_info['pro_account'];
                        }


                        $hongbao_id_temp = date("Ym").'HB'.date("dhmi").rand(10,99).$user_id;//订单号

                    	$hongbao_temp['user_id'] = $user_id;
//                        $hongbao_temp['total'] = $hongbao_total_temp;
                        $hongbao_temp['hongbaoid'] = $hongbao_id_temp;
                        $hongbao_temp['endtime'] = time()+(86400*$pro_info['pro_days']);
                        $hongbao_temp['status'] = 0;
                        $hongbao_temp['type'] = $hongbao_type_temp;
                        $hongbao_temp['begintime'] = time();
                        $hongbao_temp['condition']=$pro_info["pro_condition"];
                        $hongbao_temp['addtime']= time();
                        $hongbao_temp['edittime']= time();
                        $hongbao_temp['title']=$pro_info["proname"];
                        $hongbao_temp['describe']=$pro_info['proname'];
                        $hongbao_temp['product']=$pro_info['pro_product'];
                        $hongbao_temp['period']=$pro_info['period'];
                        $hongbao_temp['eid']=0;
                        $hongbao_temp['sms']=0;
                        for ($i=0; $i < $lang ; $i++) {
                           $add = M("Hongbao", "hrcf_")->add($hongbao_temp);
                        }
                    	$hongbdd=M("Order")->where("`user_id`='".$user_id."' and `fahuo_status` =0 and `lang`='".$lang."' and `pid`= '".$pid."'")->order("`id` DESC")->find();
                        M("Order")->execute("update `tp_order` set `fahuo_status`=1,`updatetime`='".time()."'  where id='".$hongbdd['id']."'");
                    }

                    $message_data['user_id']=0;
                    $message_data['type']='users';
                    $message_data['status']=1;
                    $message_data['receive_value']=$user_info['niname'].',';
                    $message_data['name']='商品兑换成功';
                    if (!(strpos($pro_info['proname'],"红包")===false)) {
                        $message_data['contents']='您成功兑换了'.$lang.'个'.$pro_info['proname'].'，请在“我的红包”查看和使用，感谢您对微拍贷的支持！<br><div style="float:right">--微拍贷</div>';
                    }else{
                        $message_data['contents']='您成功兑换了'.$lang.'个'.$pro_info['proname'].',我们将在15个工作日内将物品寄出，感谢您对微拍贷的支持<br><div style="float:right">--微拍贷</div>';
                    }

                    $message_data['addtime']=time();
                    $message_data['addip']=get_client_ip();
                    $message_data['sendphone']=0;
                    $add = M("message", "hrcf_")->add($message_data);

                    $message_receive_data['user_id']=0;
                    $message_receive_data['status']=0;
                    $message_receive_data['send_id']=$add;
                    $message_receive_data['send_userid']=0;
                    $message_receive_data['type']='user';
                    $message_receive_data['receive_id']=$user_id;
                    $message_receive_data['receive_value']=$user_info['niname'];
                    $message_receive_data['name']='商品兑换成功';
                    if (!(strpos($pro_info['proname'],"红包")===false)) {
                        $message_receive_data['contents']='您成功兑换了'.$pro_info['proname'].'*'.$lang.'，请在“我的红包”查看和使用，感谢您对微拍贷的支持！<br><div style="float:right">--微拍贷</div>';
                    }else{
                        $message_receive_data['contents']='您成功兑换了'.$pro_info['proname'].'*'.$lang.',我们将在15个工作日内将物品寄出，感谢您对微拍贷的支持<br><div style="float:right">--微拍贷</div>';
                    }
                    $message_receive_data['addtime']=time();
                    $message_receive_data['addip']=get_client_ip();
                    $message_receive_data['sendphone']=0;

                    $add_receive = M("message_receive", "hrcf_")->add($message_receive_data);

                    if (!(strpos($pro_info['proname'],"红包")===false)) {
                        $reconten['content']='您成功兑换了'.$pro_info['proname'].'*'.$lang.'，请在“我的红包”查看和使用，感谢您的支持！';
                        $reconten['msg']=1;
                    }else{
                        $reconten['content']='您成功兑换了'.$pro_info['proname'].'*'.$lang.',我们将在15个工作日内将物品寄出，感谢您的支持！';
                        $reconten['msg']=1;
                    }
                    //添加收益前置开始
                    if($total){
                        if($qixian=="6"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDSIXMONTH_2016'")->find();
                        }elseif($qixian=="12"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDYEAR_2016'")->find();
                        }elseif($qixian=="24"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTWOYEAR_2016'")->find();
                        }elseif($qixian=="36"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEYEAR_2016'")->find();
                        }elseif($qixian=="1"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDONEMONTH_2016'")->find();
                        }elseif($qixian=="3"){
                            $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEMONTH_2016'")->find();
                        }
                        $current =time();
                        $result2=M("Borrow_tender_reward","hrcf_")->where("`borrow_nid`='".$result['borrow_nid']."' and `start_time` < ".$current." and `end_time` > ".$current."")->find();
                        $lastresult=array(
                            'borrow_apr'=>$result['borrow_apr']+$result2['borrow_apr'],//年华率
                            'borrow_period'=>$result['borrow_period'],//月数
                            'borrow_nid'=>$result['borrow_nid'],
                        );
                        $days_year = date("Y")%4==0 ? 366 : 365;
                        $addtime=  time();
                        if($qixian=="6"){
                            $reward_temp=number_format(((($total-$jifen/5))*$lastresult['borrow_apr'])*(6*30/$days_year)/100-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])*(6*30/$days_year)/100;
                            $editime=$addtime+(6*30*24*3600);
                        }elseif($qixian=="12"){
                            $reward_temp=number_format(((($total-($jifen/5))*$lastresult['borrow_apr'])/100)-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])/100;
                            $editime=strtotime("+ 1 year");
                        }elseif($qixian=="24"){
                            $reward_temp=number_format(((($total-($jifen/5))*$lastresult['borrow_apr'])/100*2)-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])/100*2;
                            $editime=strtotime("+ 2 year");
                        }elseif($qixian=="36"){
                            $reward_temp=number_format(((($total-($jifen/5))*$lastresult['borrow_apr'])/100*3)-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])/100*3;
                            $editime=strtotime("+ 3 year");
                        }elseif($qixian=="1"){
                            $reward_temp=number_format(((($total-$jifen/5))*$lastresult['borrow_apr'])*(1*30/$days_year)/100-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])*(1*30/$days_year)/100;
                            $editime=$addtime+(1*30*24*3600);
                        }elseif($qixian=="3"){
                            $reward_temp=number_format(((($total-$jifen/5))*$lastresult['borrow_apr'])*(3*30/$days_year)/100-($jifen/5),2,'.','');
                            $reward=(($total-($jifen/5))*$result2['borrow_apr'])*(3*30/$days_year)/100;
                            $editime=$addtime+(3*30*24*3600);
                        }else{
                            $reconten['content']='参数错误';
                            $reconten['msg']=0;
                           echo json_encode($reconten);
                        }
                        $_tender['borrow_nid'] = $lastresult['borrow_nid'];//标的类型
			$_tender['user_id'] = $user_id;//当前用户的user_id
			$_tender['account'] = $total;//投资金额
                        $touzi_type="WEBQZ";
			$_tender['contents'] = $user_id.$result['name']."理财投资".$total."元";//投资备注内容
                        $_tender['status'] = 1;//投资状态
			$_tender['nid'] = $touzi_type.$user_id.time();//投资订单号
                        $_tender['hongbao_id'] = 0;
                        $_tender['addtime']=time();
                        $_tender['reward']=$reward;
                        $_tender['reward_id']=$result2['id'];
                        $_tender['account_tender']=$total;
                        $_tender['recover_account_all']=$total+$reward_temp;
                        $_tender['recover_account_interest']=$reward_temp;
                        $_tender['recover_account_wait']=$total+$reward_temp;
                        $_tender['recover_account_interest_wait']=$reward_temp;
                        $_tender['recover_account_capital_wait']=$total;
                        $_tender['web_status']=0;
                        $_tender['order_id']=$product_id;
                        //添加投资的贷款信息
                        $insert_id=M("Borrow_tender","hrcf_")->add($_tender);
                        //添加repay记录
                        $sql = "select 1 from `hrcf_borrow_repay` where user_id='{$user_id}' and repay_period='0' and repay_nid='{$insert_id}'";
                        $onsend = M()->query($sql);//判断是否有过记录
                        if($onsend==FALSE){
                            $sql = "insert into `hrcf_borrow_repay` set `addtime` = '".time()."',";
                            $sql .= "`addip` = '".ProductAction::ip_address()."',user_id='{$user_id}',status=1,`borrow_nid`='{$_tender['borrow_nid']}',`repay_period`='0',";
                            $sql .= "`repay_time`='{$editime}',`repay_account`='{$_tender['recover_account_all']}',";
                            $sql .= "`repay_interest`='{$reward_temp}',`repay_capital`='{$total}', `repay_nid`='{$insert_id}'";
                            M()->query($sql);
                        }else{
                            $sql = "update `hrcf_borrow_repay` set `addtime` = '".time()."',";
                            $sql .= "`addip` = '".ProductAction::ip_address()."',user_id='{$user_id}',status=1,`borrow_nid`='{$_tender['borrow_nid']}',`repay_period`='0',";
                            $sql .= "`repay_time`='{$editime}',`repay_account`='{$_tender['recover_account_all']}',";
                            $sql .= "`repay_interest`='{$reward_temp}',`repay_capital`='{$total}'";
                            $sql .= " where user_id='{$user_id}' and repay_period='0' and borrow_nid='{$_tender['borrow_nid']}' and `repay_nid`='{$insert_id}'";
                            M()->query($sql);
                        }
                        //添加recover记录
                        $sql = "select 1 from `hrcf_borrow_recover` where user_id='{$user_id}' and borrow_nid='{$_tender['borrow_nid']}' and recover_period='0' and tender_id='{$insert_id}'";
			$onsend2=M()->query($sql);
                        if ($onsend2==false){
                            $sql = "insert into `hrcf_borrow_recover` set `addtime` = '".time()."',";
                            $sql .= "`addip` = '".ProductAction::ip_address()."',user_id='{$user_id}',status=1,`borrow_nid`='{$_tender['borrow_nid']}',`borrow_userid`='1',`tender_id`='{$insert_id}',`recover_period`='0',";
                            $sql .= "`recover_time`='{$editime}',`recover_account`='{$_tender['recover_account_all']}',";
                            $sql .= "`recover_interest`='{$reward_temp}',`recover_capital`='{$total}'";
                            M()->query($sql);
                        }else{
                            $sql = "update `{borrow_recover}` set `addtime` = '".time()."',";
                            $sql .= "`addip` = '".ProductAction::ip_address()."',user_id='{$user_id}',status=1,`borrow_nid`='{$_tender['borrow_nid']}',`borrow_userid`='1',`tender_id`='{$insert_id}',`recover_period`='0',";
                            $sql .= "`recover_time`='{$editime}',`recover_account`='{$_tender['recover_account_all']}',";
                            $sql .= "`recover_interest`='{$reward_temp}',`recover_capital`='{$total}'";
                            $sql .= " where user_id='{$user_id}' and recover_period='0' and borrow_nid='{$_tender['borrow_nid']}' and tender_id='{$insert_id}'";
                            M()->query($sql);
                        }
                        //添加金额操作记录开始共三次
                        //第一次金额操作记录
                        $log_info["user_id"] = $user_id;//操作用户id
			$log_info["nid"] = "tender_frost_".$user_id."_".time();
			$log_info["money"] = $total;//操作金额
			$log_info["income"] = 0;//收入
			$log_info["expend"] = 0;//支出
			$log_info["balance_cash"] = 0;//可提现金额
			$log_info["balance_frost"] = -$total;//不可提现金额
			$log_info["frost"] = $total;//冻结金额
			$log_info["await"] = 0;//待收金额
			$log_info["type"] = "tender";//类型
			$log_info["to_userid"] = "1";//
                        $log_info["remark"] = "投标[收益前置{$qixian}个月产品]冻结资金{$total}元";
                        ProductAction::Addlog($log_info);
                        //第二次金额操作记录
                        $log_info2["user_id"] = $user_id;//操作用户id
                        $log_info2["nid"] = "tender_success_".$user_id.$insert_id."0";//订单号
                        $log_info2["money"] = $total;//操作金额
                        $log_info2["income"] = 0;//收入
                        $log_info2["expend"] = $total;//支出
                        $log_info2["balance_cash"] = 0;//可提现金额
                        $log_info2["balance_frost"] = 0;//不可提现金额
                        $log_info2["frost"] = -$total;//冻结金额
                        $log_info2["await"] = 0;//待收金额
                        $log_info2["type"] = "tender_success";//类型
                        $log_info2["to_userid"] = "1";//付给谁
                        $log_info2["remark"] = "投标[收益前置{$qixian}个月产品]成功投资金额扣除{$total}元";
                        ProductAction::Addlog($log_info2);
                         //第三次金额操作记录
                        $log_info3["user_id"] = $user_id;//操作用户id
                        $log_info3["nid"] = "tender_success_frost_".$user_id.$insert_id."0";//订单号
                        $log_info3["money"] = $_tender['recover_account_wait'];//操作金额
                        $log_info3["income"] = 0;//收入
                        $log_info3["expend"] = 0;//支出
                        $log_info3["balance_cash"] = 0;//可提现金额
                        $log_info3["balance_frost"] = 0;//不可提现金额
                        $log_info3["frost"] = 0;//冻结金额
                        $log_info3["await"] = $_tender['recover_account_wait'];//待收金额
                        $log_info3["type"] = "tender_success_frost";//类型
                        $log_info3["to_userid"] = "1";//付给谁
                        $log_info3["remark"] =  "投标[收益前置{$qixian}个月产品]成功待收金额增加{$log_info3["await"]}元";
                        ProductAction::Addlog($log_info3);
                        $reconten['content']='您成功投资<span class="fc_colorblue">'.$total.'</span>元，产品到期时间为<span class="fc_colorblue">'.date("Y",$editime).'年</span><span class="fc_colorblue">'.date("m",$editime).'月</span><span class="fc_colorblue">'.date("d",$editime).'日</span>,预计本金收益共<span class="fc_colorblue">'.$log_info3["await"].'</span>元,扣除微币<span class="fc_colorblue">'.$pro_jifen.'</span>,成功兑换微品<span class="fc_colorblue">'.$pro_info['proname'].'*'.$lang.'</span>,我们将在15个工作日内将物品寄出，感谢您的支持！';
                        $reconten['msg']=1;
                        error_log(date("[Y-m-d H:i:s]")."\t" .$user_id."用户使用收益前置".$qixian."个月，购买".$pro_info['proname']."产品".$lang."个,扣除微币".$pro_jifen.""."\r\n", 3, ROOT_PATH.'log/income_front'.date("Y-m-d").'.log');

                    }
                    //添加收益前置结束
                    $result=json_encode($reconten);
                    echo $result;
                } else {
                    $reconten['msg']=0;
                    $reconten['content']='兑换失败';
                    $result=json_encode($reconten);
                    echo $result;
                }
            }
        }

    }

    //微币搜索
    public function search()
    {
        $min = I("request.min");
        $max = I("request.max");
        $m = M('Product');
        if ($min >= 20000 && $max == '') {
            $where['pro_jifen'] = array(array('egt', $min));
        } else if ($min != '' && $max != '') {
            $where['pro_jifen'] = array(array('egt', $min), array('elt', $max));
        }
        $where['isshow'] = 1;
        $where['lang'] = 1;

        import("ORG.Util.Paged");

        $count = $m->where($where)->count();
        $page = new Page($count, $pageNum);
        $show = $page->show();
        $pro_data = $m->where($where)->order("pro_jifen desc")->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign("page", $show);
        $this->assign("pro_data", $pro_data);
        //dump($m->getLastSql());
        $this->display("index");

    }

    //下载中心
    public function down()
    {
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
        $count = M("Down")->where(array('isshow' => 1, 'lang' => 1, 'cid' => $tid))->count();
        $page = new page($count, 10);


        $data = M("Down")->where(array('isshow' => 1, 'lang' => 1, 'cid' => $tid))->limit($page->firstRow . ',' . $page->listRows)->order("orderby asc")->select();

        $show = $page->show();
        $this->assign("data", $data);
        $this->assign("page", $show);
        $this->display();
    }


    public function brand()
    {
        //品牌口碑
        $brand_video_data = $this->getPro3("品牌口碑", 1, 3, 1, 0, 0);
        $this->assign("brand_video_data", $brand_video_data);

        //口碑分享
        $brand_share_data = $this->getPro3("口碑分享", 1, 9, 1, 0, 0);
        $this->assign("brand_share_data", $brand_share_data);

        $this->display();
    }

    //口碑分享加载更多
    public function brand_share_ajax()
    {
        $mark = I("get.mark");

        //当前页码
        $page = $mark;


        //每页多少条
        $pagesize = 9;

        $page_start = $pagesize * ($page - 1);

        $Dao = M();
        $data = $Dao->query("select * from tp_product where lang=1 and isshow=1 and cid=17 order by orderby asc limit $page_start,$pagesize");

        foreach ($data as $k => $vo) {
            $data[$k][time] = date("Y-m-d", $vo[addtime]);
        }

        echo json_encode($data);

    }


    public function proinfo()
    {

        $id = I("get.id");
        $data = M("Product")->where(array('id' => $id))->find();

        //获取父类（一级分类）
  /*      $pro_child_id = M("Proclass")->where(array('id' => $data[cid]))->getField("id");
        $pro_parent_id = M("Proclass")->where(array('id' => $pro_child_id))->getField("pid");
        $pro_parent_data = M("Proclass")->where(array('id' => $pro_parent_id))->find();*/
        //二级分类
      /*  $two_type_data = $this->getProList($pro_parent_data[id], 1, 0, 1, 0, 0);
        $this->assign("two_type_data", $two_type_data);*/
        //M("Product")->execute("update tp_product set hits=hits+1 where id=$id");


        //类别搜索
        if($data['cid']){
            $opage=$data['cid'];
            $m=M("Proclass");
            $tpage=$m->where("`id`='".$opage."'")->find();
            $topage=$m->where("`id`='".$tpage['pid']."'")->find();
            if($topage['id']==1){
                 $topage=$m->where("`id`='".$opage."'")->find();
                  $opaget=$m->where("`pid`='".$opage."'")->select();
                  $opage=array();
                  foreach ($opaget as $k => $v) {
                      $opage[]=$v['id'];
                  }
            }
            $this->assign("topage",$topage);
            $this->assign("tpage",$tpage);
        }

        //关联图片取值
        $other_img = M("Img")->where(array('proid' => $id))->getField("img");

        //相关产品
        //$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();
//上一个产品
/*        $prevwhere['cid'] = $data[cid];
        $prevwhere['isshow'] = 1;
        $prevwhere['lang'] = 1;
        $prevwhere['id'] = array("lt", $id);
        $prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();*/
//下一个产品
 /*       $nextwhere['cid'] = $data[cid];
        $nextwhere['isshow'] = 1;
        $nextwhere['lang'] = 1;
        $nextwhere['id'] = array("gt", $data[id]);
        $nextdata = M("Product")->where($nextwhere)->find();*/

//		产品分类
        $pro_guige = $data['pro_guige'];
        $types = explode(",", $pro_guige);
        $this->assign("types", $types);

//      产品样式
        $pro_style = $data['pro_style'];
        $typestyle = explode(",", $pro_style);
        $this->assign("typestyle", $typestyle);
//		兑换名单
       // $order = D("Order")->relation(true)->order('addtime desc')->limit(6)->select();
        //$this->assign("orders", $order);


        $this->assign("data", $data);

//		dump($data);
        $this->assign("prevdata", $prevdata);
        $this->assign("nextdata", $nextdata);
        $this->assign("other_img", $other_img);
        //$this->assign("other_pro",$other_pro);
        $this->assign("pro_parent_data", $pro_parent_data);


//        热销推荐  查询所有分类，点击数由高到低排序
        $rxtj = $this->getProOrder(0, 1, 2, 0, 0, 0, 0, "hits");
        $this->assign("rxtj", $rxtj);
        $this->display();
    }
    //微go
    public function proinfo2()
    {

        $id = I("get.id");
        $data = M("Product")->where(array('id' => $id))->find();
        //类别搜索
        if($data['cid']){
            $opage=$data['cid'];
            $m=M("Proclass");
            $tpage=$m->where("`id`='".$opage."'")->find();
            $topage=$m->where("`id`='".$tpage['pid']."'")->find();
            if($topage['id']==1){
                 $topage=$m->where("`id`='".$opage."'")->find();
                  $opaget=$m->where("`pid`='".$opage."'")->select();
                  $opage=array();
                  foreach ($opaget as $k => $v) {
                      $opage[]=$v['id'];
                  }
            }
            $this->assign("topage",$topage);
            $this->assign("tpage",$tpage);
        }
        $other_img = M("Img")->where(array('proid' => $id))->getField("img");
//		产品分类
        $pro_guige = $data['pro_guige'];
        $types = explode(",", $pro_guige);
        $this->assign("types", $types);

//      产品样式
        $pro_style = $data['pro_style'];
        $typestyle = explode(",", $pro_style);
        $this->assign("typestyle", $typestyle);
        $this->assign("data", $data);

//		dump($data);
        $this->assign("prevdata", $prevdata);
        $this->assign("nextdata", $nextdata);
        $this->assign("other_img", $other_img);
        //$this->assign("other_pro",$other_pro);
        $this->assign("pro_parent_data", $pro_parent_data);


//        热销推荐  查询所有分类，点击数由高到低排序
        $rxtj = $this->getProOrder(0, 1, 2, 0, 0, 0, 0, "hits");
        $this->assign("rxtj", $rxtj);
        $this->display();
    }

    public function brand_info()
    {

        $id = I("get.id");

        $data = M("Product")->where(array('id' => $id))->find();


        //获取分类名称
        //$pro_type_name = M("Proclass")->where(array('id'=>$data[cid]))->getField("proclassname");

        M("Product")->execute("update tp_product set pro_dianjiliang=pro_dianjiliang+1 where id=$id");

        //关联图片取值
        $other_img = M("Img")->where(array('proid' => $id))->getField("img", true);

        //相关产品
        //$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();

        $prevwhere['cid'] = $data[cid];
        $prevwhere['isshow'] = 1;
        $prevwhere['lang'] = 1;
        $prevwhere['id'] = array("lt", $id);
        $prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();

        $nextwhere['cid'] = $data[cid];
        $nextwhere['isshow'] = 1;
        $nextwhere['lang'] = 1;
        $nextwhere['id'] = array("gt", $data[id]);
        $nextdata = M("Product")->where($nextwhere)->find();


        $this->assign("data", $data);


        $this->assign("prevdata", $prevdata);
        $this->assign("nextdata", $nextdata);
        $this->assign("other_img", $other_img);
        //$this->assign("other_pro",$other_pro);
        //$this->assign("pro_type_name",$pro_type_name);

        $this->display();
    }

    public function fc_info()
    {

        $id = I("get.id");

        $data = M("Product")->where(array('id' => $id))->find();


        //获取分类名称
        $pro_type_name = M("Proclass")->where(array('id' => $data[cid]))->getField("proclassname");

        //M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

        //关联图片取值
        //$other_img = M("Img")->where(array('proid'=>$id))->getField("img");
        //M("Product")->execute("update tp_product set hits=hits+1 where id=$id");

        //相关产品
        //$other_pro = M("Product")->where(array('id'=>array('in',$data[otherpro]),'isshow'=>1))->select();

        $prevwhere['cid'] = $data[cid];
        $prevwhere['isshow'] = 1;
        $prevwhere['lang'] = 1;
        $prevwhere['id'] = array("lt", $id);
        $prevdata = M("Product")->where($prevwhere)->order("id DESC")->find();

        $nextwhere['cid'] = $data[cid];
        $nextwhere['isshow'] = 1;
        $nextwhere['lang'] = 1;
        $nextwhere['id'] = array("gt", $data[id]);
        $nextdata = M("Product")->where($nextwhere)->find();


        $this->assign("data", $data);


        $this->assign("prevdata", $prevdata);
        $this->assign("nextdata", $nextdata);
        //$this->assign("other_img",$other_img);
        //$this->assign("other_pro",$other_pro);
        $this->assign("pro_type_name", $pro_type_name);

        $this->display();
    }

    public function prolist_ajax()
    {
        $pro_id = I("get.pro_id");
        $start_i = I("get.start_i");
        //每页条数
        $size = 10;

        $total_count = M("guest")->where(array('audit' => 1, 'pro_id' => $pro_id))->order("addtime DESC")->count();
        //总页数
        $total_pages = ceil($total_count / $size);
        if ($start_i <= $total_pages) {
            $comments_data = M("guest")->where(array('audit' => 1, 'pro_id' => $pro_id))->limit(($start_i - 1) * $size, $size)->order("addtime DESC")->select();
        }

        //改变日期格式
        foreach ($comments_data as $k => $vo) {
            //判断是否显示为刚刚
            if (time() - $vo[addtime] <= 60) {
                $comments_data[$k][addtime] = "刚刚";

            } else {
                $comments_data[$k][addtime] = date("Y-m-d H:i:s", $vo[addtime]);
            }

        }

        echo json_encode($comments_data);
    }

    public function ajax_feed()
    {
        $tl_area = I("get.tl_area");
        $pro_id = I("get.pro_id");
        $user_id = I("get.user_id");


        $m = M("Guest");
        $data['username'] = '[客户评论]';
        $data['sex'] = 1;
        $data['audit'] = 1;
        $data['addip'] = get_client_ip();
        $data['addtime'] = time();
        $data['content'] = $tl_area;
        $data['pro_id'] = $pro_id;
        $data['pro_name'] = M('Product')->where(array('id' => $pro_id))->getField("proname");
        $data['user_id'] = $user_id;
        $data['user_name'] = M('User')->where(array('id' => $user_id))->getField("username");


        if ($m->add($data)) {
            $comments_data = M("guest")->where(array('audit' => 1, 'pro_id' => $pro_id))->limit(10)->order("addtime DESC")->select();

            foreach ($comments_data as $k => $vo) {
                //判断是否显示为刚刚
                if (time() - $vo[addtime] <= 60) {
                    $comments_data[$k][addtime] = "刚刚";

                } else {
                    $comments_data[$k][addtime] = date("Y-m-d H:i:s", $vo[addtime]);
                }

            }

            echo json_encode($comments_data);
        } else {
            echo "0";
        }


    }


    //文件下载
    public function download()
    {
        $id = I("get.id", "", "trim");
        if ($id < 1) {
            $this->error("参数错误");
        }
        $m = M("Down");
        $arr = $m->where("id=$id")->find();

        $filename = $arr['filecontent'];
        $realarr = explode(".", $filename);
        $realname = $arr['filename'] . "." . $realarr[count($realarr) - 1];


        $filepath = './Public/Uploads/Down/File/' . $filename;
        if (!file_exists($filepath)) {
            $this->error("文件不存在");
        }


        //解决不同浏览器下载中文乱码问题
        $ua = $_SERVER["HTTP_USER_AGENT"];
        $encoded_realname = urlencode($realname);
        $encoded_realname = str_replace("+", "%20", $encoded_realname);

        header('Content-Type: application/octet-stream');
        if (preg_match("/MSIE/", $ua)) {
            header('Content-Disposition: attachment; filename="' . $encoded_realname . '"');
        } else if (preg_match("/Firefox/", $ua)) {
            header('Content-Disposition: attachment; filename*="utf8\'\'' . $realname . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $realname . '"');
        }
        readfile($filepath);
        exit;
    }
//收益前置收益计算器
    public function calculator(){
        $cp=I("post.jf_cp");
        $lang=I("post.lang");
        $user_id = $_SESSION['k_id'];
        $proid=I("post.proid");
        if($user_id == ""){
            $vb=I("post.jf_vb")*$lang;
        }else{
            $user=M("Credit","hrcf_")->where("user_id='".$user_id."'")->find();
            $vb=I("post.jf_vb")-$user['credit'];
            if($vb<0){
               $vb=0;
            }
        }
        if($cp){
            //计算收益开始
            if($cp=="6"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDSIXMONTH_2016'")->find();
            }elseif($cp=="12"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDYEAR_2016'")->find();
            }elseif($cp=="24"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTWOYEAR_2016'")->find();
            }elseif($cp=="36"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEYEAR_2016'")->find();
            }elseif($cp=="1"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDONEMONTH_2016'")->find();
            }elseif($cp=="3"){
                $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEMONTH_2016'")->find();
            }
            $current =time();
            $result2=M("Borrow_tender_reward","hrcf_")->where("`borrow_nid`='".$result['borrow_nid']."' and `start_time` < ".$current." and `end_time` > ".$current."")->find();
            $lastresult=array(
                'borrow_apr'=>$result['borrow_apr']+$result2['borrow_apr'],//年华率
                'borrow_period'=>$result['borrow_period'],//月数
                'borrow_nid'=>$result['borrow_nid'],
            );
            $days_year = date("Y")%4==0 ? 366 : 365;
            $Product = M("Product")->where(array('id' => $proid))->find();
            $num=(1+((100-$Product['wgbl'])/$Product['wgbl']));
            if($cp=="6"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2*100)/(6*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(6*30/$days_year)/100-($vb/5),2,'.','');
            }elseif($cp=="12"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100)-($vb/5),2,'.','');
            }elseif($cp=="24"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2/2*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100*2)-($vb/5),2,'.','');
            }elseif($cp=="36"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2/3*100)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-($vb/5))*$lastresult['borrow_apr'])/100*3)-($vb/5),2,'.','');
            }elseif($cp=="1"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2*100)/(1*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(1*30/$days_year)/100-($vb/5),2,'.','');
                $editime=$addtime+(1*30*24*3600);
            }elseif($cp=="3"){
                $reward_temp2=($vb/5)*$num;
                $money=ceil((($reward_temp2*100)/(3*30/$days_year)/$lastresult['borrow_apr']+($vb/5))/100)*100;
                $reward_temp=number_format(((($money-$vb/5))*$lastresult['borrow_apr'])*(3*30/$days_year)/100-($vb/5),2,'.','');
                $editime=$addtime+(3*30*24*3600);
            }
             $msg=array(
                 "msg"=>1,
                 "content"=>"获取成功",
                 "total"=>$money,
                 "reward_temp"=>$reward_temp
             );
            //收益计算结束
        }else{
             $msg=array(
               "msg"=>0,
               "content"=>"未收到提供参数"
             );
        }
        echo json_encode($msg);
        exit;
    }
  static public function Addlog($data){
		//第一步，查询是否有资金记录
                $Model = M();

		$sql = "select * from `hrcf_account_log` where `nid` = '{$data['nid']}'";
		$result = $Model -> query($sql);
		if ($result['nid']!="") return "资金记录订单号已经存在";

		//第二步，查询原来的总资金
		$sql = "select * from `hrcf_account` where user_id='{$data['user_id']}'";
		$result = $Model -> query($sql);
		if ($result==false){
			$sql = "insert into `hrcf_account` set user_id='{$data['user_id']}',total=0";
			$Model -> query($sql);
			$sql = "select * from `hrcf_account` where user_id='{$data['user_id']}'";
			$result = $Model -> query($sql);
		}
		//第三步，加入用户的财务记录
		$sql = "insert into `hrcf_account_log` set ";

		$sql .= "nid='{$data['nid']}',";
		$sql .= "user_id='{$data['user_id']}',";
		$sql .= "type='{$data['type']}',";
		$sql .= "money='{$data['money']}',";
		$sql .= "remark='{$data['remark']}',";
		$sql .= "to_userid='{$data['to_userid']}',";

		$sql .= "balance_cash_new='{$data['balance_cash']}',";
		$sql .= "balance_cash_old='{$result[0]['balance_cash']}',";
		$sql .= "balance_cash=balance_cash_new+balance_cash_old,";

		$sql .= "balance_frost_new='{$data['balance_frost']}',";
		$sql .= "balance_frost_old='{$result[0]['balance_frost']}',";
		$sql .= "balance_frost=balance_frost_new+balance_frost_old,";

		$sql .= "balance_new=balance_cash_new+balance_frost_new,";
		$sql .= "balance_old='{$result[0]['balance']}',";
		$sql .= "balance=balance_new+balance_old,";


		$sql .= "income_new='{$data['income']}',";
		$sql .= "income_old='{$result[0]['income']}',";
		$sql .= "income=income_new+income_old,";

		$sql .= "expend_new='{$data['expend']}',";
		$sql .= "expend_old='{$result[0]['expend']}',";
		$sql .= "expend=expend_new+expend_old,";

		$sql .= "frost_new='{$data['frost']}',";
		$sql .= "frost_old='{$result[0]['frost']}',";
		$sql .= "frost=frost_new+frost_old,";

		$sql .= "await_new='{$data['await']}',";
		$sql .= "await_old='{$result[0]['await']}',";
		$sql .= "await=await_new+await_old,";

		$sql .= "total_old='{$result[0]['total']}',";
		$sql .= "total=balance+frost+await,";
		$sql .=" `addtime` = '".time()."',`addip` = '".ProductAction::ip_address()."'";
		$Model -> query($sql);
		$id = mysql_insert_id();
		$sql = "select * from `hrcf_account_log` where user_id='{$data['user_id']}' and id='{$id}'";
		$result = $Model -> query($sql);

		//第四步，更新用户表
		$sql = "update `hrcf_account` set income={$result[0]['income']},expend='{$result[0]['expend']}',";
		$sql .= "balance_cash={$result[0]['balance_cash']},balance_frost={$result[0]['balance_frost']},";
		$sql .= "frost={$result[0]['frost']},";
		$sql .= "await={$result[0]['await']},";
		$sql .= "balance={$result[0]['balance']},";
		$sql .= "total={$result[0]['total']}";
		$sql .=" where user_id='{$data['user_id']}'";
		$Model -> query($sql);
		//第三步，加入用户的总费用
		$sql = "select * from `hrcf_account_users` where user_id='{$data['user_id']}' and `nid` = '{$data['nid']}'";
		$result = $Model -> query($sql);
		if ($result==false){
			//加入用户的财务表
			$sql = "select * from `hrcf_account_users` where user_id='{$data['user_id']}' order by id desc ";
			$result = $Model -> query($sql);
			if ($result==false){
				$result['total'] = 0;
				$result['balance'] = 0;
			}else{
                            $result['total'] = $result[0]['total'];
                            $result['balance'] = $result[0]['total'];
                        }
			$total = $result['total'] + $data['income'] + $data['expend'];
			$sql = "insert into `hrcf_account_users` set total='{$total}',balance={$result['balance']}+".$data['income']."-".$data['expend'].",income='{$data['income']}',expend='{$data['expend']}',type='{$data['type']}',`money`='{$data['money']}',user_id='{$data['user_id']}',nid='{$data['nid']}',remark='{$data['remark']}', `addtime` = '".time()."',`addip` = '".ProductAction::ip_address()."',await='{$data['await']}',frost='{$data['frost']}'";
			$Model -> query($sql);
		}



		return $data['nid'];
    }
    static function ip_address() {
            if (!empty ($_SERVER["HTTP_CLIENT_IP"])) {
                    $ip_address = $_SERVER["HTTP_CLIENT_IP"];
            } else{
                    if (!empty ($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                            $ip_address = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
                    } else{
                            if (!empty ($_SERVER["REMOTE_ADDR"])) {
                                    $ip_address = $_SERVER["REMOTE_ADDR"];
                            } else {
                                    $ip_address = '';
                            }
                    }
            }
            return preg_match ( '/[\d\.]{7,15}/', $ip_address, $matches ) ? $matches [0] : '';
    }

    public static function check_user_tender() {
        $user_id = $_SESSION['k_id'];
        $zhebiao=0;

        if($user_id){
            $data = M()->table('hrcf_borrow_tender')->field('account,borrow_nid')->where('user_id='.$user_id.' and status=1 and addtime between 1500480000 and 1506787200 and borrow_nid like "WADD%"')->select();
            if($data){
                foreach ($data as $v){
                    switch ($v['borrow_nid']):
                        case 'WADDONEMONTH_2016':
                            $zhebiao += round($v['account']/12,2);
                        case 'WADDTHREEMONTH_2016':
                            $zhebiao += round($v['account']/4,2);
                        case 'WADDSIXMONTH_2016':
                            $zhebiao += round($v['account']/2,2);
                        case 'WADDYEAR_2016':
                            $zhebiao += round($v['account'],2);
                        case 'WADDTWOYEAR_2016':
                            $zhebiao += round($v['account']*2,2);
                        case 'WADDTHREEYEAR_2016':
                            $zhebiao += round($v['account']*3,2);
                        case 'WADDYFANYEAR_2016':
                            $zhebiao += round($v['account'],2);
                        case 'WADDYFANTWOYEAR_2016':
                            $zhebiao += round($v['account']*2,2);
                        case 'WADDYFANTHREEYEAR_2016':
                            $zhebiao += round($v['account']*3,2);
                    endswitch;
                }
            }
        }
        return $zhebiao;
    }


}
