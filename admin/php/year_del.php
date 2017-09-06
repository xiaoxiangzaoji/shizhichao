<?php 
require("./index2.php");
if(!empty($_GET)){
   $id =$_GET['Id'];
   require('/Code/JXMySQL.php');

   $sql=JXMySQL_Execute("delete from  `shi-aryears` where id='$id'");

   $insert_id = JXMySQL_Affect($sql);
   if(!$insert_id){
         $result=array(
               "code"=>2,
               "msg" =>"失败1",
          );
      echo json_encode($result);
   }else{
      $result=array(
          "code"=>1,
          "msg"=>"成功",
          );
       echo json_encode($result);
   }

}else{
      $result=array(
                   "code"=>2,
                   "msg" =>"失败2",
              );
      echo json_encode($result);
}







 ?>