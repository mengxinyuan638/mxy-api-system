<?php
namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;

use think\facade\Cookie;


class Login
{
    public function login()
    {
        $name = input('post.username');
        $password = input('post.password');
        $password = md5($password);#加密收取的密码，方便比对
        $name_check =  Db::table('user')->where('username',$name)->find();
        if(empty($name_check)){
            echo json_encode(['code'=>50,'msg'=>'请输入帐号或密码']);
        }
        elseif(empty($password)){
            echo json_encode(['code'=>50,'msg'=>'请输入帐号或密码']);
        }

        if($password == $name_check['password']){
            echo json_encode(['code'=>200,'msg'=>'登录成功']);
            Cookie::set('admin_name',$name_check['username']);
        }else{
            echo json_encode(['code'=>50,'msg'=>'帐号或密码错误']);
        }

        
    }
}