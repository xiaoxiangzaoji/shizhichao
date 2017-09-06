<?php 

require("./index2.php");

$img = $_FILES['banner'];//获取到表单过来的文件变量，uploadImg为表单id
if(isset($img))
{
//上传成功$img中的属性error为0，当error>0时则上传失败有一下几种情况
if($img['error']>0){
$error = '上传失败';
switch('error'){
case 1: 
$error.='大小超过了服务器设置的限制！';
break;
case 2: 
$error.='文件大小超过了表单设置的限制！';
break;
case 3: 
$error.='文件只有部分被上传';
break;
case 4: 
$error.='没有文件被上传';
break;
case 6: 
$error.='上传文件的临时目录不存在！';
break;
case 7: 
$error.='写入失败';
break;
default: 
$error.='未知错误';
break;
}
exit($error);//在php页面输出错误
header("Location:../html/banner-list.php");
}else{
$type = strrchr($img['name'], '.');//截取文件后缀名
$path = "../../upload/banner/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
{
	$picname = $img['tmp_name'];

	move_uploaded_file($picname, $path);//将图片文件移到该目录下
	echo $path;
	
	$banner=$path;//头像
	
	require('Code/JXMySQL.php');

	$sql=JXMySQL_Execute("insert into `shi-banner` (banner) values(?)",array($banner));
    $insert_id = JXMySQL_Insert($sql);
    if ($insert_id) {
        header("Location:../html/banner-list.php"); 
        exit;
    }else{
      	echo false;
    }

}
}
}
 ?>