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

    <div class="layui-card">
        <div class="layui-card-header">首页背景</div>
        <div class="layui-card-body" style="margin: 0 auto; text-align: center">
            <div class="layui-upload">
                <button type="button" class="layui-btn" id="upback">上传图片</button>
                <div class="layui-upload-list">
                    <img class="layui-upload-img" id="back">
                    <p id="demoText"></p>
                </div>
                <div style="width: 534px;margin: 0 auto; text-align: center">
                    <div class="layui-progress layui-progress-big" lay-showpercent="yes" lay-filter="demob">
                        <div class="layui-progress-bar" lay-percent=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        //请求web信息
        layui.use(['element', 'form', 'layer', 'upload'], function() {
            var element = layui.element;
            var $ = layui.jquery;
            var form = layui.form;
            var layer = layui.layer;
            var upload = layui.upload;

            $("#back").css("width", "95%")
            $("#back").css("height", $(window).height())

            //背景上传
            var uploadInst = upload.render({
                elem: '#upback',
                url: '/indexcontr/phoneupload' //上传接口
                    ,
                before: function(obj) {
                    //预读本地文件示例，不支持ie8
                    obj.preview(function(index, file, result) {
                        $('#back').attr('src', result); //图片链接（base64）
                    });

                    element.progress('demob', '0%'); //进度条复位
                    layer.msg('上传中', {
                        icon: 16,
                        time: 0
                    });
                },
                done: function(res) {
                    //如果上传失败
                    if (res.code > 0) {
                        return layer.msg('上传失败');
                    }
                    //上传成功的一些操作
                    //……
                    $('#demoText').html(''); //置空上传失败的状态
                },
                error: function() {
                        //演示失败状态，并实现重传
                        var demoText = $('#demoText');
                        demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                        demoText.find('.demo-reload').on('click', function() {
                            uploadInst.upload();
                        });
                    }
                    //进度条
                    ,
                progress: function(n, elem, e) {
                    element.progress('demob', n + '%'); //可配合 layui 进度条元素使用
                    if (n == 100) {
                        layer.msg('上传完毕', {
                            icon: 1
                        });
                    }
                }
            });
        })
    </script>
</body>

</html>