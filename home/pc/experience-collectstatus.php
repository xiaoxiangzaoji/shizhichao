<?php
//判断收藏状态 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$customer=trim($_POST['customer']);//用户
$experienceid=trim($_POST['experienceid']);//文章
JXMySQL_Execute("SELECT count(id) as val FROM `shi-experience-collect`
				where experienceid=? and customer =? ",
				array($experienceid,$customer));
$sqls = JXMySQL_Result();
if ($sqls['0']['val']>=1) {
	JXReturn_Json(1,'已收藏');
}else{
	JXReturn_Json(0,'未收藏');
}










 ?>