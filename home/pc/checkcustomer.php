<?php 
//注册检查是否已经存在用户
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer =trim($_POST['customer']);
JXMySQL_Execute("select count(*) as val from `shi-custmoer` where nickname = ?",array($customer));
$result = JXMySQL_Result();
$count = $result['0']['val'];
if ($count >= 1) {
	JXReturn_Json(0,'已存在');
}else{
	JXReturn_Json(1,'ok');
}






 ?>