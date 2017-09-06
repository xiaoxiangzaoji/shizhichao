<?php
 //判断session
header("content-type:text/html;charset=utf-8");
   session_start();
    if(!isset($_SESSION['username'])){
     header("Location:./html/index.php");
      exit();
 }

?>
<html>
<head>

<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>订阅直播列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订阅直播列表管理 <span class="c-gray en">&gt;</span> 订阅直播管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
	<?php $id=$_GET['id']; ?>
	<span class="l"><a  style="text-decoration:none href="javascript:;" onclick="this,del_()"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span><span class="r">共有数据：<strong><?php   $id = $_GET['id'];require("../php/config.php"); $res=mysql_query("select count(*) as total from `shi-subscribe-zhibo` where customer = $id"); if($row=mysql_fetch_array($res)){ $num=$row['total'];}  echo $num;?></strong> 条</span> </div>


	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
	    <thead>
	      <tr class="text-c">
	        <th width="25"><input type="checkbox" id="ckb_selectAll" onclick="this,selectAll()" title="选中/取消选中"></th>
	        <th width="40">ID</th>
	        <th width="200">房间</th>
	        <th>用户</th>
	       	<th width="70">操作</th>
	      </tr>
	    </thead>
    <tbody>
	<?php
		$id = $_GET['id']; 
    	require("../php/Code/JXMySQL.php");
    	JXMySQL_Execute("SELECT z.id as zid,roomid,nickname from  `shi-subscribe-zhibo` as z
						LEFT JOIN `shi-custmoer` as c 
						ON z.customer=c.id
						WHERE customer = ?",array($id));
    	$list=JXMySQL_Result();
    	
    	foreach ($list as $k => $v) {
    	 ?>
      <tr class="text-c">
        <td><input type="checkbox" class="ckb" id="+con.id+" value="<?php  echo $v['zid'] ?>"></td>
        <td><?php  echo $v['zid'] ?></td>
        <td><?php echo $v['roomid'] ?></td>          
        <td><?php echo $v['nickname'] ?></td>
        <td><a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php  echo $v['id'] ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"StateSave": false,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,3]}// 不参与排序的列
	]
});

function myselfinfo(id){
	var ids=id;
	$.ajax({
		type:"POST",
        url:"../php/audioinfo.php",

        data:{
            newsid:ids//文章
            },
        dataType:"json",
        success:function(data){
        	layer.open({
				type: 1,
				area: ['550px','100px'],
				fix: false, //不固定
				maxmin: true,
				shade:0.4,
				title: '如果无法播放，可能是没有上传文件或者格式不对建议使用MP3格式',				
				content:'<audio controls><source src="'+data.Data[0].audio+'" type="audio/mpeg"><source src="'+data.Data[0].audio+'" type="audio/ogg">您的浏览器不支持 audio 元素。</audio>'
			});
        }
	})
}

/*资讯-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*资讯-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

function article_del(obj,id){
	/*var Id = id;
	alert(Id); return false;*/
	layer.confirm('确认要删除吗？',function(index){

		$.ajax({
			type: 'GET',
			url: '../php/subscribe-zhibo_del.php',
			dataType: 'json',
			data   : {Id: id},
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				//console.log(data.msg);
               $(obj).parents("tr");
//				layer.msg('删除失败!',{icon:2,time:1000});
			},
		});
	});
}
 //批量删除
 function selectAll(obj,id){
 	 if($('#ckb_selectAll').is(':checked')){
 	 	  $(".ckb").attr("checked",true);//全选
 	 }else{
 	 	  $(".ckb").attr("checked",false); //取消
 	 }
 }
 function del_(obj,id) {
  var ids = '';
  //alert(ids);
  $(".ckb").each(function() {
    if ($(this).is(':checked')) {
      ids += ',' + $(this).val(); //逐个获取id
    }
  });
  ids = ids.substring(1); // 对id进行处理，去除第一个逗号
  if (ids.length == 0) {
    alert('请选择要删除的选项');
  } else {
    if (layer.confirm('确认要删除吗？',function(index){
      url = "ids=" + ids;
      $.ajax({
        type: "GET",
        url: "../php/subscribe-zhibo_dels.php",
        data: url,
        dataType:"json",
       success: function(data){
				/*$(obj).parents("tr").remove(); */ //隐藏失败
				if(data.code==1){
					$('.text-c th input').prop('checked', false);
	                  var checked=document.body.querySelectorAll("input[type='checkbox']");
					var checklength=checked.length;
					for (var i=0;i<checklength;i++) {
						if(checked[i].checked == true){
							checked[i].parentNode.parentNode.remove();
						}
					}
					layer.msg('已删除!',{icon:1,time:1000});
					//window.location.reload();    //只能刷新了
				}else if(data.code==2){
					layer.msg('删除失败!',{icon:2,time:1000});
				}

			}
		});
    }));
}
}
</script>
</body>

</html>
