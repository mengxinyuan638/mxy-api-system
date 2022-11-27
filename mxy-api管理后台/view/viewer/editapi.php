<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>layui初始化</title>
  <link rel="stylesheet" type="text/css" href="../../layui/css/layui.css">
</head>

<body stytle="text-align: center">
  <div class="layui-container" style="margin-top: 30px;">
    <div class="layui-row">
      <form class="layui-form" action="">
        <input type="hidden" id="type" name="type">
        <div class="layui-form-item">
          <label class="layui-form-label">API id</label>
          <div class="layui-input-block">
            <input type="radio" id="id" name="id" value="0" title="ID" checked>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API名称</label>
          <div class="layui-input-block">
            <input type="text" id="api-name" name="api-name" required lay-verify="required" placeholder="请输入API名称" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API状态</label>
          <div class="layui-input-block">
            <select id="api-zt" name="api-zt" lay-verify="">
              <option value="">请选择API状态</option>
              <option value="zc">正常</option>
              <option value="yc">异常</option>
            </select>
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API公告</label>
          <div class="layui-input-block">
            <input type="text" id="api-gg" name="api-gg" required lay-verify="required" placeholder="请输入API公告" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API地址</label>
          <div class="layui-input-block">
            <input type="text" id="api-dz" name="api-dz" required lay-verify="required" placeholder="请输入API地址" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API参数</label>
          <div class="layui-input-block">
            <input type="text" id="api-cs" name="api-cs" required lay-verify="required" placeholder="请输入API参数" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API示例</label>
          <div class="layui-input-block">
            <input type="text" id="api-sl" name="api-sl" required lay-verify="required" placeholder="请输入API示例" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <label class="layui-form-label">API数据</label>
          <div class="layui-input-block">
            <input type="text" id="api-sj" name="api-sj" required lay-verify="required" placeholder="请输入API数据" autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="formupdate">立即修改</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="../../layui/layui.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    layui.use('form', function() {
      var $ = layui.jquery;
      var form = layui.form;

      //立即提交按钮点击事件
      form.on('submit(formupdate)', function(res) {
        //AJAX请求
        $.post("/adminapi/editapi", res.field, function(d) {
          console.log(d);
          if (d.code != 200) {
            layer.msg(d.msg);
          } else {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
          }
        }, "json");

        return false;
      });

    })
  </script>
</body>

</html>