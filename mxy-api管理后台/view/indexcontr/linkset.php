<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>友链信息管理</title>
  <link rel="stylesheet" href="/layui/css/layui.css" media="all">
</head>
<?php //用来获取api数据
$data = file_get_contents("./user_data/link.json");
$result = preg_match_all('/{"id":(.*?),"name":"(.*?)","url":"(.*?)"}/', $data, $v);
$data2 = json_decode($data, true); // 把JSON字符串转成PHP数组
$data1 = $data2['data'];
$kkk = json_encode($data1); //将data1转换成json
$nummber = preg_match_all('/{"id":(.*?),"name":"(.*?)","url":"(.*?)"}/', $kkk, $l);
?>
<?php
if ($result == 0) {
  echo "";
} else {
  for ($i = 0; $i < $result && $i < $result; $i++) {
    $name = $v[1][$i]; //名称
    $dz = $v[2][$i]; //地址
  }
}
?>

<body>

  <div class="layui-container">
    <table id="demo" lay-filter="test"></table>
    <button id="add-api" type="button" class="layui-btn layui-btn-fluid layui-btn-lg layui-btn-normal">添加友链信息</button>
  </div>


  <script src="/layui/layui.js"></script>
  <script>
    function setpage() {
      var width = window.innerWidth;
      if (width > 600) {
        return ['50%', '90%']
      } else {
        return ['90%', '90%']
      }
    }

    layui.use(['table', 'layer', 'form'], function() {
      var table = layui.table;
      var $ = layui.jquery;
      var layer = layui.layer;
      var form = layui.form;

      //绑定当前行事件
      table.on('tool(test)', function(obj) {
        if (obj.event == 'del') {
          //删除
          layer.confirm("是否删除？", {
            icon: 3,
            title: '提示'
          }, function(index) {
            //点击确定后发送AJAX请求
            $.getJSON("/adminapi/dellink", {
              id: obj.data.id
            }, function(d) {
              if (d.code != 200) {
                layer.msg(d.msg);
              } else {
                obj.del(); //删除当前行DOM
                layer.close(index); //关闭弹出层
                layer.msg(d.msg);
                table.reloadData('tableID', {
                  scrollPos: 'fixed' // 保持滚动条位置不变,重载表格数据
                });
              }
            });
          })
        } else if (obj.event == 'edit') {

          //编辑
          console.log("编辑");
          layer.open({
            type: 2,
            title: '修改API信息',
            content: '/viewer/editlink',
            area: setpage(),
            end: function() {
              //表格数据刷新
              table.reload('tableID', 'url');
            },
            success: function(layero, index) {
              //数据回显
              var body = layer.getChildFrame('body', index);
              body.find("#linkname").val(obj.data.name); //回显名称
              body.find("#linkurl").val(obj.data.url); //回显
              body.find("#web").val(obj.data.web); //回显
              body.find("#linkicon").val(obj.data.linkicon);
              body.find("input[name='id']").attr({
                'value': obj.data.id
              });
            }
          });
        } else {
          console.log("不存在的操作");
        }
      });


      //给添加API按钮绑定事件
      $("#add-api").click(function() {
        //点击添加按钮时弹出一个表单弹出层
        layer.open({
          type: 2,
          title: '添加API信息',
          content: '/viewer/addlink',
          area: setpage(),
          end: function() {
            //表格数据刷新
            table.reload('tableID', {
              where: {
                nowTime: new Date().getTime()
              }
            });
          }
        });
      });



      //第一个实例
      table.render({
        elem: '#demo',
        url: '/Adminapi/pagelimit_link/?nowTime=' + new Date().getTime() //数据接口
          ,
        id: 'tableID',
        page: true //开启分页
          ,
        limit: 10,
        cols: [
          [ //表头
            {
              field: 'id',
              title: 'ID',
              width: 80,
              sort: true,
              fixed: 'left'
            }, {
              field: 'name',
              title: '友链名称'
            }, {
              field: 'url',
              title: '友链名称地址'
            }, {
              field: 'web',
              title: '网站简介'
            }, {
              field: 'linkicon',
              title: '友链站标地址'
            }, {
              title: '操作',
              width: 150,
              align: 'center',
              templet: function() {
                var str = "<button type=\"button\" class=\"layui-btn layui-btn-xs layui-btn-danger\" lay-event='del'>删除</button>";
                str += "<button type=\"button\" class=\"layui-btn layui-btn-xs layui-btn-normal\" lay-event='edit'>修改</button>";
                return str;
              }
            }
          ]
        ]
      });

    });
  </script>
</body>

</html>