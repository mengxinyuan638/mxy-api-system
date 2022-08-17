<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

class Indexcontr extends Base{
    public function set()//前台信息设置页面
    {   
        return view::fetch();
    }

    public function linkset()//前台信息设置页面
    {   
        return view::fetch();
    }

    public function webmsg(){//获取web信息
        //用来获取api数据
        $data = file_get_contents("key.json");
        $data = json_decode($data,True);
        $url = $data['url'];
        $qq = $data['qq'];
        $webname = $data['webname'];
        $gg = $data['gg'];
        $tcgg = $data['tcgg'];
        $type = $data['type'];
        $tctype = $data['tctype'];
        $m = array("code"=>200,"msg"=>"成功","data"=>array("url"=>$url,"qq"=>$qq,"webname"=>$webname,"gg"=>$gg,"tcgg"=>$tcgg,"type"=>$type,"tctype"=>$tctype));
        $m = json_encode($m,JSON_UNESCAPED_UNICODE);
        exit($m);
    }

    public function homeedit(){
        $name = $_POST['webname'];
        $qq = $_POST['qq'];
        $url = $_POST['weburl'];
        $gg = $_POST['gg'];
        $tcgg = $_POST['tcgg'];
        $data = file_get_contents("key.json");
        $data = json_decode($data,True);
        $data['webname'] = $name;
        $data['qq'] = $qq;
        $data['url'] = $url;
        $data['gg'] = $gg;
        $data['tcgg'] = $tcgg;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data);
        $m = array("code"=>200,"msg"=>"成功","d"=>$name);
        $m = json_encode($m,JSON_UNESCAPED_UNICODE);
        exit($m);
    }

    
}