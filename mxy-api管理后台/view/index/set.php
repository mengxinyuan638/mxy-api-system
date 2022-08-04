<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8"/>
<title>前台管理</title>
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
<style type="text/css">
body {
background-color: #f4f4f4;
}
</style>
</head>
<body>
<div class="layui-container" style="margin-top: 30px;">
<div class="layui-row">
<div class="layui-card">
        <div class="layui-card-header">API前台管理</div>
        <div class="layui-card-body" stytle="margin-left: 40px;">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item" style="margin-top: 30px;">
                <label class="layui-form-label">平台名称</label>
                <div class="layui-input-inline">
                <input type="text" id="webname" name="webname" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">站长QQ</label>
                <div class="layui-input-inline">
                <input type="text" id="qq" name="qq" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">本站网址</label>
                <div class="layui-input-block">
                <input type="text" id="weburl" name="weburl" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">首页公告</label>
                <div class="layui-input-block">
                <input type="text" id="gg" name="gg" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="homeedit">立即修改</button>
            </div>
        </div>
        </form>
</div>
</div>
</div>

<script src="../../layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
//请求web信息
layui.use('form', function(){
    var $ = layui.jquery;
    var layer = layui.layer;
    var form = layui.form;
    $.post("/index/webmsg",function(d){
        $("body").find("#webname").val(d.data.webname);
        $("body").find("#weburl").val(d.data.url);
        $("body").find("#qq").val(d.data.qq);
        $("body").find("#gg").val(d.data.gg);
    },"json");

    form.on('submit(homeedit)',function(res){
        //AJAX
        $.post("/index/homeedit",res.field,function(d){
            console.log(d);
            if(d.code==200){
                $.post("/index/webmsg",function(d){
                $("body").find("#webname").val(d.data.webname);
                $("body").find("#weburl").val(d.data.url);
                $("body").find("#qq").val(d.data.qq);
                $("body").find("#gg").val(d.data.gg);
                },"json");
            }else{
                layer.alert('修改失败');
            if(d.code==200){
                layer.alert('修改成功');
            }
            }
        },"json");
    })
})
</script>
</body>
</html>