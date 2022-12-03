<?php
 $page = 1;
 $limit = 1;
 $limit_num = $page*$limit;
 $first_num = $limit*$page;
 $data_file = 'link.json';
 $data = file_get_contents($data_file);
 $data1 = json_decode($data,True);
 $data = $data1['data'];

 $num = count($data);
 $data_array = array();

 if($page==1){
     if($num > $limit){#数据条数大于限制的就执行
         for($i=0;$i<$limit;$i++){#打印数据
             $id = $data[$i]["id"];
             $name = $data[$i]["name"];
             $url = $data[$i]["url"];
             $web = $data[$i]["web"];
             $linkicon = $data[$i]["linkicon"];
 
             $last_data_array = array("id"=>$id,"name"=>$name,"url"=>$url,"web"=>$web,"linkicon"=>$linkicon);
             
             
             $data_array[$i] = $last_data_array;#生成新的数据数组
             
         }
         $data1['data'] = $data_array;
         exit(json_encode($data1,JSON_UNESCAPED_UNICODE));
     }else{
         for($i=0;$i<$num;$i++){#打印数据
             $id = $data[$i]["id"];
             $name = $data[$i]["name"];
             $url = $data[$i]["url"];
             $web = $data[$i]["web"];
             $linkicon = $data[$i]["linkicon"];
             $sl = $data[$i]["sl"];
             $sj = $data[$i]["sj"];
             $zt = $data[$i]["zt"];
             $way = $data[$i]["way"];
 
             $last_data_array = array("id"=>$id,"name"=>$name,"url"=>$url,"web"=>$web,"linkicon"=>$linkicon);
             
             
             $data_array[$i] = $last_data_array;#生成新的数据数组
             
         }
         $data1['data'] = $data_array;
         exit(json_encode($data1,JSON_UNESCAPED_UNICODE));
     }
 }else{
     if($num-$first_num+$limit > $limit){#数据条数大于限制的就执行
         for($i=$first_num-$limit;$i<$first_num;$i++){#打印数据
             $id = $data[$i]["id"];
             $name = $data[$i]["name"];
             $url = $data[$i]["url"];
             $web = $data[$i]["web"];
             $linkicon = $data[$i]["linkicon"];
             $sl = $data[$i]["sl"];
             $sj = $data[$i]["sj"];
             $zt = $data[$i]["zt"];
             $way = $data[$i]["way"];
 
             $last_data_array = array("id"=>$id,"name"=>$name,"url"=>$url,"web"=>$web,"linkicon"=>$linkicon);
             
             
             $data_array[$i] = $last_data_array;#生成新的数据数组
             
         }
         $data1['data'] = $data_array;
         exit(json_encode($data1,JSON_UNESCAPED_UNICODE));
     }else{
         for($i=$first_num-$limit;$i<$num;$i++){#打印数据
             $id = $data[$i]["id"];
             $name = $data[$i]["name"];
             $url = $data[$i]["url"];
             $web = $data[$i]["web"];
             $linkicon = $data[$i]["linkicon"];
             $sl = $data[$i]["sl"];
             $sj = $data[$i]["sj"];
             $zt = $data[$i]["zt"];
             $way = $data[$i]["way"];
 
             $last_data_array = array("id"=>$id,"name"=>$name,"url"=>$url,"web"=>$web,"linkicon"=>$linkicon);
             
             
             $data_array[$i] = $last_data_array;#生成新的数据数组
             
         }
         $data1['data'] = $data_array;
         exit(json_encode($data1,JSON_UNESCAPED_UNICODE));
     }
 }