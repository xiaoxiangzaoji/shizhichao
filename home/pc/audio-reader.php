<?php 
//朗读者标题列表
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");

$num  = isset($_POST['num'])?$_POST['num']:8;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
$authorid = $_POST['authorid'];
JXMySQL_Execute("select count(id) as val from `shi-audio` where authorid = ?",array($authorid));
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/$num);//总页数

$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select a.id,audio,title,time,read_num,stars,teacher,headimg from `shi-audio` as a
				LEFT JOIN `shi-reader` as r 
				on a.authorid=r.id
				WHERE authorid= ?
				order by id DESC limit ?,? ",array($authorid,$limit,$num));
$result = JXMySQL_Result();
$result['page']=$page;

JXReturn_Json(0,$result);





 ?>