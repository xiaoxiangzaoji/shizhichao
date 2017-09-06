<?php
//判断视频订阅状态 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customerid=trim($_POST['customer']);//用户
$vedioid=trim($_POST['vedioid']);//视频
JXMySQL_Execute("SELECT count(id) as val from `shi-subscribe-ve` WHERE vedioid=? and customerid =?",
				array($vedioid,$customerid));
$sqls = JXMySQL_Result();
if ($sqls['0']['val']>=1) {
	JXReturn_Json(1,'已订阅');
}else{
	JXReturn_Json(0,'未订阅');
}










 ?>