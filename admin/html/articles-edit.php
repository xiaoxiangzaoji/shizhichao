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

    <form class="form form-horizontal" id="form-article-add">

    <?php
    $id = $_GET['id']; 
    require("../php/Code/JXMySQL.php");
    JXMySQL_Execute("select * from `shi-article` where id = ?",array($id));
    $lists=JXMySQL_Result();
    foreach ($lists as $k => $va) {
     ?>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="<?php echo $va['title'] ?>" placeholder="" id="adminName" name="adminName" onfocus="get()" onblur="check()" style="width:200px"><input type="text" id="check1" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>分类：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <select name="grade" id="grade" onChange="getcourse()" style="height:30px;">
                 <option value="0">请选择</option>
                <?php 
                JXMySQL_Execute("select * from `shi-grade`");
                $list=JXMySQL_Result();
                foreach ($list as $k => $v) {
                 ?>
                <option value="<?php echo $v['id'] ?>"><?php echo $v['grade'] ?></option>
                <?php } ?>
            </select>
            <select name="course" id="course" style="height:30px;">
                <option value="0">请选择</option>
            </select>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>流派：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
           <select name="school" id="school"  style="height:30px;">
                 <option value="0">请选择</option>
                <?php 
                
                JXMySQL_Execute("select * from `shi-arschool`");
                $list=JXMySQL_Result();
                foreach ($list as $k => $v) {
                 ?>
                <option value="<?php echo $v['id'] ?>"><?php echo $v['Schools'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>年代：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
           <select name="year" id="year"  style="height:30px;">
                 <option value="0">请选择</option>
                <?php 
                
                JXMySQL_Execute("select * from `shi-aryears`");
                $list=JXMySQL_Result();
                foreach ($list as $k => $v) {
                 ?>
                <option value="<?php echo $v['id'] ?>"><?php echo $v['years'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地区：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
           <select name="area" id="area"  style="height:30px;">
                 <option value="0">请选择</option>
                <?php 
                
                JXMySQL_Execute("select * from `shi-ararea`");
                $list=JXMySQL_Result();
                foreach ($list as $k => $v) {
                 ?>
                <option value="<?php echo $v['id'] ?>"><?php echo $v['area'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>热门推荐：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="radio" class="" value="0" placeholder=""  name="hot" >否
            <input  type="radio" class="" value="1" placeholder=""  name="hot" checked="checked">是
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>经典推荐：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="radio" class="" value="0" placeholder=""  name="jingdian" >否
            <input  type="radio" class="" value="1" placeholder=""  name="jingdian" checked="checked">是
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>等级：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="<?php echo $va['stars'] ?>" placeholder="" id="stars" name="stars" onfocus="getstars()" onblur="checkstars()" style="width:200px"><input type="text" id="check3" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作者：</label>
        <div class="formControls col-xs-8 col-sm-9" style="width:400px;">
            <input  type="text" class="input-text" value="<?php echo $va['author'] ?>" placeholder="" id="author" name="author" onfocus="getauthor()" onblur="checkauthor()" style="width:200px"><input type="text" id="check2" style="display:none;float:right;">
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>简介：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <script id="containers" name="contents" type="text/plain" style="width:1020px;height:200px">
            <?php echo $va['info'] ?>
        </script>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>内容：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <script id="container" name="content" type="text/plain" style="width:1020px;height:200px">
            <?php echo $va['content'] ?>
        </script>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
            <input class="btn btn-primary radius" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="tijiao();">
        </div>
    </div>
<?php } ?>
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
         window.location.href="articles-list.php"; //#设定跳转的链接地址 
        }else{
            t--; // 计数器递减 
        }
    } 
})
function getUrlParam(name){
                var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
                var r = window.location.search.substr(1).match(reg);  //匹配目标参数
                if (r!=null) return unescape(r[2]); return null; //返回参数值
        }
function getauthor(){
  $('#check2').css('display','none');  
}
function get(){
  $('#check1').css('display','none');  
}
function checkauthor(){
    var nickname = $('#adminName').val();
    if (nickname == '') {
       $('#check2').css('display','block');
       $('#check2').css('border','none');
       $('#check2').attr('value','*请填写作者');
       $('#check2').css('color','red');
        return false;
    };   
}
function check(){
    var nickname = $('#adminName').val();
    if (nickname == '') {
       $('#check1').css('display','block');
       $('#check1').css('border','none');
       $('#check1').attr('value','*请填写标题');
       $('#check1').css('color','red');
        return false;
    };   
}
function getcourse(){
    var grade= $("#grade").find("option:selected").val();
    // alert(grade);
    $.ajax({
        type:"POST",
        url:"../php/course.php",
        data:{
            id:grade
            },
        dataType:"json",
        success:function(data){
            console.log(data);
            $('#course').empty();
            var options = data.Data;
            var str ='';
            for (var i = 0; i<options.length; i++) {
                str+='<option value="'+options[i].id+'">'+options[i].course+'</option >'
            };
            $('#course').append(str);
        }
    })
}
var ue = UE.getEditor('container');
var ue2 = UE.getEditor('containers');
function tijiao(){
    var title =$('#adminName').val();
    var categroy = $('#course').val();
    var author =$('#author').val();
    var content = ue.getContent();
    var info = ue2.getContent();
    var id=getUrlParam('id');
    var school =$('#school').val();
    var year =$('#year').val();
    var area =$('#area').val();
    var stars =$('#stars').val();
    var hot =$('input[name="hot"]:checked').val();
    var jingdian =$('input[name="jingdian"]:checked').val();
    //alert(title);alert(categroy);alert(content);
    if (categroy == 0) {alert('请选择分类');return false;};
    if (school == 0) {alert('请选择流派');return false;};
    if (year == 0) {alert('请选择年代');return false;};
    if (area == 0) {alert('请选择区域');return false;};
    $.ajax({
        type:'post',
        url:'../php/articles-edit.php',
        data:{
            id:id,
            title:title,
            categroy:categroy,
            content:content,
            author:author,
            info:info,
            school:school,
            year:year,
            area:area,
            stars:stars,
            hot:hot,
            jingdian:jingdian
        },
        dataType:"json",
        success:function (data){
            if (data.Code== 0) {
                window.location.href = "./articles-list.php";
            }else{
                alert('修改失败');
            }
        }
    })
}
</script>

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>