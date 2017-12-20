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
							<a href="<?php echo site_url('/ad/index'); ?>">广告位管理</a>
						</li>
						<li class="active">修改广告位</li>
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
								修改广告位
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="<?php echo site_url('/ad/update'); ?>" method="post" enctype="multipart/form-data">
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('ad_name','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
								    <div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="ad_name"> 广告位名称 </label>
										<div class="col-sm-11">
											<input type="text" name="ad_name" id="ad_name" placeholder="必填" value="<?php echo set_value('ad_name')?set_value('ad_name'):$ad['ad_name']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
							        <div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('ad_size_w','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
							        <div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="ad_size_w"> 广告位宽度 </label>
										<div class="col-sm-11">
											<input type="text" name="ad_size_w" id="ad_size_w" placeholder="宽度请填写正整数" value="<?php echo set_value('ad_size_w')?set_value('ad_size_w'):$ad['ad_size_w']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('ad_size_h','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
							        <div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="ad_size_h"> 广告位高度 </label>
										<div class="col-sm-11">
											<input type="text" name="ad_size_h" id="ad_size_h" placeholder="高度请填写正整数" value="<?php echo set_value('ad_size_h')?set_value('ad_size_h'):$ad['ad_size_h']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
							        
						            <div class="row">
						                <div class="col-sm-8  col-sm-offset-1">
						                    <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>
											<input type="hidden" name="ad_id" value="<?php echo $ad['ad_id'];?>">
						                </div>
						                <div class="clearfix"> </div>
						            </div>
							    </form>
							</div>
						</div>
					</div>
				</div>
			</div>


