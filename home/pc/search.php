<?php 
//搜索
header("Access-Control-Allow-Origin: *");
header("content-type:text/html;charset=utf-8");
require("./Code/JXMySQL.php");
require("./Code/JXReturn.php");
$search=$_POST['search'];

//var_dump($search);die();
JXMySQL_Execute("select id,title from `shi-article` where title like '%$search%'");
$article= JXMySQL_Result();//理想国

JXMySQL_Execute("select id,title from `shi-experience` where title like '%$search%'");
$experience= JXMySQL_Result();//心得

JXMySQL_Execute("select id,title from `shi-article` where title like '%$search%'");
$find= JXMySQL_Result();//寻觅与获得

JXMySQL_Execute("select id,title from `shi-vedio` where title like '%$search%'");
$vedio= JXMySQL_Result();//视频标题

JXMySQL_Execute("select id,teachername from `shi-readers` where teachername like '%$search%'");
$veteacher= JXMySQL_Result();//视频作者

JXMySQL_Execute("select id,title from `shi-audio` where title like '%$search%'");
$audio= JXMySQL_Result();//音频标题

JXMySQL_Execute("select id,teacher from `shi-reader` where teacher like '%$search%'");
$auteacher= JXMySQL_Result();//音频作者

$list['article']=$article;
$list['experience']=$experience;
$list['find']=$find;
$list['vedio']=$vedio;
$list['veteacher']=$veteacher;
$list['audio']=$audio;
$list['auteacher']=$auteacher;

JXReturn_Json(0,$list);
 ?>