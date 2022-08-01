<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;



class Index
{
    public function index()
    {   
        $data = file_get_contents("jiekoushuju.json");
        $data = json_decode($data,True);
        $num = count($data['data']);
        $rand = rand(1,14);
        include('key.php');
        View::assign('key',$key);
        View::assign('number',$num);
        View::assign('randint',$rand);
         return view::fetch();
    }

    public function apidata()
    {
        

        $data = file_get_contents("jiekoushuju.json");
        $data = json_decode($data,True);
        $v = $data['data'];
        $num = count($data['data']);

        if($num== 0){
            echo "";
            }else{
            for( $i = 0 ; $i < $num && $i < $num ; $i ++ ){
            $name=$v[$i]['name'];//名称
            $dz=$v[$i]['dz'];//提交地址
            $cs=$v[$i]['cs'];//参数
            $gg=$v[$i]['gg'];//返回公告
            $sl=$v[$i]['sl'];//示例
            $sj=$v[$i]['sj'];//返回数据
            $zt=$v[$i]['zt'];//返回api状态
            
            if ($zt == "zc"){
                echo'<!--分割--><div class="col-sm-4"> <a target="_orange" class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href="/index/ss?id='.($i+1).'"> <div class="ribbon-box font-w600">接口正常</div><div class="block-content"> <div class="h4 push-5">'.$name.'</div> <p class="text-muted">'.$gg.'</p> </div></a></div> <!--分割-->';
            }
            else{
                echo'<!--分割--><div class="col-sm-4"> <a  class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href=""> <div class="ribbon-box2 font-w600">接口异常</div><div class="block-content"> <div class="h4 push-5">'.$name.'</div> <p class="text-muted">'.$zt.'</p> </div></a></div> <!--分割-->';
            }
            
        }}

    }

    public function ss(){
        $id = $_GET['id'];
        include('key.php');
        $str=file_get_contents("jiekoushuju.json");
        $str = json_decode($str,True);
        $v = $str['data'];
        $i=$id-1;
        $name=$v[$i]['name'];//名称
        $dz="https://".$key."".$v[$i]['dz']."";//提交地址
        $cs=$v[$i]['cs'];//参数
        $gg=$v[$i]['gg'];//公告
        $sl="https://".$key."".$v[$i]['sl']."";//示例
        $sj=$v[$i]['sj'];//返回数据
        $way=$v[$i]['way'];//返回请求方式
        
        View::assign('name',$name);
        View::assign('dz',$dz);
        View::assign('cs',$cs);
        View::assign('gg',$gg);
        View::assign('sl',$sl);
        View::assign('sj',$sj);
        View::assign('way',$way);
        return view::fetch();
    }
 


}
