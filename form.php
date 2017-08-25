
<?php
 	require_once "WxPay.JsApiPay.php";
   	$tools = new JsApiPay();
    $openId = $tools->GetOpenid();//获取openid
    //echo $openId;
    
    //根据openid获取flag,判断是否完成支付

	include('./connect.php');//链接数据库
	//根据openid查询flag,flag=1表示已支付
	$sql1="select flag from userinfo where openid = '$openId'";
	$result=mysqli_query($link,$sql1);//执行sql1
	while($row = mysqli_fetch_array($result)) {
	$flag = $row['flag'];
	}
	if($flag == 1)
	{
		$sql2="select * from userinfo where openid='$openId'";
    	mysqli_query($link,'set names utf8');
    	$result=mysqli_query($link,$sql2);//执行sql2
		while($row = mysqli_fetch_array($result)) {
		$productName = $row[1];
		$firstDate = $row[2];
		$pattern = $row[3];
		$money = $row[4];
		$plan_periods = $row[5];
		$periods = $row[6];
		$accountvalue = $row[7];
		$areacode = $row[8];
		$phoneNumber = $row[9];
		}
		
		}
	$productName="安盛101计划";
	mysqli_close($link);//关闭数据库
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
		<!-- 引入 weui.css 文件
		<link href="https://cdn.bootcss.com/weui/1.1.2/style/weui.css" rel="stylesheet">
		-->
		<link rel="stylesheet" type="text/css" href="./css/weui.min.css">
		<!--引入weui.js-->
		<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
		<!--引入jquery.min.js-->
		<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
		<!--引入jquery-3.0.0.min.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script> 
	<script type="text/javascript">
			function check(){ 
			 if(document.getElementById("firstDate").value==""){ 
			  alert("首次缴费日期不能为空！"); 
			  document.getElementById('firstDate').focus();
			  return false; 
			 } 
			 if(document.getElementById("accountvalue").value=="") { 
			  alert("当前账户价值不能为空！"); 
			  document.getElementById('accountvalue').focus();
			  return false; 
			 } 
			 if(document.getElementById("phoneNumber").value=="") { 
			  alert("手机号码不能为空！"); 
			  document.getElementById('phoneNumber').focus();
			  return false; 
			 } 
			  if(document.getElementById("captcha").value=="") { 
			  alert("请输入验证码！"); 
			  document.getElementById('captcha').focus();
			  return false; 
			 } 
			 /*
			 //<?php
			 //include('connect.php');//链接数据库
			 //$sql="select captcha from userinfo where openid='$openId'";
			 //mysqli_query($link,'set names utf8');
    		 //$result=mysqli_query($link,$sql);//执行sql
			 //while($row = mysqli_fetch_array($result)) {
			//	$captcha = $row[10];}
			 //?>

			 //if(document.getElementById("captcha").value==$captcha)
			 //{
					
			 //}
			  */
			 else
			 {
			 	return deal_form();
			 }
			} 
		</script>

<script type="text/javascript" >
var countdown=60; 
function settime(obj) { 
    if (countdown == 0) { 
        obj.removeAttribute("disabled");    
        obj.value="免费获取验证码"; 
        countdown = 60; 
        return;
    } else { 
        obj.setAttribute("disabled", true); 
        obj.value="重新发送(" + countdown + ")"; 
        countdown--; 
    } 
setTimeout(function() { 
    settime(obj) }
    ,1000) 
}

$(document).ready(function(){ 
    $("#btn").click(function(){ 
    	var openId = $("#openId").val();
     	var productName = $("#productName").val();
    	var firstDate = $("#firstDate").val();
    	var pattern = $("#pattern").val();
    	var money = $("#money").val();
    	var plan_periods = $("#plan_periods").val();
    	var periods = $("#periods").val();
    	var accountvalue = $("#accountvalue").val();
    	var areacode = $("#areacode").val();
        var phoneNumber = $("#phoneNumber").val();
       	var phoneNumber = $("#phoneNumber").val();
        $.ajax({ 
             url: "./sendsms.php",   
             type: "POST", 
             data:{
             	openId:openId,
             	productName:productName,
             	firstDate:firstDate,
             	pattern:pattern,
             	money:money,
             	plan_periods:plan_periods,
             	periods:periods,
             	accountvalue:accountvalue,
             	areacode:areacode,
             	phoneNumber:phoneNumber
             }, 
             dataType: "json", 
/*
            error: function(){   
                 alert('验证码发送失败，请重试');
                 countdown = 0;   
             },  
             */ 
             error: function(XMLHttpRequest, textStatus, errorThrown) {
 				if(XMLHttpRequest.status == 200 && XMLHttpRequest.readyState == 4)
 				{
 					alert("验证码发送成功，请查收"); 
 				}
 				else 
 				{
 					alert("验证码发送失败，请重试！"); 
 					countdown = 0;  
 				}
   },
            success: function(data,status){//如果调用php成功  
                alert("验证码发送成功，请查收"); 
             } 
        }); 

    }) 
}) 

</script>
		<title >请填写相关信息</title>
		<style type="text/css">
		* {font-family:Microsoft YaHei,"微软雅黑",宋体,Courier New !important;color:white !important;}
		#bg{width:100%;height:100%;position:absolute;z-index:-1;}
		:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    	color: #BFBFBF; opacity:1; 
		}

		::-moz-placeholder { /* Mozilla Firefox 19+ */
   		 color: #BFBFBF;opacity:1;
		}

		input:-ms-input-placeholder{
    		color: #BFBFBF;opacity:1;
		}

		input::-webkit-input-placeholder{
    		color:#BFBFBF;opacity:1;
		}
		</style>
		<script type="text/javascript">
		var countdown=60; 
		function settime(obj) 
		{ 
			if (countdown == 0) { 
			obj.removeAttribute("disabled");    
        	obj.value="免费获取验证码"; 
        	countdown = 60; 
        	return;
    	} 
    	else { 
        	obj.setAttribute("disabled", true); 
        	obj.value="重新发送(" + countdown + ")"; 
        	countdown--; 
    	} 
		setTimeout(function() { 
    		settime(obj) }
    		,1000) 
		}
		</script>
	</head>

	<body style="background: black">
	<img id ="bg" src="./img/bg.png" style="height: 140%">
		<form action="" method="post"  id="user_info">
		<?php echo "<input type='hidden' value='$openId' id='openId'>"; ?>
			<div class="weui-cell">
				<div class="weui-cell__hd">
					<label for="" class="weui-label">产品名称</label>
				</div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="text" value='<?php echo $productName; ?>' placeholder="请输入产品名称" id="productName" />
				</div>
				<!--
				<div class="weui-cell__hd">
						<select class="weui-select" name="productName" id="productName">
							<option value="安盛101计划">安盛101计划</option>
						</select>
				</div>
				-->
			</div>
			</div>
			<div class="weui-cell">
				<div class="weui-cell__hd">
					<label for="" class="weui-label">首次缴费日期</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="date" value='<?php echo $firstDate;?>' id="firstDate" />
				</div>
			</div>
				<div class="weui-cell weui-cell_select weui-cell_select-before">
				<div class="weui-cell weui-cell_vcode">
					<div class="weui-cell__hd">
						<select class="weui-select" name="select2" id="pattern">
							<option value="月供">月供</option>
							<option value="季供">季供</option>
							<option value="半年供">半年供</option>
							<option value="年供">年供</option>
						</select>
					</div>
					
					<div class="weui-cell__bd">
						<input class="weui-input" type="number" value='<?php echo $money;?>' placeholder="请输入每期供款金额" id="money" />
					</div>
					</div>
				</div>


			<div class="weui-cell">
				<div class="weui-cell__hd"><label class="weui-label">计划供款期数</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="number" value='<?php echo $plan_periods;?>' pattern="^[1-9]d*$" placeholder="请输入总缴费期数" id="plan_periods" />
				</div>
			</div>

			<div class="weui-cell">
				<div class="weui-cell__hd"><label class="weui-label">已缴费期数</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="number" value='<?php echo $periods;?>' pattern="^[1-9]d*$" placeholder="请输入已缴费期数" id="periods" />
				</div>
			</div>

			<div class="weui-cell">
				<div class="weui-cell__hd"><label class="weui-label">账户价值/元</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="number" value='<?php echo $accountvalue;?>' pattern="^[0-9]+(.[0-9]{2})?$" placeholder="请输入账户当前价值" id="accountvalue" />
				</div>
			</div>
			</div>
			<!--
			<div class="weui-cell">
				<div class="weui-cell__hd"><label class="weui-label">收益率(%)&nbsp</label></div>
				<div class="weui-cell__bd">
					<a href="javascript:;"></a>
					<input class="weui-input" type="number" value="7" id="percent" />
				</div>
			</div>
		-->
		<div class="weui-cell weui-cell_select weui-cell_select-before">
  		<div class="weui-cell weui-cell_vcode">
  		<div class="weui-cell__hd">
            <select class="weui-select" name="select2" id="areacode" >
                <option value="+86">+86</option>
                <option value="+852">+852</option>
            </select>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="tel" id="phoneNumber" name="phoneNumber" value='<?php echo $phoneNumber;?>'placeholder="请输入手机号"> 
        </div>
    	</div>
		</div>
			<div class="weui-cell">
			<div class="weui-cell__bd">
            <input class="weui-input" type="number" placeholder="请输入验证码" id="captcha" value="">
        </div>
			<div class="weui-cell__ft">
            <input type="button" class="weui-btn weui-btn_primary" value="免费获取验证码" id="btn"  onclick="settime(this)" /> 
        	</div>
        	</div>

		</form>
		
		<div class="weui-btn-area">
			<a class="weui-btn weui-btn_primary" onclick="check()" id="submit" >查看方案分析图</a>
		</div>
		<!--
		<div class="weui-btn-area">
			<a class="weui-btn weui-btn_primary" onclick="compare()" id="submit">比较2个图</a>
		</div>
		-->
		<!--引入echarts.js文件-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/3.6.2/echarts.min.js"></script>
		<!--引入主题文件shine.js-->
		<script src="js/shine.js">
		</script>
		<!--引入实现计算模型的model.js文件-->
		<script src="js/model.js"></script>
	</body>

</html>