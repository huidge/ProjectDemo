<?php 
header("Content-Type: text/html; charset=UTF-8");
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "./lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();


/*根据openid获取flag,判断是否完成支付*/

include('./connect.php');//链接数据库
//根据openid查询flag,flag=1表示已支付
$sql="select flag from userinfo where openid = '$openId'";
$result=mysqli_query($link,$sql);//执行sql
while($row = mysqli_fetch_array($result)) {
	$flag = $row['flag'];
}
if($flag == 1)
	{
		mysqli_close($link);//关闭数据库
		echo "<script>alert('已支付');</script>";
		echo "<script>window.location.href='./show.php';</script>";
	}
mysqli_close($link);//关闭数据库
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("订单支付");
$input->SetAttach("test2");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test3");
$input->SetNotify_url("http://weixin.fortunefed.com/project/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
//echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
//printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
//$editAddress = $tools->GetEditAddressParameters();

//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>财联邦</title>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:ok")
				{
					alert("支付成功！");
					window.location.href="./insertflag.php";
				}
				if(res.err_msg == "get_brand_wcpay_request:cancel")
				{
					alert("取消支付！");
					window.location.href="./insertflag.php";
				}
				if(res.err_msg == "get_brand_wcpay_request:fail")
				{
					alert("支付失败！");
				}
				//alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>
	<script type="text/javascript">
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
	};
	
	</script>

	<style type="text/css">
/* 重置 [[*/
body,p,ul,li,h1,h2,form,input{margin:0;padding:0;}
h1,h2{font-size:35px;}
ul{list-style:none;}
body{-webkit-user-select:none;-webkit-text-size-adjust:none;font-family:Helvetica;background:#ECECEC;}
html,body{height:100%;}
a,button,input,img{-webkit-touch-callout:none;outline:none;}
a{text-decoration:none;}
/* 重置 ]]*/
/* 功能 [[*/
.hide{display:none!important;}
.cf:after{content:".";display:block;height:0;clear:both;visibility:hidden;}
/* 功能 ]]*/
/* 按钮 [[*/
a[class*="btn"]{display:block;height:42px;line-height:42px;color:#FFFFFF;text-align:center;border-radius:5px;}
.btn-blue{background:#3D87C3;border:1px solid #1C5E93;}
.btn-green{background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0, #43C750), color-stop(1, #31AB40));border:1px solid #2E993C;box-shadow:0 1px 0 0 #69D273 inset;}
/* 按钮 [[*/
/* 充值页 [[*/
.charge{font-family:Helvetica;padding-bottom:10px;-webkit-user-select:none;}
.charge h1{height:44px;line-height:44px;color:#FFFFFF;background:#000000;text-align:center;font-size:20px;-webkit-box-sizing:border-box;box-sizing:border-box;}
.charge h2{font-size:14px;color:#777777;margin:5px 0;text-align:center;}
.charge .content{padding:10px 12px;}
.charge .select li{position:relative;display:block;float:left;width:100%;margin-right:2%;height:150px;line-height:150px;text-align:center;border:1px solid #BBBBBB;color:#666666;font-size:16px;margin-bottom:5px;border-radius:3px;background-color:#FFFFFF;-webkit-box-sizing:border-box;box-sizing:border-box;overflow:hidden;}
.charge .price{border-bottom:1px dashed #C9C9C9;padding:10px 10px 15px;margin-bottom:20px;color:#666666;font-size:12px;}
.charge .price strong{font-weight:normal;color:#EE6209;font-size:26px;font-family:Helvetica;}
.charge .showaddr{border:1px dashed #C9C9C9;padding:10px 10px 15px;margin-bottom:20px;color:#666666;font-size:12px;text-align:center;}
.charge .showaddr strong{font-weight:normal;color:#9900FF;font-size:26px;font-family:Helvetica;}
.charge .copy-right{margin:5px 0; font-size:12px;color:#848484;text-align:center;}
/* 充值页 ]]*/
</style>

</head>
<body>
<article class="charge">
		<h1>财联邦</h1>
		<section class="content">
				
				<!--		
		  		<ul class="select cf">
					<li><img src="./微信支付demo/weixin.jpg" style="width:150px;height:150px"></li>
				</ul>
				-->
				<ul class="select cf">
					<p>
					想要查看本方案更多详情内容？
					</p>
					<p>
					立即支付查看
					</p>
				</ul>
				
				<div class="price">微信价：<strong>￥0.01元</strong></div>
				<!--
				<div class="operation"><a class="btn-green" id="getBrandWCPayRequest" href="https://wx.tenpay.com/cgi-bin/mmpayweb-bin/checkmweb?prepay_id=wx20170731170018d8efa3c3c00763842177&amp;package=595981920">立即购买</a></div>
				-->
				<div class="operation"><a class="btn-green" id="getBrandWCPayRequest" onclick="callpay()" >立即支付</a></div>
				<!--
				<p class="copy-right">demo</p>
				-->
				<br><p>注意事项：</p><br>
				<p class="copy-right">1、永久有效的账户投顾服务。我们强大的资管团队会定期为您推送投资市场资讯，同时根据您的风险偏好给予投资建议。</p>
				<p class="copy-right">2、专业高效的行政服务。转单、调仓等操作需要的资料填写、文档递交、信件派送，账户价值、账户收益率等状态的查询，都可以交给我们的行政团队，为您减少来回奔波的烦恼。</p>
				<p class="copy-right">3、一对一的咨询服务。我们可以为您安排专业的投资顾问进行一对一的咨询服务，为您的投资保驾护航。该服务的市场价是3000元/年，但我们的会员可以享受3次免费的服务，之后续费仅需1000元/年。</p>
		</section>
	</article>
    <br/>
<!--
    <font color="#9ACD32"><b>该笔订单支付金额为<span style="color:#f00;font-size:50px">1分</span>钱</b></font><br/><br/>

	<div align="center">
		<button style="width:210px; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()" >立即支付</button>
	</div>
	-->
</body>
</html>