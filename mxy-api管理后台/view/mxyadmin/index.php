<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>萌新源API管理后台-登录</title>
	<!-- 样 式 文 件 -->
	<link rel="stylesheet" href="/component/pear/css/pear.css" />
	<link rel="stylesheet" href="/admin/css/other/login.css" />
</head>
<!-- 代 码 结 构 -->

<body background="/admin/images/background.svg" style="background-size: cover;">
	<form class="layui-form" action="login.php" method="post" lay-filter="data">
		<div class="layui-form-item" lay-filter="data">
			<img class="logo" src="/admin/images/logo.png" />
			<div class="title">萌新源API管理后台</div>
			<div class="desc">
				管理API的好帮手
			</div>
		</div>
		<div class="layui-form-item">
			<input placeholder="账 户 : 输入账户 " lay-verify="required" hover class="layui-input" name="username" type="text" id="username" />
		</div>
		<div class="layui-form-item">
			<input placeholder="密 码 : 输入密码 " lay-verify="required" hover class="layui-input" name="password" type="password" id="password" />
		</div>
		<div class="layui-form-item">
			<input type="checkbox" name="" title="记住密码" lay-skin="primary" checked>
		</div>
		<div class="layui-form-item">
			<button type="button" class="pear-btn pear-btn-success login" lay-submit lay-filter="formlogin">
				登 录
			</button>
		</div>
	</form>
	<!-- 资 源 引 入 -->
	<script src="/component/layui/layui.js"></script>
	<script src="/component/pear/pear.js"></script>
	<script>
		layui.use(['form', 'button', 'popup', 'layer'], function() {
			var form = layui.form;
			var button = layui.button;
			var popup = layui.popup;
			var $ = layui.jquery;
			var layer = layui.layer;

			form.on('submit(formlogin)', function(res) {
				$check = 0;
				$msg = 0;
				/// 验证
				//AJAX请求
				$.post("/Login/login", res.field, function(d) {
					$check = d.code;
					console.log(d.code);
				}, "json");
				/// 登录

				/// 动画
				button.load({
					elem: '.login',
					time: 1500,
					done: function() {
						if ($check == "200") {
							popup.success("登录成功", function() {
								location.href = "/home/index"
							});
						} else {
							layer.alert('用户名或密码不正确，请重新输入', {
								icon: 2
							});
						}


					}
				})
				return false;
			});
		})
	</script>
</body>

</html>