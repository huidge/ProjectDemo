function deal_form() {
	//获取form对象 
	var form = document.getElementById('user_info');
	var productName = form.productName.value;
	var firstDate = form.firstDate.value;
	var pattern = form.pattern.value;
	var money = form.money.value;
	var plan_periods = form.plan_periods.value;
	var periods = form.periods.value;
	var accountvalue = form.accountvalue.value;
	var phoneNumber = form.phoneNumber.value;
	//var percent = form.percent.value;
	//var nowDate = new Date();

	money = parseInt(money, 10);
	var money0 = money;
	plan_periods = parseInt(plan_periods, 10);
	periods = parseInt(periods, 10);
	accountvalue = parseInt(accountvalue, 10);
	//var percent=parseInt(percent,10);
	var i = 0;
	var ICP = new Array();
	var A_C = new Array();
	if(periods <= 18)
	{
		ICP[i] = accountvalue;
		A_C[i] = 0;
	}
	else
	{
		ICP[i] = money*18;
		A_C[i] = accountvalue-ICP[i];
	}
	/*初始化现金价值*/
	var cashValue = new Array();
	cashValue[i] = ICP[i] + A_C[i];
	/*退保成本（费率）*/
	var surrenderRate = new Array(0.93, 0.93, 0.93, 0.93, 0.93, 0.93, 0.93,
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
	var surrenderCost = new Array();
	surrenderCost[i] = ICP[i] * surrenderRate[i];
	/*退保后价值*/
	var surrenderValue = new Array();
	surrenderValue[i]= ICP[i] * (1 - surrenderRate[i]) + A_C[i];
	/*每期缴费金额*/
	//var money = 1083;
	/*已缴费期数*/
	//var periods = 18;
	/*总本金*/
	var principal = new Array();
	principal[i] = money * periods;
	/*预计收益率*/
	var percent = 7;
	/*初始化周期*/
	var T = 0;
	/*获取供款模式*/
	//var pattern="月供";
	/*根据供款模式选择*/
	switch(pattern) {
		case "月供":
			T = 12;
			break;
		case "季供":
			T = 4;
			break;
		case "半年供":
			T = 2;
			break;
		case "年供":
			T = 1;
			break;
	}
	/*月收益率*/
	var rate = Math.pow(1 + (percent / 100), 1 / T);
	/**/
	var policyFee1 = 0.005 / T;
	/**/
	var policyFee2 = -6.5;
	/**/
	var policyFee3 = 0.015 / T;
	/*账户管理费*/
	var accountvalueFee = 0.04 / T;
	/*初始的现金价值/本金*/
	var cashValue_Principal = new Array();
	cashValue_Principal[i] = cashValue[i]/principal[i];
	/*初始的退保价值/本金*/
	var default_surrenderValue_Principal = new Array();
	default_surrenderValue_Principal[i] = ((ICP[i] + A_C[i] - ICP[i] * surrenderRate[i]) / principal[i]).toFixed(2);
	/*初始化结束*/

	/*开始第一期缴费*/
	i++;
	principal[i] = principal[i-1] + money;
	//A_C = money;
	A_C[i] =A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money;
	//console.log(A_C);
	ICP[i]= ICP * rate * (1 - accountvalueFee - policyFee3) + policyFee2;
	cashValue[i] = ICP[i] + A_C[i];
	surrenderCost[i] = ICP[i]* surrenderRate[i];
	surrenderValue[i] = ICP[i] * (1 - surrenderRate[i]) + A_C[i];
	cashValue_Principal[i] = (ICP[i] + A_C[i]) / principal[i];
	default_surrenderValue_Principal[i] = ((ICP[i] + A_C[i] - ICP[i] * surrenderRate[i]) / principal[i]).toFixed(2);
	/*第一期缴费结束*/


	/*循环开始下一期缴费*/
	for(i = 2; i <= 350; i++) {
		A_C[i] = A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money;
		if(principal[i-1] < money*plan_periods)
		{
			principal[i] = principal[i-1] + money;
		}
		else
		{
			principal[i] = principal[i-1];
		}
		ICP[i] = ICP[i-1] * rate * (1 - accountvalueFee - policyFee3) + policyFee2;

		cashValue[i] = ICP[i]+ A_C[i];
		surrenderCost[i] = ICP[i] * surrenderRate[i];
		surrenderValue[i] = ICP[i] * (1 - surrenderRate[i]) + A_C[i];
		cashValue_Principal[i] = (ICP[i] + A_C[i]) / principal[i];
		default_surrenderValue_Principal[i] = ((ICP[i] + A_C[i] - ICP[i] * surrenderRate[i]) / principal[i]).toFixed(2);

	}
document.write("<body style='background: #3e3e3e'>");

document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 10%'><p style='color:white'>根据您的账户数据，分析结果如下：<br/>"+
	"已供款<strong style='color:#dfc781'>"+periods+"</strong>期<br/>"+
"总供款金额<strong style='color:#dfc781'>"+money*periods+"</strong>元<br/>"+
"目前账户价值<strong style='color:#dfc781'>"+accountvalue+"</strong>元<br/>"+
"账户回报率约为<strong style='color:#dfc781'>"+((accountvalue-money*periods)*100/(money*periods)).toFixed(2)+"%</strong>"+
"假设退保，可取回价值<strong style='color:#dfc781'>"+surrenderValue[0].toFixed(2)+"</strong>元<br/></p></div>");

//初始图展示
	document.write("<link rel='stylesheet' type='text/css' href='./css/weui.min.css'> ");
	document.write("<title>财联邦</title>");
	//<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
	//支付宝、P2P、专业资管团队收益曲线对比图

document.write("<div id='main0'  style='width:100%;height:400px;'></div>");

document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 10%'><p style='color:white'>根据上图对比，可以看出：<br/>"+
	"余额宝收益较低，P2P风险较高，<br/>"+
"综合对比而言，<br/></p>"+
"<strong style='color:#dfc781'>专业资管团队是您投资稳健增长的<br/>"+
"最佳选择！<br/></strong>");

document.write("<div id='main'  style='width: 100%;height:400px;'></div>");
	//document.write("现金价值/本金:"+cashValue_Principal[periods]+"</br>");
	//document.write("退保费率："+surrenderRate[periods]*100+"%</br>");
	/*创建施行方案后的退保价值/本金数组*/
	var surrenderValue_Principal = new Array();
	//减资方案
	if(cashValue_Principal[periods]>=1.06 && surrenderRate[periods]>0.5)
	{
		//document.write("<div style='background-color:#3e3e3e;'>");
		//document.write("<h3 style='color:white'>&nbsp&nbsp&nbsp&nbsp建议方案1:减资</h3></br>");
		//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>");
		//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>");
		//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><br />");
		
document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案1:减资</h3><br/>"+
	"<p style='color:white'>您现在的账户正处于不错的盈余状态，其中一个方案建议您可减少投资现金，增加现金流。</p><br/>");

		money=money*0.5;
		var flag = 0;
		//document.write("减少每期缴费额，额度为每期缴费额的50%，即"+money);
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		for(i = periods+1; i <= 350; i++) 
		{
			A_C[i] = A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money;
			if(principal[i-1] < money*plan_periods)
			{
				principal[i] = principal[i-1] + money;
			}
			else
			{
				principal[i] = principal[i-1];
			}
			ICP[i] = ICP[i-1] * rate * (1 - accountvalueFee - policyFee3) + policyFee2;
			surrenderValue_Principal[i] = ((ICP[i]+ A_C[i] - ICP[i]* surrenderRate[i]) / principal[i]).toFixed(2);
			
			if(flag==0 && surrenderValue_Principal[i] >= default_surrenderValue_Principal[i] )
			{
				//document.write("<div style='background-color:#3e3e3e;width:100%;'>");
				//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>");
				//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>");
				//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>");
				//document.write("<p style='color:white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp。</p>");
				//document.write("</div>");
				//document.write("</div>");
document.write("<div style='background-color:#3e3e3e;width:100%;'>"+
	"<p style='color:white'>假设您减少投资金额50%,按照一个合理的规划回报率"+percent+
	"%,您的账户将在第"+i+"期超过未减额时按原本回报率的账户状态。</p></div></div>");
				flag=1;
			}
		}

	}
	//继续持有方案
	else if(cashValue_Principal[periods]>=0.95 && cashValue_Principal[periods]<1.06 && surrenderRate[periods]>0.5)
	{	
		document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案2:持有</h3><br/>"+
	"<p style='color:white'>您现在的账户处于可控状态，其中一个方案建议您继续持有账户。</p><br/>");
		//document.write("保持每期缴费额不变，即"+money);
		var flag = 0;
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		for(i = periods+1; i <= 350; i++) 
		{
			A_C[i] = A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money;
			if(principal[i-1] < money*plan_periods)
			{
				principal[i] = principal[i-1] + money;
			}
			else
			{
				principal[i] = principal[i-1];
			}
			ICP[i] = ICP[i-1] * rate * (1 - accountvalueFee - policyFee3) + policyFee2;
			surrenderValue_Principal[i] = ((ICP[i]+ A_C[i] - ICP[i]* surrenderRate[i]) / principal[i]).toFixed(2);
			
			if(flag == 0 && surrenderValue_Principal[i]>=1.2)
			{
				document.write("<div style='background-color:#3e3e3e;width:100%;'>"+
					"<p style='color:white'>按照一个合理的规划回报率"+percent+
					"%，您的账户将在第"+i+"期盈余超过20%。</p></div></div>");
				flag=1;
			}
		}
		
	}
	//增资方案
	else if(cashValue_Principal[periods]>=0.9 && cashValue_Principal[periods]<0.95)
	{
		document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案3:增资</h3><br/>"+
	"<p style='color:white'>您现在的账户处于亏损较可控状态，假设您有继续持有的意愿并且有能力继续投入，其中一个方案建议您增加投资金额以达到尽快回本的目的。</p><br/>");
		money=money*2;
		//document.write("增加每期缴费额，额度为每期缴费额的200%，即"+money);
		var flag = 0; 
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		for(i = periods+1; i <= 350; i++) 
		{
			A_C[i] = A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money;
			if(principal[i-1] < money*plan_periods)
			{
				principal[i] = principal[i-1] + money;
			}
			else
			{
				principal[i] = principal[i-1];
			}
			ICP[i] = ICP[i-1] * rate * (1 - accountvalueFee - policyFee3) + policyFee2;
			surrenderValue_Principal[i] = ((ICP[i]+ A_C[i] - ICP[i]* surrenderRate[i]) / principal[i]).toFixed(2);
			
			if(flag == 0 && surrenderValue_Principal[i] >= 1)
			{
				document.write("<div style='background-color:#3e3e3e;width:100%;'>"+
					"<p style='color:white'>假设您增加金额双倍，按照一个合理的规划回报率"+percent+"%，您的账户将在第"+i+"期回本。</p></div></div>");
				flag = 1;
			}
		}
	}
	//退保方案
	else if(cashValue_Principal[periods]>=0.8 && cashValue_Principal[periods]<0.9)
	{
		//document.write("本金"+principal[periods]+"元</br>");
		//document.write("退保成本"+surrenderCost[periods]+"元</br>");
		//document.write("拿到退保价值"+surrenderValue[periods]+"元</br>");

		document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案4:退保</h3><br/>"+
	"<p style='color:white'>您现在的账户处于亏损"+((1-default_surrenderValue_Principal[periods]*100)).toFixed(2)+"%，假设您没有继续持有的意愿或者有现金流的需求，其中一个方案建议您选择退保。假设您现在退保，您可取回"+(surrenderValue[periods]).toFixed(2)+"元。</p></div><br/>");
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		for(i = periods+1; i <= 350; i++) 
		{
			surrenderValue[i]=surrenderValue[i-1]*(1+0.04/12);
			surrenderValue_Principal[i] =  (surrenderValue[i] / principal[periods]).toFixed(2);		

		}

	}
	//转让方案
	else if(cashValue_Principal[periods]<=0.8)
	{
		//document.write("以退保价值的120%转让给财联邦</br>");
		//document.write("退保价值"+surrenderValue[periods]+"元</br>");
		document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案5:转让</h3><br/>"+
	"<p style='color:white'>您现在的账户处于亏损"+((1-default_surrenderValue_Principal[periods])*100).toFixed(2)+"%，假设您没有意愿再持有账户，其中一个方案建议您转让保单。假设您按正常流程停止保单，您的剩余价值是"+(surrenderValue[periods]).toFixed(2)+"元。</p></div><br/>");
		surrenderValue[periods]=surrenderValue[periods]*1.2;
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		for(i = periods+1; i <= 350; i++) 
		{
			surrenderValue[i]=surrenderValue[i-1]*(1+0.04/12);
			surrenderValue_Principal[i] =  (surrenderValue[i] / principal[periods]).toFixed(2);
		}
	}
	//提取方案
	else if(cashValue_Principal[periods]>=1 && surrenderRate[periods]<=0.5)
	{
		document.write("<div style='background-color:#3e3e3e;width:80%;margin-left: 5%'>"+
	"<h3 style='color:white'>建议方案6:提取</h3><br/>"+
	"<p style='color:white'>您现在的账户处于较佳状态，假设您短期内有资金需求，其中一个方案建议您提取金额。</p></div><br/>");
		surrenderValue_Principal[periods] = default_surrenderValue_Principal[periods];
		var flag = 0; 
		var sum = 0;
		for(i = periods+1; i <= 350; i++) 
		{
			//document.write("<p style='color:white'>sum:"+sum+"</p><br />");
			sum = sum + A_C[i-1]*0.3;
			A_C[i] = A_C[i-1] * rate * (1 - policyFee3) - principal[i-1] * policyFee1 + money-A_C[i-1]*0.3;
			if(principal[i-1] < money*plan_periods)
			{
				principal[i] = principal[i-1] + money;
			}
			else
			{
				principal[i] = principal[i-1];
			}
			ICP[i] = ICP[i-1] * rate * (1 - accountvalueFee - policyFee3) + policyFee2;
			surrenderValue_Principal[i] = ((ICP[i]+ A_C[i] - ICP[i]* surrenderRate[i]+sum) / principal[i]).toFixed(2);
			
			//surrenderValue_Principal[i-1] >= 1时回本
			if(flag == 0 && surrenderValue_Principal[i-1] >= 1)
			{
				document.write("<div style='background-color:#3e3e3e;width:100%;'>"+
					"<p style='color:white'>假设您每期从A/C账户提取30%的额度，按照一个合理的规划回报率"+percent+"%，您的账户剩余价值将在第"+i+"期回本。</p></div></div>");
				flag = 1;
			}
		}

	}


	
	//document.write("<div id='content'  style='width: 100%;'>test</div>");
	//document.write("<div id='result'  style='width: 350px;height:300px;'><p>在第"+x+"期,比值第一次相等,比值为:"+y+"</p></div>");
	//document.write("<p>在第"+x+"期","比值第一次相等,比值为:"+y+"</p>");
	// 指定图表的配置项和数据
	var categories = new Array();
	for(var j = 0; j <= 324; j++) {
		categories[j] = "第" + j + "期";
	}

	var a_percent=4;
	var p_percent=10;
	var a_rate = Math.pow(1 + (a_percent / 100), 1 / T);
	var p_rate = Math.pow(1 + (p_percent / 100), 1 / T);
	var a_value= new Array();
	var value = new Array();
	var p_value = new Array();
    money = money0;
	//a_value[0] = periods*money;
	//value[0] = periods*money;
	//p_value[0] = periods*money;

	a_value[1] = periods*money/1000;
	value[1] = periods*money/1000;
	p_value[1] = periods*money/1000;

	if(periods*money > accountvalue)
	{
		var minValue=(accountvalue-money)/1000;
	}
	else
	{
		var minValue=(periods*money-money)/1000;
	}

	var categories0 = new Array();
	categories0[0] = "第0期";
	categories0[1] = "第1期";
/*
	for(var t=1+block;t<periods+7;)
	{
		a_value[t] = a_value[t-block]*a_rate;
		value[t] = value[t-block]*rate;
		p_value[t] = p_value[t-block]*p_rate;
		categories0[t] = "第" + t + "期";
		t = t+block;
	}
*/
for(var t=2;t<periods+7;t++)
	{
		a_value[t] = (a_value[t-1]*a_rate).toFixed(2);
		value[t] = (value[t-1]*rate).toFixed(2);
		p_value[t] = (p_value[t-1]*p_rate).toFixed(2);
		categories0[t] = "第" + t + "期";

	}

	var data=[[categories0[periods],accountvalue/1000]];

	//var data=[categories0[periods],20000];

	var legends0 = new Array('当前账户价值','P2P账户价值','专业资管团队账户价值','余额宝账户价值');
	var legends = new Array('默认退保价值/本金', '方案调整后退保价值/本金');
	
	var myChart0= echarts.init(document.getElementById('main0'),'shine');
	var myChart = echarts.init(document.getElementById('main'),'shine');
	var option0 = {
		//backgroundColor: 'rgba(0,0,0,1)',
		//backgroundColor: 'img/bg.png',

		title: {
			show:true,
                text: '单位:/千',
                x: 'left',
        		y: 20,
        		textStyle:{
        			color:'#fff',
        			fontWeight:'lighter'
        		}
            },
		tooltip: {
			trigger: 'axis',
			confine:true,
			//position:['50%','70%']
			 textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 15,
            fontWeight: 'light',
        },
		},
		legend: {
			data: legends0,
			right:'10',
			orient:'vertical'
		},
		toolbox: {
			show: true,
			feature: {
				mark: true,
				dataView: {
					readOnly: false
				},
				magicType: ['line', 'bar'],
				restore: true,
				saveAsImage: true
			}
		},

		calculable: true,
		xAxis: [{
			type: 'category',
			boundaryGap: true,
			data: categories0,
		}],
		yAxis: [{
			type: 'value',
			splitArea: {
				show: true,
			},
			min:minValue.toFixed(1),
			max:p_value[periods+7]
		}],
		series: [{
        		name: '当前账户价值',
      			type: 'scatter',
            	data: data,
            },
            {
				name: 'P2P账户价值',
				type: 'line',
				data: p_value,
				
			},
			{
				name: '专业资管团队账户价值',
				type: 'line',
				data: value,
			},
			{
				name: '余额宝账户价值',
				type: 'line',
				data: a_value,
			},
			
		]
	}
	var option = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			confine:true,
			//position:['50%','70%']
			 textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 15,
            fontWeight: 'light',
        },
		},
		legend: {
			data: legends
		},
		toolbox: {
			show: true,
			feature: {
				mark: true,
				dataView: {
					readOnly: false
				},
				magicType: ['line', 'bar'],
				restore: true,
				saveAsImage: true
			}
		},

		calculable: true,
		xAxis: [{
			type: 'category',
			boundaryGap: true,
			data: categories,
		}],
		yAxis: [{
			type: 'value',
			splitArea: {
				show: true,
			},
			max:3,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_Principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_Principal,
			}
		]
	};
	// 使用刚指定的配置项和数据显示图表。
	myChart0.setOption(option0);
	myChart.setOption(option);
document.write("<div style='background-color:#3e3e3e;width:100%;height:20%'>");
document.write("<br/>");
document.write("<div class='weui-btn-area'><a class='weui-btn weui-btn_primary' href='http://weixin.fortunefed.com/project/pay.php' target='_blank'>查看更多方案</a></div>");
document.write("</div>");
}
