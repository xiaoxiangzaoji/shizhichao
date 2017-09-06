<?php 
//点击增加精彩心得浏览量
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$id= $_POST['id'];
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select readnum from `shi-experience` where id = '$id'");
$sqls = JXMySQL_Result();
$readnum = $sqls['0']['readnum']+1;
JXMySQL_Execute(" update `shi-experience` set readnum =? where id = ?",array($readnum,$id));
$result = JXMySQL_Affect();
if ($result) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}








 ?>
 