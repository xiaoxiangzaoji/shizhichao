<?php
//error_reporting(-1);
error_reporting(E_ERROR);
ob_start();
session_start();

if(empty($_POST['username'])){
 exit();
 }
if(empty($_POST['password'])){
exit();
}

$username = htmlspecialchars($_POST['username']);
$password = MD5($_POST['password']);
 //包含数据库连接文件
 include('/Code/JXMySQL.php');

//检测用户名及密码是否正确
$sql =JXMySQL_Execute("select * from `shi-admin` where username='$username' and password='$password' ");
$result1=JXMySQL_Result($sql);
$times = $result1['0']['times'];
//var_dump($times);die();
$ip = $_SERVER['REMOTE_ADDR'];
$time = date('Y-m-d H:i:s',time());
 if(!$result1){
      //登录成功

          $result=array(

                "code"=>202,
                "message"=>'登录失败',

                       );
         echo json_encode($result);


    } else {
      $_SESSION['username'] = $username;
      $_SESSION['ip'] = $ip;
      $_SESSION['time'] = $time;
      $_SESSION['times'] = $times;
            $result=array(
               "code"=>200,
               "message"=>'登录成功',
             );
            echo json_encode($result);
    }







