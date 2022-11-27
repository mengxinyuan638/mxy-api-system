<!doctype html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
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
            <div class="layui-card" id="card">
                <div class="layui-card">
                    <div class="layui-card-header">底部信息管理</div>
                    <div class="layui-card-body">
                        <form class="layui-form layui-form-pane" action="">
                            <textarea id="foot_msg" name="foot_msg" required lay-verify="required" placeholder="请输入(支持html脚本,右下角角标可以拖动改变文本框大小)" class="layui-textarea" style="height: 100%;"></textarea>
                            <div class="layui-form-item" style="margin-top: 30px;">
                                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="footedit">立即修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        //请求web信息
        layui.use(['element', 'form', 'layer'], function() {
            var element = layui.element;
            var $ = layui.jquery;
            var form = layui.form;
            var layer = layui.layer;
            $.post("/indexcontr/webmsg", function(d) { //回显
                $("body").find("#foot_msg").val(d.data.foot_msg);
            }, "json");

            form.on('submit(footedit)', function(res) {
                //AJAX
                $.post("/indexcontr/foot_msg_edit", res.field, function(d) {
                    if (d.code == 200) {
                        $.post("/indexcontr/webmsg", function(d) {
                            $("body").find("#foot_msg").val(d.data.foot_msg);
                        }, "json");
                        layer.alert('修改成功');
                    } else {
                        layer.alert('修改失败');
                        if (d.code == 200) {
                            layer.alert('修改成功');
                        }
                    }
                }, "json");
            })
        })
    </script>
</body>

</html>