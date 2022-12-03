<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>添加友链</title>
        <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    </head>
    <body>
        <div class="layui-container" style="margin-top: 30px;">
            <div class="layui-row">
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                      <label class="layui-form-label">友链名称</label>
                      <div class="layui-input-block">
                        <input type="text" name="linkname" required  lay-verify="required" placeholder="请输入友链名称" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">友链地址</label>
                        <div class="layui-input-block">
                          <input type="text" name="linkurl" required  lay-verify="required" placeholder="请输入友链地址" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">友链站标</label>
                      <div class="layui-input-block">
                        <input type="text" name="linkicon" required  lay-verify="required" placeholder="请输入友链站标链接地址,记得填写协议头" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">网站介绍</label>
                        <div class="layui-input-block">
                          <input type="text" name="web" required  lay-verify="required" placeholder="请输入网站介绍" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                      <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="formAdd">立即提交</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>

        <script src="/layui/layui.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            layui.use('form', function(){
                var $ = layui.jquery;
                var form = layui.form;

                //立即提交按钮点击事件
                form.on('submit(formAdd)',function(res){
                    //AJAX请求
                    $.post("/adminapi/addlink",res.field,function(d){
                        console.log(d)
                        console.log(res.field)
                        if(d.code!=200){
                          layer.msg(d.msg);
                        }
                        else{
                          var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                          parent.layer.close(index); //再执行关闭
                        }
                    },"json");

                    return false;
                });
            })
        </script>
    </body>
</html>