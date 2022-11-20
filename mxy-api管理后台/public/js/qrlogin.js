var interval1,interval2;
function getqrpic(){
	var getvcurl='login.php?do=getqrpic&r='+Math.random(1);
	$.get(getvcurl, function(d) {
		if(d.saveOK ==0){
			$('#qrimg').attr('qrsig',d.qrsig);
			$('#qrimg').html('<img onclick="getqrpic()" src="data:image/png;base64,'+d.data+'" title="点击刷新">');
		}else{
			alert(d.msg);
		}
	}, 'json');
}
function ptuiCB(code,uin,sid,skey,pskey,superkey,nick){
	var msg='请扫描二维码';
	switch(code){
		case '0':
			$('#login').html('<div class="alert alert-success">'+decodeURIComponent(nick)+'</div><div class="input-group"><span class="input-group-addon">QQ帐号</span><input id="uin" value="'+uin+'" class="form-control" /></div><br/><div class="input-group"><span class="input-group-addon">skey</span><input id="skey" value="'+skey+'" class="form-control"/></div><br/><div class="input-group"><span class="input-group-addon">P_skey</span><input id="pskey" value="'+pskey+'" class="form-control"/></div><br/><div class="input-group"><span class="input-group-addon">superkey</span><input id="superkey" value="'+superkey+'" class="form-control"/></div><br/><a href="./index.html">返回重新获取</a>');
			$('#qrimg').hide();
			$('#submit').hide();
			$('#login').attr("data-lock", "true");
			cleartime();
			break;
		case '1':
			getqrpic();
			msg='请重新扫描二维码';
			break;
		case '2':
			msg='使用QQ手机版扫描二维码';
			break;
		case '3':
			msg='扫描成功，请在手机上确认授权登录';
			break;
		default:
			msg=sid;
			break;
	}
	$('#loginmsg').html(msg);
}
function loadScript(c) {
	if ($('#login').attr("data-lock") === "true") return;
	var qrsig=$('#qrimg').attr('qrsig');
	c = c || "login.php?do=qrlogin&qrsig="+decodeURIComponent(qrsig)+"&r=" + Math.random(1);
	var a = document.createElement("script");
	a.onload = a.onreadystatechange = function() {
		if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") {
			if (typeof d == "function") {
				d()
			}
			a.onload = a.onreadystatechange = null;
			if (a.parentNode) {
				a.parentNode.removeChild(a)
			}
		}
	};
	a.src = c;
	document.getElementsByTagName("head")[0].appendChild(a)
}
function loginload(){
	if ($('#login').attr("data-lock") === "true") return;
	var load=document.getElementById('loginload').innerHTML;
	var len=load.length;
	if(len>2){
		load='.';
	}else{
		load+='.';
	}
	document.getElementById('loginload').innerHTML=load;
}
function cleartime(){
	clearInterval(interval1);
	clearInterval(interval2);
}
$(document).ready(function(){
	getqrpic();
	$('#submit').click(function(){
		loadScript();
	});
	interval1=setInterval(loginload,1000);
	interval2=setInterval(loadScript,3000);
});