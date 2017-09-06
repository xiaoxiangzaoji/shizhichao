<?php 
require("./index2.php");
if(!empty($_POST)){
   $id = $_POST['id'];
   $title = trim($_POST['title']);
   $author = trim($_POST['author']);
   $categroy = trim($_POST['categroy']);
   $content = trim($_POST['content']);
   $info = trim($_POST['info']);

   $school = trim($_POST['school']);
   $year =trim($_POST['year']);
   $area= trim($_POST['area']);
   $stars=$_POST['stars'];

   $ishot = $_POST['hot'];
   $jingdian = $_POST['jingdian'];
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   $sql=JXMySQL_Execute("update `shi-article` set author=?,title=?,info =?,content=?,categroy=?,school=?,years=?,area=?,stars=?,ishot=?,jingdian=? where id=?",
      array($author,$title,$info,$content,$categroy,$school,$year,$area,$stars,$ishot,$jingdian,$id));
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