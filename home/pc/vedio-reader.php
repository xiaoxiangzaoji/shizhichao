<?php
//讲师列表 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

$num  = isset($_POST['num'])?$_POST['num']:4;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
JXMySQL_Execute("select count(id) as val from `shi-readers`");
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/$num);//总页数

$limit = ($source-1)*$num;//起始记录
JXMySQL_Execute("select * from `shi-readers`
				order by id DESC limit ?,? ",array($limit,$num));

$result = JXMySQL_Result();
$result['page']=$page;
JXReturn_Json(0,$result);







 ?>