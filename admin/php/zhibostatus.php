<?php 
require("./index2.php");
if(!empty($_POST)){
   $id = $_POST['Id'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   
   JXMySQL_Execute("select status from `shi-zhibo` where id=?",array($id));
   $lists = JXMySQL_Result();
   $status=$lists['0']['status'];
   
   if ($status == 0) {
      // echo 1;
      $status = 1;
      // var_dump($status);
   }else{
      // echo 2;
      $status = 0;
      // var_dump($status);
   }
   // var_dump($status);die();
   JXMySQL_Execute("update `shi-zhibo` set status=? where id=?",array($status,$id));
   $list = JXMySQL_Affect();   
   JXReturn_Json(0,'成功');
}else{
	JXReturn_Json(1,'修改失败2');
}





 ?>