<?php
//获取回放列表 
require("./live.php");
header("content-type:text/html;charset=utf-8");
$roomid = $_POST['roomid'];//房间id
$page=$_POST['pageindex'];
$url = "http://api.csslcloud.net/api/live/info";
$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
$data = array('userid'=>urlencode('3E817DE5CEF11904'),
			'roomid'=>urlencode($roomid),
			'pagenum'=>urlencode('10'),
			'pageindex'=>urlencode($page)
		);  //定义参数  
$dataurl = Lives($data,$apikey);
$result = file_get_contents($url.'?'.$dataurl);
print_r($result);








 ?>