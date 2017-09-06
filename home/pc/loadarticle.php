<?php 
//理想国文章初始化
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select id,title,info,stars from `shi-article` order by id DESC limit 3");
$sqls = JXMySQL_Result();
JXReturn_Json(0,$sqls);





 ?>