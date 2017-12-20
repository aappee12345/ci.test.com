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
				<a href="<?php echo site_url('/role/index'); ?>">基本信息</a>
			</li>
			<li class="active">地区管理</li>
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
					添加地区
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" action="<?php echo site_url(array('Area','addson')); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('area_name','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="area_name"> 地区名称 </label>
							<div class="col-sm-11">
								<input type="text" name="area_name" id="area_name" placeholder="必填" value="<?php echo set_value('area_name'); ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="area_pinyin"> 地区拼音 </label>
							<div class="col-sm-11">
								<input type="text" name="area_pinyin" id="area_pinyin" placeholder="必填" value="<?php echo set_value('area_pinyin'); ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>

					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="area_pid"> 所属省份 </label>
							<div class="col-sm-11">
								<select name="area_pid" id="parentID1" class="parent form-control1" style="width:auto;margin-right:10px;">
			                    	<?php if ($cid!=0): ?>
			                    	<option value="0">省级城市</option>
				                    <?php else: ?>
				                    <option selected value="0">省级城市</option>
				                	<?php endif; ?>
			                        <?php foreach ($topareas as $area): ?>
			                        	<?php if ($area['area_id']==$area_pid): ?>
											<option value="<?php echo $area['area_id']; ?>" selected><?php echo $area['area_name'];?></option>
				                        <?php else: ?>
											<option value="<?php echo $area['area_id']; ?>"><?php echo $area['area_name'];?></option>
				                    	<?php endif; ?>
			                        <?php endforeach; ?>
			                    </select>
							</div>
						</div>
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('area_sort','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
						<div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="area_sort"> 地区排序 </label>
							<div class="col-sm-1">
								<input type="text" name="area_sort" id="area_sort" value="<?php echo set_value('area_sort')?set_value('area_sort'):50; ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>
			            <div class="row">
			                <div class="col-sm-8  col-sm-offset-1">
			                    <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>
			                </div>
			                <div class="clearfix"> </div>
			            </div>
				    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#area_name").blur(function(){
	var name = $(this).val();
	$.ajax({
		'type':'POST',
		'url':"/admin.php/area/ajaxpinyin",// 跳转到 action    
		'data':{name:name},
		'dataType':'text',
		'success':function(msg){
			$("#area_pinyin").val(msg);
		}
	});
});
</script>