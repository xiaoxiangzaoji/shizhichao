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
<title>文章列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章列表管理 <span class="c-gray en">&gt;</span> 文章管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">

	<span style="margin-left: 4px;"><a class="btn btn-primary radius" data-title="添加直播间" data-href="zhibo-add.php" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加直播间</a></span><span class="r">共有数据：<strong><?php   require("../php/config.php"); $res=mysql_query("select count(*) as total from `shi-zhibo` "); if($row=mysql_fetch_array($res)){ $num=$row['total'];}  echo $num;?></strong> 条</span> </div>


	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
                    <th width="25"><input type="checkbox" id="ckb_selectAll" onclick="this,selectAll()" title="选中/取消选中"></th>
                    <th width="40">ID</th>
                    <th width="80">封面</th>
                    <th width="80">房间id</th>
                    <th width="70">房间名称</th>
	                <th width="300">房间描述</th>
	                <th width="20">客户端登录链接</th>
	                <th width="60">状态</th>
	                <th width="60">操作</th>
                </tr>
			</thead>
			<?php 
            	require("../php/Code/JXMySQL.php");
            	JXMySQL_Execute("select * from `shi-zhibo`");
            	$list=JXMySQL_Result();
            	foreach ($list as $k => $v) {
            	 ?>
                <tr class="text-c">
	                <td><input type="checkbox" class="ckb" id="+con.id+" value="<?php  echo $v['id'] ?>"></td>
	                <td id="vid"><?php  echo $v['id'] ?></td>
	                <td><img src="<?php echo $v['banner'] ?>" alt="暂时未有封面" width="200px" height="100px"></td>
	                <td><?php  echo $v['roomid'] ?></td>
	                <td><?php echo $v['roomname'] ?></td>
	                <td><?php  echo $v['info'] ?></td>
	                <td><a href="javascript:;" onClick="myselfcontent(<?php  echo $v['id'] ?>)">查看</a></td>
	                <td>
	                	<button onclick="changestatus(<?php  echo $v['id'] ?>);" id="<?php  echo $v['status'] ?>" val="<?php  echo $v['status'] ?>">
	                	<?php 
	                	if ($v['status']==1) {
	                		echo '开启';
	                	}else{
	                		echo '关闭';
	                	}
	                	?>
	                	</button>
	            	</td>
	                <td class="f-14 td-manage"> <a style="text-decoration:none" class="ml-5"  href="zhibo-edit.php?id=<?php  echo $v['id']; ?>"   title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a></td>
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
	  {"orderable":false,"aTargets":[0,7]}// 不参与排序的列
	]
});
function myselfcontent(id){
	var ids=id;
	$.ajax({
		type:"POST",
        url:"../php/zhibourl.php",
        data:{
            newsid:ids//文章
            },
        dataType:"json",
        success:function(data){

        	layer.open({
				type: 1,
				area: ['500px','400px'],
				fix: false, //不固定
				maxmin: true,
				shade:0.4,
				title: '查看信息',
				content: '<div>'+data.Data+'</div>'
			});
        }
	})
}
function changestatus(id){
	
	//var id = $('#vid').text();
	// var status = $('#status').attr('val');
	var status = id;

	
	$.ajax({
			type: 'post',
			url: '../php/zhibostatus.php',
			dataType: 'json',
			data   : {
				Id: id
			},
			success: function(data){
				console.log(data);
				if (data.Code==0) {
					
					window.location.reload();
					
				}
			}
			
	});

}

</script>
</body>

</html>
