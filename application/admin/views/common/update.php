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
				<a href="<?php echo site_url('/common/index'); ?>">其他内容列表</a>
			</li>
			<li class="active">修改其他内容</li>
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
					修改其他内容
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" action="<?php echo site_url('/common/update'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('co_title','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="co_title"> 标题 </label>
							<div class="col-sm-11">
								<input type="text" name="co_title" id="co_title" placeholder="必填" value="<?php echo set_value('co_title')?set_value('co_title'):$common['co_title']; ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>
				       
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="ad_size_w"> 图片 </label>
							<div class="col-sm-11">
								<input type="text" name="co_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="<?php echo strstr($common['co_pic'],'/upload');?>">
								<a href="javascript:;" class="file pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
									<input type="file" name="co_pic" id="co_pic">
								</a>
								<div class="showFileName pull-left inline" style="line-height:34px;text-indent:10px;"></div>
								<div class="fileerrorTip" style="margin-left:725px;">
								</div><span id="s" style="color:red;font-size:12px;line-height:28px;">* 上传图片大小不可超过8MB</span>	
							</div>
						</div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="co_description"> 简介 </label>
							<div class="col-sm-11">
								<textarea rows="3" name="co_description" id="co_description" style="width:700px;height:250px;" placeholder="此处选填" ><?php  echo set_value('co_description')?set_value('co_description'):$common['co_description']; ?></textarea>
	                		</div>
						</div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="co_content"> 内容 </label>
							<div class="col-sm-11">
								<textarea rows="3" name="co_content" id="co_content" class="col-xs-12 col-sm-6"  placeholder="此处选填" ><?php  echo set_value('co_content')?set_value('co_content'):$common['co_content']; ?></textarea>
	                		</div>
						</div>
			            <div class="row">
			                <div class="col-sm-8  col-sm-offset-1">
			                    <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>
								<input type="hidden" name="co_id" value="<?php echo $common['co_id'];?>"/>
			                </div>
			                <div class="clearfix"> </div>
			            </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<script type="text/javascript" src="<?php echo base_url();?>editor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>editor/ueditor.all.js"></script>
-->

<script type="text/javascript">
    /*
    var editor = new UE.ui.Editor({ initialFrameWidth:950,initialFrameHeight:400,scaleEnabled:true });
    editor.render("co_content");
    */
      KindEditor.ready(function(K){
        editor=K.create('#co_content',{
            allowFileManager : true,
            height:350,
        });
        
    });
</script>
