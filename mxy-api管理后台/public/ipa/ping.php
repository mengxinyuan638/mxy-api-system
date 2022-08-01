<?php
include('./key.php');
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#fd4b5c">
<title><?php echo $mz; ?>API</title>
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style>
<div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
<div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
<h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">
ping
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
pingAPI请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
<?php echo $key; ?>/api/ping.php
</a><br/>
参数：<br/>
<li>ip (必选)
</li>
备注：<br/>
暂无<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/ping.php?ip=json.yixuedh.com
</a>
<hr>
<br/>
返回数据：<br/>
<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">
网站域名:json.yixuedh.com 网站IP:150.138.81.121 最大延迟:24.699ms 最小延迟: 24.155ms 服务器归属:山东省 电信
</h3>
</div>
<hr>
</div>
</div>
</html>