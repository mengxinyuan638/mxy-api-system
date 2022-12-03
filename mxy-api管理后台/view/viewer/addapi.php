<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>layui初始化</title>
        <link rel="stylesheet" type="text/css" href="/layui/css/layui.css">
    </head>
    <body>
        <div class="layui-container" style="margin-top: 30px;">
            <div class="layui-row">
                <form class="layui-form" action="">
                    <div class="layui-form-item">
                      <label class="layui-form-label">API名称</label>
                      <div class="layui-input-block">
                        <input type="text" name="api-name" required  lay-verify="required" placeholder="请输入API名称" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">API公告</label>
                        <div class="layui-input-block">
                          <input type="text" name="api-gg" required  lay-verify="required" placeholder="请输入API公告" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">API地址</label>
                        <div class="layui-input-block">
                          <input type="text" name="api-dz" required  lay-verify="required" placeholder="请输入API地址" autocomplete="off" class="layui-input">
                        </div>
                      </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">API参数</label>
                        <div class="layui-input-block">
                          <input type="text" name="api-cs" required  lay-verify="required" placeholder="请输入API参数" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">API示例</label>
                      <div class="layui-input-block">
                        <input type="text" name="api-sl" required  lay-verify="required" placeholder="请输入API示例" autocomplete="off" class="layui-input">
                      </div>
                    </div>
                    <div class="layui-form-item">
                      <label class="layui-form-label">API数据</label>
                      <div class="layui-input-block">
                        <input type="text" name="api-sj" required  lay-verify="required" placeholder="请输入API数据" autocomplete="off" class="layui-input">
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
                    $.post("/adminapi/addapi",res.field,function(d){
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