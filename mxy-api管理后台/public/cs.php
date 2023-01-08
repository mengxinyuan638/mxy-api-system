<?php

use think\helper\Arr;

$msg = '随机';
$data = file_get_contents("./user_data/jiekoushuju.json");
$data = json_decode($data, True);
$data_api = $data['data'];
$num = $data['count'];
$data_new = array(); //组成所有API名称
for ($i = 0; $i < $num; $i++) {
    $data_new[$i] = $data_api[$i]['name'];
}
$data3 = array("abcd", "abef", "efgh");
$list = array();
$check = '';
foreach ($data_new as $key => $val) {
    if (strstr($val, $msg)) {
        $check = 'yes';
        array_push($list, $val);
    }
}
if ($check == 'yes') {
    $data2 = array('code' => 200, 'data' => $list);
    $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
    exit($data2);
}else{
    $data2 = array('code' => 404, 'data' => $list);
    $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
    exit($data2);
}

// if (strstr($val , "ab")) { //进行模糊匹配
//     $data2 = array('data' => '存在');
//     $data_yes = array();
//     array_push($data_yes, $val);//生成匹配的数组
// } else {
//     $data2 = array('data' => 'no');
//     $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
//     exit($data2);
// }