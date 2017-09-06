<?php
//获取正在直播的直播间列表
// require("./live.php");
// header("content-type:text/html;charset=utf-8");
// $url = "http://api.csslcloud.net/api/rooms/broadcasting";
// $apikey = "xBV735AUNR4e6DAl17PdXT8r636RFHqF";
// $data = array('userid'=>urlencode('3E817DE5CEF11904')	
// 		);  //定义参数  
// $dataurl = Lives($data,$apikey);
// $result = file_get_contents($url.'?'.$dataurl);
// print_r($result);
require("../pc/Code/JXMySQL.php");
require("../pc/Code/JXReturn.php");

$num  = isset($_POST['num'])?$_POST['num']:4;//显示数值
$source = isset($_POST['source'])?$_POST['source']:1;//页数
JXMySQL_Execute("select count(id) as val from `shi-zhibo` where status=1 ");
$sql = JXMySQL_Result();//总记录数
$page = ceil($sql['0']['val']/$num);//总页数
$limit = ($source-1)*$num;//起始记录
JXMySQL_Execute("select * from `shi-zhibo`
				where status=1 order by id DESC limit ?,? ",array($limit,$num));
$sqls = JXMySQL_Result();
$sqls['page']=$page;
JXReturn_Json(0,$sqls);







 ?>