<?php
include("./asd/a.php");
?>
<!doctype html>
<!-- 我知道你喜欢扒站但是我承受不住 -->
<html lang="zh">

<head>
	<meta charset="UTF-8">
	<title id="title">萌新源API - 免费提供API服务</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="萌新源API是萌新源免费提供API数据接口调用服务平台 - 我们致力于为用户提供稳定、快速的免费API数据接口服务。">
	<meta name="keywords" content="API,聚合数据,API数据接口,API,免费接口,免费api接口调用,免费API数据调用,萌新源API,萌新源API">
	<meta name="author" content="萌新源">
	<meta name="founder" content="萌新源API">
	<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="/layui/other/css/layui.css">
	<link href="/layui/other/css/oneui.css" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{$way}">
	<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="/layui/layui.all.js"></script>
	<script>
	</script>
	<style>
		#mainNav {
			position: absolute;
			border-bottom: 1px solid #e9ecef;
			background-color: white;
			font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		}

		#mainNav .navbar-brand {
			font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-weight: 800;
			color: #343a40;
		}

		#mainNav .navbar-toggler {
			font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-size: 12px;
			font-weight: 800;
			padding: 13px;
			text-transform: uppercase;
			color: #343a40;
		}

		#mainNav .navbar-nav>li.nav-item>a {
			font-size: 12px;
			font-weight: 800;
			letter-spacing: 1px;
			text-transform: uppercase;
		}

		@media only screen and (min-width: 992px) {
			#mainNav {
				border-bottom: 1px solid transparent;
				background: transparent;
			}

			#mainNav .navbar-brand {
				padding: 10px 20px;
				color: #fff;
			}

			#mainNav .navbar-brand:focus,
			#mainNav .navbar-brand:hover {
				color: rgba(255, 255, 255, 0.8);
			}

			#mainNav .navbar-nav>li.nav-item>a {
				padding: 10px 20px;
				color: #fff;
			}

			#mainNav .navbar-nav>li.nav-item>a:focus,
			#mainNav .navbar-nav>li.nav-item>a:hover {
				color: rgba(255, 255, 255, 0.8);
			}
		}

		@media only screen and (max-width: 992px) {
			#mainNav {
				transition: background-color 0.5s;
			}
		}

		@media only screen and (min-width: 992px) {
			#mainNav {
				transition: background-color 0.5s;
				transform: translate3d(0, 0, 0);
				-webkit-backface-visibility: hidden;
			}

			#mainNav.is-fixed {
				position: fixed;
				top: -67px;
				transition: transform 0.2s;
				border-bottom: 2px solid white;
				background-color: rgba(255, 255, 255, 0.8);
			}

			#mainNav.is-fixed .navbar-brand {
				color: #212529;
			}

			#mainNav.is-fixed .navbar-brand:focus,
			#mainNav.is-fixed .navbar-brand:hover {
				color: #0085A1;
			}


			#mainNav.is-fixed .navbar-nav>li.nav-item>a {
				color: #212529;
			}

			#mainNav.is-fixed .navbar-nav>li.nav-item>a:focus,
			#mainNav.is-fixed .navbar-nav>li.nav-item>a:hover {
				color: #0085A1;
			}

			/* 当js事件触发时，给nav增加 is-visible样式，效果是显示出nav 
	其效果就相当于：
	postion: fixed;
	top:0;
	但是transform 这里使用的是GPU渲染会看起来更加流畅。
 */
			#mainNav.is-visible {
				transform: translate3d(0, 100%, 0);
			}
		}

		/* 圆角 */
		.yuan {
			border-radius: 30px;
		}

		/* 向下箭头 */
		@-webkit-keyframes rightan {

			from {
				bottom: 0%;
				opacity: 0;
			}

			to {
				bottom: 5%;
				opacity: 1;
			}
		}

		.rightan {
			-webkit-animation: rightan 2s infinite;
			-webkit-animation-fill-mode: both;
		}


		#nr {
			font-size: 20px;
			margin: 0;
			background: -webkit-linear-gradient(left,
					#ffffff,
					#ff0000 6.25%,
					#ff7d00 12.5%,
					#ffff00 18.75%,
					#00ff00 25%,
					#00ffff 31.25%,
					#0000ff 37.5%,
					#ff00ff 43.75%,
					#ffff00 50%,
					#ff0000 56.25%,
					#ff7d00 62.5%,
					#ffff00 68.75%,
					#00ff00 75%,
					#00ffff 81.25%,
					#0000ff 87.5%,
					#ff00ff 93.75%,
					#ffff00 100%);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
			background-size: 200% 100%;
			animation: masked-animation 2s infinite linear;
		}

		@keyframes masked-animation {
			0% {
				background-position: 0 0;
			}

			100% {
				background-position: -100%, 0;
			}
		}
	</style>

</head>

<body>
	<script>
		function get_size(type) {
			var result
			if (type == 'w') {
				result = window.innerWidth;
			} else {
				result = window.innerHeight;
			}
			return result
		}
	</script>
	<nav class=" navbar navbar-expand-lg navbar-light fixed-top " id="mainNav"></nav>
	<header class="site-header" style="background: url({$backway});background-size: 100%;background-size: cover;background-repeat: no-repeat;background-attachment:fixed;" id="header">
		<nav class="nav_jsxs">

		</nav>
		<div class="animated" id="home_title_div">
			<h1 id="homeh" class="animated"></h1>


			<p id="homep">
			</p>

			<div class="rightan">
				<a href="#first" style="scroll-behavior: smooth;">
					<img src="images/down.png" width="35px" height="35px" style="margin-top: 20%;">
				</a>
			</div>
		</div>
	</header>
	<section class="content content-boxed">

		<div style="float:left; margin:0px 10px;">
			<style type="text/css">
				.qqlogo1 {
					margin-top: 15px;
					width: 70px;


					height: 70px;


					border-radius: 200px;


				}




				.qqlogo2 {


					margin-top: 0px;


					width: 70px;


					height: 70px;


					border-radius: 200px;


				}

				.find .links .item1 {
					position: relative;
					width: 22.6%;
					height: 80px;
					line-height: 80px;
					margin: 10px 1.2%;
					padding: 5px 0;
					text-align: center;
					float: left;
					transition: .2s all;
					opacity: .9;
				}

				.find .links .item1:hover {
					opacity: 1;
					transform: translateY(-10px);
				}

				.find .links .item1 .inner {
					position: relative;
					z-index: 5;
				}

				.find .links .item1 .bg {
					position: absolute;
					bottom: 0;
					left: 0;
					width: 100%;
					height: 5%;
					z-index: 0;
					transition: .15s all;
				}

				.find .links .item1:hover .bg {
					height: 100%;
					width: 100%;
					border-radius: 5px;
					box-shadow: 0 3px 20px rgba(0, 0, 0, .28);
				}

				.find .links .item1 i {
					font-size: 20px;
				}

				.find .links .item1 span {
					display: inline-block;
					width: 100px;
				}

				.gate .links .item1 {
					margin: 5px 0;
					padding: 15px 1.5%;
					float: left;
					width: 22%;
					height: 60px;
					transition: .2s all;
					opacity: .85;
				}

				.gate .links .item1.akarin {
					opacity: .58;
				}

				.gate .links .item1:hover {
					opacity: 1;
					border-radius: 5px;
					background-color: rgba(255, 255, 255, .25);
					transform: translateY(-5px);
					box-shadow: 0 3px 20px rgba(0, 0, 0, .28);
				}

				.gate .links .item1 .avatar {
					float: left;
					height: 60px;
					line-height: 60px;
					width: 60px;
					border-radius: 100%;
					text-align: center;
					margin-right: 15px;
					overflow: hidden;
				}

				.gate .links .item1 .avatar i {
					font-size: 24px;
				}

				.gate .links .item1 .avatar img {
					height: 60px;
					max-width: 60px;
					border-radius: 100%;
				}

				.gate .links .item1 .inner {
					padding: 6px;
				}

				.gate .links .item1 .inner h5 {
					font-weight: normal;
					font-size: 17px;
				}

				.gate .links .item1 .inner p {
					font-size: 13px;
					color: rgba(255, 255, 255, .6);
				}

				.find .links .item1,
				.gate .links .item1 {
					width: 46%;
					height: auto;
					padding: 5px 0;
					margin: 10px 2%;
				}

				.find .links .item1 {
					height: 60px;
					line-height: 60px;
					font-size: 13px;
				}

				.gate .links .item1 .avatar {
					height: 40px;
					line-height: 40px;
					width: 40px;
				}

				.gate .links .item1 .avatar img {
					height: 40px;
					max-width: 40px;
				}

				.gate .links .item1 .inner {
					padding: 0;
				}

				.gate .links .item1 .inner h5 {
					font-size: 15px;
				}

				.gate .links .item1 .inner h5,
				.gate .links .item1 .inner p {
					white-space: nowrap;
					text-overflow: ellipsis;
					overflow: hidden;
				}

				.gate .links .item1 .inner h5 {
					font-size: 15px;
				}

				.gate .links .item1 .inner h5 {
					font-weight: normal;
					font-size: 17px;
				}
			</style>
		</div>

		</div>
		</font>
		<p id="first" style="scroll-behavior: smooth;"></p>
		<div class="row row_jsxs" id="listApi">

		</div>
		<div class="gate ch">
			<div class="container links">
				<div class="block block-link-hover2 " style="display:inline;">
					<div>
						<h2 style="text-align: center;font-size: 35px;display:inline;">
							<div>
								<span class="badge badge-pill badge-success">友情链接</span>
							</div>
						</h2>
					</div>
				</div>



				<div class="clear" id="yqlj">

				</div>
				<div class="row row_jsxs">
					<div class="col-sm-12">
						<div class="block block-link-hover2 ribbon ribbon-modern ribbon-success">
							<div class="block-content">
								<p class="text-center" id="qq">本网站只提供接口服务，造成的一切后果与本网站无关!如果本站发布的内容侵犯你的利益，请联系我。发送至我的邮箱</p>
								<p class="text-center"><span id="runtime_span"></span>
									<script src="component/layui/layui.js"></script>
									<script type="text/javascript">
										layui.use('form', function() {
											var $ = layui.jquery;
											$.get("/index/webmsg", function(data4) { //请求建站时间
												$("#runtime_span").attr("time", data4.data.start_time); //赋值属性，方便获取建站时间
											}, "json");
										})

										function show_runtime() {
											window.setTimeout("show_runtime()", 1000);
											var time_get = document.getElementById("runtime_span");
											time_get = time_get.getAttribute("time"); //获取时间
											X = new Date(time_get); //建站时间定义
											Y = new Date();
											T = (Y.getTime() - X.getTime());
											M = 24 * 60 * 60 * 1000;
											a = T / M;
											A = Math.floor(a);
											b = (a - A) * 24;
											B = Math.floor(b);
											c = (b - B) * 60;
											C = Math.floor((b - B) * 60);
											D = Math.floor((c - C) * 60);
											runtime_span.innerHTML = "本站稳定运行: " + A + "天" + B + "小时" + C + "分" + D + "秒"
										}
										show_runtime();
									</script>
									</script>
								</p>
								<div id="foot_msg">

								</div>
								<div style="margin: 0 auto; text-align: center">
									<span id="my_foot"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>

	</div>
	</div></a>

	</div>
	</div></a>


	<div style="text-align:right;">

		<a href="http://ad.jingdianwan.com/jstm/?uid=122&sid=291" target="_blank" style="line-height:1.5;"></a>

	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="component/layui/layui.js"></script>
	<script>
		layui.use('form', function() {
			var $ = layui.jquery;

			var MQL = 997;



			//导航动画
			if ($(window).width() > MQL) {
				$("#mainNav").html('<a class="navbar-brand" href="#" id="nav-title"></a><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarResponsive"><ul class="navbar-nav ml-auto mt-2 mt-lg-0"><li class="nav-item active"><a class="nav-link" href="/">首页</a></li><form class="form-inline my-0 my-lg-0"><input class="form-control mr-sm-2" type="search" placeholder="Search" id="search-value"><button class="btn btn-outline-success my-2 my-sm-0" type="button" id="search-btn" data-toggle="dropdown">搜索</button><div class="dropdown-menu dropdown-menu-lg-right" id="dropdown-menu"></div></form></ul></div>');
				var headerHeight = $('#mainNav').height();
				$(window).on('scroll', {
						previousTop: 0
					},
					function() {
						var currentTop = $(window).scrollTop();
						//check if user is scrolling up
						if (currentTop < this.previousTop) {
							//if scrolling up...
							if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
								$('#mainNav').addClass('is-visible');
							}
							// when scrolling to top
							else {
								$('#mainNav').removeClass('is-visible is-fixed');
							}
						} else if (currentTop > this.previousTop) {
							//if scrolling down...
							$('#mainNav').removeClass('is-visible');
							if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
						}
						this.previousTop = currentTop;
					});
			}

			//搜索框点击事件
			$("#search-btn").click(function() {
				var msg = $("#search-value").val()
				if (msg == '') {
					alert('不能填写空信息');
				} else {
					$.post("/index/search", {
						value: msg
					}, function(d) {
						if (d.code == 200) {
							$("#dropdown-menu").empty();// 清除原本匹配的，避免重复显示
							for ($i = 0; $i < d.num; $i++) {
								$("#dropdown-menu").append('<a class="dropdown-item" href="/index/ss?id='+d.id[$i]+'">' + d.data[$i] + "</a>")
							}
							console.log(d.id[0])
						}else{
							$("#dropdown-menu").empty();
							$("#dropdown-menu").append('<a class="dropdown-item" href="/">' + '没有匹配的结果' + "</a>")
						}
					}, "json");
				}
			});


			$('a[href^="#first"]').click(function() { //实现跳转过渡动画
				var speed = 450;
				var href = $(this).attr("href");
				var target = $(href == "#" || href == "" ? 'html' : href);
				var position = target.offset().top;
				$('body,html').animate({
					scrollTop: position
				}, speed, 'swing');
				return false;
			});
			$('#header').css("height", get_size())
			$('#homeh').css("margin-top", get_size() / 4)
			$.get("/index/apidata", function(data) {
				$("#listApi").prepend(data); //渲染api列表
			})
			$.get("/index/linkdata", function(data2) {
				$("#yqlj").html(data2); //渲染友情列表
			})
			$.get("/index/webmsg", function(data3) { //请求底部信息
				$("#foot_msg").prepend(data3.data.foot_msg);
			}, "json");
			$.get("index/webmsg", function(res) {
				var qq = $("body").find("#qq").text();
				var title2 = res.data.title2;


				$('#homep').css('font-size', res.data.size2 + 'px');
				$('#homeh').css('font-size', res.data.size + 'px');
				$('#homeh').css('margin-top', res.data.margin + 'px');
				$('#homeh').css('color', res.data.color);
				$('#homep').css('color', res.data.color);
				$('#homeh').addClass('layui-anim-scale');
				$('#home_title_div').addClass('layui-anim-scale');
				$("title").text(res.data.webname);
				$("body").find("#homeh").text(res.data.webname);
				$("body").find("#nav-title").text(res.data.webname);
				$("body").find("#homep").text(title2);
				$("body").find("#url").text(res.data.url);
				$("body").find("#qq").text(qq + res.data.qq + "@qq.com");
				if (res.data.tctype == "true") {
					layer.alert(res.data.tcgg, {
						title: ['公告', 'font-size:18px;'],
						anim: 4
					});
				}
			}, "json")
			$.get("index/version", function(v) { //请求版本号
				$("#my_foot").html('<a href="https://gitee.com/meng-xinyuan-mxy/mxy-api/">©2023 萌新源 Powered by 萌新源API管理系统' + v + '</a>'); //求求别修改，留个版权标识
			})
		})
	</script>

</body>

</html>