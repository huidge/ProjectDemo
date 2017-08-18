<?php
    header("Content-Type: text/html; charset=utf-8");
    $openId = $_POST['openId'];
    $productName = $_POST['productName'];
    $firstDate = $_POST['firstDate'];
    $pattern = $_POST['pattern'];
    $money = $_POST['money'];
    $plan_periods = $_POST['plan_periods'];
    $periods = $_POST['periods'];
    $accountvalue = $_POST['accountvalue'];
    $areacode = $_POST['areacode'];
    $phoneNumber = $_POST['phoneNumber'];
    //$captcha = '38054';
    $captcha = rand(1000,9999);


    function sendSms($phoneNumber,$captcha){
			$url="https://api.ucpaas.com/sms-partner/access/b000q7/sendsms";
			$body='{
				"clientid":"b000q7",
				"password":"a2127f8fc81790b4798d2ab6cf8e94a3",
				"mobile":"'.$phoneNumber.'",
				"smstype":"4",
				"content":"【财联邦】尊敬的用户，您本次的验证码为：'.$captcha.'，3分钟内有效。如非本人操作请忽略本信息。",
				"extend":"01",
				"uid":"1234"
				}';
            $mine = 'application/json';
            $header = array(
                'Accept:' . $mine,
                'Content-Type:' . $mine . ';charset=utf-8',
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$body);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            $result = curl_exec($ch);
            curl_close($ch);

        echo $result;
        //return $result;
    }


    if($phoneNumber != "" && $accountvalue != "")
    {
    include('./connect.php');//链接数据库
    //向数据库插入表单传来的值的sql
/*插入openid*/


    $q="insert into userinfo(id,productName,firstDate,pattern,money,plan_periods
     ,periods,accountvalue,areacode,phoneNumber,captcha,recorddate,openid) 
     values (null,'$productName','$firstDate','$pattern','$money','$plan_periods','$periods','$accountvalue','$areacode','$phoneNumber','$captcha',now(),'$openId')";
    //mysqli_query("set names 'utf8'"); //**设置字符集***
    $reslut=mysqli_query($link,$q);//执行sql
    
    if (!$reslut){
        die('Error: ' . mysqli_error($link));//如果sql执行失败输出错误
    }else{
        echo "登记成功</br>";//成功输出登记成功
    }

    mysqli_close($link);//关闭数据库
    //发送验证码
    sendSms($phoneNumber,$captcha);
}
else
{
    echo "请输入手机号码！";
}

?>

