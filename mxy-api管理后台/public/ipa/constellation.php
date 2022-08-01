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
<title>萌新源API</title>
</head>
<style type="text/css">
h3:hover {box-shadow:0px 0px 8px #D1D1D1;}
</style>
<div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
<div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
<h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">
星座运势
</h2>
</div>
<div style="margin:0px auto;width:90%">
<h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
星座运势API请求方式
<ul>
<li>GET</li>
</ul>
<hr>
请求地址：<br/>
<a style="color:#fd4b5c;text-decoration:none;">
<?php echo $key; ?>/api/constellation.php
</a><br/>
参数：<br/>
<li>msg （必填）
</li>
备注：<br/>
暂无<br/>
<hr>
示例：<br/>
<a style="color:#fd4b5c;text-decoration:none；" href="" target="_blank">
<?php echo $key; ?>/api/constellation.php?msg=处女
</a>
<hr>
<br/>
返回数据：<br/>
<div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">
星座：处女 贵人方位：东南方向 贵人星座：双鱼座 幸运数字：8 幸运颜色：石板灰 爱情运势：保持心情开朗，自然大方的与异性相处，可提升恋爱运。已婚者彼此多沟通，以免感情变淡。 财富运势：财运平稳，如果到银行贷到一些款项，能得到合理的利用。\n 事业运势：处理事务的过程中容易遇到一些小麻烦，面对突如其来的变动应懂得随机应变。 整体运势：今天有时间陪伴另一半，公园、游乐场都是约会的不错选择，彼此都会有快乐之感。傍晚有机会经朋友介绍而结识一些新朋友。晚上可收集一些报刊杂志上的新闻，增加茶余饭后的谈资。 提示：外出机会多，感受丰富多采的生活。
</h3>
</div>
<hr>
</div>
</div>
</html>