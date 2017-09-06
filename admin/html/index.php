﻿<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link href="static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
		<link href="static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
		<link href="lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
		<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
		<title></title>
		<meta name="keywords" content="H-ui.admin 3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
		<meta name="description" content="H-ui.admin 3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
	</head>

	<body>
		<!--<input type="hidden" id="TenantId" name="TenantId" value="" />-->
		<div class="header">师之巢后台管理系统</div>
		<div class="loginWraper">
			<div id="loginform" class="loginBox">
					<div class="row cl">
						<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
						<div class="formControls col-xs-8">
							<input id="inname" name="username" type="text" placeholder="请输入您的账户" class="input-text size-L">
						</div>
					</div>
					<div class="row cl">
						<label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
						<div class="formControls col-xs-8">
							<input id="inpass" name="password" type="password" placeholder="请输入您的密码" class="input-text size-L">
						</div>
					</div>
					<!--<div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
          <img src=""> <a id="kanbuq" href="javascript:;">看不清，换一张</a> </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div>
      <div class="row cl">-->
					<div class="formControls col-xs-8 col-xs-offset-3">
						<input name="submit" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
						<input name="reset" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
					</div>
			</div>
		</div>

		<div class="footer">Copyright 田丁科技有限公司 </div>
		<script type="text/javascript" src="lib/jquery/1.9.1/jquery.js"></script>
		<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
		<script type="text/javascript">
			$(".btn-success").click(function() {
				var username = $("#inname").val();
				var userpassword = $("#inpass").val();
				if(username == "" || userpassword == "") {
					alert("用户名或密码不能为空，请重新输入！");
				}
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "../php/login.php",
					data:{
						username:username,
						password:userpassword
					},
					success: function(data) {
						console.log(data);
						if(data.code==200){
						window.location.href="index2.php";
							//alert("登录成功！");
						}else if(data.code==202){
							alert("用户名或密码错误！");
						}
					}
				});
			})
		</script>
	</body>

</html>