<?php
	//动态生成试题
	class AnswerAction extends CommonAction{
		public function index(){
			$data = M("Answertype")->where(array('isShow'=>1))->select();
			$this->assign("data",$data);
			$this->display();
		}

		public function info(){
			$m = M("Answer");
			if(IS_POST){
				
				// $a = array(0=>'aaa',1=>'bbb',2=>'ccc');
				// $b = array(0=>'bbb',1=>'ccc',2=>'aaa');
				// $c = array_diff($a,$b);
				// dump($c);
				// exit;

				$is_success = 1;
				$messAnswer = "";
				$proId = 154;  
				$userId = 16;
				$answertypeId = I("post.tid");
				$typeName = M("Answertype")->where(array('id'=>$answertypeId))->getField("typeName");
				$addtime = time();

				$typedata = array(
					'proId'=>$proId,
					'userId'=>$userId,
					'answertypeId'=>$answertypeId,
					'typeName'=>$typeName,
					'addtime'=>$addtime
				);

				$add_id = M("Answer_view")->add($typedata);




				//题目id
				$topic_id = $_POST['topic_id'];
				foreach($topic_id as $k=>$vo){
					$ans_arr = M("Answer")->where(array('id'=>$vo))->find();
					$n = $k+1;
					$res = $_POST['answer_'.$n.''];

					
					if(is_array($res)){
						//复选
						$ans_arr_correctAnswer = explode(',', $ans_arr['correctAnswer']);

					


						if(array_diff($ans_arr_correctAnswer,$res) || array_diff($res,$ans_arr_correctAnswer)){
							$bool = 0;
						}else{
							$bool = 1;
						}
						

						
						if($bool==1){
							//正确
							$isCorrect=1;
						}else{
							//错误
							$isCorrect=0;
						}
						$messAnswer = implode(',', $res);
					}else{
						//单选
						$ans_arr_correctAnswer = $ans_arr['correctAnswer'];
						if($ans_arr_correctAnswer==$res){
							//正确
							$isCorrect=1;
						}else{
							//错误
							$isCorrect=0;
						}

						$messAnswer = $res;
					}

					

					
					//插入详细
						$view_info_data = array(
							'viewId'=>$add_id,
							'isCorrect'=>$isCorrect,
							'topicName'=>$ans_arr[topicName],
							'topicAnswers'=>$ans_arr[topicAnswers],
							'correctAnswer'=>$ans_arr[correctAnswer],
							'messAnswer'=>$messAnswer,
							'addtime'=>time()
						);
					if(M("Answer_view_info")->add($view_info_data)){
						$is_success=1;
					}else{
						$is_success=0;
					}

					
				}
				if($is_success==1){
					$this->success("提交成功");
				}else{
					$this->error("提交失败");
				}

				
				
			}
				$cid = I("get.tid");
				$arr = $m->where(array('isShow'=>1,'cid'=>$cid))->order("orderBy ASC")->select();
				 foreach($arr as $k=>$vo){
				 	$arr[$k]['topicAnswers']=explode(',', $vo['topicAnswers']);
				 }
				$this->assign("arr",$arr);

				$this->display();
		}
	}
?>