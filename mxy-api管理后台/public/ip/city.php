<?php
$msg = $_GET['msg'];
if($msg==""){echo "抱歉，输入为空。";exit;}
$str = file_get_contents("https://api.seniverse.com/v3/weather/now.json?key=SHSDTp4MYMHjrPgHb&location=$msg&language=zh-Hans&unit=c");
echo $str;
?>