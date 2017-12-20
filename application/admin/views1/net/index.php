
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
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
							<a href="<?php echo site_url('/Net/index'); ?>">基本信息</a>
						</li>
						<li class="active">网站配置</li>
					</ul><!-- /.breadcrumb -->

				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<!-- #section:settings.box -->
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
									<!-- <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" /> -->
									<label class="lbl" for="ace-settings-hover"> <!-- Submenu on Hover --></label>
								</div>
							</div><!-- /.pull-left -->
		
							
						</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

					<!-- /section:settings.box -->
					<div class="page-content-area">
						<div class="page-header">
							<h1>
								网站配置
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									网站信息
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
									
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('n_name','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-xs-1 control-label no-padding-right" for="n_name"> 网站标题 </label>
										<div class="col-xs-11">
											<input type="text" name="n_name" id="n_name" placeholder="必填" value="<?php echo set_value('n_name')?set_value('n_name'):$net['n_name']; ?>" class="col-xs-8">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('n_keys','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_keys"> 网站关键字 </label>
										<div class="col-xs-11">
											<textarea style="width:66.666%;height:28px;" class="form-control col-xs-7" name="n_keys" id="n_keys" placeholder="必填"><?php echo set_value('n_keys')?set_value('n_keys'):$net['n_keys']; ?></textarea>
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('n_description','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_description"> 网站描述 </label>
										<div class="col-xs-11">
											<textarea class="form-control col-xs-7" name="n_description" id="n_description" style="width:66.666%;height:56px;" placeholder="必填"><?php echo set_value('n_description')?set_value('n_description'):$net['n_description']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_copy"> 版权信息 </label>
										<div class="col-sm-11">
											<input type="text"  name="n_copy" id="n_copy" placeholder="选填" value="<?php echo set_value('n_copy')?set_value('n_copy'):$net['n_copy']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_beian"> 备案号 </label>
										<div class="col-sm-11">
											<input type="text" name="n_beian" id="n_beian" placeholder="选填" value="<?php echo set_value('n_beian')?set_value('n_beian'):$net['n_beian']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_co_name"> 公司名称 </label>
										<div class="col-sm-11">
											<input type="text" name="n_co_name" id="n_co_name" placeholder="选填" value="<?php echo set_value('n_co_name')?set_value('n_co_name'):$net['n_co_name']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="n_url"> 更新网址 </label>
										<div class="col-sm-11">
											<input type="text" name="n_url" id="n_url" placeholder="选填" value="<?php echo set_value('n_url')?set_value('n_url'):$net['n_url']; ?>" class="col-xs-10 col-sm-5"><span style="color:red;line-height:28px;font-size:12px;padding-left:10px;"> * 填写格式：http://www.XXX.com</span>
										</div>
									</div>
									<div class="hr hr-18 dotted hr-double"></div>
									<div class="page-header">
										<h1>
											网站配置
											<small>
												<i class="ace-icon fa fa-angle-double-right"></i>
												水印设置
											</small>
										</h1>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('water_width','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="water_width"> 水印宽度 </label>
										<div class="col-sm-3">
											<input type="text" name="water_width" id="water_width" placeholder="选填" value="<?php echo set_value('water_width')?set_value('water_width'):$net['water_width']; ?>" class="col-xs-10 col-sm-5"> 
											<span style="inline-block;line-height:28px;">&nbsp;&nbsp;像素</span>
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('water_height','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="water_height"> 水印高度 </label>
										<div class="col-sm-3">
											<input type="text" name="water_height" id="water_height" placeholder="选填" value="<?php echo set_value('water_height')?set_value('water_height'):$net['water_height']; ?>" class="col-xs-10 col-sm-5"> 
											<span style="inline-block;line-height:28px;">&nbsp;&nbsp;像素</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 水平对其方式 </label>
										<div class="col-sm-11">
											<div class="row control-group">
												<div class="radio pull-left inline">
													<label>
														<input name="water_hor" type="radio" class="ace" <?php if($net['water_hor']=='left'): echo 'checked'; endif;?> value="left">
														<span class="lbl"> 左侧对齐</span>
													</label>
												</div>
												<div class="radio pull-left inline">
													<label>
														<input name="water_hor" type="radio" class="ace" <?php if($net['water_hor']=='center'): echo 'checked'; endif;?> value="center">
														<span class="lbl"> 居中对齐</span>
													</label>
												</div>
												<div class="radio pull-left inline">
													<label>
														<input name="water_hor" type="radio" class="ace" <?php if($net['water_hor']=='right'): echo 'checked'; endif;?> value="right">
														<span class="lbl"> 右侧对齐</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 垂直对其方式 </label>
										<div class="col-sm-11">
											<div class="row control-group">
												<div class="radio pull-left inline">
													<label>
														<input name="water_vrt" type="radio" class="ace" <?php if($net['water_vrt']=='top'): echo 'checked'; endif;?> value="top">
														<span class="lbl"> 顶部对齐</span>
													</label>
												</div>
												<div class="radio pull-left inline">
													<label>
														<input name="water_vrt" type="radio" class="ace" <?php if($net['water_vrt']=='middle'): echo 'checked'; endif;?> value="middle">
														<span class="lbl"> 居中对齐</span>
													</label>
												</div>
												<div class="radio pull-left inline">
													<label>
														<input name="water_vrt" type="radio" class="ace" <?php if($net['water_vrt']=='bottom'): echo 'checked'; endif;?> value="bottom">
														<span class="lbl"> 底部对齐</span>
													</label>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="water_path"> 水印图片 </label>
										<div class="col-sm-7">
											<input type="text" name="w_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="<?php echo $net['water_path'];?>">
											<a href="javascript:;" class="file pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
												<input type="file" name="water_path" id="water_path">
											</a>
											<div class="showFileName pull-left inline" style="line-height:34px;text-indent:10px;"></div>
											<div class="fileerrorTip" style="margin-left:500px;">
												
											</div>
										</div>
									</div>
									<div class="row">
							            <div class="col-sm-8 col-sm-offset-2">
							            	<input type="hidden" name="n_id" value="<?php echo $net['n_id']; ?>"/>
							                <input class="btn btn-info" type="submit" value="确认"/>
							                <input class="btn-reset btn" type="reset" value="重置"/>
							            </div>
							        </div>
								</form>
							</div>
						</div>
						
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->