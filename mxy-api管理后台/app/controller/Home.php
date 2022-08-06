<?php
namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;

use think\facade\Cookie;


class Home extends Base
{
    public function index()
    {
        return view::fetch();
    }
    public function logout(){
        Cookie::delete('admin_name');
    }
}