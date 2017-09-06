<?php 

require("./index2.php");
require('Code/JXMySQL.php');
$nickname=$_POST['adminName'];//名称
$info=$_POST['content'];
$stars = $_POST['stars'];
$cate = $_POST['cate'];
$img = $_FILES['headimg'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
if($img['error']>0){
	$sql=JXMySQL_Execute("insert into `shi-readers` (teachername,headimg,info,stars,cate) values(?,?,?,?,?)",array($nickname,'',$info,$stars,$cate));
    $insert_id = JXMySQL_Insert($sql);
    if ($insert_id) {
        header("Location:../html/teacher-list.php"); 
        exit;
    }else{
      	echo false;
    }

header("Location:../html/teacher-list.php");
}else{
	$type = strrchr($img['name'], '.');//截取文件后缀名
	$path = "../../upload/readers/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
	if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
	{
		$picname = $img['tmp_name'];

		move_uploaded_file($picname, $path);//将图片文件移到该目录下
		echo $path;
		$headimg = $path;
		
		
		$sql=JXMySQL_Execute("insert into `shi-readers` (teachername,headimg,info,stars,cate) values(?,?,?,?,?)",array($nickname,$headimg,$info,$stars,$cate));
	    $insert_id = JXMySQL_Insert($sql);
	    if ($insert_id) {
	        header("Location:../html/teacher-list.php"); 
	        exit;
	    }else{
	      	echo false;
	    }

	}
}
}
 ?>