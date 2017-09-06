<?php 
//视频信息
   $id =$_POST['newsid'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select vedio from  `shi-vedio` where id=?",array($id));
   $list = JXMySQL_Result();
   JXReturn_Json(0,$list);
 ?>





