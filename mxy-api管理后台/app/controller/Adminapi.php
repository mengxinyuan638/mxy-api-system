<?php
namespace app\controller;

use app\BaseController;

use think\facade\View;




class Adminapi extends Base
{
    public function addapi()
    {
       
        $data = file_get_contents("jiekoushuju.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];
        $num = count($data);
        $number = $num+1;
        for($i = 0; $i<$num ; $i++){
            $name = $data[$i]['name'];
            $cs = $data[$i]['cs'];
            $gg = $data[$i]['gg'];
            $sj = $data[$i]['sj'];
    
            $data[$i]['name'] = $name;
            $data[$i]['cs'] = $cs;
            $data[$i]['gg'] = $gg;
            $data[$i]['sj'] = $sj;
    
        }
        //获取AJAX请求数据
        $apiname = $_POST['api-name'];//获取api名称
        $apigg = $_POST['api-gg'];//获取api公告
        $apidz = $_POST['api-dz'];//获取api地址
        $apics = $_POST['api-cs'];//获取api参数
        $apisl = $_POST['api-sl'];//获取api示例
        $apisj = $_POST['api-sj'];//获取api返回数据
    
        $data[$num]['id'] = $num+1;
        $data[$num]['name'] = $apiname;//添加api名称
        $data[$num]['dz'] = $apidz;
        $data[$num]['cs'] = $apics;
        $data[$num]['gg'] = $apigg;
        $data[$num]['sl'] = $apisl;
        $data[$num]['sj'] = $apisj;
        $data[$num]['zt'] = 'zc';
        $data[$num]['way'] = 'GET';
    
        $data1['data'] = $data;
        $data1['count'] = $number;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("jiekoushuju.json",$data);
    
        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));

    }
    public function delapi(){
        $key = $_GET['id'];
        $key = $key-1;
        $data = file_get_contents("jiekoushuju.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];
        $keys = array_keys($data);
        $index = array_search($key, $keys);
        array_splice($data, $index, 1);
        $num = count($data);

        for($i = $key; $i<$num;$i++){
            $id = $data[$i]['id'];
            $data[$i]['id'] = $id-1;
        }
        $data1['data'] = $data;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);
        file_put_contents("jiekoushuju.json",$data);

        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
    public function editapi(){
        $data = file_get_contents("jiekoushuju.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];


        //获取AJAX请求数据
        $num = $_POST['id'];
        $num = $num-1;
        $apiname = $_POST['api-name'];//获取api名称
        $apigg = $_POST['api-gg'];//获取api公告
        $apidz = $_POST['api-dz'];//获取api地址
        $apics = $_POST['api-cs'];//获取api参数
        $apisl = $_POST['api-sl'];//获取api示例
        $apisj = $_POST['api-sj'];//获取api返回数据
        $apizt = $_POST['api-zt'];//获取api状态


        $data[$num]['name'] = $apiname;//添加api名称
        $data[$num]['dz'] = $apidz;
        $data[$num]['cs'] = $apics;
        $data[$num]['gg'] = $apigg;
        $data[$num]['sl'] = $apisl;
        $data[$num]['sj'] = $apisj;
        $data[$num]['zt'] = $apizt;
        $data[$num]['way'] = 'GET';

        $data1['data'] = $data;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("jiekoushuju.json",$data);

        $m = array("code"=>200,"msg"=>"成功","id"=>$num);
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
    public function webtype(){
        $type = $_POST['type'];
        $data = file_get_contents("webtype.json");
        $data = json_decode($data,True);
        $data['type'] = $type;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("webtype.json",$data);
        $data2 = file_get_contents("key.json");
        $data2 = json_decode($data2,True);
        $data2['type'] = $type;
        $data2 = json_encode($data2,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data2);

        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
    public function tctype(){
        $type = $_POST['tctype'];
        $data = file_get_contents("tctype.json");
        $data = json_decode($data,True);
        $data['type'] = $type;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("tctype.json",$data);
        $data2 = file_get_contents("key.json");
        $data2 = json_decode($data2,True);
        $data2['tctype'] = $type;
        $data2 = json_encode($data2,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data2);

        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }

    public function dellink(){
        $key = $_GET['id'];
        $key = $key-1;
        $data = file_get_contents("link.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];
        $keys = array_keys($data);
        $index = array_search($key, $keys);
        array_splice($data, $index, 1);
        $num = count($data);

        for($i = $key; $i<$num;$i++){
            $id = $data[$i]['id'];
            $data[$i]['id'] = $id-1;
        }
        $data1['data'] = $data;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);
        file_put_contents("link.json",$data);

        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
    public function addlink(){
        $data = file_get_contents("link.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];
        $num = count($data);
        $number = $num+1;
        for($i = 0; $i<$num ; $i++){
            $name = $data[$i]['name'];
            $url = $data[$i]['url'];
            $web = $data[$i]['web'];
            
    
            $data[$i]['name'] = $name;
            $data[$i]['url'] = $url;
            $data[$i]['web'] = $web;
    
        }
        //获取AJAX请求数据
        $linkname = $_POST['linkname'];//获取名称
        $linkurl = $_POST['linkurl'];//获取地址
        $web = $_POST['web'];//获取简介
        $icon = $_POST['linkicon'];//获取站标
    
        $data[$num]['id'] = $num+1;
        $data[$num]['name'] = $linkname;//添加api名称
        $data[$num]['url'] = $linkurl;
        $data[$num]['web'] = $web;
        $data[$num]['linkicon'] = $icon;
    
        $data1['data'] = $data;
        $data1['count'] = $number;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("link.json",$data);
    
        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
    public function editlink(){
        $data = file_get_contents("link.json");
        $data1 = json_decode($data,True);
        $data = $data1['data'];


        //获取AJAX请求数据
        $num = $_POST['id'];
        $num = $num-1;
        $linkname = $_POST['linkname'];//获取api名称
        $linkurl = $_POST['linkurl'];//获取api地址
        $web = $_POST['web'];//获取简介
        $icon = $_POST['linkicon'];//获取站标


        $data[$num]['name'] = $linkname;//添加api名称
        $data[$num]['url'] = $linkurl;
        $data[$num]['web'] = $web;
        $data[$num]['linkicon'] = $icon;

        $data1['data'] = $data;
        $data = json_encode($data1,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("link.json",$data);

        $m = array("code"=>200,"msg"=>"成功","id"=>$num);
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }
}