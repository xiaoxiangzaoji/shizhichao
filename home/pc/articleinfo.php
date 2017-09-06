<?php
//推荐详情
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id = $_POST['id'];
JXMySQL_Execute("select a.id,title,author,read_num,stars,content from `shi-article` as a 
				LEFT JOIN `shi-course` as c 
				on a.categroy =c.id where a.id = ?",array($id));
$result = JXMySQL_Result();
JXReturn_Json(0,$result);






 ?>