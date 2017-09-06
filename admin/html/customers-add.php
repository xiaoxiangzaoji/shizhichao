<?php
 //判断session
header("content-type:text/html;charset=utf-8");
   session_start();
    if(!isset($_SESSION['username'])){
     header("Location:./html/index.php");
      exit();
 }

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="lib\webuploader\0.1.5\webuploader.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>添加</title>
</head>
<body>
<style>
  .edui-editor-breadcrumb{display:none;}  
</style>
<article class="page-container">

    <form class="form form-horizontal" id="form-article-add" ENCTYPE="multipart/form-data" method= "post" action= "../php/customers-add.php">

        <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="file"  value="" placeholder="" id="headimg" name="headimg">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>昵称：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="" placeholder="" id="adminName" name="adminName" onfocus="get()" onblur="check()" style="width:200px"><input type="text" id="check1" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input type="password" class="input-text" value="" placeholder="" id="password" name="password" onfocus="getpass()" onblur="checkpass()" style="width:200px"><input type="text" id="check2" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>电话：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input type="text" class="input-text" value="" placeholder="" id="phone" name="phone" onfocus="getphone()" onblur="checkphone()" style="width:200px"><input type="text" id="check3" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>地址：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input type="text" class="input-text" value="" placeholder="" id="address" name="address">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>简介：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <script id="container" name="content" type="text/plain" style="width:1020px;height:200px">
        </script>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="checkinfo()">
        </div>
    </div>

    </form>

</article>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>



<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    var t=1;//设定跳转的时间 
    function refer(){  
        if(t==0){ 
         window.location.href="article-list.php"; //#设定跳转的链接地址 
        }else{
            t--; // 计数器递减 
        }
    } 
})
function getphone(){
  $('#check3').css('display','none');  
}
function getpass(){
  $('#check2').css('display','none');  
}
function get(){
  $('#check1').css('display','none');  
}
function check(){
    var nickname = $('#adminName').val();
    if (nickname == '') {
       $('#check1').css('display','block');
       $('#check1').css('border','none');
       $('#check1').attr('value','*请填写昵称');
       $('#check1').css('color','red');
        return false;
    };   
}
function checkpass(){
    var password = $('#password').val();
    if (password == '') {
       $('#check2').css('display','block');
       $('#check2').css('border','none');
       $('#check2').attr('value','*请填写密码');
       $('#check2').css('color','red');
        return false;
    };   
}
function checkphone(){
    var phone = $('#phone').val();
    if (phone == '') {
       $('#check3').css('display','block');
       $('#check3').css('border','none');
       $('#check3').attr('value','*请填写电话');
       $('#check3').css('color','red');
        return false;
    };   
}
function checkinfo(){
    var nickname = $('#adminName').val();
    var password = $('#password').val();
    var phone = $('#phone').val();
    if (nickname =='' ||password ==''||phone =='') {
        alert('请填写完整');
        return false;
    };
}
</script>
<script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>