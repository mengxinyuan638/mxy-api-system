<?php


namespace app\controller;

use think\facade\View;

use think\facade\Cookie;



class Fix{
    public function __construct(){
        $data = file_get_contents("webtype.json");
        $data = json_decode($data,True);
        $type = $data['type'];
        if($type=='true'){
            header('location:/Webfix/index');
            exit;
        }
    }
}
