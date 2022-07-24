<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>API信息管理</title>
  <link rel="stylesheet" href="../../layui/css/layui.css" media="all">
</head>
<?php //用来获取api数据
$data = file_get_contents("../../../jiekoushuju.json");
$result = preg_match_all('/{"id":(.*?),"name":"(.*?)","dz":"(.*?)","cs":"(.*?)","gg":"(.*?)","sl":"(.*?)","sj":"(.*?)","zt":"(.*?)","way":"(.*?)"}/',$data,$v);
$data2 = json_decode($json_string,true);// 把JSON字符串转成PHP数组
$data1 = $data2['data'];
$kkk = json_encode($data1);//将data1转换成json
$nummber = preg_match_all('/{"id":(.*?),"apiname":"(.*?)","gonggao":"(.*?)","url":"(.*?)","zt":"(.*?)"}/',$kkk,$l);
?>
<?php
if($result== 0){
echo "";
}else{
for( $i = 0 ; $i < $result && $i < $result ; $i ++ ){
$name=$v[1][$i];//名称
$dz=$v[2][$i];//提交地址
$cs=$v[3][$i];//参数
$gg=$v[4][$i];//返回公告
$sl=$v[5][$i];//示例
$sj=$v[6][$i];//返回数据
$zt=$v[7][$i];//返回api状态
if ($zt == "zc"){
    $zt3 = '正常';
}
else{
	
}
$data1[$i]['id'] = $i;
$data1[$i]['apiname'] = urlencode($name);
$data1[$i]['gonggao'] = urlencode($gg);
$data1[$i]['url'] = $dz;
$data1[$i]['zt'] = urlencode($zt3);
$data2['data'] = $data1;
$json_data = json_encode($data2);
$json_data = urldecode($json_data);
file_put_contents("../../admin/data/apidata.json",$json_data);
}}
?>
<body>

<div class="layui-container">
  <table id="demo" lay-filter="test" ></table>
  <button id="add-api" type="button" class="layui-btn layui-btn-fluid layui-btn-lg layui-btn-normal">添加API信息</button>
</div>

 
<script src="../../layui/layui.js"></script>
<script>
layui.use(['table','layer','form'],function(){
  var table = layui.table;
  var $ = layui.jquery;
  var layer = layui.layer;
  var form = layui.form;

  //绑定当前行事件
  table.on('tool(test)', function(obj){
    if(obj.event=='del'){
      //删除
      layer.confirm("是否删除？", {icon: 3, title:'提示'},function(index){
        //点击确定后发送AJAX请求
        $.getJSON("../../admin/api/delapi.php",{id:obj.data.id},function(d){
          if(d.code!=200){
            layer.msg(d.msg);
          }
          else{
            obj.del();//删除当前行DOM
            layer.close(index);//关闭弹出层
            layer.msg(d.msg);
            table.reloadData('tableID', {
            scrollPos: 'fixed'  // 保持滚动条位置不变,重载表格数据
            });
          }
        });
      })
    }
    else if(obj.event=='edit'){
      //编辑
      console.log("编辑");
      layer.open({
      type:2,
      title:'修改API信息',
      content:'edit-api.html',
      area: ['350px','500px'],
      end:function(){
        //表格数据刷新
        table.reload('tableID');
      }
    });
    }
    else{
      console.log("不存在的操作");
    }
  });

  //给添加API按钮绑定事件
  $("#add-api").click(function(){
      //点击添加按钮时弹出一个表单弹出层
    layer.open({
      type:2,
      title:'添加API信息',
      content:'add-api.html',
      area: ['350px','500px'],
      end:function(){
        //表格数据刷新
        table.reload('tableID');
      }
    });
  });

  
  
  //第一个实例
  table.render({
    elem: '#demo'
    ,url: '../../../jiekoushuju.json' //数据接口
    ,id:'tableID'
    ,page: true //开启分页
    ,limit: 10
    ,cols: [[ //表头
       {
        field: 'id', 
        title: 'ID', 
        width:80, 
        sort: true, 
        fixed: 'left'
      }
      ,{
        field: 'name', 
        title: 'API接口名称'
      }
      ,{
        field: 'gg', 
        title: 'API公告'
      }
      ,{
        field: 'dz', 
        title: 'API地址'
      } 
      ,{
        title: '状态', 
        width: 70,
        templet: function(d){
          console.log(d);
          return d.zt=="zc"?'正常':'异常';
        }
      }
      ,{
        title:'操作',
        width:150,
        align:'center',
        templet: function(){
          var str = "<button type=\"button\" class=\"layui-btn layui-btn-xs layui-btn-danger\" lay-event='del'>删除</button>";
          str += "<button type=\"button\" class=\"layui-btn layui-btn-xs layui-btn-normal\" lay-event='edit'>修改</button>";
          return str;
        }
      }
    ]]
  });
  
});
</script>
</body>
</html>