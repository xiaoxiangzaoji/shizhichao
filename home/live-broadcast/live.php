<?php 
//加密算法函数
function Lives($data,$apikey){//$data是数组
	$data = @http_build_query($data);
	$datau = explode('&', $data);
	sort($datau);
	$datasort = implode($datau,'&');
	$datasortp = $datasort."&time=".time()."&salt=".$apikey;
	$datamd5 = md5($datasortp);
	$dataurl = $datasort."&time=".time()."&hash=".strtoupper($datamd5);
	return $dataurl;
}






 ?>