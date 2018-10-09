<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction{
	public $ip;
	
    public function index(){
        
		$this->display();
			
    }
	
	public function top(){
        //获取网站配置信息
        $m = M("Siteinfo");
        $data_site_name = $m->find();
        $this->assign("data_site_name",$data_site_name);
		$this->display();
	}

    //定时提醒有留言
    public function timing(){
        $count = M("guest")->where(array('mark'=>1))->count();
        echo $count;
    }
    public function timing_right(){
        $data = M("guest")->where(array('mark'=>1))->order("addtime DESC")->select();
        foreach($data as $k=>$vo){
            $data[$k][addtime]=date("Y-m-d H:i:s",$vo[addtime]);
        }
        echo json_encode($data);
    }
	
	public function left(){
	
		//获取xmlpath的路径
		$xmlname = "menu.xml";
		$xmlpath = "./Public/Xml/";
		$xml=simplexml_load_file($xmlpath.$xmlname);
		$i=0;
		foreach($xml as $tmp){
					
		$xml_array[$i]['column']=$tmp->column;
		$xml_array[$i]['values']=$tmp->values;
		$i++;
		}
	
		
		$id = $_SESSION['id'];
		$where['id']=$id;
		$rs = M("User")->join("tp_role ON tp_user.roleid=tp_role.rid")->field("tp_user.*,tp_role.rshell")->where($where)->find();
		
		foreach($xml_array as $v){
			$xmlsum+= $v[values];
		}
		//dump($xmlsum);
		//exit;
		
		$this->assign('data',$rs);
		$this->assign('xmlsum',$xmlsum); //传递xml文件中菜单的合计
		$this->display();
	}
	
	public function right(){
		
		$id = $_SESSION['id'];
		$where['id']=$id;
		$rs = M("User")->where($where)->find();
		
		$lastcountry = $this->ipaddress($rs[lastlogip]);
		$rs['lastcountry']=$lastcountry;
		
		
		$this->assign('data',$rs);
		
        $guest_data = M("guest")->where(array('mark'=>1))->order("addtime DESC")->select();
        $this->assign("guest_data",$guest_data);
        $this->display();
	}
	
	 //缓存更新
    public function public_cache() {
        if (isset($_GET['type'])) {
            import("ORG.Util.Dir");
            import('ORG.Util.Cacheapi');
            $Cache = new Cacheapi();
            $Cachepath = RUNTIME_PATH;
            $Dir = new Dir();
            $type = I('get.type');
            switch ($type) {
                case "site":
                    try {
                        $Dir->del($Cachepath);
                        $Dir->del($Cachepath . "Data/");
                        $Dir->del($Cachepath . "Data/_fields/");
                    } catch (Exception $exc) {
                        
                    }
                    try {
                        $cache = Cache::getInstance();
                        $cache->clear();
                    } catch (Exception $exc) {
                        
                    }

                    $modules = array(
                        array('name' => "菜单，模型，栏目缓存更新成功！", 'function' => 'site_cache', 'param' => ''),
                        array('name' => "模型字段缓存更新成功！", 'function' => 'model_field_cache', 'param' => ''),
                        array('name' => "模型content处理类缓存更新成功！", 'function' => 'model_content_cache', 'param' => ''),
                        array('name' => "应用更新成功！", 'function' => 'appstart_cache', 'param' => ''),
                        array('name' => "敏感词缓存生成成功！", 'function' => 'censorword_cache', 'param' => ''),
                    );
                    foreach ($modules as $k => $v) {
                        try {
                            if ($v['function']) {
                                $Cache->$v['function']();
                            }
                        } catch (Exception $exc) {
                            
                        }
                    }
                    $this->success("站点数据缓存更新成功！", U('Index/public_cache'));
                    break;
                case "template":
                    $Dir->delDir($Cachepath . "Cache/");
                    $this->success("模板缓存清理成功！", U('Index/public_cache'));
                    break;
                case "logs":
                    $Dir->del($Cachepath . "Logs/");
                    $this->success("站点日志清理成功！", U('Index/public_cache'));
                    break;
                default:
                    $this->error("请选择清除缓存类型！");
                    break;
            }
        } else {
            $this->display("Index:cache");
        }
    }
	
	 //后台框架首页菜单搜索
    public function public_find() {
        $keyword = I('get.keyword');
        if (!$keyword) {
            $this->error("请输入需要搜索的关键词！");
        }
        $where = array();
        $where['name'] = array("LIKE", "%$keyword%");
        $where['status'] = array("EQ", 1);
        $where['type'] = array("EQ", 1);
        $data = M("Menu")->where($where)->select();
        $menuData = $menuName = array();
        $Module = F("Module");
        foreach ($data as $k => $v) {
            $menuData[ucwords($v['app'])][] = $v;
            $menuName[ucwords($v['app'])] = $Module[ucwords($v['app'])]['name'];
        }
        $this->assign("menuData", $menuData);
        $this->assign("menuName", $menuName);
        $this->assign("keyword", $keyword);
        $this->display();
    }
	
	public function cache(){
		$this->display();	
	}
	
	//ip地址
	public function ipaddress($ip){
		$this->ip=$ip;
		import('ORG.Net.IpLocation');// 导入IpLocation类
		$Ip = new IpLocation('qqwry.dat'); // 实例化类 参数表示IP地址库文件	
		$area = $Ip->getlocation($this->ip);
		$country = iconv("GB2312","UTF-8",$area[country]);;
		return $country;
	}
}