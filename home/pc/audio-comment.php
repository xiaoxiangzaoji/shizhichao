<?php 
//音频评论 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$content = trim($_POST['content']);
$audioid = trim($_POST['audioid']);
$customer = trim($_POST['customer']);
$time = date('Y-m-d H:i:s',time());
JXMySQL_Execute("insert into `shi-comment-au`(content,audioid,customer,time) values(?,?,?,?)",array($content,$audioid,$customer,$time));
$sqls = JXMySQL_Insert();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(0,'失败');
}




 ?>