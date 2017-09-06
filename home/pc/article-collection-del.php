<?php 
//文章取消收藏功能
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer=trim($_POST['customer']);//用户
$articleid=trim($_POST['articleid']);//文章
JXMySQL_Execute("delete from `shi-art-collection` where articleid=? and customer=?",
				array($articleid,$customer));
$sqls = JXMySQL_Affect();
if ($sqls) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}








 ?>