<?php
//首页条件查找 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$school = $_POST['school'];//流派
$years = $_POST['years'];//年代
$area = $_POST['area'];//地区
$sql = '';
if (!empty($school)) {
	$sql.= ' and school='.$school;
}
if (!empty($years)) {
	$sql.= ' and years='.$years;
}
if (!empty($area)) {
	$sql.= ' and area='.$area;
}
$str = "select id,title,info,stars from `shi-article` where id >0 ".$sql;

JXMySQL_Execute("$str");

$result = JXMySQL_Result();
if ($result) {
	JXReturn_Json(0,$result);
}else{
	JXReturn_Json(1,'无值');

}





 ?>