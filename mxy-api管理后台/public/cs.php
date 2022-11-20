<?php
$data_file = 'jiekoushuju.json';
$data = file_get_contents($data_file);
$data1 = json_decode($data,True);
$data = $data1['data'];
$get_num = 10;

$num = count($data);
$data_array = array();

if($get_num <= 10){
    for($i=0;$i<$num-1;$i++){#打印数据
        $id = $data[$i]["id"];
        $name = $data[$i]["name"];
        $dz = $data[$i]["dz"];
        $cs = $data[$i]["cs"];
        $gg = $data[$i]["gg"];
        $sl = $data[$i]["sl"];
        $zt = $data[$i]["zt"];
        $way = $data[$i]["way"];

        $last_data_array = array("id"=>$id,"name"=>$name,"dz"=>$dz,"cs"=>$cs,"gg"=>$gg,"sl"=>$sl,"zt"=>$zt,"way"=>$way);
        
        $data_array[$i] = $last_data_array;#生成新的数据数组
        
    }
    $data_json = json_encode($data_array,JSON_UNESCAPED_UNICODE);
}
