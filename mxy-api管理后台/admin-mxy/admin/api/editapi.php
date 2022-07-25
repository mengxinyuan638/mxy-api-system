<?php
$data = file_get_contents("../../../jiekoushuju.json");
$data1 = json_decode($data,True);
$data = $data1['data'];


//获取AJAX请求数据
$num = $_POST['id'];
$num = $num-1;
$apiname = $_POST['api-name'];//获取api名称
$apigg = $_POST['api-gg'];//获取api公告
$apidz = $_POST['api-dz'];//获取api地址
$apics = $_POST['api-cs'];//获取api参数
$apisl = $_POST['api-sl'];//获取api示例
$apisj = $_POST['api-sj'];//获取api返回数据


$data[$num]['name'] = $apiname;//添加api名称
$data[$num]['dz'] = $apidz;
$data[$num]['cs'] = $apics;
$data[$num]['gg'] = $apigg;
$data[$num]['sl'] = $apisl;
$data[$num]['sj'] = $apisj;
$data[$num]['zt'] = 'zc';
$data[$num]['way'] = 'GET';

$data1['data'] = $data;
$data1['count'] = $number;
$data = json_encode($data1,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
file_put_contents("../../../jiekoushuju.json",$data);

$m = array("code"=>200,"msg"=>"成功","id"=>$num);
exit(json_encode($m,JSON_UNESCAPED_UNICODE));
?>