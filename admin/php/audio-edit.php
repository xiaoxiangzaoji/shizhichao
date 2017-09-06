<?php 
require("./index2.php");
 //echo"<pre>";print_r($_FILES);echo"<pre>";
// die();
$id = $_POST['id'];//id
$title = $_POST['adminName'];//标题
$author = $_POST['author'];//作者
$stars = $_POST['stars'];
$audio = $_FILES['audio'];
//var_dump($title);var_dump($author);var_dump($id);die();
require('Code/JXMySQL.php');
if($audio['error']>0){
	
	$sql=JXMySQL_Execute("update `shi-audio` set title=?,authorid=?,stars=? where id =?",array($title,$author,$stars,$id));
    $insert_id = JXMySQL_Insert($sql);
    // var_dump($insert_id);die();
    if ($insert_id) {
        return false;
        exit;
    }else{
      	header("Location:../html/audio-list.php");
    }
}else{
	// echo 2;
	// die();
	$type = strrchr($audio['name'], '.');//截取文件后缀名
	$path = "../../upload/audio/".$audio['name'];//设置路径：当前目录下的uploads文件夹并且名称为$audio['name'];
	if(strtolower($type)=='.wav'||strtolower($type)=='.mp3'||strtolower($type)=='.ogg')//判断上传的文件是否为音格式
	{
		$picname = $audio['tmp_name'];
		move_uploaded_file($picname, $path);//将图片文件移到该目录下
		echo $path;
		
		$sql=JXMySQL_Execute("update `shi-audio` set audio= ?,title=?,authorid=?,stars=? where id =?",array($path,$title,$author,$stars,$id));
	    $insert_id = JXMySQL_Insert($sql);
	    if ($insert_id) {
	        return false;
	    }else{
	      	header("Location:../html/audio-list.php");
	        exit;
	    }
	}	
}
 ?>