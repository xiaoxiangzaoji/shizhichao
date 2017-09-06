<?php 
//心得详情
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id = $_POST['id'];
JXMySQL_Execute("select * from `shi-experience` where id = ?",array($id));
$result = JXMySQL_Result();
JXReturn_Json(0,$result);








 ?>