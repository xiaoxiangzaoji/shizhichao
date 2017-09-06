<?php 
//视频点赞功能
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer=trim($_POST['customer']);//用户
$vedioid=trim($_POST['vedioid']);//文章
JXMySQL_Execute("insert into `shi-vedio-clickzan` (vedioid,customer) values(?,?)",
				array($vedioid,$customer));
$sqls = JXMySQL_Insert();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}








 ?>