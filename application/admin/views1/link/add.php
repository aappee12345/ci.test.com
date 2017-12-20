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
				<a href="<?php echo site_url('/linktype/index'); ?>">友情链接管理</a>
			</li>
			<li class="active">添加友情链接</li>
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
					添加友情链接
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<form class="form-horizontal" role="form" action="<?php echo site_url('/link/add'); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('lt_name','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
					    <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="lt_name"> 所属分类 </label>
							<div class="col-sm-11">
								<select name="l_class" id="parentID1" class="form-control1">
			                        <?php foreach ($linktypelist as $linktype):?>
			                        	<?php if ($linktype['lt_id']==$lt_id):?>
			                        	<option value="<?php echo $linktype['lt_id']; ?>" <?php echo set_select('l_class', $linktype['lt_id'],true); ?>><?php echo $linktype['lt_name'];?></option>
				                        <?php else:?>
				                        <option value="<?php echo $linktype['lt_id']; ?>" <?php echo set_select('l_class', $linktype['lt_id']); ?>><?php echo $linktype['lt_name'];?></option>
				                    	<?php endif;?>
			                        <?php endforeach; ?>
			                    </select>
							</div>
						</div>
				        <div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('l_wzname','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="l_wzname"> 友情链接名称 </label>
							<div class="col-sm-11">
								<input type="text" name="l_wzname" id="l_wzname" placeholder="友情链接名称，此处必填" value="<?php  echo set_value('l_wzname'); ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="lt_width"> 链接类型 </label>
							<div class="col-sm-11">
								<label>
									<input name="l_leixing" type="radio" class="ace" <?php echo set_radio('l_leixing', 2,true); ?> value="2">
									<span class="lbl"> 文字链接</span>
								</label>
								<label>
									<input name="l_leixing" type="radio" class="ace" <?php echo set_radio('l_leixing', 1); ?> value="1">
									<span class="lbl"> 图片链接</span>
								</label>

							</div>
						</div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="l_wzlogourl"> LOGO图片 </label>
							<div class="col-sm-11">
								<input type="text" name="l_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="<?php echo $guanggao['l_wzlogourl'];?>">
								<a href="javascript:;" class="file pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
									<input type="file" name="l_wzlogourl" id="l_wzlogourl">
								</a>
								<div class="showFileName pull-left inline" style="line-height:34px;text-indent:10px;"></div>
								<div class="fileerrorTip" style="margin-left:725px;">
								</div><span id="s" style="color:red;font-size:12px;line-height:28px;">* 上传图片大小不可超过8MB</span>	
							</div>
						</div>
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('l_wzurl','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="l_wzurl"> 链接地址 </label>
							<div class="col-sm-11">
								<input type="text" name="l_wzurl" id="l_wzurl" placeholder="链接地址，此处必填" value="<?php  echo set_value('l_wzurl'); ?>" class="col-xs-10 col-sm-5">
							</div>
						</div>
						<div class="form-group" style="margin-bottom:0;">
					    	<div class="col-sm-1">
					    	</div>
					        <div class="col-sm-5">
					            <?php echo form_error('l_sort','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
					        </div>
					    </div>
				        <div class="form-group">
							<label class="col-sm-1 control-label no-padding-right" for="l_sort"> 排序号 </label>
							<div class="col-sm-11">
								<input type="text" name="l_sort" id="l_sort" placeholder="排序号，此处必填" value="<?php  echo set_value('l_sort')?set_value('l_sort'):50; ?>" class="col-xs-10 col-sm-5">
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
