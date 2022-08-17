<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;



class Index extends Fix
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
                echo'<!--分割--><div class="col-sm-4"> <a  class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href=""> <div class="ribbon-box2 font-w600">接口异常</div><div class="block-content"> <div class="h4 push-5">'.$name.'</div> <p class="text-muted">接口暂停访问</p> </div></a></div> <!--分割-->';
            }
            
        }}

    }

    public function ss(){
        $id = $_GET['id'];
        $data = file_get_contents("key.json");//读取站点信息
        $data = json_decode($data,True);
        $url = $data['url'];
        $str=file_get_contents("jiekoushuju.json");
        $str = json_decode($str,True);
        $v = $str['data'];
        $i=$id-1;
        $name=$v[$i]['name'];//名称
        $dz=$url.$v[$i]['dz'];//提交地址
        $cs=$v[$i]['cs'];//参数
        $gg=$v[$i]['gg'];//公告
        $sl=$url.$v[$i]['sl'];//示例
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

    public function linkdata(){
        $data = file_get_contents("link.json");
        $data = json_decode($data,True);
        $v = $data['data'];
        $num = count($data['data']);

        if($num== 0){
            echo "";
            }else{
            for( $i = 0 ; $i < $num && $i < $num ; $i ++ ){
            $name=$v[$i]['name'];//名称
            $url=$v[$i]['url'];//提交地址
            $web=$v[$i]['web'];

            
            echo '<a href="'.$url.'" target="_blank"><div class="item1"> <div class="avatar"> <img src="/favicon.ico"> </div> <div class="inner"> <h5><font color="black">'.$name.'</font></h5><p><font color="red">介绍:'.$web.'</font></p> </div> </div></a>';
            }
        }

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

    public function webtype(){
        $type = $_POST['type'];
        $data = file_get_contents("webtype.json");
        $data = json_decode($data,True);
        $data['type'] = $type;
        $data = json_encode($data,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("webtype.json",$data);
        $data2 = file_get_contents("key.json");
        $data2 = json_decode($data2,True);
        $data2['type'] = $type;
        $data2 = json_encode($data2,JSON_UNESCAPED_UNICODE);//第二个参数是防止中文乱码
        file_put_contents("key.json",$data2);

        $m = array("code"=>200,"msg"=>"成功");
        exit(json_encode($m,JSON_UNESCAPED_UNICODE));
    }

    public function css(){
        
    }
    
    
    
}
