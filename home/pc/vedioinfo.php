<?php
//具体视频 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id = $_POST['vedioid'];
JXMySQL_Execute("select id,vedio,title from `shi-vedio` where id =?",array($id));
$sqls = JXMySQL_Result();
JXReturn_Json(0,$sqls);








 ?>