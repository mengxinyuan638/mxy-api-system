<?php
$data = file_get_contents("jiekoushuju.json");
$result = preg_match_all('/{"name":"(.*?)","dz":"(.*?)","cs":"(.*?)","gg":"(.*?)","sl":"(.*?)","sj":"(.*?)","zt":"(.*?)"}/',$data,$v);
for( $i = 0 ; $i < $result && $i < $result ; $i ++ ){
    $name=$v[1][$i];//名称
    $dz=$v[2][$i];//提交地址
    $cs=$v[3][$i];//参数
    $gg=$v[4][$i];//公告
    $sl=$v[5][$i];//示例
    $sj=$v[6][$i];//返回数据
    $zt=$v[7][$i];//返回api状态
}
echo $zt;
?>