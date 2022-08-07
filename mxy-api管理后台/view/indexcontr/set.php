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
<div class="layui-card" id="card">
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
                <label class="layui-form-label">弹窗公告</label>
                <div class="layui-input-block">
                <input type="text" id="tcgg" name="tcgg" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="homeedit">立即修改</button>
            </div>
        </div>
        </form>
</div>
<div class="layui-card" id="card2">
    <div class="layui-card-header">前台访问管理</div>
    <div class="layui-card-body" stytle="margin-left: 40px;">
    <form class="layui-form layui-form-pane" action="">
    <div class="layui-form-item" style="margin-top: 30px;">
        <label class="layui-form-label" id="qttips">网站维护</label>
        <div class="layui-input-block" id="bb">
        </div>
    </div>
    <div class="layui-form-item" style="margin-top: 20px;">
        <label class="layui-form-label" id="tcggtips">弹窗公告</label>
        <div class="layui-input-block" id="tc">
        </div>
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
layui.use('form', function(){
    var $ = layui.jquery;
    var layer = layui.layer;
    var form = layui.form;
    var webtype;
    //维护按钮状态及弹窗按钮状态
    $.post("/indexcontr/webmsg",function(d){
        $("body").find("#webname").val(d.data.webname);
        $("body").find("#weburl").val(d.data.url);
        $("body").find("#qq").val(d.data.qq);
        $("body").find("#gg").val(d.data.gg);
        $("body").find("#tcgg").val(d.data.tcgg);
        if(d.data.type=="false"){
            $("#bb").html("<input type=\"checkbox\" id=\"webtype\" lay-skin=\"switch\" lay-text=\"开启|关闭\" lay-filter=\"webtype\"/>");
            form.render('checkbox'); //渲染
        }else{
            $("#bb").html("<input type=\"checkbox\" id=\"webtype\" lay-skin=\"switch\" lay-text=\"开启|关闭\" lay-filter=\"webtype\"/ checked>");
            form.render('checkbox'); //渲染
        }
        if(d.data.tctype=="false"){
            $("#tc").html("<input type=\"checkbox\" id=\"tctype\" lay-skin=\"switch\" lay-text=\"开启|关闭\" lay-filter=\"tctype\"/>");
            form.render('checkbox'); //渲染
        }else{
            $("#tc").html("<input type=\"checkbox\" id=\"tctype\" lay-skin=\"switch\" lay-text=\"开启|关闭\" lay-filter=\"tctype\"/ checked>");
            form.render('checkbox'); //渲染
        }
    },"json");
    

    //维护tips
    $("#qttips").mouseenter(function(){
        layer.tips('开启后用户无法正常访问！', '#qttips',{
            tips:[1, '#3595CC'],
            time:4000
        });
    });
    $("#tcggtips").mouseenter(function(){
        layer.tips('开启后访问将弹出一个公告', '#tcggtips',{
            tips:[1, '#3595CC'],
            time:4000
        });
    });
    

    form.on('switch(tctype)',function(data){
        webtype = data.elem.checked;
        if(webtype==true){
            layer.confirm("是否开启弹窗公告？", {icon: 3, title:'提示'},function(index){
                //AJAX
                $.post("/adminapi/tctype",{tctype:"true"},function(res){
                    console.log(res);
                    if(res.code!=200){
                        alyer.alert('开启失败！')
                    }else{
                    layer.close(index);//关闭弹出层
                    layer.alert('开启成功');
                    }
                },"json")
            })
        }else{
            layer.confirm("是否关闭弹窗公告？", {icon: 3, title:'提示'},function(index){
                //AJAX
                $.post("/adminapi/tctype",{tctype:"false"},function(res){
                    console.log(res);
                    if(res.code!=200){
                        alyer.alert('关闭失败！')
                    }else{
                    layer.close(index);//关闭弹出层
                    layer.alert('关闭成功');
                    }

                },"json")
            })
        }
    })

    form.on('switch(webtype)',function(data){
        webtype = data.elem.checked;
        if(webtype==true){
            layer.confirm("是否开启网页维护？", {icon: 3, title:'提示'},function(index){
                //AJAX
                $.post("/adminapi/webtype",{type:"true"},function(res){
                    console.log(res);
                    if(res.code!=200){
                        alyer.alert('开启失败！')
                    }else{
                    layer.close(index);//关闭弹出层
                    layer.alert('开启成功');
                    }
                },"json")
            })
        }else{
            layer.confirm("是否关闭网页维护？", {icon: 3, title:'提示'},function(index){
                //AJAX
                $.post("/adminapi/webtype",{type:"false"},function(res){
                    console.log(res);
                    if(res.code!=200){
                        alyer.alert('关闭失败！')
                    }else{
                    layer.close(index);//关闭弹出层
                    layer.alert('关闭成功');
                    }

                },"json")
            })
        }
    })

    form.on('submit(homeedit)',function(res){
        //AJAX
        $.post("/indexcontr/homeedit",res.field,function(d){
            if(d.code==200){
                $.post("/indexcontr/webmsg",function(d){
                $("body").find("#webname").val(d.data.webname);
                $("body").find("#weburl").val(d.data.url);
                $("body").find("#qq").val(d.data.qq);
                $("body").find("#gg").val(d.data.gg);
                $("body").find("#tcgg").val(d.data.tcgg);
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