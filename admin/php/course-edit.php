<?php 
require("./index2.php");
if(!empty($_POST)){
   $id = $_POST['id'];
   $course = trim($_POST['course']);
   $parentid = trim($_POST['categroy']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   $sql=JXMySQL_Execute("update `shi-course` set course=?,parentid=? where id=?",array($course,$parentid,$id));
   $list = JXMySQL_Affect($sql);
   
   if ($list) {
   	JXReturn_Json(0,'修改成功');
   }else{
   	JXReturn_Json(1,'修改失败1');
   }
}else{
	JXReturn_Json(1,'修改失败2');
}
?>