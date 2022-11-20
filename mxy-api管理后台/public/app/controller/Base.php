<?php


namespace app\controller;

use think\facade\View;

use think\facade\Cookie;



class Base{
    public function __construct(){  
        $lockfile="install.lock";
        if(file_exists($lockfile)){ 
            $admin_id = Cookie::get('admin_name');
            if(empty($admin_id)){
                header('location:/Mxyadmin/index');
                exit;
            }
        }else{
            echo "你还没有安装系统呢，请前往 域名/install/install.php进行安装吧";
            exit;
        }

    }
}
