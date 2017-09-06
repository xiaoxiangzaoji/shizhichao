<?php
//点击推荐
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$articleid = $_POST['articleid'];//文章id
$custmoerid = $_POST['custmoerid'];//用户id
JXMySQL_Execute("select readerrecom from `shi-article` where id =?",array($articleid));
$sqls = JXMySQL_Result();
$num = $sqls['0']['readerrecom']+1;
JXMySQL_Execute("update `shi-article` set readerrecom=?,recompeople=? where id =?",array($num,$custmoerid,$articleid));
$result = JXMySQL_Affect();

if ($result) {
	JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'失败');
}





 ?>