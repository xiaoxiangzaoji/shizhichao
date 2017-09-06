<?php 
require("./index2.php");
 //echo"<pre>";print_r($_FILES);echo"<pre>";
// die();
$id = $_POST['id'];
$title = $_POST['adminName'];//标题
$author = $_POST['author'];//作者
$vedio = $_FILES['vedio'];
//var_dump($title);var_dump($author);var_dump($id);var_dump($course);die();
require('Code/JXMySQL.php');
if($vedio['error']>0){
	
	$sql=JXMySQL_Execute("update `shi-vedio` set title=?,authorid=? where id =?",array($title,$author,$id));
    $insert_id = JXMySQL_Insert($sql);
    // var_dump($insert_id);die();
    if ($insert_id) {
        return false;
        exit;
    }else{
      	header("Location:../html/video-list.php");
    }
}else{
	// echo 2;
	// die();
	$type = strrchr($vedio['name'], '.');//截取文件后缀名
	$path = "../../upload/vedio/".$vedio['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$vedio['name'];
	if(strtolower($type)=='.avi'||strtolower($type)=='.rmvb'||strtolower($type)=='.mp4'||strtolower($type)=='.flv'||strtolower($type)=='.mpg')//判断上传的文件是否为图片格式
	{
		$picname = $vedio['tmp_name'];
		move_uploaded_file($picname, $path);//将图片文件移到该目录下
		echo $path;
		
		$sql=JXMySQL_Execute("update `shi-vedio` set vedio = ?,title=?,authorid=? where id =?",array($path,$title,$author,$id));
	    $insert_id = JXMySQL_Insert($sql);
	    if ($insert_id) {
	        return false;
	    }else{
	      	header("Location:../html/video-list.php");
	        exit;
	    }
	}	
}
 ?>