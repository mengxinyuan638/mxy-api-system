<?php

//exit;
//ini_set('date.timezone','Asia/Shanghai');
//选择 counter.txt文本文件
$counter_file = ("./asd/jishu.dat");
//打开文本文件
$visits = file($counter_file);
//自动加1
$visits[0]++;
//这个点击自动记录


$shuju="./asd/time.dat";
$handle = fopen($shuju, 'w');// or die('Cannot open file: '.$shuju);
fwrite($handle, date("Y年m月d日 H时i分s秒"));


$fp = fopen($counter_file,"w");
//写入counter.txt文件中，从而记录了
fputs($fp,"$visits[0]");
//关闭文件
fclose($fp);
//显示次数
/*echo "$visits[0]";

同一目录下include("./tongji/tongji.php"); //统计

不同用file_get_contents("http://api.robotmm.cn/tongji/tongji.php");



*/
?>