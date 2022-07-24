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
QQ天气
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
QQ天气API请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
<?php echo $key; ?>/api/qqtq.php
</a><br/>
参数：<br/>
<li>msg (必填)
</li>
备注：<br/>
暂无<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/qqtq.php?msg=毕节
</a>
<hr>
<br/>
返回数据：<br/>
<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">
城市：毕节 气温：18℃/29℃ 今日天气实况：气温：20℃；风向/风力：西风 1级；湿度：81%；紫外线强度：最弱。空气质量：良。 紫外线指数：最弱，辐射弱，涂擦SPF8-12防晒护肤品。 健臻·血糖指数：不易波动，天气条件不易引起血糖波动。 穿衣指数：热，适合穿T恤、短薄外套等夏季服装。 洗车指数：不宜，有雨，雨水和泥水会弄脏爱车。 空气污染指数：良，气象条件有利于空气污染物扩散。
</h3>
</div>
<hr>
</div>
</div>
</html>