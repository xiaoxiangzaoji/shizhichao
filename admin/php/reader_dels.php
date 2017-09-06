<?php
//音频
require("./index2.php");
if(!empty($_GET['ids']) ){
   $id=trim($_GET['ids']);
   require('/Code/JXMySQL.php');
   JXMySQL_Execute("DELETE FROM  `shi-reader`  WHERE id IN(".$id.")");
   $result=JXMySQL_Affect();
   if ($result) {
      JXMySQL_Execute("DELETE FROM  `shi-audio`  WHERE authorid IN(".$id.")");
      $results=JXMySQL_Affect();
   }
   if(!$results){
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