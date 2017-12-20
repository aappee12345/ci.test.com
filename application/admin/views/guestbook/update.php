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
				<a href="<?php echo site_url('/Main/index'); ?>">首页</a>
			</li>

			<li>
				<a href="<?php echo site_url('/guestbook/index').'/'.$guestbook['g_id']; ?>">留言管理</a>
			</li>
			<li class="active">留言审核</li>
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
					留言审核
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" action="<?php echo site_url('/guestbook/update'); ?>" method="post" enctype="multipart/form-data">
					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="g_title"> 姓名 </label>
							<div class="col-sm-11">
								<input disabled="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="<?php  echo $guestbook['g_name']; ?>">
							</div>
						</div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="g_link"> 标题 </label>
							<div class="col-sm-11">
								<input disabled="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="<?php  echo $guestbook['g_title']; ?>">
							</div>
						</div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="g_path"> 内容 </label>
							<div class="col-sm-11">
								<textarea disabled="" style="width:645px;height:200px;"><?php  echo $guestbook['g_content']; ?></textarea>

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="g_sort"> 留言时间 </label>
							<div class="col-sm-11">
								<input disabled="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="<?php  echo date('Y-m-d H:i:s',$guestbook['created_at']); ?>">
							</div>
						</div>
			            <div class="row">
			                <div class="col-sm-8 col-sm-offset-1">
								<?php if ($guestbook['g_status']==0): ?>
			                    <input type="submit" name="submit" class="btn btn-sm btn-primary warning_3" value="确认审核"/>
									<?php else: ?>
								<input type="submit" name="submit" class="btn btn-sm btn-danger warning_3" value="取消审核"/>
								<?php endif; ?>
								<a class="btn btn-sm btn-primary warning_3" href="<?php echo site_url('/guestbook/index'); ?>">返回列表页</a>
								<input type="hidden" name="g_id" value="<?php echo $guestbook['g_id'];?>"/>
			                </div>
			                <div class="clearfix"> </div>
			            </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
