<?php
//创建直播间
$img = $_FILES['banner'];//获取到表单过来的文件变量，uploadImg为表单id
$roomname= $_POST['roomname'];//房间名
$teacherpwd =$_POST['teacherpwd'];//讲师密码
$assistant=$_POST['assistant'];//助教密码
$info = $_POST['content'];
require("./live.php");
require("../pc/Code/JXMySQL.php");
require("../pc/Code/JXReturn.php");
header("content-type:text/html;charset=utf-8");
$url = "http://api.csslcloud.net/api/room/create";
$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
$data = array('userid'=>urlencode('3E817DE5CEF11904'),
			'name'=>$roomname,
			'desc'=>$info,
			'templatetype'=>urlencode('5'),
			'playpass'=>urlencode(''),
			'checkurl'=>urlencode(''),
			'authtype'=>urlencode('2'),
			'publisherpass'=>urlencode($teacherpwd),
			'assistantpass'=>urlencode($assistant),
			'barrage'=>urlencode('0'),
			'foreignpublish'=>urlencode('0'),
			'openlowdelaymode'=>urlencode('1'),
			'showusercount'=>urlencode('0'),
			'openhostmode'=>urlencode('0')
		);  //定义参数  
$dataurl = Lives($data,$apikey);
$result = file_get_contents($url.'?'.$dataurl);
$arr = json_decode($result,true);
$id = $arr['room']['id'];

$lookurl = "https://view.csslcloud.net/api/view/lecturer?roomid=".$id."&userid=3E817DE5CEF11904";
if ($id) {	
	if(isset($img)){
		if($img['error']>0){
			JXMySQL_Execute("insert into `shi-zhibo` (banner,roomid,publisherpass,assistantpass,roomname,info,status,lookurl) 
				values(?,?,?,?,?,?,?,?)",array('',$id,$teacherpwd,$assistant,$roomname,$info,'1',$lookurl));
			$list = JXMySQL_Insert();
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
				JXMySQL_Execute("insert into `shi-zhibo` (banner,roomid,publisherpass,assistantpass,roomname,info,status,lookurl) 
					values(?,?,?,?,?,?,?,?)",array($banner,$id,$teacherpwd,$assistant,$roomname,$info,'1',$lookurl));
				$list = JXMySQL_Insert();
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