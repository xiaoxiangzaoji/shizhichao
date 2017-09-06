<?php
//判断点赞状态 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer=trim($_POST['customer']);//用户
$articleid=trim($_POST['articleid']);//文章
JXMySQL_Execute("SELECT count(id) as val FROM `shi-art-clickzan`
				where articleid=? and customer =? ",
				array($articleid,$customer));
$sqls = JXMySQL_Result();
if ($sqls['0']['val']>=1) {
	JXReturn_Json(1,'已点赞');
}else{
	JXReturn_Json(0,'未点赞');
}










 ?>