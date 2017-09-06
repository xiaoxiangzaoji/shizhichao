<?php 
require("./index2.php");
if(!empty($_POST)){
   $course = trim($_POST['course']);
   $parentid = trim($_POST['parentid']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   $sql=JXMySQL_Execute("insert into `shi-course` (course,parentid) values(?,?)",array($course,$parentid));
   $list = JXMySQL_Insert($sql);
   if ($list) {
   	JXReturn_Json(0,'添加成功');
   }else{
   	JXReturn_Json(1,'添加失败1');
   }
}else{
	JXReturn_Json(1,'添加失败2');
}




 ?>