﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
	<meta content="telephone=no" name="format-detection"/>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<title>热门保险投资产品——101</title>
	<!--引入所需样式表-->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/weui.min.css">
	<!--引入pageSlider所需样式表-->
	<link rel="stylesheet" href="css/pageSlider.css">
	<!--引入zepto.js-->
	<script src="http://cdn.bootcss.com/zepto/1.1.4/zepto.js"></script>
	<!--引入pageSlider.js文件-->
	<script src="js/pageSlider.js"></script>
	</head>
<body>
	<!--DOM结构-->
	<div>
	<div class="section sec1" ><img id="bg"  src="./img/page1.jpg"/>
	<div class="arrow"><img src="./img/arrow.png"/>
	</div>
	</div>
	<div class="section sec2" ><img id="bg" src="./img/page2.jpg"/>
	<div class="arrow"><img src="./img/arrow.png"/></div>
	</div>
	</div>
	<div class="section sec3" ><iframe src="./page3.html" style="height:100%;width:100%"></iframe>
	</div>
	<script>
		//$(function(){
			var pageSlider = PageSlider.case(1);
			//PageSlider.case({loop:true});
		//});
	</script>
</body>
</html>