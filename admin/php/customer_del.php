<?php
require("./index2.php");
if(!empty($_GET)){
   $id =$_GET['Id'];
   require('/Code/JXMySQL.php');

   JXMySQL_Execute("delete from  `shi-custmoer` where id='$id'");
   $list= JXMySQL_Affect();
   if ($list) {
      JXMySQL_Execute("delete from  `shi-comment-ar` where customer=?",array($id));
      $insert_id = JXMySQL_Affect();
      if ($insert_id) {
          JXMySQL_Execute("delete from  `shi-comment-ve` where customer=?",array($id));
          $insert = JXMySQL_Affect();
          if ($insert) {
              JXMySQL_Execute("delete from  `shi-comment-au` where customer=?",array($id));
              $inserts = JXMySQL_Affect();
              if(!$inserts){
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
          }  
      }
   } 
}else{
      $result=array(
                   "code"=>2,
                   "msg" =>"失败2",
              );
      echo json_encode($result);

}

