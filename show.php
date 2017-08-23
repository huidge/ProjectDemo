<html>  
<title>财联邦</title>
<head>  
<?php  
header("Content-Type:text/html;charset=utf-8");  
require_once('count.php');
?>  
<meta charset="utf-8">
<!--引入echarts.js文件-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/3.6.2/echarts.min.js"></script>
<!--引入主题文件shine.js-->
<script src="js/shine.js"></script>
<script type="text/javascript">  
var default_surrenderValue_principal = new Array();
var surrenderValue_principal_first = new Array();
var surrenderValue_principal_second = new Array();
var surrenderValue_principal_third = new Array();
var surrenderValue_principal_forth = new Array();
var surrenderValue_principal_fifth = new Array();
var surrenderValue_principal_sixth = new Array();

<?php
foreach($default_surrenderValue_principal as $key=>$value){
echo "default_surrenderValue_principal[$key] ='$value';\n";
}
foreach($surrenderValue_principal_first as $key=>$value){
echo "surrenderValue_principal_first[$key] ='$value';\n";
}
foreach($surrenderValue_principal_second as $key=>$value){
echo "surrenderValue_principal_second[$key] ='$value';\n";
}
foreach($surrenderValue_principal_third as $key=>$value){
echo "surrenderValue_principal_third[$key] ='$value';\n";
}
foreach($surrenderValue_principal_forth as $key=>$value){
echo "surrenderValue_principal_forth[$key] ='$value';\n";
}
foreach($surrenderValue_principal_fifth as $key=>$value){
echo "surrenderValue_principal_fifth[$key] ='$value';\n";
}
foreach($surrenderValue_principal_sixth as $key=>$value){
echo "surrenderValue_principal_sixth[$key] ='$value';\n";
}
?>
var categories = new Array();
// 指定图表的配置项和数据
	for(var j = 0; j <= 155; j++) {
		categories[j] = '第' + j + '期';
	}
	var legends = new Array('默认退保价值/本金', '方案调整后退保价值/本金');
	
	var myChart1 = echarts.init(document.getElementById('first'),'shine');
	var myChart2 = echarts.init(document.getElementById('second'),'shine');
	var myChart3 = echarts.init(document.getElementById('third'),'shine');
	var myChart4 = echarts.init(document.getElementById('forth'),'shine');
	var myChart5 = echarts.init(document.getElementById('fifth'),'shine');
	var myChart6 = echarts.init(document.getElementById('sixth'),'shine');

	
	var option1 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_first,
			}
		]
	};

var option2 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_second,
			}
		]
	};

var option3 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_third,
			}
		]
	};

	var option4 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_forth,
			}
		]
	};

var option5 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_fifth,
			}
		]
	};

	var option6 = {
		title: {
                text: '',
                x: 'center',
        		y: 30
            },
		tooltip: {
			trigger: 'axis',
			position:[40,300]
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
				saveAsimage: true
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
			max:2,
		}],
		series: [{
				
				name: '默认退保价值/本金',
				type: 'line',
				data: default_surrenderValue_principal,
			},
			{
				name: '方案调整后退保价值/本金',
				type: 'line',
				data: surrenderValue_principal_sixth,
			}
		]
	};
	// 使用刚指定的配置项和数据显示图表。
	myChart1.setOption(option1);
	myChart2.setOption(option2);
	myChart3.setOption(option3);
	myChart4.setOption(option4);
	myChart5.setOption(option5);
	myChart6.setOption(option6);
</script>  
</head>  
<body>  
</body>  
</html>  