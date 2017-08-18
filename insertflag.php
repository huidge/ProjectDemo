/*支付成功后，根据openid,将flag=1插入数据库*/
			<?php
				require_once "WxPay.JsApiPay.php";
				$tools = new JsApiPay();
				$openId = $tools->GetOpenid();//获取openid
				include('./connect.php');//链接数据库
				//$openId="l8Lp5t6n59DeX3U0C7Krid3qEx-Q";
				$sql="update userinfo set flag = 1 where openid ='$openId'";
				$reslut=mysqli_query($link,$sql);//执行sql
				if (!$reslut){
					die('Error: ' . mysqli_error($link));//如果sql执行失败输出错误
					}
				else{
					mysqli_close($link);//关闭数据库
					header('Location: ./show.php');
					}
				?>
