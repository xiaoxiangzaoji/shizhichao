<?php 
//文章简介
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select info from `shi-article` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['info'];
   JXReturn_Json(0,$count);
}else{
   JXReturn_Json(1,false);
}