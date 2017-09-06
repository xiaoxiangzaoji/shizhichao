<?php 
//文章评论列表
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$articleid = $_POST['articleid'];
$num  = isset($_POST['num'])?$_POST['num']:4;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数

JXMySQL_Execute("select count(id) as val from `shi-comment-ar` where articleid= ?",array($articleid));
$sqls = JXMySQL_Result();//总记录数
$page = ceil($sqls['0']['val']/$num);//总页数

$limit = ($source-1)*$num;//起始记录

JXMySQL_Execute("select ar.id,content,time,nickname,headimg from `shi-comment-ar` as ar 
				left join `shi-custmoer` as c 
				on ar.customer = c.id
				WHERE articleid = ?
				order by id DESC limit ?,?",array($articleid,$limit,$num));
$result = JXMySQL_Result();
$result['page']=$page;
JXReturn_Json(0,$result);




 ?>