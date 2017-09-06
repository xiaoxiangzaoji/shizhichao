<?php 
//注册
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$username = $_POST['username'];//用户名
$password = md5(trim($_POST['password']));//密码
$phone = $_POST['phone'];//电话
$headimg = '../../upload/112120404833295902.png';
JXMySQL_Execute("insert into `shi-custmoer` 
	(nickname,address,headimg,info,phone,password) values(?,?,?,?,?,?)",
	array($username,'',$headimg,'',$phone,$password));
$result=JXMySQL_Insert();
if ($result) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(0,'失败');
}


 ?>