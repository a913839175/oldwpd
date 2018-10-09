<?php


class ActAction extends CommonAction {
    public function index() {
        $this->display();
    }
    /*
     * 2018-09-04添加 中秋有礼
     * authr:shenxinrong
     */

    public function act18090401() {
        $this->display();
    }
    /*
     * 2018-08-01添加 合规前行好礼多多开奖名单
     * authr:shenxinrong
     */

    public function act18080101() {
        $this->display();
    }
    /*
     * 2018-07-20添加 合规前行好礼多多
     * authr:shenxinrong
     */

    public function act18072002() {
        $this->display();
    }
    /*
     * 2018-06-14添加 端午节活动 DragonBoat
     * authr:shenxinrong
     */

    public function dragonboat() {
        $this->display();
    }
    /*
     * 2017-1-19添加
     * authr:shenxinrong
     */

    public function banner() {
        $this->display();
    }
     /*
     * 2017-06-28添加满标活动
     * authr:shenxinrong
     */

    public function fullscale() {
        $this->display();
    }
    /*
     * 2017-06-28添加生日加息活动
     * authr:shenxinrong
     */

    public function birthdayrates() {
        $this->display();
    }
     /*
     * 2017-1-19添加
     * authr:shenxinrong
     */

    // public function banner() {
    //     $this->display();
    // }
    /*
     * 2017-11-30添加  庆双节
     * authr:shenxinrong
     */

    public function twofestival() {
        $this->display();
    }
     /*
     * 2017-12-01添加  年终送手机开奖前
     * authr:shenxinrong
     * editer:noel 
     */
     public function endyearhou() {
        $this->display();
     }
     /*
     * 2017-12-01添加  年终送手机开奖前
     * authr:shenxinrong
     * editer:noel 
     */

    public function endyearqian() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $B = M("borrow_tender_win", "hrcf_");
        $user_id = $_SESSION['k_id'];
        if ($user_id) {
            $num = $B->where("`periods`=10 and `user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-12-01') and UNIX_TIMESTAMP('2017-12-31')")->count();
            if ($num != 1) {
                $list = $B->where("`user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-12-01') and UNIX_TIMESTAMP('2017-12-31')")->select();
                for ($i = 0; $i < $num; $i++) {
                    if ($i + 1 == $num) {
                        $s = $s . $list[$i]['prize_id'];
                    } else {
                        $s = $s . $list[$i]['prize_id'] . "、";
                    }
                }
            }
            /*
            $num1 = $B->where("`periods`=8 and `user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-16') and UNIX_TIMESTAMP('2017-10-31')")->count();
            if ($num1 != 0) {
                $list1 = $B->where("`user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-16') and UNIX_TIMESTAMP('2017-10-31')")->select();
                for ($i = 0; $i < $num1; $i++) {
                    if ($i + 1 == $num1) {
                        $s1 = $s1 . $list[$i]['prize_id'];
                    } else {
                        $s1 = $s1 . $list[$i]['prize_id'] . "、";
                    }
                }
            }
             */
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        //$nums = $B->where("`periods`=5")->count();
        $this->assign("info", $s);
        //$this->assign("info1", $s1);
        $this->assign('num', $num);
        //$this->assign('num1', $num1);
        //$this->assign('nums', $nums);
        $this->assign("nowtimes", time());
        $this->display();
    }
    /*
     * 2017-11-24添加
     * authr:shenxinrong
     */

    public function newwelfare() {
        $this->display();
    }

    /*
     * 2017-11-16添加
     * authr:shenxinrong
     */

    public function endyear() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $user_id = $_SESSION['k_id'];
        if ($user_id) {
            $info = M("december_event", "hrcf_")->where("`user_id`='{$user_id}'")->find();
            if (!$info) {
                $data['user_id'] = $user_id;
                $data['addtime'] = time();
                M("december_event", "hrcf_")->add($data);
                $info = M("december_event", "hrcf_")->where("`user_id`='{$user_id}'")->find();
            }
            $this->assign("info", $info);
        }
        $this->display();
    }

    public function decemberevent() {
        //拒绝跨域请求开始
        if(!isset($_SERVER["HTTP_X_REQUESTED_WITH"])&& !strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
            echo "we caught you! you have no access!"; 
            exit();
        }
        //拒绝跨域请求结束
        $a = $_POST['sdd'];
        $DE = M("december_event", "hrcf_");
        $HB = M("hongbao", "hrcf_");
        $user_id = $_SESSION['k_id'];
        if(!$user_id){
            $obj['resulet_msg'] = 0;
            $obj['resulet_remark'] = "请登录后领取";
            $this->ajaxReturn($obj);
            exit;
        }
        $hongbao_id_temp = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id;
        $start_time = strtotime("2017/11/1 00:00:00");
        $end_time = strtotime("2017/12/31 23:59:59");
        $now_time = time();
        $dur = $DE->where("`user_id`='{$user_id}'")->find();
        if(!$dur || $a<1 || $a >7 || !$a){
            $obj['resulet_msg'] = 0;
            $obj['resulet_remark'] = "参数错误";
            $this->ajaxReturn($obj);
            exit;
        }
        if ($dur['hb' . $a] == "false" && ($dur['hb' . ($a - 1) . 'sy'] != "false" || $a == 1)) {
            if ($a == 1) {
                $hongb = array(
                    'apr' => "0.1",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "加息红包",
                    'begintime' => $start_time,
                    'condition' => "100",
                    'product' => "微+3,微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "0.1加息红包-年终狂欢1重礼包",
                    'describe' => "0.1加息红包-年终狂欢1重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 2) {
                $hongb = array(
                    'total' => "10",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "投资红包",
                    'begintime' => $start_time,
                    'condition' => "10000",
                    'product' => "微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "10投资红包-年终狂欢2重礼包",
                    'describe' => "10投资红包-年终狂欢2重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 3) {
                $hongb = array(
                    'apr' => "0.2",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "加息红包",
                    'begintime' => $start_time,
                    'condition' => "30000",
                    'product' => "微+3,微+6,微月盈Ⅰ,微年利Ⅰ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "0.2加息红包-年终狂欢3重礼包",
                    'describe' => "0.2加息红包-年终狂欢3重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 4) {
                $hongb = array(
                    'total' => "20",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "投资红包",
                    'begintime' => $start_time,
                    'condition' => "10000",
                    'product' => "微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "20投资红包-年终狂欢4重礼包",
                    'describe' => "20投资红包-年终狂欢4重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 5) {
                $hongb = array(
                    'apr' => "0.3",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "加息红包",
                    'begintime' => $start_time,
                    'condition' => "50000",
                    'product' => "微+3,微+6,微月盈Ⅰ,微年利Ⅰ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "0.3加息红包-年终狂欢5重礼包",
                    'describe' => "0.3加息红包-年终狂欢5重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 6) {
                $hongb = array(
                    'total' => "1000",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "投资红包",
                    'begintime' => $start_time,
                    'condition' => "300000",
                    'product' => "微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "1000投资红包-年终狂欢6重礼包",
                    'describe' => "1000投资红包-年终狂欢6重礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            } elseif ($a == 7) {
                $hongb = array(
                    'total' => "100",
                    'user_id' => $user_id,
                    'hongbaoid' => $hongbao_id_temp,
                    'endtime' => $end_time,
                    'status' => "0",
                    'type' => "现金红包",
                    'begintime' => $start_time,
                    'condition' => "0",
                    'addtime' => $now_time,
                    'edittime' => $now_time,
                    'title' => "100现金红包-年终狂欢终极礼包",
                    'describe' => "100现金红包-年终狂欢终极礼包",
                    'eid' => "0",
                    'sms' => "0"
                );
            }
            $id = $HB->add($hongb);
            $data['hb' . $a] = $id;
            $resule = $DE->where("`user_id`='{$user_id}'")->save($data);
            if ($resule) {
                $obj['resulet_msg'] = 1;
                $obj['resulet_remark'] = "领取成功";
                $this->ajaxReturn($obj);
            } else {
                $obj['resulet_msg'] = 0;
                $obj['resulet_remark'] = "领取失败";
                $this->ajaxReturn($obj);
            }
        } else {
            $obj['resulet_msg'] = 0;
            $obj['resulet_remark'] = "领取失败";
            $this->ajaxReturn($obj);
        }
    }

    /*
     * 2017-11-03添加
     * authr:shenxinrong
     */

    public function bi11hb() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $this->display();
    }

    /*
     * 2017-10-23添加
     * authr:shenxinrong
     */

    public function wshopone() {
        $this->display();
    }

    /*
     * 2017-10-25添加
     * authr:shenxinrong
     */

    public function iphonexqian() {
        $this->display();
    }

    public function iphonexhou() {
        $this->display();
    }

    public function bi11() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $user_id = $_SESSION['k_id'];
        $C = M("coin", "hrcf_");
        $I = M("integral", "hrcf_");
        $E = M("exchange_recordg", "hrcf_");
        $coin = $C->where("`user_id`='{$user_id}'")->find();
        $integral = $I->where("`user_id`='{$user_id}'")->find();
        $exchange_recordg = $E->where("`user_id`='{$user_id}'")->select();
        $this->assign("coin", $coin); //拍币
        $this->assign("integral", $integral); //微宝
        $this->assign("recordg", $exchange_recordg); //兑换记录
        $this->display();
    }

    public function bi11to() {
        //拒绝跨域请求开始
        if(!isset($_SERVER["HTTP_X_REQUESTED_WITH"])&& !strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
            echo "we caught you! you have no access!"; 
            exit();
        }
        //11月活动结束
        if(time()>1512057600){
            $msg = array(
                "msg" => 0,
                "content" => "活动已结束"
            );
            $this->ajaxReturn($msg);
            exit;
        }
        //11月活动结束
        //拒绝跨域请求结束
        $user_id = $_SESSION['k_id'];
        if (!$user_id) {
            $msg = array(
                "msg" => 0,
                "content" => "请登录后再领取"
            );
            $this->ajaxReturn($msg);
            exit;
        } else {
            $I = M("integral", "hrcf_");
            $IL = M("integral_log", "hrcf_");
            $E = M("exchange_recordg", "hrcf_");
            $HB = M("hongbao", "hrcf_");
            $integral = $I->where("`user_id`='{$user_id}'")->find();
            //计算微宝
            if ($_POST['hongbao1'] < 0 || $_POST['hongbao2'] < 0 || $_POST['hongbao3'] < 0) {
                $msg = array(
                    "msg" => 0,
                    "content" => "输入的信息有误"
                );
                $this->ajaxReturn($msg);
                exit;
            } else {
                $weibao = ($_POST['hongbao1'] * 3) + ($_POST['hongbao2'] * 5) + ($_POST['hongbao3'] * 10);
                if ($integral) {
                    if (($integral['rest_integral'] - $weibao) < 0) {
                        $msg = array(
                            "msg" => 0,
                            "content" => "微宝不够了，请继续努力"
                        );
                        $this->ajaxReturn($msg);
                        exit;
                    } else {
                        //计算红包
                        $hongbao = ($_POST['hongbao1'] * 6) + ($_POST['hongbao2'] * 12) + ($_POST['hongbao3'] * 28);
                        //扣除微宝
                        $data['rest_integral'] = $integral['rest_integral'] - $weibao;
                        //添加记录
                        $where['user_id'] = $user_id;
                        $where['consume_type'] = 0;
                        $where['consume_pid'] = 0;
                        $where['integral'] = $weibao;
                        $where['addtime'] = time();
                        $where['add_flag'] = 1;
                        $where['remark'] = "兑换" . $hongbao . "元现金红包";
                        //添加兑换记录
                        $erdata['user_id'] = $user_id;
                        $erdata['recordgtype'] = 0;
                        $erdata['recordg_pid'] = 0;
                        $erdata['recordg'] = $weibao;
                        $erdata['addtime'] = time();
                        $erdata['remark'] = $hongbao . "元现金红包";
                        if ($hongbao) {
                            $I->where("`user_id`={$user_id}")->save($data);
                            $IL->add($where);
                            $E->add($erdata);
                        }
                        //计算使用时间
                        $start_time = strtotime("2017/11/1 00:00:00");
                        $end_time = strtotime("2017/11/30 23:59:59");
                        //计算订单号
                        $hongbao_id_temp = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id; //订单号
                        //增加红包
                        $now_time = time();
                        $sql1 = "INSERT INTO `hrcf_hongbao` set `total`='{$hongbao}',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp . "',
                            `endtime`='" . $end_time . "',`status`='0',`type`='现金红包',`begintime`='" . $start_time . "',`condition`='0',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                            `title`='{$hongbao}现金红包-微宝兑换',`describe`='{$hongbao}现金红包-微宝兑换',`eid`='0',`sms`='0'";
                        if ($hongbao) {
                            $HB->query($sql1);
                        }
                        $msg = array(
                            "msg" => 1,
                            "total" => $hongbao
                        );
                        $this->ajaxReturn($msg);
                        exit;
                    }
                } else {
                    $msg = array(
                        "msg" => 0,
                        "content" => "微宝不够了，请继续努力"
                    );
                    $this->ajaxReturn($msg);
                    exit;
                }
            }
        }
    }

    public function bi11too() {
        //拒绝跨域请求开始
        if(!isset($_SERVER["HTTP_X_REQUESTED_WITH"])&& !strtolower($_SERVER["HTTP_X_REQUESTED_WITH"])=="xmlhttprequest"){ 
            echo "we caught you! you have no access!"; 
            exit();
        }
        //拒绝跨域请求结束
        //11月活动结束
        if(time()>1512057600){
            $msg = array(
                "msg" => 0,
                "content" => "活动已结束"
            );
            $this->ajaxReturn($msg);
            exit;
        }
        //11月活动结束
        $user_id = $_SESSION['k_id'];
        if (!$user_id) {
            $msg = array(
                "msg" => 0,
                "content" => "请登录后再领取"
            );
            $this->ajaxReturn($msg);
            exit;
        } else {
            $C = M("coin", "hrcf_");
            $CL = M("coin_log", "hrcf_");
            $E = M("exchange_recordg", "hrcf_");
            $HB = M("hongbao", "hrcf_");
            $coin = $C->where("`user_id`='{$user_id}'")->find();
            if ($_POST['hongbao4'] < 0 || $_POST['hongbao5'] < 0 || $_POST['hongbao6'] < 0) {
                $msg = array(
                    "msg" => 0,
                    "content" => "输入的信息有误"
                );
                $this->ajaxReturn($msg);
                exit;
            } else {
                //计算微宝
                $paibi = ($_POST['hongbao4'] * 400) + ($_POST['hongbao5'] * 10) + ($_POST['hongbao6'] * 1);
                if ($coin) {
                    if (($coin['rest_coin'] - $paibi) < 0) {
                        $msg = array(
                            "msg" => 0,
                            "content" => "拍币不够了，请继续努力"
                        );
                        $this->ajaxReturn($msg);
                        exit;
                    } else {
                        //判断是否有填写地址
                        if ($_POST['hongbao4']) {
                            $A = M("address");
                            $add_id = M("users", "hrcf_")->where("`user_id`={$user_id}")->find();
                            $address_u = $A->where("`id`={$add_id['default_address']}")->find();
                            if (!$address_u) {
                                $msg = array(
                                    "msg" => 0,
                                    "content" => "请填写默认地址后再进行兑换",
                                    "url" => "/mall/index.php?m=product&a=address"
                                );
                                $this->ajaxReturn($msg);
                                exit;
                            } else {
                                $users = M("users", "hrcf_")->where("`user_id`={$user_id}")->find();
                                $pro_duct = M("product")->where("`proname` like '%壕友召集令*iPhone X（64G）%'")->find();
                                $order_data['name'] = $address_u['consignee'];
                                $order_data['niname'] = $users['username'];
                                $order_data['phone'] = $address_u['con_phone'];
                                $order_data['address'] = $address_u['address_code'] . $address_u['detailed_address'];
                                $order_data['lang'] = $_POST['hongbao4'];
                                $order_data['tradeid'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
                                $order_data['paystatus'] = 0;
                                $order_data['addtime'] = time();
                                $order_data['user_id'] = $user_id;
                                $order_data['pid'] = $pro_duct['id'];
                                $order_data['consignee_msg'] = $address_u['id'];
                                $order_data['fahuo_status'] = 0;
                                $order_data['pro_guige'] = "默认";
                                $order_data['pro_style'] = "默认";
                                M("order")->add($order_data);
                            }
                        }
                        //计算红包
                        $hongbao = ($_POST['hongbao5'] * 110) + ($_POST['hongbao6'] * 10);

                        //扣除拍币
                        $data['rest_coin'] = $coin['rest_coin'] - $paibi;
                        //添加记录
                        $where['user_id'] = $user_id;
                        $where['consume_type'] = 0;
                        $where['consume_pid'] = 0;
                        $where['coin'] = $paibi;
                        $where['addtime'] = time();
                        $where['add_flag'] = 1;
                        //判断是否有iphonex
                        if ($_POST['hongbao4'] && $hongbao != 0) {
                            $where['remark'] = "兑换 iPhonex(64GB)*" . $_POST['hongbao4'] . " +" . $hongbao . "元现金红包";
                        } elseif ($_POST['hongbao4']) {
                            $where['remark'] = "兑换 iPhonex(64GB)*" . $_POST['hongbao4'];
                        } else {
                            $where['remark'] = "兑换" . $hongbao . "元现金红包";
                        }
                        //添加兑换记录
                        $erdata['user_id'] = $user_id;
                        $erdata['recordgtype'] = 1;
                        $erdata['recordg_pid'] = 0;
                        $erdata['recordg'] = $paibi;
                        $erdata['addtime'] = time();
                        if ($_POST['hongbao4'] && $hongbao != 0) {
                            $erdata['remark'] = "iPhonex(64GB)*" . $_POST['hongbao4'] . " +" . $hongbao . "元现金红包";
                        } elseif ($_POST['hongbao4']) {
                            $erdata['remark'] = "iPhonex(64GB)*" . $_POST['hongbao4'];
                        } else {
                            $erdata['remark'] = $hongbao . "元现金红包";
                        }
                        if ($_POST['hongbao4'] || $hongbao) {
                            $C->where("`user_id`={$user_id}")->save($data);
                            $CL->add($where);
                            $E->add($erdata);
                        }
                        if ($hongbao) {
                            //计算使用时间
                            $start_time = strtotime("2017/11/1 00:00:00");
                            $end_time = strtotime("2017/11/30 23:59:59");
                            //计算订单号
                            $hongbao_id_temp = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id; //订单号
                            //增加红包
                            $now_time = time();
                            $sql1 = "INSERT INTO `hrcf_hongbao` set `total`='{$hongbao}',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp . "',
                            `endtime`='" . $end_time . "',`status`='0',`type`='现金红包',`begintime`='" . $start_time . "',`condition`='0',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                            `title`='{$hongbao}现金红包-拍币兑换',`describe`='{$hongbao}现金红包-拍币兑换',`eid`='0',`sms`='0'";
                            $HB->query($sql1);
                        }
                        $msg = array(
                            "msg" => 1,
                            "total" => $hongbao,
                            "iphonex" => $_POST['hongbao4']
                        );
                        $this->ajaxReturn($msg);
                        exit;
                    }
                } else {
                    $msg = array(
                        "msg" => 0,
                        "content" => "拍币不够了，请继续努力"
                    );
                    $this->ajaxReturn($msg);
                    exit;
                }
            }
        }
    }

    //金色十月开奖前广告
    public function goldenOctober() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $B = M("borrow_tender_win", "hrcf_");
        $user_id = $_SESSION['k_id'];
        if ($user_id) {
             $num = $B->where("`periods`=7 and `user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-01') and UNIX_TIMESTAMP('2017-10-16')")->count();
            if ($num != 0) {
                $list = $B->where("`user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-01') and UNIX_TIMESTAMP('2017-10-16')")->select();
                for ($i = 0; $i < $num; $i++) {
                    if ($i + 1 == $num) {
                        $s = $s . $list[$i]['prize_id'];
                    } else {
                        $s = $s . $list[$i]['prize_id'] . "、";
                    }
                }
            }
            /*
            $num1 = $B->where("`periods`=8 and `user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-16') and UNIX_TIMESTAMP('2017-10-31')")->count();
            if ($num1 != 0) {
                $list1 = $B->where("`user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-10-16') and UNIX_TIMESTAMP('2017-10-31')")->select();
                for ($i = 0; $i < $num1; $i++) {
                    if ($i + 1 == $num1) {
                        $s1 = $s1 . $list[$i]['prize_id'];
                    } else {
                        $s1 = $s1 . $list[$i]['prize_id'] . "、";
                    }
                }
            }
             */
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        //$nums = $B->where("`periods`=5")->count();
        $this->assign("info", $s);
        //$this->assign("info1", $s1);
        $this->assign('num', $num);
        //$this->assign('num1', $num1);
        //$this->assign('nums', $nums);
        $this->assign("nowtimes", time());
        $this->display();
    }

    //金色十月开奖后广告
    public function goldenOctoberafter() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $B = M("borrow_tender_win", "hrcf_");
        $user_id = $_SESSION['k_id'];
        $B = M("borrow_tender_win", "hrcf_");
        $user_id = $_SESSION['k_id'];
        if ($user_id) {
            $num = $B->where("`periods`=5 and `user_id`=" . $user_id)->count();
            if ($num != 0) {
                $list = $B->where("`periods`=5 and `user_id`=" . $user_id)->select();
                for ($i = 0; $i < $num; $i++) {
                    if ($i + 1 == $num) {
                        $s = $s . $list[$i]['prize_id'];
                    } else {
                        $s = $s . $list[$i]['prize_id'] . "、";
                    }
                }
            }
        }
        $user = $B->where("`periods`=5 and `is_win`=1")->find();
        $nums = $B->where("`periods`=5")->count();
        $people = $B->where("`periods`=5")->count('distinct(user_id)');
        $this->assign("info", $s);
        $this->assign('num', $num);
        $this->assign('people', $people);
        $this->assign('nums', $nums);
        $this->assign("user", $user);
        $this->display();
    }

    // 红包领取活动
    public function midautumn() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $movable = M("Movable", "hrcf_");
        $yx = $movable->where("`user_id`='" . $_SESSION['k_id'] . "' and `type_status`=1")->count(1);
        $zx = $movable->where("`user_id`='" . $_SESSION['k_id'] . "' and `type_status`=2")->count(1);
        ;
        $this->assign("yx", $yx);
        $this->assign("zx", $zx);
        $this->display();
    }

    public function midautumn2() {
        $user_id = $_SESSION['k_id'];
        $username = $_SESSION['k_user'];
        $type_status = I("get.id");
        $movable = M("Movable", "hrcf_");
        $counts = $movable->where("`user_id`='" . $user_id . "' and `type_status`='" . $type_status . "'")->count(1);
        if (!$user_id) {
            $this->error("请登录", "/?user&q=login");
        }
        if ($counts == 0) {
            $start_time = strtotime("2017-10-01 00:00:00");
            $end_time = strtotime("2017-10-08 23:59:59");
            $now_time = time();
            if ($now_time >= $end_time) {
                $this->error("活动已结束", "/?user&q=midautumn");
            }
            $hongbao_id_temp1 = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id; //订单号
            $hongbao_id_temp2 = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id;
            $hongbao_id_temp3 = date("Ym") . 'HB' . date("dhmi") . rand(10, 99) . $user_id;
            if ($type_status == 1) {
                $sql1 = "INSERT INTO `hrcf_hongbao` set `total`='10',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp1 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='10000',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='10投资红包',`describe`='10投资红包',`product`='微+3,微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql2 = "INSERT INTO `hrcf_hongbao` set `total`='100',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp2 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='66000',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='100投资红包',`describe`='100投资红包',`product`='微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql3 = "INSERT INTO `hrcf_hongbao` set `total`='1000',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp3 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='660000',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='1000投资红包',`describe`='1000投资红包',`product`='微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql4 = "INSERT INTO `hrcf_movable` set `mobile`='" . $username . "',`user_id`='" . $user_id . "',`type_status`='1',`addtime`='" . $now_time . "'";
                $movable->query($sql1);
                $movable->query($sql2);
                $movable->query($sql3);
                $movable->query($sql4);
                $this->success("领取成功", __APP__ . "/Act/midautumn");
            } elseif ($type_status == 2) {
                $sql1 = "INSERT INTO `hrcf_hongbao` set `total`='10',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp1 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='6600',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='10投资红包',`describe`='10投资红包',`product`='微+6,微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql2 = "INSERT INTO `hrcf_hongbao` set `total`='100',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp2 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='35000',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='100投资红包',`describe`='100投资红包',`product`='微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql3 = "INSERT INTO `hrcf_hongbao` set `total`='1000',`user_id`='" . $user_id . "',`hongbaoid`='" . $hongbao_id_temp3 . "',
                    `endtime`='" . $end_time . "',`status`='0',`type`='投资红包',`begintime`='" . $start_time . "',`condition`='330000',`addtime`='" . $now_time . "',`edittime`='" . $now_time . "',
                    `title`='1000投资红包',`describe`='1000投资红包',`product`='微月盈Ⅰ,微月盈Ⅱ,微月盈Ⅲ,微年利Ⅰ,微年利Ⅱ,微年利Ⅲ',`eid`='0',`sms`='0'";
                $sql4 = "INSERT INTO `hrcf_movable` set `mobile`='" . $username . "',`user_id`='" . $user_id . "',`type_status`='2',`addtime`='" . $now_time . "'";
                $movable->query($sql1);
                $movable->query($sql2);
                $movable->query($sql3);
                $movable->query($sql4);
                $this->success("领取成功", __APP__ . "/Act/midautumn");
            }
        } else {
            $this->success("已经领取过了", __APP__ . "/Act/midautumn");
        }
    }

    public function bannerlove() {
        $this->display();
    }

    public function bannerteny() {
        $this->display();
    }

    public function bannerwegou() {
        $this->display();
    }

    public function bannermama() {
        $this->display();
    }

    public function bannerfather() {
        $this->display();
    }

    public function bannerbank() {
        $this->display();
    }

    public function teacher() {
        $this->display();
    }

    //降息活动单页
    public function income() {
        $this->display();
    }

    public function bannerwater() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }

        $zhebiao = ProductAction::check_user_tender();

        $this->assign("zhebiao", $zhebiao);
        $this->display();
    }

    public function bannerbirthday() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $this->display();
    }

    //活动单页
    public function anniversary() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $B = M("borrow_tender_win", "hrcf_");
        $user_id = $_SESSION['k_id'];
        if ($user_id) {
            $num = $B->where("`periods`=9 and `user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-11-01') and UNIX_TIMESTAMP('2017-11-30')")->count();
            if ($num != 0) {
                $list = $B->where("`user_id`=" . $user_id . " and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-11-01') and UNIX_TIMESTAMP('2017-11-30')")->select();
                for ($i = 0; $i < $num; $i++) {
                    if ($i + 1 == $num) {
                        $s = $s . $list[$i]['prize_id'];
                    } else {
                        $s = $s . $list[$i]['prize_id'] . "、";
                    }
                }
            }
            /*            $num1 = $B->where("`periods`=6 and `user_id`=" . $user_id." and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-09-16') and UNIX_TIMESTAMP('2017-09-31')")->count();
              if ($num1 != 0) {
              $list1 = $B->where("`user_id`=" . $user_id." and `tender_time` BETWEEN UNIX_TIMESTAMP('2017-09-16') and UNIX_TIMESTAMP('2017-09-31')")->select();
              for ($i = 0; $i < $num1; $i++) {
              if ($i + 1 == $num1) {
              $s1 = $s1 . $list[$i]['prize_id'];
              } else {
              $s1 = $s1 . $list[$i]['prize_id'] . "、";
              }
              }
              } */
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        //$nums = $B->where("`periods`=5")->count();
        $this->assign("info", $s);
        //$this->assign("info1", $s1);
        $this->assign('num', $num);
        //$this->assign('num1', $num1);
        //$this->assign('nums', $nums);
        $this->assign("nowtimes", time());
        $this->display();
    }

    public function thelottery() {
        $k_user = I("post.j_username");
        $k_pass = I("post.password");
        if ($_SESSION['k_user'] != $k_user && $k_user != "" && $k_pass != "") {

            $check_u = M("Users", "hrcf_", "DB_CONFIG1")->where(array('username' => $k_user, 'password' => $k_pass))->find();
            if (count($check_u) > 0) {
                $_SESSION['k_user'] = $check_u['username'];
                $_SESSION['k_id'] = $check_u['user_id'];
            }
        }
        if ($_SESSION['k_user'] != $k_user && $k_user == "" && $k_pass == "") {
            unset($_SESSION['k_user']);
            unset($_SESSION['k_id']);
        }
        $this->display();
    }

}

?>
