<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>财联邦</title>
    <!-- 引入 echarts.js -->
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
require_once('count.php');

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
</script>
</head>
<body style="background-color:#3e3e3e;">
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <h1 style='color:white'>方案1:减资</h1></br>
    <div id="first" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">如果您减少投资现金，增加现金流；假设您减少投资金额50%，按照一个合理的规划回报率<?php echo $first;?>%,您的账户将在第<?php echo $second;?>期超过未减额时按原本回报率的账户状态。</h1>
    </div>

    <h1 style='color:white'>方案2:持有</h1></br>
    <div id="second" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">如果您继续持有账户，按照一个合理的规划回报率<?php echo $first;?>%，您的账户将在第<?php echo $third;?>期盈余超过20%。</h1>
    </div>

    <h1 style='color:white'>方案3:增资</h1></br>
    <div id="third" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">如果您有继续持有的意愿并且有能力继续投入，您可以增加投资金额以达到尽快回本的目的。假设您增加金额双倍，按照一个合理的规划回报率<?php echo $first;?>%，您的账户将在第<?php echo $fifth;?>期回本。</h1>
    </div>

    <h1 style='color:white'>方案4:退保</h1></br>
    <div id="forth" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">假设您没有继续持有的意愿或者有现金流的需求，其中一个方案建议您选择退保。假设您现在退保，您可取回<?php echo $sixth;?>元。</h1>
    </div>

    <h1 style='color:white'>方案5:转让</h1></br>
    <div id="fifth" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">假设您没有意愿再持有账户，其中一个方案建议您转让保单。假设您按正常流程停止保单，您的剩余价值是<?php echo $seventh;?>元，但按照转让价格，您可取回<?php echo $eighth;?>元。</h1>
    </div>

    <h1 style='color:white'>方案6:提取</h1></br>
    <div id="sixth" style="width: 900px;height:900px;"></div>
    <div style="width:70%;margin-left: 10%">
    <h1 style="color:white;">假设您短期内有资金需求，其中一个方案建议您提取金额。假设您每期从A/C账户提取30%的额度，按照一个合理的规划回报率<?php echo $first;?>%，您的账户剩余价值将在第<?php echo $ninth;?>期回本。</h1>
    </div>

    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var legends = new Array('默认退保价值/本金', '方案调整后退保价值/本金');
        var categories = new Array();
        // 指定图表的配置项和数据
        for(var j = 0; j <= 155; j++) {
             categories[j] = '第' + j + '期';
        }
    var myChart1 = echarts.init(document.getElementById('first'),'shine');
    var myChart2 = echarts.init(document.getElementById('second'),'shine');
    var myChart3 = echarts.init(document.getElementById('third'),'shine');
    var myChart4 = echarts.init(document.getElementById('forth'),'shine');
    var myChart5 = echarts.init(document.getElementById('fifth'),'shine');
    var myChart6 = echarts.init(document.getElementById('sixth'),'shine');
        // 指定图表的配置项和数据
        var option1 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
            textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
        },
        toolbox: {
            show: true,
            itemSize:30,
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_first,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            }
        ]
    };
    var option2 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
             textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_second,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            }
        ]
    };

var option3 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
             textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_third,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            }
        ]
    };

    var option4 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
            textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_forth,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            }
        ]
    };

var option5 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
            textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_fifth,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            }
        ]
    };

    var option6 = {
        title: {
                text: '',
                x: 'center',
                y: 30
            },
        grid:{
                show:true,
            },
        tooltip: {
            trigger: 'axis',
            confine:true,
            //position:['50%','70%']
             textStyle : {
            color: 'white',
            decoration: 'none',
            fontFamily: 'Verdana, sans-serif',
            fontSize: 40,
            fontWeight: 'bolder',
        },
        },
        legend: {
            data: legends,
            textStyle: {  
                fontSize:'35',//legend字体大小
                color:'#fff'
                        }
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
            axisLabel: { 
                show:true,
                 textStyle: {
                 color: '#fff',
                 fontSize:'30'
                  },
            //X轴刻度配置
                interval:30,//0：表示全部显示不间隔；auto:表示自动根据刻度个数和宽度自动设置间隔个数       
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        yAxis: [{
            type: 'value',
            splitArea: {
                show: true,
            },
            max:2,
            axisLabel: {        
               show: true,
               textStyle: {
               color: '#fff',
               fontSize:'30'
                }
            },
            splitLine:{
                show:true,
                lineStyle:{
                    color:"#fff"
                }
            }
        }],
        series: [{
                
                name: '默认退保价值/本金',
                type: 'line',
                data: default_surrenderValue_principal,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
            },
            {
                name: '方案调整后退保价值/本金',
                type: 'line',
                data: surrenderValue_principal_sixth,
                lineStyle:{
                    normal:{
                        width:8,
                    }
                }
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
</body>
</html>