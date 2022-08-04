<?php
include("./asd/a.php");
?>
<!doctype html>
<!-- 我知道你喜欢扒站但是我承受不住 -->
<html lang="zh">
<head>
<meta charset="UTF-8">
<title id="title">萌新源API - 免费提供API服务</title>
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="萌新源API是萌新源免费提供API数据接口调用服务平台 - 我们致力于为用户提供稳定、快速的免费API数据接口服务。">
<meta name="keywords" content="API,聚合数据,API数据接口,API,免费接口,免费api接口调用,免费API数据调用,萌新源API,萌新源API">
<meta name="author" content="萌新源">
<meta name="founder" content="萌新源API">
<link href="/layui/other/css/site.min.css" rel="stylesheet">
<link href="/layui/other/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/layui/other/css/layui.css">
<link href="/layui/other/css/oneui.css" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/layui/layui.all.js"></script>
<script>
</script>
</head>

<body>
<header class="site-header">
<nav class="nav_jsxs">
<span style="float: left;"><a class="logo_jsxs" href=""></a></span>
<a href="../">首页</a>
<a target="_blank" href="https://qm.qq.com/cgi-bin/qm/qr?k=RctrqqLrcRrcV4PZnNwnsN_eR2hmGsQd&noverify=0">反馈</a>
</nav>
<div class="box-text">
<h1 id="homeh">萌新源API</h1>


<p>稳定、快速、免费的 API 接口服务<span class="package-amount">共收录了 <strong>{$number}</strong>个接口</span> 
</p>
<style>
    #nr{
    	font-size:20px;
    	margin: 0;
        background: -webkit-linear-gradient(left,
            #ffffff,
            #ff0000 6.25%,
            #ff7d00 12.5%,
            #ffff00 18.75%,
            #00ff00 25%,
            #00ffff 31.25%,
            #0000ff 37.5%,
            #ff00ff 43.75%,
            #ffff00 50%,
            #ff0000 56.25%,
            #ff7d00 62.5%,
            #ffff00 68.75%,
            #00ff00 75%,
            #00ffff 81.25%,
            #0000ff 87.5%,
            #ff00ff 93.75%,
            #ffff00 100%);
		-webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% 100%;
        animation: masked-animation 2s infinite linear;
    }
    @keyframes masked-animation {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: -100%, 0;
        }
    }
</style>
<div style="background-color:#333;border-radius:25px;box-shadow:0px 0px 5px #f200ff;padding:5px;margin-top:10px;margin-bottom:0px;">
<marquee>
<b id="gg" name="gg">萌新源API是萌新源免费提供API数据接口调用服务平台,各位不要攻击本站呦！</b> </marquee>
</div>
<center><span> 本站网址:</span>
<font color="red" id="url"></font><br/>
</center>

当前时间：<span id="localtime"></span><script type="text/javascript">function showLocale(objD)
{var str,colorhead,colorfoot;var yy = objD.getYear();
if(yy<1900) yy = yy+1900;
        var MM = objD.getMonth()+1;
    if(MM<10) MM = '0' + MM;
    var dd = objD.getDate();
    if(dd<10) dd = '0' + dd;
    var hh = objD.getHours();
    if(hh<10) hh = '0' + hh;
    var mm = objD.getMinutes();
    if(mm<10) mm = '0' + mm;
    var ss = objD.getSeconds();
    if(ss<10) ss = '0' + ss;
    var ww = objD.getDay();
    if  ( ww==0 )  colorhead="<font color=\"#FF3030\">";
    if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#FF3030\">";
    if  ( ww==6 )  colorhead="<font color=\"#FF3030\">";
    if  (ww==0)  ww="星期日";
    if  (ww==1)  ww="星期一";
    if  (ww==2)  ww="星期二";
    if  (ww==3)  ww="星期三";
    if  (ww==4)  ww="星期四";
    if  (ww==5)  ww="星期五";
    if  (ww==6)  ww="星期六";
    colorfoot="</font>"
    str = colorhead + yy + "-" + MM + "-" + dd + "丨" + hh + ":" + mm + ":" + ss + "丨" + ww + colorfoot;
    return(str);}function tick()
{var today;today = new Date();document.getElementById("localtime").innerHTML = showLocale(today);window.setTimeout("tick()", 1000);}
tick();</script>
<p></p>
</script>


</script></p><div id="J_player">     <audio id="J_MPlayer" src="/mp3/{$randint}.mp3"controls="controls" autoplay="autoplay" autobuffer="autobuffer"></audio>    </div>

</div>
</header><section class="content content-boxed">
<div class="row row_jsxs" id="listApi">

<div class="col-sm-12">
  <div class="block block-link-hover2 ribbon ribbon-modern ribbon-success">
<div class="block-content">
  <a class="block" href="">
<p class="text-center" id="qq">本网站只提供接口服务，造成的一切后果与本网站无关!如果本站发布的内容侵犯你的利益，请联系我。发送至我的邮箱</p>
<p class="text-center"><span id="runtime_span"></span>
<script type="text/javascript">function show_runtime(){window.setTimeout("show_runtime()",1000);X=new 
Date("06/10/2022 00:00:00");
Y=new Date();T=(Y.getTime()-X.getTime());M=24*60*60*1000;
a=T/M;A=Math.floor(a);b=(a-A)*24;B=Math.floor(b);c=(b-B)*60;C=Math.floor((b-B)*60);D=Math.floor((c-C)*60);
runtime_span.innerHTML="本站稳定运行: "+A+"天"+B+"小时"+C+"分"+D+"秒"}show_runtime();</script>
</p>
</a>
</div>
</div>
</div>
</div>
<div style="float:left; margin:0px 10px;"> 
<style type="text/css"> 
.qqlogo1{ 
 margin-top: 15px; 
 width:70px; 


 height:70px; 


 border-radius:200px; 
  
  
 }
  



.qqlogo2{ 


 margin-top: 0px; 


 width:70px; 


 height:70px; 


 border-radius:200px; 
  
  
 }

 .find .links .item1{
	position: relative;
	width: 22.6%;
	height: 80px;
	line-height: 80px;
	margin: 10px 1.2%;
	padding: 5px 0;
	text-align: center;
	float: left;
	transition: .2s all;
	opacity: .9;
	}

	.find .links .item1:hover{
		opacity: 1;
		transform: translateY(-10px);
	}

	.find .links .item1 .inner{
		position: relative;
		z-index: 5;
	}

	.find .links .item1 .bg{
		position: absolute; 
		bottom: 0;
		left: 0;
		width: 100%;
		height: 5%;
		z-index: 0;
		transition: .15s all;
	}

	.find .links .item1:hover .bg{
		height: 100%;
		width: 100%;
		border-radius: 5px;
		box-shadow: 0 3px 20px rgba(0,0,0,.28);
	}

	.find .links .item1 i{
		font-size: 20px;
	}

	.find .links .item1 span{
		display: inline-block;
		width: 100px;
	}

	.gate .links .item1 {
		margin: 5px 0;
		padding: 15px 1.5%;
		float: left;
		width: 22%;
		height: 60px;
		transition: .2s all;
		opacity: .85;
	}

	.gate .links .item1.akarin{
		opacity: .58;
	}

	.gate .links .item1:hover{
		opacity: 1;
		border-radius: 5px;
		background-color: rgba(255,255,255,.25);
		transform: translateY(-5px);
		box-shadow: 0 3px 20px rgba(0,0,0,.28);
	}

	.gate .links .item1 .avatar{
		float: left;
		height: 60px;
		line-height: 60px;
		width: 60px;
		border-radius: 100%;
		text-align: center;
		margin-right: 15px;
		background-color: #000000;
		overflow: hidden;
	}

	.gate .links .item1 .avatar i{
		font-size: 24px;
	}

	.gate .links .item1 .avatar img{
		height: 60px;
		max-width: 60px;
		border-radius: 100%;
	}

	.gate .links .item1 .inner{
		padding: 6px;
	}

	.gate .links .item1 .inner h5{
		font-weight: normal;
		font-size: 17px;
	}

	.gate .links .item1 .inner p{
		font-size: 13px;
		color: rgba(255,255,255,.6);
	}
	.find .links .item1,
	.gate .links .item1{
		width: 46%;
		height: auto;
		padding: 5px 0;
		margin: 10px 2%;
	}

	.find .links .item1{
		height: 60px;
		line-height: 60px;
		font-size: 13px;
	}

	.gate .links .item1 .avatar {
	height: 40px;
	line-height: 40px;
	width: 40px;
	}
	.gate .links .item1 .avatar img {
	height: 40px;
	max-width: 40px;
	}
	.gate .links .item1 .inner {
	padding: 0;
	}
	.gate .links .item1 .inner h5 {
	font-size: 15px;
	}

	.gate .links .item1 .inner h5,
	.gate .links .item1 .inner p{
		white-space:nowrap; 
	text-overflow:ellipsis;
	overflow:hidden;
	}
	.gate .links .item1 .inner h5 {
	font-size: 15px;
	}
	.gate .links .item1 .inner h5{
		font-weight: normal;
		font-size: 17px;
	}
 </style> 
 </div>

</div></font> 


<div class="gate ch"> 
<div class="container links"> 
<h2 class="chtitle"><center><b id="nr">友情<span>链接</span></b></center></h2> 
<div class="clear">





<a href="https://bc.juncikeji.xyz" target="_blank">
<div class="item1"> 
<div class="avatar"> 
<img src="https://bc.juncikeji.xyz/wp-content/uploads/2022/05/20220514_211248_0000.png"> 
</div> 
<div class="inner"> 
<h5><font color="black">DT编程社</font></h5>
<p><font color="red">介绍:高中编程爱好者社团</font></p> 
</div> 
</div></a>

<a href onclick="return alert('友链申请说明\n网站名:萌新源API\n网站图:/images/favicon.png\n网址:\n介绍:萌新源API\nQQ:\n这是例子，请把你申请友链内容发送到@qq.com\n一定把我网站写到你的友链表上，否则不给你添加');" target="_blank">
<div class="item1"> 
<div class="avatar"> 
<img src="images/favicon.png"> 
</div> 
<div class="inner"> 
<h5><font color="black">申请友情</font></h5>
<p><font color="red">介绍:申请友情</font></p> 
</div> 
</div></a>

<div class="gate ch"> 
<div class="container links"> 
<div class="clear">



<div class="main">
        <div class="quarter-div blue"></div>
        <div class="quarter-div green"></div>
        <div class="quarter-div orange"></div>
        <div class="quarter-div yellow"></div>
    </div>
</div></a>

</div></div></div></section>
	 
 </div> </div></a>

	 </div> </div></a>


<div style="text-align:right;">

<a href="http://ad.jingdianwan.com/jstm/?uid=122&sid=291" target="_blank" style="line-height:1.5;"></a>

</div>
<script src="component/layui/layui.js"></script>
<script>
	layui.use('form', function() {
		var $ = layui.jquery;
		$.get("/index/apidata",function(data){
			$("#listApi").prepend(data);//渲染api列表
		})
		$.get("index/webmsg",function(res){
			var qq = $("body").find("#qq").text();
			console.log(qq);
			$("body").find("#homeh").text(res.data.webname);
			$("body").find("#gg").text(res.data.gg);
			$("body").find("#url").text(res.data.url);
			$("body").find("#qq").text(qq+res.data.qq+"@qq.com");
		},"json")
		
	})
</script>

</body>
</html>