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
多多铃声
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
多多铃声API请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
最新铃声:<?php echo $key; ?>/api/lsdd/new.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
最热铃声:<?php echo $key; ?>/api/lsdd/most.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
搞笑铃声:<?php echo $key; ?>/api/lsdd/funny.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
情感铃声:<?php echo $key; ?>/api/lsdd/sense.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
动漫铃声:<?php echo $key; ?>/api/lsdd/anime.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
最嗨铃声:<?php echo $key; ?>/api/lsdd/finally.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
流行铃声:<?php echo $key; ?>/api/lsdd/flow.php</a><br/>
<a style="color:#fd4b5c;text-decoration:none;">
来电铃声:<?php echo $key; ?>/api/lsdd/ring.php</a>
</a><br/>
参数：<br/>
<li>type (可不)
</li>
公告<br/>
?type=xml 可以返回xml<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/lsdd/most.php
</a>
<hr>
<br/>
返回数据：<br/>
<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">
自行测试
</h3>
</div>
<hr>
</div>
</div>
</html>