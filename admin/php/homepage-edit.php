<?php 
require("./index2.php");
 //echo"<pre>";print_r($_FILES);echo"<pre>";
// die();
$audio = $_FILES['music'];
require('Code/JXMySQL.php');
if($audio['error']>0){

    header("Location:../html/homepage.php");
}else{
	$type = strrchr($audio['name'], '.');//截取文件后缀名
	$path = "../../upload/music/".$audio['name'];//设置路径：当前目录下的uploads文件夹并且名称为$audio['name'];
	if(strtolower($type)=='.wav'||strtolower($type)=='.mp3'||strtolower($type)=='.ogg')//判断上传的文件是否为音格式
	{
		$picname = $audio['tmp_name'];
		move_uploaded_file($picname, $path);//将图片文件移到该目录下
		echo $path;
		
		JXMySQL_Execute("update `shi-homepage` set music=?  where id =?",array($path,1));
	    $insert_id = JXMySQL_Affect();
	    if ($insert_id) {
	        header("Location:../html/homepage.php");
	        exit;
	    }else{
	      	return false;
	    }
	}	
}
 ?>