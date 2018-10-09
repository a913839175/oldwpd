<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>

<include file="Public:header" />
<!--end header nav banner-->
<!--main-->
<div class="bigdiv pt15">
	<div class="nyleft fl">

	<include file="Public:left" />

	</div>	
	<div class="nyright fr">
	<div class="nyright_bg1">
	<div class="nyright_bg2">
	<div class="nyright_bg3 min_h">
		<h3 class="nytit2">Download Password</h3>
		<div class="nytxt2">
       		<center>
 
				<table width="506" align="center"  class="table_form contentWrap">
		        	
		            <tr>
		            	<th align="right">Download Password</th>
		                <td><input type="text" class="input" size="30" name="downpass" />
		                    <input type="button" name="button1" class="btn_submit mr10 J_ajax_submit_btn" value="Submit" onclick="checkquick()" />
		                </td>
		            </tr>
		            <tr align="center">
		            	<td colspan="2"><span class="spanshow"></span></td>
		            </tr>
		        </table>
		        <hr />
		        <a href="javascript:history.go(-1);">Click to return</a>

		    </center>
		</div>
	</div>
	</div>	
	</div>	
	</div>
</div>
<!--end main-->
<!--footer-->
<include file="Public:footer" />
<!--end footer-->
</div>
</div>
</div>
</body>
<script type="text/javascript" src="__PUBLIC__/Home/En/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
jQuery(".picMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:3,interTime:50});
</script>
<script src="__PUBLIC__/Home/En/js/js.js"></script>
</html>

<script language="javascript">
	function checkquick(){
		var downpass = $("input[name=downpass]");
		if(downpass.val()==""){
			$(".spanshow").html("<font color='red'>Can not be empty</font>");
			downpass.focus();
		}else{
			
			$.get("<{:U('Download/downpass_save')}>",{downpass:downpass.val(),rand:Math.random()},function(data){
				if(data==1){
					location.href="<{:U('Download/index')}>";
				}else{
					alert("The password is incorrect");
					//history.go(-1);
				}
			});
		}
	}
	
	
</script>