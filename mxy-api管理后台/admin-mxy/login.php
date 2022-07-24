<?php
 
//数据库连接
require_once 'model.php';
//从登录页接受来的数据
$name=$_POST['username'];
$pwd=$_POST['password'];
$sql="SELECT username,password FROM user where username='$name' AND password='$pwd';";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
 
if(!$row){
        $a = array("code"=>200,"msg"=>"成功","data"=>"False");
        exit(json_encode($a,JSON_UNESCAPED_UNICODE));
    }
    else{
        $a = array("code"=>200,"msg"=>"成功","data"=>"True");
        exit(json_encode($a,JSON_UNESCAPED_UNICODE));
    };
?>