<?php


namespace app\controller;

use think\facade\View;

use think\facade\Cookie;



class Fix{
    public function __construct(){
        $lockfile="install.lock";
        if(file_exists($lockfile)){
            $data = file_get_contents("webtype.json");
            $data = json_decode($data,True);
            $type = $data['type'];
            if($type=='true'){
                header('location:/Webfix/index');
                exit;
            }
        }else{
            echo "你还没有安装系统呢，请前往 域名/install/install.php进行安装吧";
            exit;
        }
    }
}
