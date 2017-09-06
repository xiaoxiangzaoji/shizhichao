<?php 
require("./index2.php");
if(!empty($_GET['ids']) ){
   $id=trim($_GET['ids']);
   require('/Code/JXMySQL.php');

   JXMySQL_Execute("DELETE FROM   `shi-readers`  WHERE id IN(".$id.")");
   $results=JXMySQL_Affect();
   if ($results) {
      JXMySQL_Execute("delete from  `shi-vedio` where authorid IN(".$id.")");
      $insert_id = JXMySQL_Affect();
   }
   if(!$insert_id){
      $result=array(
            "code"=>2,
            "msg" =>"删除失败",
          );
      echo json_encode($result);
   }else{
      $result=array(
          "code"=>1,
          "msg"=>"删除成功",
        );
       echo json_encode($result);
   }

}else{
    $result=array(
    "code"=>2,
    "msg" =>"删除失败",
    );
    echo json_encode($result);
   }





 ?>