<?php 
//视频取消点赞功能
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer=trim($_POST['customer']);//用户
$vedioid=trim($_POST['vedioid']);//视频
JXMySQL_Execute("delete from `shi-vedio-clickzan` where vedioid=? and customer=?",
				array($vedioid,$customer));
$sqls = JXMySQL_Affect();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}








 ?>