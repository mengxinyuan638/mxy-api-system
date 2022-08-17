<?php
namespace lib;

$data = file_get_contents("../db_data/db_data.json");
$data = json_decode($data,True);
$host = $data['host'];
$user = $data['user'];
$psw = $data['psw'];
$port = $data['port'];
$db_name = $data['db_name'];

$data = array("username"=>$user,"password"=>$psw,"db_name"=>$db_name,"host"=>$host,"port"=>$port);
return $data;
?>

