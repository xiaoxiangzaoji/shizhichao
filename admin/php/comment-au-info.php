<?php 
//音频品论
$id =$_POST['newsid'];
require('/Code/JXMySQL.php');
require('/Code/JXReturn.php');
JXMySQL_Execute("select content from  `shi-comment-au` where id=?",array($id));
$list = JXMySQL_Result();
JXReturn_Json(0,$list);


 ?>