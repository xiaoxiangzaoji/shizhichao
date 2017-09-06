<?php
//删除朗读者及删除他的音视频
require("./index2.php");
if(!empty($_GET)){
   $id =$_GET['Id'];//用户id
   require('/Code/JXMySQL.php');

   JXMySQL_Execute("delete from  `shi-readers` where id=?",array($id));
   $list= JXMySQL_Affect();
   if ($list) {
      $sql=JXMySQL_Execute("delete from  `shi-vedio` where authorid=?",array($id));
      $insert_id = JXMySQL_Affect();
   }     
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