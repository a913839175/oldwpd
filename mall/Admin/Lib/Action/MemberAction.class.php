<?php
class MemberAction extends CommonAction{
	//添加
	public function add(){
		if(IS_POST){
			$nicname = trim(I("post.nicname"));
			$logname = trim(I("post.logname"));
			$logpwd = md5(trim(I("post.logpwd")));
			$relogpwd = md5(trim(I("post.relogpwd")));
			$othertext = trim(I("post.othertext"));
			$role1 = trim(I("post.role1"));
			$banji = trim(I("post.banji"));

			$disable = trim(I("post.disable"));
			if(empty($nicname)){
				$this->error("会员姓名不能为空");
			}
			if(empty($logname)){
				$this->error("会员账号不能为空");
			}
			if(empty($logpwd)){
				$this->error("密码不能为空");
			}
			if(empty($relogpwd)){
				$this->error("确认密码不能为空");
			}
			if($logpwd!=$relogpwd){
				$this->error("两次密码不一致");	
			}
			
			
			$m = M("User");
			$data['roleid'] = $role1;
			$data['username']=$logname;
			$data['password']=$logpwd;
			$data['nicname']=$nicname;
			$data['content']=$othertext;
			$data['disable']=$disable;
			$data['banji']=$banji;
			$data['addtime']=time();
			
			$whe['username']=$logname;
			if($m->where($whe)->count()>0){
				$this->error("该会员已存在，请检查");	
			}
			
			
			if($m->add($data)){
				$this->success("添加成功",U("Member/mlist"));
			}else{
				$this->error("添加失败");	
			}
			
		}else{
			//绑定所属角色下拉框
			$m = M("Role");
			$data = $m->order("rid DESC")->where("isabled=1")->select();
			$this->assign("data",$data);
			$this->display();
		}
	}
	
	//编辑
	public function edit(){
		$m = M("User");
		$n = M("Role");
		
		if(IS_POST){
			$id = I("post.editid");
			$nicname = trim(I("post.nicname"));
			$logname = trim(I("post.logname"));
			$logpwd = md5(trim(I("post.logpwd")));
			$relogpwd = md5(trim(I("post.relogpwd")));
			$othertext = trim(I("post.othertext"));
			$role1 = trim(I("post.role1"));
			$banji=I("post.banji");
			
			$disable = trim(I("post.disable"));
			if(empty($nicname)){
				$this->error("会员姓名不能为空");
			}
			if(empty($logname)){
				$this->error("会员账号不能为空");
			}


			if($logpwd!=$relogpwd){
				$this->error("两次密码不一致");	
			}
			
		

			
			if($logpwd!="d41d8cd98f00b204e9800998ecf8427e"){
			$data['password']=$logpwd;
			}
			$data['username']=$logname;
			$data['nicname']=$nicname;
			$data['content']=$othertext;
			$data['roleid']=$role1;
			
			$data['disable']=$disable;
			$data['banji']=$banji;
			$data['updatetime']=time();
			if($m->where(array('id'=>$id))->save($data)){
				$this->success("修改成功",U("Member/mlist"));
			}else{
				$this->error("修改失败");
			}
			
		}else{
		$id = I("get.id");
		$mad = $m->where("id=$id")->find();
		if($mad['username']=="admin"){
			$this->error("不可对超级管理员进行操作！");
		}
		$data1 = $n->where("isabled=1")->select();
		$data = $m->where(array("id"=>$id))->find();	
	
		
		$this->assign("data1",$data1);
		$this->assign("data",$data);
		$this->display();	
		}
	}
	
	//列表
	public function mlist(){
		$m = M("User");
		import("ORG.Util.Paged");
		$count = $m->count();
		$page = new page($count,20);
		$show = $page->show();


		$data = $m->join("tp_role ON tp_user.roleid=tp_role.rid")->field("tp_role.rname,tp_user.*")->order("id DESC")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("data",$data);
		$this->assign("page",$show);
		
		$this->display();
	}
	
	//删除
	public function delete(){
		$m = M("User");
		$id = I("get.id");
		if(isset($id) && $id>0){

			if($m->where("`id`='$id' and `username`<>'admin'")->limit('1')->delete()){
				$this->success("删除成功");
			}else{
				$this->error("删除失败,超级管理员不可删除！");	
			}
		}
	}

	public function import_excel(){
		if (! empty ( $_FILES ['file_stu'] ['name'] ))
		 {
		    $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
		    $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
		    $file_type = $file_types [count ( $file_types ) - 1];
		     /*判别是不是.xls文件，判别是不是excel文件*/
		     if (strtolower ( $file_type ) != "xls")              
		    {
		          $this->error ( '不是Excel文件，重新上传' );
		     }
		    /*设置上传路径*/
		     $savePath = SITE_PATH . '/Public/Uploads/Member/';
		    /*以时间来命名上传的文件*/
		     $str = date ( 'Ymdhis' ); 
		     $file_name = $str . "." . $file_type;
		     /*是否上传成功*/
		     if (! copy ( $tmp_file, $savePath . $file_name )) 
		      {
		          $this->error ( '上传失败' );
		      }
		    /*
		       *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中
		      注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
		    */
		  // $res = $this->ex_read($savePath.$file_name);
		  //  /*
		  //       重要代码 解决Thinkphp M、D方法不能调用的问题  
		  //       如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
		  //   */
		  //  //spl_autoload_register ( array ('Think', 'autoload' ) );
		  //  /*对生成的数组进行数据库的写入*/
		  //  foreach ( $res as $k => $v ) 
		  //  {
		  //      if ($k != 0) 
		  //     {
		  //          $data ['uid'] = $v [0];
		  //          $data ['password'] = sha1 ( '111111' );
		  //          $data ['email'] = $v [1];
		  //          $data ['uname'] = $v [3];
		  //         $data ['institute'] = $v [4];
		  //        $result = M ( 'user' )->add ( $data );
		  //        if (! $result) 
		  //        {
		  //             $this->error ( '导入数据库失败' );
		  //         }
		  //     }
		  //  }
		}else{
			$this->error("请选择文件!");
		}
		 //导入phpExcel
        require_once SITE_PATH.'/ThinkPHP/Extend/Vendor/PHPExcel176/PHPExcel.php';
        require_once SITE_PATH.'/ThinkPHP/Extend/Vendor/PHPExcel176/PHPExcel/IOFactory.php';
        require_once SITE_PATH.'/ThinkPHP/Extend/Vendor/PHPExcel176/PHPExcel/Reader/Excel5.php';
        
		$reader = PHPExcel_IOFactory::createReader('Excel5'); // 读取 excel 文件方式  此方法是读取excel2007之前的版本 excel2007 为读取2007以后的版本 也可以查\Classes\PHPExcel\Reader 文件夹中的类（为所有读取类，需要哪个填上哪个就行）
		$PHPExcel = $reader->load($savePath . $file_name); // 文件名称
		$sheet = $PHPExcel->getSheet(0); // 读取第一个工作表从0读起
		$highestRow = $sheet->getHighestRow(); // 取得总行数
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
		
		$arr_result=array();
 		$strs=array();
 		$succ_result=0;
		$error_result=0;

		
		//循环读取excel文件,读取一条,插入一条
		for($j=2;$j<=$highestRow;$j++){
			 unset($arr_result);
    		 unset($strs);
			for($k='A';$k<=$highestColumn;$k++){
				$arr_result .= $PHPExcel->getActiveSheet()->getCell("$k$j")->getValue().',';//读取单元格

			}
			$strs=explode(",",$arr_result);
			
			$data['roleid']=0;
			$data['username']=$strs[0];
			$data['nicname']=$strs[1];
			$data['banji']=$strs[2];
			$data['password']=md5($strs[3]);
			$data['content']=$strs[4];
			$data['disable']=(int)$strs[5];
			$data['addtime']=time();
			if(M("User")->add($data)){
				$succ_result +=1; 
			}else{
				$error_result +=1;
			}
		}

		unlink($savePath . $file_name); //删除上传的excel文件
		$this->success("本次操作：<br>成功<font color=green><b>".$succ_result."</b>条数据</font>,"."<br>失败<font color=red><b>".$error_result."</b>条数据</font>");
	

		

		
	}

	//下载导入模板

	public function down_temp(){
			
			$filename = "template.xls";
			$filepath = './Public/Uploads/Member/'.$filename;
			if(!file_exists($filepath)){
				$this->error("该模板文件不存在");
			}
			
			
			//解决不同浏览器下载中文乱码问题
			$ua = $_SERVER["HTTP_USER_AGENT"]; 
			 $encoded_realname = urlencode($filename);
			 $encoded_realname = str_replace("+", "%20", $encoded_realname);  
			
			header('Content-Type: application/octet-stream');
			if(preg_match("/MSIE/", $ua)){
				header('Content-Disposition: attachment; filename="' . $encoded_realname . '"');  
			} else if (preg_match("/Firefox/", $ua)){
				header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');  
			} else {  
			header('Content-Disposition: attachment; filename="' . $filename . '"');   
			}  
			readfile($filepath);
			exit;
	}



 
	
	//启用禁用
	public function disabled(){
		$user = M("User");
		$disabled=I("get.disabled");
		$id = I("id");
		if(isset($disabled) && isset($id)){
			$mad = $user->where("id=$id")->find();
			if($mad['username']=="admin"){
				$this->error("不可对超级管理员进行操作！");
			}
			
			$data['disable']=$disabled;
			$data['id']=$id;
			if($user->save($data)){
				$this->success("操作成功");
			}else{
				$this->success("操作失败");
			}
		}
	}

	//修改密码
	public function editpwd(){
		if(IS_POST){
			$post = I("post.");
			if(empty($post)){
				$this->error("参数错误");
			}

			$where['id'] = $post['editid'];
			$data['password']=md5($post['newpwd']);

			$m = M("User");
			if($m->where($where)->save($data)){
				$this->success("修改成功");
				
			}else{
				$this->error("修改失败");
			}
			
		}else{
			$this->display();	
		}
		
	}
	//检查密码是否正确
	public function checkpass(){
		$m = M("User");
		$id = I("get.id");
		$oldpwd = md5(I("get.oldpwd"));
		if($id>0 && $oldpwd!=""){
			$where['id']=$id;
			$data = $m->where($where)->find();
		}
		if($data['password']==$oldpwd){
			echo "1";
		}else{
			echo "0";
		}
	}
	//检查用户名是否已存在
	public function checkuser(){
		$m = M("User");
		$username = trim(I("get.logname"));
		$where['username'] = $username;
		$count = $m->where($where)->count();
		if($count>0){
			echo "0";
		}else{
			echo "1";
		}
		exit;
	}
}

?>