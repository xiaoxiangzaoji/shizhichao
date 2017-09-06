<?php
 //判断session
header("content-type:text/html;charset=utf-8");
   session_start();
    if(!isset($_SESSION['username'])){
     header("Location:./html/index.php");
      exit();
 }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎来到师之巢<span class="f-14"></span>后台！</p>
<?php
			      require("../php/config.php");
                 $sql="select last_loginip,last_logintime,times from `shi-admin` where id = 1";
                 $result=mysql_query($sql,$conn);
                 $res=array();
			       while($arr =mysql_fetch_assoc($result)){
			         $res[]=$arr;
			       }
			    //  var_dump($res);

			      foreach($res as  $v){
                        // echo $v['Id'];


			   ?>

	<p>登录次数：<?php echo $v['times']?></p>
	<p>上次登录IP：<?php echo $v['last_loginip']?>  上次登录时间：<?php echo $v['last_logintime']?></p>
	<?php 
	} 
	?>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器计算机名</th>
				<td><span id="lbServerName"><?php echo $_SERVER['HTTP_HOST'] ?></span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td><?php echo $_SERVER['REMOTE_ADDR']?></td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td><?php echo $_SERVER['SERVER_NAME'] ?></td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td><?php echo $_SERVER['SERVER_PORT'] ?></td>
			</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin 3.0 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<!--此乃百度统计代码，请自行删除-->
<script type="text/javascript">

</script>
</body>
</html>