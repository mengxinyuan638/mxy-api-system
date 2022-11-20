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
百科
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
百科API请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
<?php echo $key; ?>/api/sgbaike.php
</a><br/>
参数：<br/>
<li>msg (必填)
</li>
备注：<br/>
暂无<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/sgbaike.php?msg=机器人
</a>
<hr>
<br/>
返回数据：<br/>
<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">
±img=https://pic.baike.soso.com/ugc/baikepic2/28426/cut-20190917111346-205865251_jpg_439_549_36954.jpg/300±机器人（Robot）是自动执行工作的机器装置，包括一切模拟人类行为或思想与模拟其他生物的机械（如机器狗，机器猫等）。狭义上对机器人的定义还有很多分类法及争议，有些计算机程序甚至也被称为机器人。在当代工业中，机器人指能自动运行任务的人造机器设备，用以取代或协助人类工作，一般会是机电设备，由计算机程序或是电... 技术、科技产品、机器 中文名:机器人\n外文名:Robot\n产品类型:机械\n定义:自动执行工作的机器装置\n技术:人工智能技术\n驱动装置:微型计算机 更多：http://baike.sogou.com/v271810.htm
</h3>
</div>
<hr>
</div>
</div>
</html>