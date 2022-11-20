<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

class Webfix{
    public function index(){
        return view::fetch();
    }
}