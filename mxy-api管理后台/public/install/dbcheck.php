<?php
error_reporting(0);
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
        //以下是生成env配置
        $data = file_get_contents("../../db_data/db_data.json");
        $data = json_decode($data,True);
        $host = $data['host'];
        $user = $data['user'];
        $psw = $data['psw'];
        $port = $data['port'];
        $db_name = $data['db_name'];
        $lockfile="../../.env";
        $fp=fopen($config_file,"wb");  
        fwrite($fp,$config_strings);  
        fclose($fp);
        $fp2=fopen($lockfile,'w');
        $head = '[DATABASE]';
        $type = 'TYPE = mysql';
        $host = 'HOSTNAME = '.$host;
        $e_db_name ='DATABASE = '.$db_name;
        $e_user = 'USERNAME = '.$user;
        $e_pasw = 'PASSWORD = '.$psw;
        $e_port = 'HOSTPORT = 3306';
        $utf = 'CHARSET = utf8';
        $debug = 'DEBUG = true';
        fwrite($fp2,$head."\r\n".$type."\r\n".$host."\r\n".$e_db_name."\r\n".$e_user."\r\n".$e_user."\r\n".$e_pasw."\r\n".$e_port."\r\n".$utf."\r\n".$debug);   
        fclose($fp2);
        $m = array("code"=>200,"msg"=>"数据库链接成功，配置文件生成成功开始系统安装");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
} 