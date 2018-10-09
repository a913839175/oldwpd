<?php
	class MailAction extends CommonAction{

		public function _initialize(){
			vendor("phpmailer.phpmailer");

		}
		public function index(){
			$data = array(
				//'mailaddress'=>'ningning342@126.com',  //回复地址

				'mailname'=>'徐宁',    //姓名
				'mailphone'=>'13696524108', //联系电话
				'mailcontent'=>'你们公司是做什么的呀，我想问问111',  //内容
				'mailtime'=>date("Y-m-d H:i:s",time()), //时间
			);

			$this->message_sendmail($data);
		}
		public function sendmail($data){
			$mail_config = C("mail"); //读取配置

			try {
			
			$mail = new PHPMailer(true); 

			$mail->IsSMTP(); 
			$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
			$mail->SMTPAuth = true; //开启认证 
			$mail->Port = 25; 
			$mail->Host = $mail_config['host']; 
			$mail->Username = $mail_config['username']; 
			$mail->Password = $mail_config['password']; 
			//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
			$mail->AddReplyTo($data['mailaddress'],$data['mailaddress']);//回复地址 
			$mail->From = $mail_config['from']; 
			$mail->FromName = $mail_config['from_name']; 
			$to = $mail_config['to']; 
			$mail->AddAddress($to); 
			$mail->Subject = $data['mailtitle']; 
			$mail->Body = $data[mailaddress]."说：".$data['mailcontent']; 
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
			$mail->WordWrap = 80; // 设置每行字符串的长度 
			//$mail->AddAttachment("f:/test.png"); //可以添加附件 
			$mail->IsHTML(true); 
			$mail->Send(); 
				//$this->success("邮件已发送",U('Index/index'));
				return true; //发送成功
			} catch (phpmailerException $e) { 
				echo false; //发送失败
			} 

		}

		//留言回复邮件
		public function message_sendmail($data){

			//$mail_config = C("mail"); //读取配置
			$mail_config = M("Mail")->find();
			$mail_info_config = M("Mail_info")->select();

			try {
			
			$mail = new PHPMailer(true); 

			$mail->IsSMTP(); 
			$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
			$mail->SMTPAuth = true; //开启认证 
			$mail->Port = 25; 
			$mail->Host = $mail_config['smtp_host']; 
			$mail->Username = $mail_config['smtp_name']; 
			$mail->Password = $mail_config['smtp_pssword']; 
			//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
			$mail->AddReplyTo($mail_config['smtp_from'],$mail_config['smtp_from']);//回复地址 
			$mail->From = $mail_config['smtp_from']; 
			$mail->FromName = $mail_config['smtp_from_name']; 
			
			
			$mail->Subject = $mail_config['smtp_title'];
			$mail->Body = "姓名：".$data[mailname]."<br>联系电话：".$data[mailphone]."<br>主题：".$data[mailcontent]."<br>留言时间：".$data[mailtime]; 
			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
			$mail->WordWrap = 80; // 设置每行字符串的长度 
			//$mail->AddAttachment("f:/test.png"); //可以添加附件 
			$mail->IsHTML(true); 

			foreach($mail_info_config as $vo){
				$to = $vo[smtp_to];
				$mail->AddAddress($to); 
				$mail->Send(); 
			}
				
		

			
				//$this->success("邮件已发送",U('Index/index'));
				return true; //发送成功
			} catch (phpmailerException $e) { 
				echo false; //发送失败
				echo "错误原因: " . $mail->ErrorInfo;
			} 
		}
	}
?>