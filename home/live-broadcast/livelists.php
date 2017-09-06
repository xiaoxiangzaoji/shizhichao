<?php 
//获取直播间列表
require("../pc/Code/JXMySQL.php");
require("../pc/Code/JXReturn.php");

$num  = isset($_POST['num'])?$_POST['num']:4;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
JXMySQL_Execute("select count(id) as val from `shi-zhibo`");
$sql = JXMySQL_Result();//总记录数
$page = ceil($sql['0']['val']/$num);//总页数
$limit = ($source-1)*$num;//起始记录
JXMySQL_Execute("select * from `shi-zhibo`
				order by id DESC limit ?,? ",array($limit,$num));
$sqls = JXMySQL_Result();
$sqls['page']=$page;
JXReturn_Json(0,$sqls);




 ?>