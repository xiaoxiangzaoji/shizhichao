<?php 
//ajax分类选择之添加文章时选择
   $id =$_POST['id'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("select  * from  `shi-course` where parentid='$id'");
   $list = JXMySQL_Result();
   JXReturn_Json(0,$list);
 ?>