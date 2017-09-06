<?php 
require("./index2.php");
// echo"<pre>";print_r($_FILES);echo"<pre>";
// die();
$title = $_POST['adminName'];//标题
$author = $_POST['author'];//作者
$stars = $_POST['stars'];
$audio = $_FILES['audio'];
$time = date('Y-m-d H:i:s',time());

//var_dump($title);var_dump($author);var_dump($course);die();
require('Code/JXMySQL.php');
if($audio['error']>0){
	
	$sql=JXMySQL_Execute("insert into `shi-audio` (audio,title,authorid,time,read_num,stars) values(?,?,?,?,?,?)",array('',$title,$author,$time,0,$stars));
    $insert_id = JXMySQL_Insert($sql);
    // var_dump($insert_id);die();
    if ($insert_id) {
        header("Location:../html/audio-list.php");
        exit;
    }else{
      	echo false;
    }
}else{

	$type = strrchr($audio['name'], '.');//截取文件后缀名
	$path = "../../upload/audio/".$audio['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$vedio['name'];
	if(strtolower($type)=='.wav'||strtolower($type)=='.mp3'||strtolower($type)=='.ogg')//判断上传的文件是否为图片格式
	{
		$picname = $audio['tmp_name'];
		move_uploaded_file($picname, $path);//将图片文件移到该目录下
		echo $path;
			
		$sql=JXMySQL_Execute("insert into `shi-audio` (audio,title,authorid,time,read_num,stars) values(?,?,?,?,?,?)",array($path,$title,$author,$time,0,$stars));
	    $insert_id = JXMySQL_Insert($sql);
	    if ($insert_id) {
	        header("Location:../html/audio-list.php");
	        exit;
	    }else{
	      	echo false;
	    }
	}	
}
 ?>