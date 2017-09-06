<?php 
//文章信息
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select content from `shi-article` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['content'];
   JXReturn_Json(0,$count);
}else{
   JXReturn_Json(1,false);
}








 ?>