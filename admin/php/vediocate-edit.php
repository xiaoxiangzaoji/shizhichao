<?php 
require("./index2.php");
if(!empty($_POST)){
   $id = $_POST['id'];
   $catename = trim($_POST['grade']);
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   $sql=JXMySQL_Execute("update `shi-vediocate` set catename=? where id=?",array($catename,$id));
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