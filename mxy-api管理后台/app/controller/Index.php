<?php


namespace app\controller;

use app\BaseController;

use think\facade\View;

use think\facade\Db;

use think\facade\Env;
use think\helper\Arr;

class Index extends Fix
{
    public function version() //返回版本号，请不要擅自修改
    {
        $v = 'v6.1';
        return $v;
    }
    public function search()
    {
        $msg = $_POST['value'];
        $data = file_get_contents("./user_data/jiekoushuju.json");
        $data = json_decode($data, True);
        $data_api = $data['data'];
        $num = $data['count'];
        $data_new = array(); //组成所有API名称
        for ($i = 0; $i < $num; $i++) {
            $data_new[$i] = $data_api[$i]['name'];
        }
        $list = array();
        $check = '';
        $num = 0; //确定匹配的数目
        foreach ($data_new as $key => $val) {
            if (strstr($val, $msg)) {
                $check = 'yes';
                array_push($list, $val);
            }
        }
        if ($check == 'yes') {
            $num = count($list);
            $id_list = array();
            for ($i = 0; $i < $num; $i++) { //用来判断匹配项的id
                $id = array_search($list[$i], $data_new);
                $id_list[$i] = $id+1;
            }
            $data2 = array('code' => 200, 'num' => $num, 'id' => $id_list, 'data' => $list);
            $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
            exit($data2);
        } else {
            $data2 = array('code' => 404, 'data' => $list);
            $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
            exit($data2);
        }
    }
    public function index()
    {
        $data = file_get_contents("./user_data/jiekoushuju.json");
        $data = json_decode($data, True);
        $data2 = file_get_contents("./user_data/key.json");
        $data2 = json_decode($data2, True);
        $qq = $data2['qq'];
        $url = $data2['url'];
        $num = count($data['data']);
        include('key.php');
        $iconway = Env::get('logo.way');
        $backway = Env::get("background.imgway");
        $phoneway = Env::get("phoneback.phone");
        View::assign('way', $iconway);
        View::assign('backway', $backway);
        View::assign('key', $key);
        View::assign('number', $num);
        View::assign('qq', $qq);
        View::assign('url', $url);
        View::assign('phoneway', $phoneway);
        return view::fetch();
    }

    public function apidata()
    {


        $data = file_get_contents("./user_data/jiekoushuju.json");
        $data = json_decode($data, True);
        $v = $data['data'];
        $num = count($data['data']);

        if ($num == 0) {
            echo "";
        } else {
            for ($i = 0; $i < $num && $i < $num; $i++) {
                $name = $v[$i]['name']; //名称
                $dz = $v[$i]['dz']; //提交地址
                $cs = $v[$i]['cs']; //参数
                $gg = $v[$i]['gg']; //返回公告
                $sl = $v[$i]['sl']; //示例
                $sj = $v[$i]['sj']; //返回数据
                $zt = $v[$i]['zt']; //返回api状态


                if ($zt == "zc") {
                    echo '<!--分割--><div class="col-sm-4 "> <a target="_orange" class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href="/index/ss?id=' . ($i + 1) . '"> <div class="ribbon-box font-w600">接口正常</div><div class="block-content"> <div class="h4 push-5">' . $name . '</div> <p class="text-muted">' . $gg . '</p> </div></a></div> <!--分割-->';
                } else {
                    echo '<!--分割--><div class="col-sm-4"> <a  class="block block-link-hover2 ribbon ribbon-modern ribbon-success" href=""> <div class="ribbon-box2 font-w600">接口异常</div><div class="block-content"> <div class="h4 push-5">' . $name . '</div> <p class="text-muted">接口暂停访问</p> </div></a></div> <!--分割-->';
                }
            }
        }
    }

    public function ss()
    {
        $id = $_GET['id'];
        $data = file_get_contents("./user_data/key.json"); //读取站点信息
        $data = json_decode($data, True);
        $url = $data['url'];
        $str = file_get_contents("./user_data/jiekoushuju.json");
        $str = json_decode($str, True);
        $v = $str['data'];
        $i = $id - 1;
        $name = $v[$i]['name']; //名称
        $dz = $url . $v[$i]['dz']; //提交地址
        $cs = $v[$i]['cs']; //参数
        $gg = $v[$i]['gg']; //公告
        $sl = $url . $v[$i]['sl']; //示例
        $sj = $v[$i]['sj']; //返回数据
        $way = $v[$i]['way']; //返回请求方式

        View::assign('id', $id);
        View::assign('name', $name);
        View::assign('dz', $dz);
        View::assign('cs', $cs);
        View::assign('gg', $gg);
        View::assign('sl', $sl);
        View::assign('sj', $sj);
        View::assign('way', $way);
        return view::fetch();
    }

    public function getdata()
    {
        $id = $_POST['id'];
        $data = file_get_contents("./user_data/key.json"); //读取站点信息
        $data = json_decode($data, True);
        $url = $data['url'];
        $str = file_get_contents("./user_data/jiekoushuju.json");
        $str = json_decode($str, True);
        $v = $str['data'];
        $i = $id - 1;
        $name = $v[$i]['name']; //名称
        $dz = $url . $v[$i]['dz']; //提交地址
        $cs = $v[$i]['cs']; //参数
        $gg = $v[$i]['gg']; //公告
        $sl = $url . $v[$i]['sl']; //示例
        $sj = $v[$i]['sj']; //返回数据
        $way = $v[$i]['way']; //返回请求方式

        $data2 = array('code' => 200, 'msg' => '请求成功', 'data' => array('name' => $name, 'dz' => $dz, 'cs' => $cs, 'gg' => $gg, 'sl' => $sl, 'sj' => $sj, 'way' => $way));
        $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE);
        exit($data2);
    }

    public function linkdata()
    {
        $data = file_get_contents("./user_data/link.json");
        $data = json_decode($data, True);
        $v = $data['data'];
        $num = count($data['data']);

        if ($num == 0) {
            echo "";
        } else {
            for ($i = 0; $i < $num && $i < $num; $i++) {
                $name = $v[$i]['name']; //名称
                $url = $v[$i]['url']; //提交地址
                $web = $v[$i]['web'];
                $icon = $v[$i]['linkicon'];


                echo '<a href="' . $url . '" target="_blank"><div class="item1"> <div class="avatar"> <img src="' . $icon . '"> </div> <div class="inner"> <h5><font color="black">' . $name . '</font></h5><p><font color="red">介绍:' . $web . '</font></p> </div> </div></a>';
            }
        }
    }


    public function webmsg()
    { //获取web信息
        //用来获取api数据
        $data = file_get_contents("./user_data/key.json");
        $data = json_decode($data, True);
        $url = $data['url'];
        $qq = $data['qq'];
        $webname = $data['webname'];
        $tcgg = $data['tcgg'];
        $type = $data['type'];
        $tctype = $data['tctype'];
        $foot_msg = $data['foot_msg']; //获取底部信息
        $start_time = $data['start_time']; //获取建站时间
        $color = $data['font_color']; //获取字体颜色
        $size = $data['font_size']; //获取字体大小
        $size2 = $data['font_size2']; //获取字体大小
        $margin = $data['margin_top']; //获取距离顶部距离
        $title2 = $data['title_2']; //获取首页副标题
        $m = array("code" => 200, "msg" => "成功", "data" => array("url" => $url, "qq" => $qq, "webname" => $webname, "tcgg" => $tcgg, "type" => $type, "tctype" => $tctype, "foot_msg" => $foot_msg, "start_time" => $start_time, "color" => $color, "size" => $size, "margin" => $margin, "size2" => $size2, "title2" => $title2));
        $m = json_encode($m, JSON_UNESCAPED_UNICODE);
        exit($m);
    }

    public function webtype()
    {
        $type = $_POST['type'];
        $data = file_get_contents("./user_data/webtype.json");
        $data = json_decode($data, True);
        $data['type'] = $type;
        $data = json_encode($data, JSON_UNESCAPED_UNICODE); //第二个参数是防止中文乱码
        file_put_contents("./user_data/webtype.json", $data);
        $data2 = file_get_contents("./user_data/key.json");
        $data2 = json_decode($data2, True);
        $data2['type'] = $type;
        $data2 = json_encode($data2, JSON_UNESCAPED_UNICODE); //第二个参数是防止中文乱码
        file_put_contents("./user_data/key.json", $data2);

        $m = array("code" => 200, "msg" => "成功");
        exit(json_encode($m, JSON_UNESCAPED_UNICODE));
    }

    public function css()
    {
    }
}
