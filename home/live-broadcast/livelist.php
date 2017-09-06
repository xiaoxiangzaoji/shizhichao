<?php
//例子
	$url = "http://api.csslcloud.net/api/room/info";
	$apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
	$data = array('userid'=>urlencode('3E817DE5CEF11904'),'pagenum'=>urlencode('50'),'pageindex'=>urlencode('2'));  //定义参数  
	$data = @http_build_query($data);
	$datau = explode('&', $data);
	sort($datau);
	$datasort = implode($datau,'&');
	$datasortp = $datasort."&time=".time()."&salt=".$apikey;
	$datamd5 = md5($datasortp);
	$dataurl = $datasort."&time=".time()."&hash=".strtoupper($datamd5);

	$result = file_get_contents($url.'?'.$dataurl);

	print_r($result);

	
?>