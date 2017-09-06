<?php 
//客户端登录连接
require("./index2.php");
if(!empty($_POST['newsid']) ){
   $id=trim($_POST['newsid']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select lookurl from `shi-zhibo` where id = ? ",array($id));
   $sqls= JXMySQL_Result();
   $count= $sqls['0']['lookurl'];
   JXReturn_Json(0,$count);
}else{
   JXReturn_Json(1,false);
}








 ?>