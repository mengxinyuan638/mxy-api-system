<?php


namespace app\controller;

use think\facade\View;

use think\facade\Cookie;



class Fix{
    public function __construct(){   
        $admin_id = Cookie::get('admin_name');
        if(empty($admin_id)){
            header('location:/Mxyadmin/index');
            exit;
        }

    }
}
