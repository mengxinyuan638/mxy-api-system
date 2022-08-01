<?php
namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;

class Viewer extends Base
{
    public function home()
    {   
        return view::fetch();
    }
    public function apimsg()
    {   
        return view::fetch();
    }
    public function editapi()
    {   
        return view::fetch();
    }
    public function addapi()
    {   
        return view::fetch();
    }
}