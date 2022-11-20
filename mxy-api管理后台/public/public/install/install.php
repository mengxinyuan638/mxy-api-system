<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=1.0, user-scalable=yes" />
        <meta charset="utf-8"/>
        <title>安装向导</title>
        <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
        <style type="text/css">
        body {
        background-color: #f4f4f4;
        }
        </style>
    </head>
    <body>
    <?php
    $lockfile="../install.lock";
    if(file_exists($lockfile)){
        echo "您已经安装过了呢，如果想要重装请删除public目录下的install.lock文件再尝试";
    }else{
    ?>
    <div class="layui-container" style="margin-top: 120px;width: 500px;">
    <div class="layui-row" >
        <div class="layui-panel layui-anim" id="xd">
        <div class="layui-row">
            <div style="text-align: center;margin-top: 20px;">
                <img src="../favicon.ico" alt="">
            </div>
            <div style="text-align: center;margin-top: 20px;">
                <h1>萌新源API管理系统安装向导</h1>
            </div>
        </div>
        <hr class="layui-border-blue">
        <div class="layui-row" id="cardbody" style="height:400px;">
        <form class="layui-form" action="">
            <div class="layui-form-item" style="margin-top: 30px;margin-right: 15px;">
                <label class="layui-form-label">库地址</label>
                <div class="layui-input-block">
                <input type="text" name="host" lay-verify="required" autocomplete="off" placeholder="请输入" class="layui-input" value="localhost">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 30px;margin-right: 15px;">
                <label class="layui-form-label">端口号</label>
                <div class="layui-input-block">
                <input type="text" name="port" lay-verify="required" autocomplete="off" placeholder="请输入数据库端口号" class="layui-input" value="3306">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 30px;margin-right: 15px;">
                <label class="layui-form-label">数据库名</label>
                <div class="layui-input-block">
                <input type="text" name="db_name" lay-verify="required" autocomplete="off" placeholder="请输入您希望安装的数据库名称" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 30px;margin-right: 15px;">
                <label class="layui-form-label">用户名称</label>
                <div class="layui-input-block">
                <input type="text" name="username" lay-verify="required" autocomplete="off" placeholder="请输入数据库用户名" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item" style="margin-top: 30px;margin-right: 15px;">
                <label class="layui-form-label">密码</label>
                <div class="layui-input-block">
                <input type="password" name=" password" lay-verify="required" autocomplete="off" placeholder="请输入数据库密码" class="layui-input">
                </div>
            </div>
            <div class="layui-btn-container" style="margin-top: 30px;width: 30%;margin-right:auto;margin-left:auto;">
                <button type="button" lay-submit class="layui-btn layui-btn-normal layui-btn-fluid layui-btn-radius" lay-filter="az">立即安装</button>
            </div>
        </form>
        </div>
        </div>
    </div>
    </div>
    <?php
    }
    ?>
        

    <script src="/layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="/component/pear/pear.js"></script>
    <script>
    layui.use(['form', 'button', 'popup','layer','element','carousel'], function() {
        var form = layui.form;
        var button = layui.button;
        var popup = layui.popup;
        var $ = layui.jquery;
        var layer = layui.layer;
        var element = layui.element;
        var carousel = layui.carousel;
        


        form.on('submit(az)',function(res){
            var index = layer.load(2, {time: 100*1000});

            $.post("./dbcheck.php",res.field,function(data){
                if(data.code==500){
                    layer.msg(data.msg, {icon: 5});
                    layer.close(index);
                }else{
                    layer.msg(data.msg, {icon: 1});
                    layer.close(index);
                    $("#cardbody").html("<div class=\"layui-carousel\" id=\"test1\"><div carousel-item><div><img src=\"./image/1.png\" style=\"width:100%;height:100%;\"></div><div><img src=\"./image/2.png\" style=\"width:100%;height:100%;\"></div><div><img src=\"./image/3.png\" style=\"width:100%;height:100%;\"></div><div><img src=\"./image/4.png\" style=\"width:100%;height:100%;\"></div><div><img src=\"./image/5.png\" style=\"width:100%;height:100%;\"></div></div></div><div class=\"layui-progress layui-progress-big\" lay-filter=\"demo\" lay-showPercent=\"true\"  style=\"width:450px;margin-left:auto;margin-right:auto;margin-top:20px;\"><div class=\"layui-progress-bar layui-bg-blue\" lay-percent=\"0%\"></div></div><div style=\"margin-left:25px;margin-top:20px;\"><h id=\"ts\">正在安装中，请稍后。。。</h></div><div id=\"last\" class=\"layui-anim layui-anim-scaleSpring\" style=\"float:right;margin-right:25px;\"></div>")
                    element.progress('demo', '35%');//设置进度条进度
                    //建造实例
                    carousel.render({
                        elem: '#test1'
                        ,width: '100%' //设置容器宽度
                        ,arrow: 'always' //始终显示箭头
                    });
                    $.post("./creat.php",{ way: "connect" },function(con_msg){
                        if(con_msg.code==200){
                            //发送请求
                            $.post("./creat.php",{ way: "creat" },function(crt_msg){
                                if(crt_msg.code==200){
                                    $("#ts").text(crt_msg.msg);
                                    element.progress('demo', '75%');//设置进度条进度
                                    $("#ts").text("安装完成");
                                    element.progress('demo', '100%');//设置进度条进度
                                    $("#last").prepend("<button id=\"next\" type=\"button\" class=\"layui-btn layui-btn-sm layui-btn-radius layui-btn-normal\">下一步</button>");
                                    $("#next").click(function(){
                                        $("#cardbody").html("<div style=\"text-align:center\"><h><b>请填写后台管理用户信息</b></h></div><form class=\"layui-form\" action=\"\"><div class=\"layui-form-item\" style=\"margin-top: 30px;margin-right: 15px;\"><label class=\"layui-form-label\">用户名称</label><div class=\"layui-input-block\"><input type=\"text\" name=\"username\" lay-verify=\"required\" autocomplete=\"off\" placeholder=\"请输入\" class=\"layui-input\"></div></div><div class=\"layui-form-item\" style=\"margin-top: 30px;margin-right: 15px;\"><label class=\"layui-form-label\">密码</label><div class=\"layui-input-block\"><input type=\"password\" name=\"password\" lay-verify=\"required\" autocomplete=\"off\" placeholder=\"请输入\" class=\"layui-input\"></div></div><div class=\"layui-btn-container\" style=\"margin-top: 30px;width: 30%;margin-right:auto;margin-left:auto;\"><button type=\"button\" lay-submit class=\"layui-btn layui-btn-normal layui-btn-fluid layui-btn-radius\" lay-filter=\"tj\">提交</button></div></form>");
                                    });
                                }   
                            },"json")
                        }else{
                            console.log(con_msg);
                        }
                    },"json")
                }
            },"json")

        })

        form.on('submit(tj)',function(res){
            $.post("./creat.php",{ way: "add", username: res.field.username, password: res.field.password},function(add_msg){
                if(add_msg.code==200){
                    $("#cardbody").html("<center><div class=\"layui-anim layui-anim-scaleSpring\" style=\"margin-top:45px;\"><img src=\"./image/end.png\" style=\"width:150px;\"></div><div style=\"margin-top:25px;\"><h><b>恭喜你，安装已完成，请手动删除public目录下的install文件夹</b></h></div></center>");
                }else{
                    layer.msg(add_msg.msg, {icon: 5});
                }
            },"json")
        })

        $("#xd").addClass("layui-anim-scaleSpring");
        
        
    })
    </script>
    </body>
</html>
