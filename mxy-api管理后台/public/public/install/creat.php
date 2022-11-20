<?php
error_reporting(0);
$way = $_POST['way'];
$data = file_get_contents("../../db_data/db_data.json");
$data = json_decode($data,True);
$host = $data['host'];
$user = $data['user'];
$psw = $data['psw'];
$port = $data['port'];
$db_name = $data['db_name'];
$backname = $_POST['username'];
$backpassword = $_POST['password'];
if($way=='connect'){
    $conn = mysqli_connect($host,$user,$psw,$db_name);
    if(!$conn){
        $m = array("code"=>500,"msg"=>"数据库链接失败，错误信息：".mysqli_connect_error());
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }else{
        $m = array("code"=>200,"msg"=>"数据库链接成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
}elseif($way=='creat'){
    $conn = mysqli_connect($host,$user,$psw,$db_name);
    $db = "user";
    $sql = "CREATE TABLE {$db} (
        username TEXT NULL,
        password TEXT NULL
    )";
    if (mysqli_query($conn, $sql)) {
        $m = array("code"=>200,"msg"=>"表单创建成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }else{
        $m = array("code"=>500,"msg"=>"创建数据表错误:". mysqli_error($conn));
    }
}elseif($way=='add'){
    $backpassword = md5($backpassword);#加密一下密码
    $conn = mysqli_connect($host,$user,$psw,$db_name);
    $sql="INSERT INTO `user`
    (username, password)
    VALUES('{$backname}', '{$backpassword}');";
    if (mysqli_query($conn, $sql)) {
        $lockfile="../install.lock";
        $fp=fopen($config_file,"wb");  
        fwrite($fp,$config_strings);  
        fclose($fp);
        $fp2=fopen($lockfile,'w');  
        fwrite($fp2,'安装效验文件');   
        fclose($fp2);
        $m = array("code"=>200,"msg"=>"用户创建成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE)); 
    }else{
        $m = array("code"=>500,"msg"=>"创建用户错误:". mysqli_error($conn));
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
}
