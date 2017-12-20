
				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
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
							<a href="<?php echo site_url('/Log/index'); ?>">基本信息</a>
						</li>
						<li class="active">日志管理</li>
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
								日志管理
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<form class="form-search" action="<?php echo site_url('/log/index'); ?>" method="POST">
									<div class="row">
										<div class="col-xs-12 col-sm-8">
											<div class="input-group">
												<input type="text" name="keys" style="line-height:28px;" class="form-control search-query" placeholder="请输入用户名或描述信息" value="<?php echo isset($keys)?$keys:'';?>">
												<span class="input-group-btn">
													<button type="button" class="btn btn-purple btn-sm" onclick="submit();">
														<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
													</button>
												</span>
											</div>
										</div>
									</div>
								</form>



								<form class="form-horizontal" action="<?php echo site_url('/log/delLogBatch'); ?>" method="post">
								<div class="form-group" style="margin:0;">
									<label class="col-sm-2 control-label no-padding-right" for="form-field-1" style="line-height:34px;"> 按时间段删除日志信息 </label>
									<div class="col-sm-10">
										<div class="row control-group">
											<div class="radio pull-left inline">
												<label>
													<input name="days" type="radio" class="ace" value="7">
													<span class="lbl"> 7天以前的记录</span>
												</label>
											</div>
											<div class="radio pull-left inline">
												<label>
													<input name="days" type="radio" class="ace" value="30">
													<span class="lbl"> 30天以前的记录</span>
												</label>
											</div>
											<div class="radio pull-left inline">
												<label>
													<input name="days" type="radio" class="ace" value="90">
													<span class="lbl"> 90天以前的记录</span>
												</label>
											</div>
										</div>
									</div>
								</div>



								<div class="row">
									<div class="col-xs-12">
										<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<tr>
													<th width="30" class="center">
														<label class="position-relative">
															<input type="checkbox" class="ace">
															<span class="lbl"></span>
														</label>
													</th>
													<th>登录日期</th>
													<th>登录IP</th>
													<th class="hidden-480">描述信息</th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														用户
													</th>

													<th width="67" class="center">操作</th>
												</tr>
												<?php foreach($logs as $key=>$log): ?>
												<?php //if ($key!='keys'):?>
												<tr>
													<td class="center">
														<label class="position-relative">
															<input type="checkbox" class="ace" name="IDCheck[]" value="<?php echo $log['l_id'];?>">
															<span class="lbl"></span>
														</label>
													</td>
													<td>
														<?php echo date('Y年m月d日 H:i:s',(int)$log['updated_at']); ?>
													</td>
													<td><?php echo long2ip($log['l_ip']); ?></td>
													<td class="hidden-480">用户<?php echo $log['l_case']; ?></td>
													<td><?php echo $log['l_operator']; ?></td>
													<td class="center">
														<div class="hidden-sm hidden-xs btn-group">
															<div class="btn btn-xs btn-danger">
																<a href="<?php echo site_url('/log/delLog/'.$log['l_id']); ?>" style="color:#fff;"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
															</div>
														</div>
													</td>
												</tr>
												<?php //endif;?>
												<?php endforeach;?>
												<?php if (count($logs)<1): ?>
									                <tr class="unread checked">
									                    <td colspan="6" align="center">暂无日志记录</td>
									                </tr>
									            <?php endif;?>
										</table>
										<div class="clear">
								            <input type="submit" class="btn-danger btn" style="float:left;margin:20px 0;padding:0;" value="删除选中"/>

								            <div style="float:right;"><?php echo $links;?></div>
								            <input type="button" class="btn-default btn" style="float:right;margin:20px 10px;padding:0;" value='<?php echo "每页".$per."条,共".$totals."条";?>'/>
								        
								        </div>
								       
									</div><!-- /.span -->
								</div>
								</form>

























































							</div>
						</div>
						
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->
