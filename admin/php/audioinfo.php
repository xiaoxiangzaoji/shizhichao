<?php 
//音频信息
   $id =$_POST['newsid'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select audio from  `shi-audio` where id=?",array($id));
   $list = JXMySQL_Result();
   JXReturn_Json(0,$list);
 ?>