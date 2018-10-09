<?php

//主页
class IndexAction extends CommonAction
{
    public function test(){
        $this->display();
    }
    public function index()
    {

        Load('extend'); //加载函数库


        //首页关于我们
        $home_about_data = $this->signerpost(1, "首页关于我们");
        $this->assign("home_about_data", $home_about_data);

//        热销推荐  查询所有分类，点击数由高到低排序
        $rxtj = $this->getProOrder(0, 1, 8, 0, 0, 0, 1,"orderby");
        $this->assign("rxtj", $rxtj);
//      微红包推荐
        $jxsp = $this->getProOrder(0, 1, 10, 0, 0, 0, 0,"orderby",1);
        $this->assign("jxsp", $jxsp);
        //        实物新品  TODO 2016/1/12 BY 小施
        $swxp = $this->getProOrder(0, 1, 7, 0, 0, 0, 1,"addtime");
        $this->assign("swxp", $swxp);
        $front=D("Product")->where("income_front=1 and isshow=1 and pro_jingxuan=1")->limit(6)->select();
        //计算收益开始
        $result=M("Borrow","hrcf_")->where("`borrow_nid`='WADDTHREEYEAR_2016'")->find();
        $current =time();
        $result2=M("Borrow_tender_reward","hrcf_")->where("`borrow_nid`='".$result['borrow_nid']."' and `start_time` < ".$current." and `end_time` > ".$current."")->find();
        $lastresult=array(
               'borrow_apr'=>$result['borrow_apr']+$result2['borrow_apr'],//年华率
               'borrow_period'=>$result['borrow_period'],//月数
               'borrow_nid'=>$result['borrow_nid'],
        );
        foreach ($front as $key => $value) {
            $num=(1+((100-$value['wgbl'])/$value['wgbl']));
            $reward_temp=($value['pro_jifen']/5)*$num;
            $money=ceil((($reward_temp/3*100)/$lastresult['borrow_apr']+($value['pro_jifen']/5))/100)*100;
            $front[$key]['reward_temp']=number_format(((($money-($value['pro_jifen']/5))*$lastresult['borrow_apr'])/100*3)-($value['pro_jifen']/5),2,'.','');
        }
        //收益计算结束
        $this->assign("front",$front);
        //		兑换名单
        $order=D("Order")->relation(true)->order('addtime desc')->limit(10)->select();
        $this->assign("orders",$order);
        //banner图调用
        $A=M("Atl");
        $atl=$A->where("`atlname`='首页banner'")->order("`id` DESC")->limit(0,3)->select();
        $this->assign("atl",$atl);
      
//        登录用户信息
        $user_id=$_SESSION['k_id'];
        // $user=M("Users","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $user=M("Users","hrcf_")->where(array('user_id'=>$user_id))->find();
        // $user_info=M("Users_info","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $user_info=M("Users_info","hrcf_")->where(array('user_id'=>$user_id))->find();
        // $credit=M("credit","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $credit=M("credit","hrcf_")->where(array('user_id'=>$user_id))->find();
        if($credit){

        }else{
            $credit['credit']=0;
        }

        $this->assign("user",$user);
        $this->assign("user_info",$user_info);
        $this->assign("credit",$credit);

//        签到状态
        $sign_time=$credit['sign_time'];
        $today_zero=strtotime(date("Y-m-d"));
        if($sign_time>=$today_zero){
            $sign_status=1;
        }else{
            $sign_status=0;
        }
        $this->assign("sign_status",$sign_status);
//var_dump($swxp);
        //新品推荐
//        $pro_tj_data = $this->getPro3("微币兑换", 1, 6, 0, 0, 0, 1);
//        $prodata = $this->getPro3("微币兑换", 1, 4, 0, 0, 0, 1);
//        $prodata = array_chunk($prodata, 2);
//        $this->assign("pro_tj_data", $pro_tj_data);
//        $this->assign("prodata", $prodata);
//        //官方公告
       // $news_data = M("Articles", "hrcf_", "DB_CONFIG1")->where("type_id=3")->order('update_time desc')->limit(2)->select();
       // $news_data = M("Articles", "hrcf_")->where("type_id=3")->order('update_time desc')->limit(2)->select();

//
//        $this->assign("news_data", $news_data);
//                //新品推荐2
//                        $sort=I("get.sort");
//		if($sort==""){
//    		$pro_data = $this->getPro(1,1,0,0,1,15);
//		}else{
//			$pro_data = $this->getProOrder(1,1,0,0,1,15,0,$sort);
//			
//		}

//        $this->assign("pro_data", $pro_data);
        $this->display();
    }

    public function search()
    {
        if (IS_POST) {
            $keyword = I("post.keyword");
            $mark = I("post.mark");
            switch ($mark) {
                case 1:
                    $search_data = $this->getNews2("诚聘英才", 1, 0, 0, 0, 0, 0, $keyword);

                    foreach ($search_data as $k => $v) {
                        $search_data[$k]['typename'] = "诚聘英才";
                        $search_data[$k]['url'] = U('Job/jobinfo', array('id' => $v[id]));
                    }
                    break;
                case 2:
                    $search_data = $this->getNews2("新闻动态", 1, 0, 0, 0, 0, 0, $keyword);
                    foreach ($search_data as $k => $v) {
                        $search_data[$k]['typename'] = M('Conclass')->where(array('id' => $v[cid]))->getField("conclassname");

                        if ($v[cid] == 10) {
                            $qid = 1;
                        } else if ($v[cid] == 11) {
                            $qid = 2;
                        } else if ($v[cid] == 12) {
                            $qid = 3;
                        }
                        $search_data[$k]['url'] = U('News/newsinfo', array('id' => $v[id], 'qid' => $qid));
                    }
                    break;
                case 3:
                    $search_data = $this->getNews2("社会责任活动", 1, 0, 0, 0, 0, 0, $keyword);
                    foreach ($search_data as $k => $v) {
                        $search_data[$k]['typename'] = M('Conclass')->where(array('id' => $v[cid]))->getField("conclassname");
                        $search_data[$k]['url'] = U('News/dutyinfo', array('id' => $v[id]));
                    }
                    break;
                case 4:

                    $search_data = $this->getPro3("成功案例", 1, 0, 1, 0, 0, 0, $keyword);
                    //foreach ($search_data as $k => $v) {
                    //$search_data[$k]['typename'] = "成功案例";
                    //$search_data[$k]['url']=U('Cases/casesinfo',array('id'=>$v[id]));
                    //}
                    break;

                default:
                    # code...
                    break;
            }
            $this->assign("search_data", $search_data);
        }

        $this->display();
    }

    public function spider()
    {

        $useragent = addslashes(strtolower($_SERVER['HTTP_USER_AGENT']));
        //$useragent="baiduspider";
        if (strpos($useragent, 'googlebot') !== false) {
            $bot = 'Google';
        } elseif (strpos($useragent, 'mediapartners-google') !== false) {
            $bot = 'Google Adsense';
        } elseif (strpos($useragent, 'baiduspider') !== false) {
            $bot = 'Baidu';
        } elseif (strpos($useragent, 'sogou spider') !== false) {
            $bot = 'Sogou';
        } elseif (strpos($useragent, 'sogou web') !== false) {
            $bot = 'Sogou web';
        } elseif (strpos($useragent, 'sosospider') !== false) {
            $bot = 'SOSO';
        } elseif (strpos($useragent, 'yahoo') !== false) {
            $bot = 'Yahoo';
        } elseif (strpos($useragent, 'msn') !== false) {
            $bot = 'MSN';
        } elseif (strpos($useragent, 'msnbot') !== false) {
            $bot = 'msnbot';
        } elseif (strpos($useragent, 'sohu') !== false) {
            $bot = 'Sohu';
        } elseif (strpos($useragent, 'yodaoBot') !== false) {
            $bot = 'Yodao';
        } elseif (strpos($useragent, 'twiceler') !== false) {
            $bot = 'Twiceler';
        } elseif (strpos($useragent, 'ia_archiver') !== false) {
            $bot = 'Alexa_';
        } elseif (strpos($useragent, 'iaarchiver') !== false) {
            $bot = 'Alexa';
        } elseif (strpos($useragent, 'slurp') !== false) {
            $bot = '雅虎';
        } elseif (strpos($useragent, 'bot') !== false) {
            $bot = '其它蜘蛛';
        }
        if (isset($bot)) {  //如果是蜘蛛就存到数据库
            //$Spider = M('Spider');
            // $data['name'] = $bot;
            //$data['ctime'] = time();
            //$Spider->add($data);
            //file_get_contents("./Public/spider.txt")
            $url = $_SERVER['HTTP_REFERER'];
            $str = "蜘蛛名称:" . $bot . ",爬行时间:" . date("Y-m-d H:i:s", time()) . ",爬行页面:" . $url . "\n";
            file_put_contents("./Public/spider.txt", $str, FILE_APPEND); //FILE_APPEND：在文件末尾以追加的方式写入数据

        }
    }

//         原来版本的天数累加的签到方法
    public function qiandao_leijia0(){
        $user_id=$_SESSION['k_id'];
        // $Credit=M("Credit","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $Credit=M("Credit","hrcf_")->where(array('user_id'=>$user_id))->find();
//        dump($Credit);
        $sign_time=$Credit['sign_time'];
        $today_zero=strtotime(date("Y-m-d"));
        $yestoday_zero=strtotime(date("Y-m-d"))-86400;
        if($sign_time>=$yestoday_zero&&$sign_time<$today_zero){

            $arr['id']=$Credit['id'];
            $arr['sign_num']=$Credit['sign_num']+1;
            $arr['credit']=$Credit['credit']+3;
            $arr['sign_time']=time();
            // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
            $save=M("Credit","hrcf_")->save($arr);
//            返回的数组
            $result['save']=$save;
            $result['sign_num']=$arr['sign_num'];
            $result['credit']= $arr['credit'];
            $result['tmr_credit']= '';
            $json = json_encode($result);
            echo urldecode($json);

        }elseif($sign_time<$yestoday_zero){
            $arr['id']=$Credit['id'];
            $arr['sign_num']=1;
            $arr['credit']=$Credit['credit']+3;
            $arr['sign_time']=time();
            // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
            $save=M("Credit","hrcf_")->save($arr);
//            返回的数组
            $result['save']=$save;
            $result['sign_num']=$arr['sign_num'];
            $result['credit']= $arr['credit'];
            $result['tmr_credit']= '';
            $json = json_encode($result);
            echo urldecode($json);
        }else{
            echo 2;
        }

    }

     public function qiandao_leijia(){
        $user_id=$_SESSION['k_id'];
        // $Credit=M("Credit","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $Credit=M("Credit","hrcf_")->where(array('user_id'=>$user_id))->find();
        $users=M("Users","hrcf_")->where(array('user_id'=>$user_id))->find();
//        dump($Credit);
        $sign_time=$Credit['sign_time'];//上次签到时间
        $today_zero=strtotime(date("Y-m-d"));//今天开始时间
        $yestoday_zero=strtotime(date("Y-m-d"))-86400;//昨天开始时间
        if($Credit){
            if($sign_time>=$yestoday_zero && $sign_time<$today_zero){
                $arr['id']=$Credit['id'];
                $arr['sign_num']=$Credit['sign_num']+1;
                if($arr['sign_num']%5==0 && $arr['sign_num']!=0){
                    $arr['credit']=$Credit['credit']+1;
                    $arr['sign_credit']=$Credit['sign_credit']+1;
                }else{
                    $arr['credit']=$Credit['credit'];
                }
                $arr['sign_sum']=$Credit['sign_sum']+1;
                $arr['sign_time']=time();
                // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
                $save=M("Credit","hrcf_")->save($arr);
                if($arr['sign_num']%5==0){
                $arr_temp['user_id'] = $user_id;
                $arr_temp['code'] = "borrow";
                $arr_temp['type'] = "tender";
                $arr_temp['article_id'] = "999";
                $arr_temp['nid'] = "tender_success";
                $arr_temp['value'] = 1;
                $arr_temp['credit'] = 1;
                $arr_temp['remark'] = "签到送微币";
                $arr_temp['addtime'] = time();
                $add = M("Credit_log", "hrcf_")->add($arr_temp);
                
                $message_data['user_id']=0;
                $message_data['type']='users';
                $message_data['status']=1;
                $message_data['receive_value']=$users['username'].',';
                $message_data['name']='签到成功';
                $message_data['contents']='您通过签到成功获得了1个微币--微拍贷';
                $message_data['addtime']=time();
                $message_data['addip']=get_client_ip();
                $message_data['sendphone']=0;
                $add_id = M("message", "hrcf_")->add($message_data);
                $message_receive_data['user_id']=0;
                $message_receive_data['status']=0;
                $message_receive_data['send_id']=$add_id;
                $message_receive_data['send_userid']=0;
                $message_receive_data['type']='user';
                $message_receive_data['receive_id']=$user_id;
                $message_receive_data['receive_value']=$users['username'];
                $message_receive_data['name']='签到成功';
                $message_receive_data['contents']='您通过签到成功获得了1个微币--微拍贷';
                $message_receive_data['addtime']=time();
                $message_receive_data['addip']=get_client_ip();
                $message_receive_data['sendphone']=0;
                $add_receive = M("message_receive", "hrcf_")->add($message_receive_data);
                }
    //            返回的数组
                $result['save']=$save;
                $result['sign_num']=$arr['sign_num'];
                $result['credit']= $arr['credit'];
                $result['tmr_credit']= '';
                $json = json_encode($result);
                echo urldecode($json);
            }elseif($sign_time<$yestoday_zero){
                $arr['id']=$Credit['id'];
                $arr['sign_num']=1;
                $arr['credit']=$Credit['credit'];
                $arr['sign_sum']=$Credit['sign_sum']+1;
                $arr['sign_time']=time();
                // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
                $save=M("Credit","hrcf_")->save($arr);
    //            返回的数组
                $result['save']=$save;
                $result['sign_num']=$arr['sign_num'];
                $result['credit']= $arr['credit'];
                $result['tmr_credit']= '';
                $json = json_encode($result);
                echo urldecode($json);
            }else{
                echo 2;
            }
        }else{
            if($sign_time<$today_zero){

                $arr['user_id']=$user_id;
                $arr['sign_credit']=0;
                $arr['sign_sum']=1;
                $arr['sign_num']=1;
                $arr['credit']=0;
                $arr['sign_time']=time();
                $credits_arr[0]['num']=(string)$arr['credit'];
                $credits_arr[0]['class_id']=NULL;
                $arr['credits']=serialize($credits_arr);

                // $save=M("Credit","hrcf_","DB_CONFIG1")->data($arr)->add();
                $save=M("Credit","hrcf_")->data($arr)->add();
    //            返回的数组

                if($save){
                    $result['save']=1;
                }else{
                    $result['save']=false;
                }

                // $result['save']=$save;
                $result['sign_num']=$arr['sign_num'];
                $result['credit']= $arr['credit'];
                $result['tmr_credit']= '';
                $json = json_encode($result);
                echo urldecode($json);

            }elseif($sign_time<$yestoday_zero){
                $arr['user_id']=$user_id;
                $arr['sign_credit']=0;
                $arr['sign_sum']=1;
                $arr['sign_num']=1;
                $arr['credit']=0;
                $arr['sign_time']=time();
                $credits_arr[0]['num']=(string)$arr['credit'];
                $credits_arr[0]['class_id']=NULL;
                $arr['credits']=serialize($credits_arr);
                // $save=M("Credit","hrcf_","DB_CONFIG1")->data($arr)->save($arr);
                $save=M("Credit","hrcf_")->data($arr)->save($arr);
    //            返回的数组
                if($save){
                    $result['save']=1;
                }else{
                    $result['save']=false;
                }
                // $result['save']=$save;
                $result['sign_num']=$arr['sign_num'];
                $result['credit']= $arr['credit'];
                $result['tmr_credit']= '';
                $json = json_encode($result);
                echo urldecode($json);
            }else{
                echo 2;
            }
        }

    }


//    按投资过没分类的签到方法
    public function qiandao0(){
        $user_id=$_SESSION['k_id'];
        // $Credit=M("Credit","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $Credit=M("Credit","hrcf_")->where(array('user_id'=>$user_id))->find();
        // $users=M("Users","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $users=M("Users","hrcf_")->where(array('user_id'=>$user_id))->find();
//        dump($Credit);
        $sign_time=$Credit['sign_time'];
        var_dump($sign_time);die;
        $today_zero=strtotime(date("Y-m-d"));
        $touzi_status=$users['touzi_status'];
        if($sign_time<$today_zero){
            $arr['id']=$Credit['id'];

            if($touzi_status==1){
                $arr['credit']=$Credit['credit']+2;
                $arr['sign_credit']=$Credit['sign_credit']+2;
            }else{
                $arr['credit']=$Credit['credit']+1;
                $arr['sign_credit']=$Credit['sign_credit']+1;
            }
            $arr['sign_sum']=$Credit['sign_sum']+1;
//            $arr['sign_time']=time();
            // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
            $save=M("Credit","hrcf_")->save($arr);
//            返回的数组
            $result['save']=$save;
            $result['touzi_status']=$touzi_status;
            $result['credit']= $arr['credit'];
            $json = json_encode($result);
            echo urldecode($json);
        }else{
            echo 2;
        }

    }


    public function qiandao(){
        $user_id=$_SESSION['k_id'];
        // $Credit=M("Credit","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $Credit=M("Credit","hrcf_")->where(array('user_id'=>$user_id))->find();
        // $users=M("Users","hrcf_","DB_CONFIG1")->where(array('user_id'=>$user_id))->find();
        $users=M("Users","hrcf_")->where(array('user_id'=>$user_id))->find();

        $sign_time=$Credit['sign_time'];
        $today_zero=strtotime(date("Y-m-d"));
        $touzi_status=$users['touzi_status'];
        if($Credit){
            if($sign_time<$today_zero){
                $arr['id']=$Credit['id'];

                if($touzi_status==1){
                    $arr['credit']=$Credit['credit']+2;
                    $arr['sign_credit']=$Credit['sign_credit']+2;
                }else{
                    $arr['credit']=$Credit['credit']+1;
                    $arr['sign_credit']=$Credit['sign_credit']+1;
                }
                $arr['sign_sum']=$Credit['sign_sum']+1;
                $arr['sign_time']=time();
                // $save=M("Credit","hrcf_","DB_CONFIG1")->save($arr);
                $save=M("Credit","hrcf_")->save($arr);
                $arr_temp['user_id'] = $user_id;
                $arr_temp['code'] = "borrow";
                $arr_temp['type'] = "tender";
                $arr_temp['article_id'] = "999";
                $arr_temp['nid'] = "tender_success";
                $arr_temp['value'] = $arr['sign_credit'];
                $arr_temp['credit'] = $arr['sign_credit'];
                $arr_temp['remark'] = "微币兑换";
                $arr_temp['addtime'] = time();
                $add = M("Credit_log", "hrcf_")->add($arr_temp);               
                
                
    //            返回的数组
                $result['save']=$save;
                $result['touzi_status']=$touzi_status;
                $result['credit']= $arr['credit'];
                $json = json_encode($result);
                echo urldecode($json);
            }else{
                echo 2;
            }
        }else{
            if($sign_time<$today_zero){
                $arr['user_id']=$user_id;
                if($touzi_status==1){
                    $arr['credit']=2;
                    $arr['sign_credit']=2;
                }else{
                    $arr['credit']=1;
                    $arr['sign_credit']=1;
                }
                $arr['sign_sum']=1;
               $arr['sign_time']=time();
                // $arr['num']=1;
                $credits_arr[0]['num']=(string)$arr['credit'];
                $credits_arr[0]['class_id']=NULL;
                $arr['credits']=serialize($credits_arr);
                // $save=M("Credit","hrcf_","DB_CONFIG1")->data($arr)->add();
                $save=M("Credit","hrcf_")->data($arr)->add();
    //            返回的数组
                if($save){
                    $result['save']=1;
                }else{
                    $result['save']=false;
                }
                // $result['save']=$save;
                $result['touzi_status']=$touzi_status;
                $result['credit']= $arr['credit'];
                $json = json_encode($result);
                echo urldecode($json);
            }else{
                echo 2;
            }
        }

    }

    public function rule(){
        $this->display();
    }
}