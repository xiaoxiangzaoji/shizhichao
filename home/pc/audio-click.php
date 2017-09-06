<?php 
//音频浏览次数增加
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
$id= $_POST['id'];//音频id
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
JXMySQL_Execute("select read_num from `shi-audio` where id = '$id'");
$sqls = JXMySQL_Result();
$read_num = $sqls['0']['read_num']+1;
JXMySQL_Execute(" update `shi-audio` set read_num =? where id = ?",array($read_num,$id));
$result = JXMySQL_Affect();
if ($result) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}





 ?>