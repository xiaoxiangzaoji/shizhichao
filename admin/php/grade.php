<?php 
//ajax分类选择之添加科目时选择
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select  * from  `shi-grade`");
   $list = JXMySQL_Result();
   JXReturn_Json(0,$list);
 ?>