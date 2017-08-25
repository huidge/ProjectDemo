<?php	
	header('Content-Type: text/html; charset=utf-8');
	error_reporting( E_ALL&~E_NOTICE );

	require_once "WxPay.JsApiPay.php";
	$tools = new JsApiPay();
	$openId = $tools->GetOpenid();//获取openid
	include('connect.php');//链接数据库
    $sql="select * from userinfo where openid='$openId'";
    mysqli_query($link,'set names utf8');
    $result=mysqli_query($link,$sql);//执行sql
	while($row = mysqli_fetch_array($result)) {
	$pattern = $row[3];
	$money = $row[4];
	$plan_periods = $row[5];
	$periods = $row[6];
	$accountvalue = $row[7];
	$percent = 0.07;
	}

/*
	//$productName = "安盛101计划";
	//$f$irstDate = "2010-1-1";
	$pattern = "月供";
	$money = 1083;
	$plan_periods = 120;
	$periods = 47;
	$accountvalue = 29000;
	$percent = 0.07;
*/
	$i = 0;
	if($periods <= 18)
	{
		$iCP[$i] = $accountvalue;
		$A_C[$i] = 0;
	}
	else
	{
		$iCP[$i] = $money*18;
		$A_C[$i] = $accountvalue-$iCP[$i];
	}
	/*初始化现金价值*/
	$cashValue[$i] = $iCP[$i] + $A_C[$i];
	/*退保成本（费率）*/
	$surrenderrate = array(0.93, 0.93, 0.93, 0.93, 0.93, 0.93, 0.93,
		0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92, 0.92,
		0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91, 0.91,
		0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90, 0.90,
		0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89, 0.89,
		0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88, 0.88,
		0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86, 0.86,
		0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82, 0.82,
		0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78, 0.78,
		0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74, 0.74,
		0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70, 0.70,
		0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65, 0.65,
		0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60, 0.60,
		0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56, 0.56,
		0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52, 0.52,
		0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49, 0.49,
		0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45, 0.45,
		0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40, 0.40,
		0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32, 0.32,
		0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26, 0.26,
		0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20, 0.20,
		0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14, 0.14,
		0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08, 0.08,
		0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
		0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
		0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
	/*退保费用*/
	$surrenderCost[$i] = $iCP[$i] * $surrenderrate[$i];
	/*退保后价值*/
	$surrenderValue[$i]= round(($iCP[$i] * (1 - $surrenderrate[$i]) + $A_C[$i]),2);
	$principal[$i] = $money * $periods;
	/*初始化周期*/
	$T = 0;
	/*根据供款模式选择*/
	switch($pattern) {
		case "月供":
			$T = 12;
			break;
		case "季供":
			$T = 4;
			break;
		case "半年供":
			$T = 2;
			break;
		case "年供":
			$T = 1;
			break;
	}
	/*月收益率*/
	$rate = pow(1 + $percent , 1 / $T);
	/**/
	$policyFee1 = 0.005 / $T;
	/**/
	$policyFee2 = -6.5;
	/**/
	$policyFee3 = 0.015 / $T;
	/*账户管理费*/
	$accountvalueFee = 0.04 / $T;
	/*初始的现金价值/本金*/
	$cashValue_principal[$i] = $cashValue[$i]/$principal[$i];
	/*初始的退保价值/本金*/
	//$default_surrenderValue_principal[$i] = round((($iCP[$i] + $A_C[$i] - $iCP[$i] * $surrenderrate[$i]) / $principal[$i]),2);

	/*初始化结束*/

	/*开始第一期缴费*/
	$i++;
	$principal[$i] = $principal[$i-1] + $money;
	//$A_C = $money;
	$A_C[$i] = $money;
	//console.log($A_C);
	$iCP[$i]= $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;
	$cashValue[$i] = $iCP[$i] + $A_C[$i];
	$surrenderCost[$i] = $iCP[$i]* $surrenderrate[$i];
	$surrenderValue[$i]= round(($iCP[$i] * (1 - $surrenderrate[$i]) + $A_C[$i]),2);
	$cashValue_principal[$i] = ($iCP[$i] + $A_C[$i]) / $principal[$i];
	$default_surrenderValue_principal[$i] = round((($iCP[$i] + $A_C[$i] - $iCP[$i] * $surrenderrate[$i]) / $principal[$i]),2);

	/*第一期缴费结束*/


	/*循环开始下一期缴费*/
	for($i = 2; $i <= 150; $i++) {
		$A_C[$i] = $A_C[$i-1] * $rate * (1 - $policyFee3) - $principal[$i-1] * $policyFee1 + $money;
		if($principal[$i-1] < $money*$plan_periods)
		{
			$principal[$i] = $principal[$i-1] + $money;
		}
		else
		{
			$principal[$i] = $principal[$i-1];
		}
		$iCP[$i] = $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;

		$cashValue[$i] = $iCP[$i]+ $A_C[$i];
		$surrenderCost[$i] = $iCP[$i] * $surrenderrate[$i];
		$surrenderValue[$i]= round(($iCP[$i] * (1 - $surrenderrate[$i]) + $A_C[$i]),2);
		$cashValue_principal[$i] = ($iCP[$i] + $A_C[$i]) / $principal[$i];
		$default_surrenderValue_principal[$i] = round((($iCP[$i] + $A_C[$i] - $iCP[$i] * $surrenderrate[$i]) / $principal[$i]),2);

	}


	//创建施行方案后的退保价值/本金数组
	$surrenderValue_principal_first = array();
	$surrenderValue_principal_second = array();
	$surrenderValue_principal_third = array();
	$surrenderValue_principal_forth = array();
	$surrenderValue_principal_fifth = array();
	$surrenderValue_principal_sixth = array();
	$percent=$percent*100;
	//减资方案

	if(1)
	{
		
		$money=$money*0.5;
		$flag = 0;
		//echo("减少每期缴费额，额度为每期缴费额的50%，即"+$money);
		$surrenderValue_principal_first[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$A_C[$i] = $A_C[$i-1] * $rate * (1 - $policyFee3) - $principal[$i-1] * $policyFee1 + $money;
			if($principal[$i-1] < $money*$plan_periods)
			{
				$principal[$i] = $principal[$i-1] + $money;
			}
			else
			{
				$principal[$i] = $principal[$i-1];
			}
			$iCP[$i] = $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;
			$surrenderValue_principal_first[$i] = round((($iCP[$i]+ $A_C[$i] - $iCP[$i]* $surrenderrate[$i]) / $principal[$i]),2);
			if($flag==0 && $surrenderValue_principal_first[$i] >= $default_surrenderValue_principal[$i] )
			{	
				/*
				echo("<div style='background-color:#3e3e3e;width:80%';height:150%>");
				echo("<p style='color:white;fontSize:40px'>如果您减少投资现金，增加现金流；假设您减少投资金额50%，按照一个合理的规划回报率$percent%,您的账户将在第$i 期超过未减额时按原本回报率的账户状态。</p>");
				echo("</div>");
				*/
				$first=$percent;
				$second=$i;
				$flag=1;
			}
		}

	}

	//继续持有方案
	if(1)
	{
		
		//echo("保持每期缴费额不变，即"+$money);
		$flag = 0;
		$surrenderValue_principal_second[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$A_C[$i] = $A_C[$i-1] * $rate * (1 - $policyFee3) - $principal[$i-1] * $policyFee1 + $money;
			if($principal[$i-1] < $money*$plan_periods)
			{
				$principal[$i] = $principal[$i-1] + $money;
			}
			else
			{
				$principal[$i] = $principal[$i-1];
			}
			$iCP[$i] = $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;
			$surrenderValue_principal_second[$i] = round((($iCP[$i]+ $A_C[$i] - $iCP[$i]* $surrenderrate[$i]) / $principal[$i]),2);
			if($flag == 0 && $surrenderValue_principal_second[$i]>=1.2)
			{
				/*
				echo("<div style='background-color:#3e3e3e;width:80%;'>");
				echo("<p style='color:white'>如果您继续持有账户，按照一个合理的规划回报率$percent%，您的账户将在第$i 期盈余超过20%。</p>");
				echo("</div>");
				*/
			$third=$i;
				$flag=1;
			}
		}
		
	}
	//增资方案
	if(1)
	{
		
		$money=$money*2;
		//echo("增加每期缴费额，额度为每期缴费额的200%，即"+$money);
		$flag = 0; 
		$surrenderValue_principal_third[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$A_C[$i] = $A_C[$i-1] * $rate * (1 - $policyFee3) - $principal[$i-1] * $policyFee1 + $money;
			if($principal[$i-1] < $money*$plan_periods)
			{
				$principal[$i] = $principal[$i-1] + $money;
			}
			else
			{
				$principal[$i] = $principal[$i-1];
			}
			$iCP[$i] = $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;
			$surrenderValue_principal_third[$i] = round((($iCP[$i]+ $A_C[$i] - $iCP[$i]* $surrenderrate[$i]) / $principal[$i]),2);
			if($flag == 0 && $surrenderValue_principal_third[$i] >= 1)
			{
				/*
				echo("<div style='background-color:#3e3e3e;width:80%;'>");
				echo("<p style='color:white'>如果您有继续持有的意愿并且有能力继续投入，您可以增加投资金额以达到尽快回本的目的。假设您增加金额双倍，按照一个合理的规划回报率$percent%，您的账户将在第 $i 期回本。</p>");
				echo("</div>");
				*/
			$fifth = $i;
				$flag = 1;
			}
		}
	}
	//退保方案
	if(1)
	{
		
		//echo("本金"+$principal[$periods]+"元</br>");
		//echo("退保成本"+$surrenderCost[$periods]+"元</br>");
		//echo("拿到退保价值"+$surrenderValue[$periods]+"元</br>");
		$loss=(1-$default_surrenderValue_principal[$periods])*100;
		/*
		echo("<div style='background-color:#3e3e3e;width:80%;'>");
		echo("<p style='color:white'>假设您没有继续持有的意愿或者有现金流的需求，其中一个方案建议您选择退保。假设您现在退保，您可取回$surrenderValue[$periods]元。</p>");
		echo("</div>");
		*/
	$sixth = $surrenderValue[$periods];
		$surrenderValue_principal_forth[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$surrenderValue[$i]=round($surrenderValue[$i-1]*(1+0.04/12),2);
			$surrenderValue_principal_forth[$i] = round(($surrenderValue[$i] / $principal[$periods]),2);		

		}

	}
	//转让方案
	if(1)
	{
		//echo("以退保价值的120%转让给财联邦</br>");
		//echo("退保价值"+$surrenderValue[$periods]+"元</br>");
		$loss = (1-$default_surrenderValue_principal[$periods])*100;
		$value = round($surrenderValue[$periods]*1.2,2);
		/*
		echo("<div style='background-color:#3e3e3e;width:80%;'>");
		echo("<p style='color:white'>假设您没有意愿再持有账户，其中一个方案建议您转让保单。假设您按正常流程停止保单，您的剩余价值是$surrenderValue[$periods]元，但按照转让价格，您可取回$value 元。</p>");
		echo("</div>");
		*/
		$seventh = $surrenderValue[$periods];
		$eighth =  $value;

		$surrenderValue[$periods]=$surrenderValue[$periods]*1.2;
		$surrenderValue_principal_fifth[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$surrenderValue[$i]=$surrenderValue[$i-1]*(1+0.04/12);
			$surrenderValue_principal_fifth[$i] =  round(($surrenderValue[$i] / $principal[$periods]),2);
		}
	}
	//提取方案
	if(1)
	{
		//echo("每期从A/C账户提取30%");
		$flag = 0; 
		//$sum为提取总金额
		$sum = 0;
		$surrenderValue_principal_sixth[$periods] = $default_surrenderValue_principal[$periods];
		for($i = $periods+1; $i <= 150; $i++) 
		{
			$sum = $sum+$A_C[$i-1]*0.3;
			$A_C[$i] = $A_C[$i-1] * $rate * (1 - $policyFee3) - $principal[$i-1] * $policyFee1 + $money-$A_C[$i-1]*0.3;
			if($principal[$i-1] < $money*$plan_periods)
			{
				$principal[$i] = $principal[$i-1] + $money;
			}
			else
			{
				$principal[$i] = $principal[$i-1];
			}
			$iCP[$i] = $iCP[$i-1] * $rate * (1 - $accountvalueFee - $policyFee3) + $policyFee2;

			$surrenderValue_principal_sixth[$i] = round((($iCP[$i]+ $A_C[$i] - $iCP[$i]* $surrenderrate[$i]+$sum) / $principal[$i]),2);
			
			//$surrenderValue_principal_sixth[$i]>=1 回本
			if($flag==0 && $surrenderValue_principal_sixth[$i-1] >= 1)
			{
				//echo("<div style='background-color:#3e3e3e;width:100%;'>");
		/*
		echo("<div style='background-color:#3e3e3e;width:80%;'>");
		echo("<p style='color:white;'>假设您短期内有资金需求，其中一个方案建议您提取金额。假设您每期从A/C账户提取30%的额度，按照一个合理的规划回报率$percent%，您的账户剩余价值将在第$i期回本。</p>");
		echo("</div>");
		*/		$ninth = $i;
				$flag=1;
			}
		}
	}

	?>