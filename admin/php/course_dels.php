<?php
require("./index2.php");
if(!empty($_GET['ids']) ){
   $id=trim($_GET['ids']);
   require('/Code/JXMySQL.php');
   $sql=JXMySQL_Execute("DELETE FROM  `shi-course`  WHERE id IN(".$id.")");
   $results=JXMySQL_Affect($sql);
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