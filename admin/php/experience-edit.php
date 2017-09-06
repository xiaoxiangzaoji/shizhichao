<?php 

require("./index2.php");
$title=$_POST['adminName'];//标题
$id= $_POST['id'];
$nickname = $_POST['nickname'];//发布人
$author=$_POST['author'];
$stars = $_POST['stars'];
$content=$_POST['content'];
require('Code/JXMySQL.php');
$img = $_FILES['headimg'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
	if($img['error']>0){
		
		$sql=JXMySQL_Execute("update `shi-experience` set
				title=?,content=?,nickname=?,author=?,stars=? where id =?",
				array($title,$content,$nickname,$author,$stars,$id));
		    $insert_id = JXMySQL_Insert($sql);
		    if ($insert_id) {
		        echo false;
		    }else{
		      	header("Location:../html/experience-list.php"); 
		        exit;
		    }
	}else{
		
		$type = strrchr($img['name'], '.');//截取文件后缀名
		$path = "../../upload/experience/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
		if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
		{
			$picname = $img['tmp_name'];

			move_uploaded_file($picname, $path);//将图片文件移到该目录下
			// echo $path;
			$url=$path;
			
			$sql=JXMySQL_Execute("update `shi-experience` set 
				title=?,content=?,nickname=?,headimg=?,author=?,stars=? where id =?",
				array($title,$content,$nickname,$url,$author,$stars,$id));
		    $insert_id = JXMySQL_Insert($sql);
		    if ($insert_id) {
		        
		    	echo false;
		    }else{
		      	header("Location:../html/experience-list.php"); 
		        exit;
		    }

		}
	}
}
 ?>