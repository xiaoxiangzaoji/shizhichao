<?php
//登录 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$str = trim($_POST['dname']);
$password = md5(trim($_POST['password']));
if(preg_match("/^1[34578]\d{9}$/",$str)){    
    //手机号    
	JXMySQL_Execute("select id,nickname,phone,password,headimg from `shi-custmoer` 
				where phone =? and password =?",array($str,$password));
}else{    
    //用户    
	JXMySQL_Execute("select id,nickname,phone,password,headimg from `shi-custmoer` 
				where nickname =? and password =?",array($str,$password));
} 
$sqls = JXMySQL_Result();

if ($sqls) {
	JXReturn_Json(0,$sqls);
}else{
	JXReturn_Json(1,'失败');
}


 ?>