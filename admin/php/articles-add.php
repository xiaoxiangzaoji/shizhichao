<?php 
require("./index2.php");
if(!empty($_POST)){
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
   $time = date('Y-m-d H:i:s',time());
   
   require('/Code/JXMySQL.php');
   require('/Code/JXReturn.php');
   JXMySQL_Execute("insert into `shi-article` 
                        (author,title,info,content,time,read_num,categroy,school,years,area,stars,readerrecom,ishot,jingdian,recompeople)
                         values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                         array($author,$title,$info,$content,$time,0,$categroy,$school,$year,$area,$stars,0,$ishot,$jingdian,0));
   $list = JXMySQL_Insert();
   if ($list) {
   	JXReturn_Json(0,'添加成功');
   }else{
   	JXReturn_Json(1,'添加失败1');
   }
}else{
	JXReturn_Json(1,'添加失败2');
}




 ?>