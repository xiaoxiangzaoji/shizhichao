<?php 
//视频评论 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$content = trim($_POST['content']);
$vedioid = trim($_POST['vedioid']);
$customerid = trim($_POST['customerid']);
$time = date('Y-m-d H:i:s',time());
JXMySQL_Execute("insert into `shi-comment-ve`(content,vedioid,customer,time) values(?,?,?,?)",array($content,$vedioid,$customerid,$time));
$sqls = JXMySQL_Insert();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}









 ?>