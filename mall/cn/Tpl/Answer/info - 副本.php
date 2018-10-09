<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>

	<form action="<{:U('Answer/info')}>" method="post" name="form1">
	<foreach name="arr" item="vo" key="zk">
		<div>
			<div><{$vo.topicName}></div>
			<foreach name="vo[topicAnswers]" item="v" key="k">

				<div style="margin-left:20px;float:left;">
				<if condition="$vo[topicType] eq 0">
					<!--单选题 -->
					<input type="radio" name="answer_<{$zk+1}>" value="<{$k+1}>" /><{$v}>
				<else />
					<!--多选题-->
					<input type="checkbox" name="answer_<{$zk+1}>[]" value="<{$k+1}>" /><{$v}>
				</if>
				

				</div>

			</foreach>
		</div>
		<input type="hidden" name="topic_id[]" value="<{$vo.id}>" />

	<div style="clear:both;"></div>
	</foreach>
	<input type="hidden" name="tid" value="<{$Think.get.tid}>" />
	<button>提交</button>
	</form>


	
</body>
</html>
