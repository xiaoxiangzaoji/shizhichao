<?php 
//获取直播间模板信息
require("./live.php");
header("content-type:text/html;charset=utf-8");
$url = "http://api.csslcloud.net/api/viewtemplate/info";
$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
$data = array('userid'=>urlencode('3E817DE5CEF11904'),
		);  //定义参数  
$dataurl = Lives($data,$apikey);
$result = file_get_contents($url.'?'.$dataurl);
print_r($result);






 ?>