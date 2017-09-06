<?php
//登录 
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$str = $_POST['dname'];
$password = $_POST['password'];
JXMySQL_Execute("select id,nickname,phone,password,headimg from `shi-customer`");
$sqls = JXMySQL_Result();

var_dump($sqls);die();
JXReturn_Json(0,$sqls);


 ?>