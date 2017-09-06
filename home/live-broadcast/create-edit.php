<?php
//创建直播间
$id=$_POST['idd'];
$img = $_FILES['banners'];//获取到表单过来的文件变量，uploadImg为表单id
$roomid=$_POST['zhiboid'];
$roomname= $_POST['roomname'];//房间名
$teacherpwd =$_POST['teacherpwd'];//讲师密码
$assistant=$_POST['assistant'];//助教密码
$info = $_POST['content'];
require("./live.php");
require("../pc/Code/JXMySQL.php");
require("../pc/Code/JXReturn.php");
header("content-type:text/html;charset=utf-8");
$url = "http://api.csslcloud.net/api/room/update";
$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
$data = array('userid'=>urlencode('3E817DE5CEF11904'),
			'roomid'=>urldecode($roomid),
			'name'=>$roomname,
			'desc'=>$info,
			'authtype'=>urlencode('2'),
			'publisherpass'=>$teacherpwd,
			'assistantpass'=>$assistant,
			'checkurl'=>urlencode(''),
			'playpass'=>urlencode(''),
			'barrage'=>urlencode('0'),
			'openlowdelaymode'=>urlencode('1'),
			'showusercount'=>urlencode('0'),
		);  //定义参数  
$dataurl = Lives($data,$apikey);
$result = file_get_contents($url.'?'.$dataurl);
//print_r($result);die();
$arr = json_decode($result,true);
if ($arr) {	
	if(isset($img)){
		if($img['error']>0){
			JXMySQL_Execute("update `shi-zhibo` set publisherpass=?,assistantpass=?,roomname=?,info=? where 
				id=?",array($teacherpwd,$assistant,$roomname,$info,$id));
			$list = JXMySQL_Affect();
			if ($list) {
				JXReturn_Json(0,'成功');
			}else{
				JXReturn_Json(1,'失败');
			}
		}else{
			$type = strrchr($img['name'], '.');//截取文件后缀名
			$path = "../../upload/zhibo/".$img['name'];//设置路径：当前目录下的uploads文件夹并且图片名称为$img['name'];
			if(strtolower($type)=='.png'||strtolower($type)=='.jpg'||strtolower($type)=='.bmp'||strtolower($type)=='.gif'||strtolower($type)=='.jpeg')//判断上传的文件是否为图片格式
			{
				$picname = $img['tmp_name'];

				move_uploaded_file($picname, $path);//将图片文件移到该目录下
				//echo $path;
				$banner=$path;			
				JXMySQL_Execute("update `shi-zhibo` set banner=?,publisherpass=?,assistantpass=?,roomname=?,info=? where 
				id=?",array($banner,$teacherpwd,$assistant,$roomname,$info,$id));
				$list = JXMySQL_Affect();
			    if ($list) {
					JXReturn_Json(0,'成功');
				}else{
					JXReturn_Json(1,'失败');
				}
			}
		}
	}
}

?>