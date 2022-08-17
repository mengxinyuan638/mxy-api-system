<?php
if($_POST['host']!=""&&$_POST['username']!=""&&$_POST['password']!="" && $_POST['port']!=""&& $_POST['db_name']!=""){  
	$host=$_POST['host'];   
	$user=$_POST['username'];  
	$psw=$_POST['password'];  
	$port=$_POST['port'];   
	$db_name=$_POST['db_name'];

    $conn = mysqli_connect($host,$user,$psw,$db_name);
    if(!$conn){
        $m = array("code"=>500,"msg"=>"数据库链接失败，请检查填写信息是否正确，错误信息：".mysqli_connect_error());
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }else{
        $db_data = array("host"=>$host,"user"=>$user,"psw"=>$psw,"port"=>$port,"db_name"=>$db_name);
        $db_data = json_encode($db_data,JSON_UNESCAPED_UNICODE);
        file_put_contents('../../db_data/db_data.json', $db_data);
        $m = array("code"=>200,"msg"=>"数据库链接成功，配置文件生成成功开始系统安装");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
} 