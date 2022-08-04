# 萌新源API+API管理后台v1.0beta

#### 介绍
前端基于layui以及pear-Admin-layui
后端基于国产ThinkPHP框架
开发的API管理后台

#### 版本要求
PHP7.1以上版本
Mysql



#### 安装教程
将源码上传至网站根目录，然后登录网站数据库，新建一张user表单并在表单内添加username,password
默认api管理后台路径网址/mxyadmin
注意要给网站配置伪静态
以我的Nginx服务器为例

```
location / {
        if (!-e $request_filename) {
   		    rewrite  ^(.*)$  /index.php?s=/$1  last;
        }
    }
```
配置伪静态的目的是为了省略入口文件，请务必配置一下，数据库配置文件在config/database.php下请自行配置


#### 使用截图
<h>登录界面</h>
![输入图片说明](img/2022-07-24-135808_1680x1050_scrot.png)
<h>主界面</h>
![输入图片说明](img/2022-07-24-135821_1680x1050_scrot.png)
<h>API前台预览</h>
![输入图片说明](img/2022-07-24-135826_1680x1050_scrot.png)
<h>API信息管理界面</h>
![输入图片说明](img/2022-07-24-203348_1680x1050_scrot.png)

#### 存在问题
目前源码处于beta实验阶段，有些偶然发生的bug例如修改完api信息回显不变，请清除浏览器缓存并重新加载页面

#### 更新日志
2022.8.1 v1.0Beta

2022.8.4 v2.0Beta
新增前台信息管理

#### 参与贡献
本人是web新手，所以写的系统漏洞肯定是有的，所以还要请各位大佬一起完善系统，如果您有建议可以提交lessure


