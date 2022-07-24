<?php
$key = $_GET['id'];
$key = $key-1;
$data = file_get_contents("../../../jiekoushuju.json");
$data1 = json_decode($data,True);
$data = $data1['data'];
$keys = array_keys($data);
$index = array_search($key, $keys);
array_splice($data, $index, 1);
$num = count($data);

for($i = $key; $i<$num;$i++){
    $id = $data[$i]['id'];
    $data[$i]['id'] = $id-1;
}
$data1['data'] = $data;
$data = json_encode($data1,JSON_UNESCAPED_UNICODE);
file_put_contents("../../../jiekoushuju.json",$data);

$m = array("code"=>200,"msg"=>"成功");
exit(json_encode($m,JSON_UNESCAPED_UNICODE));
?>