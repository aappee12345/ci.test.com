	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>
<div class="main-content">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>

		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">首页</a>
			</li>

			<li>
				<a href="<?php echo site_url('/role/index'); ?>">角色管理</a>
			</li>
			<li class="active">权限设置</li>
		</ul>
	</div>
	<div class="page-content">
		<div class="ace-settings-container" id="ace-settings-container">
			<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
				<i class="ace-icon fa fa-cog bigger-150"></i>
			</div>
			<div class="ace-settings-box clearfix" id="ace-settings-box">
				<div class="pull-left width-50">
					<!-- #section:settings.skins -->
					<div class="ace-settings-item">
						<div class="pull-left">
							<select id="skin-colorpicker" class="hide">
								<option data-skin="no-skin" value="#438EB9">#438EB9</option>
								<option data-skin="skin-1" value="#222A2D">#222A2D</option>
								<option data-skin="skin-2" value="#C6487E">#C6487E</option>
								<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
							</select>
						</div>
						<span>&nbsp; 选择皮肤</span>
					</div>
					<div class="ace-settings-item">
						<label class="lbl" for="ace-settings-hover"> <!-- Submenu on Hover --></label>
					</div>
				</div>
			</div>
		</div>
		<div class="page-content-area">
			<div class="page-header">
				<h1>
					权限设置
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
			</div><!-- /.page-header -->
			<style>
			.form-group{border-bottom: 1px solid #eee;}
			</style>
			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" action="<?php echo site_url('/Role/auth'); ?>" method="post" enctype="multipart/form-data">
						
					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,11,12),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 基本信息</span>
							</label>
							<div class="col-sm-11" style="line-height:30px;">
								<?php if (array_intersect(array(1,11),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="11">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="11">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 网站配置</span>&nbsp;
								<?php if (array_intersect(array(1,13),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="13">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="13">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 日志列表</span>&nbsp;
								<?php if (array_intersect(array(1,12),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="12">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="12">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 日志管理</span>&nbsp;
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,21,22,23,24),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 栏目管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,21),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="21">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="21">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 栏目列表</span>&nbsp;
								<?php if (array_intersect(array(1,22),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="22">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="22">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加栏目</span>&nbsp;
								<?php if (array_intersect(array(1,23),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="23">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="23">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改栏目</span>&nbsp;
								<?php if (array_intersect(array(1,24),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="24">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="24">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除栏目</span>&nbsp;
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,31,32,33,34),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 内容管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,31),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="31">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="31">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 文章列表</span>&nbsp;
								<?php if (array_intersect(array(1,32),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="32">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="32">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加文章</span>&nbsp;
								<?php if (array_intersect(array(1,33),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="33">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="33">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改文章</span>&nbsp;
								<?php if (array_intersect(array(1,34),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="34">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="34">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除文章</span>&nbsp;
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,41,42,43,44),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 广告位管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,41),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="41">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="41">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 广告位列表</span>&nbsp;
								<?php if (array_intersect(array(1,42),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="42">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="42">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加广告位</span>&nbsp;
								<?php if (array_intersect(array(1,43),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="43">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="43">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改广告位</span>&nbsp;
								<?php if (array_intersect(array(1,44),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="44">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="44">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除广告位</span>&nbsp;
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,51,52,53,54),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 广告管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,51),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="51">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="51">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 广告列表</span>&nbsp;
								<?php if (array_intersect(array(1,52),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="52">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="52">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加广告</span>&nbsp;
								<?php if (array_intersect(array(1,53),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="53">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="53">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改广告</span>&nbsp;
								<?php if (array_intersect(array(1,54),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="54">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="54">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除广告</span>&nbsp;
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,61,62,63,64),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 友情链接管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,61),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="61">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="61">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 友情链接列表</span>&nbsp;
								<?php if (array_intersect(array(1,62),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="62">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="62">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加友情链接</span>&nbsp;
								<?php if (array_intersect(array(1,63),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="63">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="63">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改友情链接</span>&nbsp;
								<?php if (array_intersect(array(1,64),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="64">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="64">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除友情链接</span>&nbsp;
							</div>
						</div>
		
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,71,72,73,74),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 其他内容</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,71),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="71">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="71">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 其他内容列表</span>&nbsp;
								<?php if (array_intersect(array(1,72),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="72">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="72">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 添加其他内容</span>&nbsp;
								<?php if (array_intersect(array(1,73),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="73">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="73">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 修改其他内容</span>&nbsp;
								<?php if (array_intersect(array(1,74),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="74">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="74">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 删除其他内容</span>&nbsp;
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,81,82),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 留言管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,81),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="81">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="81">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 留言列表</span>&nbsp;
								<?php if (array_intersect(array(1,82),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="82">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="82">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 留言审核</span>&nbsp;
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,91,92,93,94,95),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 角色管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,91),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="91">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="91">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 角色列表</span>&nbsp;
								<?php if (array_intersect(array(1,92),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="92">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="92">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 角色添加</span>&nbsp;
								<?php if (array_intersect(array(1,93),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="93">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="93">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 角色修改</span>&nbsp;
								<?php if (array_intersect(array(1,94),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="94">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="94">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 角色删除</span>&nbsp;
								<?php if (array_intersect(array(1,95),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="95">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="95">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 权限设置</span>&nbsp;
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" style="text-align:left;"> 
								<?php if (array_intersect(array(1,96,97,98,99),$auth)): ?>
								<input type="checkbox" checked class="ace checkAll">
								<?php else: ?>
								<input type="checkbox" class="ace checkAll">
								<?php endif; ?>
								<span class="lbl"> 管理员管理</span>
							</label>
							<div class="col-sm-11">
								<?php if (array_intersect(array(1,96),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="96">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="96">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 管理员列表</span>&nbsp;
								<?php if (array_intersect(array(1,97),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="97">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="97">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 管理员添加</span>&nbsp;
								<?php if (array_intersect(array(1,98),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="98">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="98">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 管理员修改</span>&nbsp;
								<?php if (array_intersect(array(1,99),$auth)): ?>
								<input name="PID[]" type="checkbox" class="ace" checked value="99">&nbsp;&nbsp;&nbsp;
								<?php else: ?>
								<input name="PID[]" type="checkbox" class="ace" value="99">&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<span class="lbl"> 管理员删除</span>&nbsp;
							</div>
						</div>


			            <div class="row">
			                <div class="col-sm-8  col-sm-offset-1">
			                    <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>
			                    <input type="hidden" name="rid" value="<?php echo $rid;?>"/>
			                </div>
			                <div class="clearfix"></div>
			            </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
input[type=checkbox].ace{width:30px;}
input[type=checkbox].ace+.lbl1,input[type=radio].ace+.lbl1 {
	position:relative;
	display:inline-block;
	margin:0;
	line-height:20px;
	min-height:18px;
	min-width:18px;
	font-weight:400;
	cursor:pointer
}
input[type=checkbox].ace+.lbl1::before,input[type=radio].ace+.lbl1::before {
	cursor:pointer;
	font-family:fontAwesome;
	font-weight:400;
	font-size:12px;
	color:#32a3ce;
	content:"\f00c";
	background-color:#FAFAFA;
	border:1px solid #c8c8c8;
	box-shadow:0 1px 2px rgba(0,0,0,.05);
	border-radius:0;
	display:inline-block;
	text-align:center;
	height:16px;
	line-height:14px;
	min-width:16px;
	margin-right:1px;
	position:relative;
	top:-1px
}
input[type=checkbox].ace+.lbl1::before{
	display:inline-block;
	content:'\f00c';
	background-color:#F5F8FC;
	border-color:#adb8c0;
	box-shadow:0 1px 2px rgba(0,0,0,.05),inset 0 -15px 10px -12px rgba(0,0,0,.05),inset 15px 10px -12px rgba(255,255,255,.1)
}
</style>
<script>

$(".checkAll").click(function(){
	//$(this).attr('checked','checked');

	var check = $(this).attr('checked');
	if (check==undefined)
	{
		//$(this).attr('checked','checked');
		$(this).attr('checked',true);
		//判断子栏目是否未选中
		var checkson = $(this).parent().parent().find(".col-sm-11 .ace").prop('checked');
		//$(this).parent().parent().find(".col-sm-11 .ace").attr('checked','checked');
		$(this).parent().parent().find(".col-sm-11 .ace").prop('checked',true);
		$(this).parent().parent().find(".col-sm-11 .ace+.lbl").attr('class','lbl1');
	}
	else
	{
		$(this).removeAttr('checked');
		//判断子栏目是否未选中
		var checkson = $(this).parent().parent().find(".col-sm-11 .ace").prop('checked');
		//$(this).parent().parent().find(".col-sm-11 .ace").removeAttr('checked');
		$(this).parent().parent().find(".col-sm-11 .ace").prop('checked',false);
		$(this).parent().parent().find(".col-sm-11 .ace+.lbl1").attr('class','lbl');
	}
});

$(".col-sm-11 .ace").click(function(){
	var check = $(this).prop('checked');
	//alert($(this).next().attr('class'));
	//alert(check);
	//alert(check==false);

	if (check==true)
	{
		
		$(this).prop('checked',true);
		$(this).attr('checked','checked');
		$(this).next().attr('class','lbl1');
	}
	else
	{
		//alert(1);
		$(this).prop('checked',false);
		$(this).removeAttr('checked');
		$(this).next().attr('class','lbl');
	}
});


</script>
