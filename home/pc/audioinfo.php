<?php 
//具体音频
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$id = $_POST['vedioid'];
JXMySQL_Execute("select a.id,audio,title,time,read_num,stars,teacher,headimg from `shi-audio` as a 
				LEFT JOIN `shi-reader` as r 
				on a.authorid=r.id where a.id =?",array($id));
$sqls = JXMySQL_Result();
JXReturn_Json(0,$sqls);

 ?>