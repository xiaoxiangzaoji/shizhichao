<?php 
//读者推荐详情
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id = $_POST['id'];
JXMySQL_Execute("select a.id,author,title,a.info,content,time,read_num,stars,nickname,headimg from `shi-article` as a
				LEFT JOIN `shi-custmoer` as c 
				ON a.recompeople = c.id
				where a.id = ?",
				array($id));
$result = JXMySQL_Result();
JXReturn_Json(0,$result);


 ?>