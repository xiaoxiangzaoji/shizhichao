<?php 
//心得
   $id =$_POST['newsid'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select content from  `shi-experience` where id=?",array($id));
   $list = JXMySQL_Result();
   JXReturn_Json(0,$list);
 ?>