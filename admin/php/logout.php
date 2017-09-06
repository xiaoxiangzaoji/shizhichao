<?php
 //退出页面
require("./index2.php");
require("/Code/JXMySQL.php");
$ip = $_SESSION['ip'];
$time = $_SESSION['time'];
$times = $_SESSION['times'] + 1;
//var_dump($_SESSION['times']);die();
$sqls= JXMySQL_Execute("update `shi-admin` set last_loginip = ?,last_logintime = ?,times = ? where id = 1",array($ip,$time,$times));
JXMySQL_Affect($sqls);
header("content-type:text/html;charset=utf-8");
  


     unset($_SESSION['username']);
     unset($_SESSION['ip']);
     unset($_SESSION['time']);
     session_destroy();
//返回到登录页面
    echo "<script>

         window.location.href='../html/index.php';
    </script>";
