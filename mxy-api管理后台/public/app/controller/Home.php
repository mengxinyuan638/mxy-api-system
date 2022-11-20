<?php
namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;

use think\facade\Cookie;

use think\facade\Env;


class Home extends Base
{
    public function index()
    {
        $version = Env::get("version.version");//获取版本号
        View::assign('version',$version);
        return view::fetch();
    }
    public function logout(){
        Cookie::delete('admin_name');
    }
}