<?php 
//具体科目
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$parentid= $_POST['id'];//科目所属的年级
$num  = isset($_POST['num'])?$_POST['num']:4;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
JXMySQL_Execute("select count(id) as val from `shi-course` where parentid = ?",array($parentid));
$sql = JXMySQL_Result();//总记录数
$page = ceil($sql['0']['val']/$num);//总页数
$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select c.id,course,grade from `shi-course` as c
				left join `shi-grade` as g 
				on c.parentid = g.id
				where parentid=? order by id DESC limit ?,? ",array($parentid,$limit,$num));
$sqls = JXMySQL_Result();
$sqls['page']=$page;
JXReturn_Json(0,$sqls);








 ?>