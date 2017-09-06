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

<title>添加直播间</title>
</head>
<body>
<style>
  .edui-editor-breadcrumb{display:none;}  
</style>
<article class="page-container">

    <form class="form form-horizontal" id="form-article-add" ENCTYPE="multipart/form-data" method= "post" >

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播间名称：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="" placeholder="请输入直播间名称40个字以内" id="roomname" name="roomname" onfocus="get()" onblur="check()" style="width:200px" maxlength="40"><input type="text" id="check1" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>直播间首图：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <input type="file"  value="" placeholder="" id="banner" name="banner"><span style="color:red">如果图片不能显示请修改文件为数字或者字母加.jpg的形式</span>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>讲师登录密码：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="" placeholder="请输入讲师密码" id="teacherpwd" name="teacherpwd"  style="width:200px" maxlength="40">
        </div>
    </div><div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>助教登录密码：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="" placeholder="请输入助教密码" id="assistant" name="assistant"  style="width:200px" maxlength="40">
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
            <input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;创建&nbsp;&nbsp;" onclick="submit_ajax();">
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
function get(){
  $('#check1').css('display','none');  
}
function check(){
    var nickname = $('#roomname').val();
    if (nickname == '') {
       $('#check1').css('display','block');
       $('#check1').css('border','none');
       $('#check1').attr('value','*请填写直播间名称');
       $('#check1').css('color','red');
        return false;
    };   
}
var ue = UE.getEditor('container');           
function submit_ajax(){
    var form = new FormData(document.getElementById("form-article-add"));
    $.ajax({
        url: '../../home/live-broadcast/create.php',
        type: "post",
        data: form,
        processData: false,
        contentType: false,
        success: function(data){
            // var obj = JSON.parse(data); //由JSON字符串转换为JSON对象
            console.log(data);
            
            window.location.href = "./zhibo.php";
                      
        }
    })
}

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>