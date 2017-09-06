<?php
//获取回放信息 
require("./live.php");
header("content-type:text/html;charset=utf-8");
$liveid=$_POST['liveid'];//直播id
$url = "http://api.csslcloud.net/api/live/search";
$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
$data = array('userid'=>urlencode('3E817DE5CEF11904'),
			'liveid'=>urlencode($liveid)			
		);  //定义参数  
$dataurl = Lives($data,$apikey);
$result = file_get_contents($url.'?'.$dataurl);
print_r($result);








 ?>