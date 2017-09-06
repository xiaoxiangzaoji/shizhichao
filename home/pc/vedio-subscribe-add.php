<?php 
//视频订阅
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customerid=trim($_POST['customer']);//用户
$vedioid=trim($_POST['vedioid']);//视频
JXMySQL_Execute("insert into `shi-subscribe-ve` (vedioid,customerid) values(?,?)",
				array($vedioid,$customerid));
$sqls = JXMySQL_Insert();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}






 ?>