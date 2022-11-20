<?php
$A = @$_GET['ip'];
if(strstr($A,"."))
{
$json = file_get_contents("http://ip.ws.126.net/ipquery?ip=$A");
function GetBetween($content,$start,$end){
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
$b ='lo="';
$c ='"';
$name = GetBetween($json,$b,$c);
$b ='lc="';
$c ='"';
$name2 = GetBetween($json,$b,$c);
$encode = mb_detect_encoding($name."-".$name2, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
$str_encode = mb_convert_encoding($name."-".$name2, 'UTF-8', $encode);
echo $str_encode;
}else{
echo 'IP不能为空!';
exit();
}
function curl_link($url){
$HTTP_Server=$url;
$ch = curl_init();
curl_setopt ($ch,CURLOPT_URL,$HTTP_Server);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Linux; Android 6.0.1; OPPO R9s Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/55.0.2883.91 Mobile Safari/537.36");
$res = curl_exec($ch);
curl_close ($ch);
return $res;
}
?>