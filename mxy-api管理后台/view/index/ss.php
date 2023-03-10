<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fd4b5c">
    <title>{$name}API</title>
</head>
<style type="text/css">
    h3:hover {
        box-shadow: 0px 0px 8px #D1D1D1;
    }
</style>

<body>
    <div style="box-shadow: 5px 5px 25px 0 rgba(46,61,73,.2);border-radius:15px;font-size:13px;width:950px;font-family:微软雅黑,'Helvetica Neue',Arial,sans-serif;margin:10px auto 0px;border:0px solid #eee;max-width:100%;">
        <div style="width:100%;background-color: #3174ed;background-image: linear-gradient(90deg, #3174ed 0%, #FA8BFF 35%, #3fd9fb 88%);color:#FFFFFF;border-radius:15px 15px 0 0;">
            <h2 style="font-size:15px;word-break:break-all;padding:20px 32px;margin:0;text-align:center">

            </h2>
        </div>
        <div style="margin:0px auto;width:90%">
            <h3 style="-webkit-transition: all .2s cubic-bezier(0, 0, 0, 0.48);-moz-transition: all .2s ease;border:.0625rem solid #fafafa;background:#fafafa repeating-linear-gradient(-45deg,#fff,#fff 1.125rem,transparent 1.125rem,transparent 2.25rem);margin:15px 0px;padding:20px;border-radius:5px;font-size:14px;color:#333;">
                {$name}API请求方式
                <ul>
                    <li>{$way}</li>
                </ul>
                <h>API-ID:<span id="apiid">{$id}</span></h>
                <hr>
                请求地址：{$dz}<br />
                <a style="color:#fd4b5c;text-decoration:none;">

                </a><br />
                参数：<span id="cs"></span><br />
                备注：<br />
                暂无<br />
                <hr>
                示例：{$sl}<br />
                <a style="color:#fd4b5c;text-decoration:none;" href="" target="_blank">

                </a>
                <hr>
                <br />
                返回数据：{$sj}<br />
                <div style="width:100%;background-color: #000;background-image: linear-gradient(90deg, #6694ed 0%,);color:#FFFFFF;border-radius:5px">

            </h3>
        </div>
        <hr>
    </div>
    </div>
</body>
<script src="../component/layui/layui.js"></script>
<script>
    layui.use('form', function() {
        var $ = layui.jquery;
        var id2 = $('#apiid').html();
        console.log(id2);
        $.post("/index/getdata",{id:id2}, function(res) {
            $('#cs').html(res.data.cs)
        },"json")
    })
</script>
</html>