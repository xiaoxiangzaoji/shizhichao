<?php
//具体科目列表 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$categroy= $_POST['id'];//科目id

$num  = isset($_POST['num'])?$_POST['num']:8;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数

JXMySQL_Execute("select count(id) as val from `shi-article` where categroy=?",array($categroy));
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/$num);//总页数

$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select a.id,title,info,stars,course from `shi-article` as a 
				LEFT JOIN `shi-course` as c 
				on a.categroy =c.id where categroy=? limit ?,?",array($categroy,$limit,$num));
$result = JXMySQL_Result();

$result['page']=$page;
JXReturn_Json(0,$result);







 ?>