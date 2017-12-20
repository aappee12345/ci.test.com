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
							<a href="#">模板列表</a>
						</li>
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
								模板列表
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
						
							<style>
							.mianinfo{ font-size:14px; line-height:28px;}
							.mb-item{float:left;width: 300px;height: 400px;overflow:hidden;padding:15px;margin-right: 30px;margin-bottom:30px;border:1px solid #aaa;}
							.mb-item img{box-shadow: 0 0 10px #888;width:270px;height:310px;}
							.mb-item .title{text-align: center;}
							.mb-item .oper{text-align: center;line-height: 32px;width:100px;background: #1B79D4;margin:auto;color:#fff;border-radius: 5px;}
							.mb-item .oper a{color:#fff;}
							.mb-item .oper.on{cursor:pointer;background: #44cebf;}
							</style>

							<div class=" mr10 mianinfo"  >
							
							   <div class="mblist clear">
							   	<?php foreach ($mubanlist as $muban):?>
									<div class="mb-item">
								   		<div class="img">
								   			<img src="<?php echo $url.$muban['mu_pic'];?>" alt="">
								   		</div>
								   		<div class="title"><?php echo $muban['mu_name'];?></div>
								   		<?php if ($muban['mu_id']==$mb_id):?>
								   		<div class="oper on">已安装</div>
								   		<?php else:?>
								   		<a href="<?php echo site_url(array('Muban','download',$muban['mu_id']));?>"><div class="oper">下载模板</div></a>
								   		<?php endif;?>
								   	</div>
							   	<?php endforeach;?>
							   </div>
							</div>
							<style>
							.announcement-heading{font-size: 50px;}
							.pricing-box .widget-header{text-align: left;text-indent: 20px;}
							.col-xs-24 li{float:left;width: 48%;border-bottom:1px solid #eee;margin-right: 2%;}
							.col-xs-24 a{color:#000;}
							.col-xs-24 a:hover{color:#428bca;}
							.col-xs-24 span.time{float:right;margin-right:10px;color:#888;}
							</style>
						



<!--
						
							<div class="col-xs-24 col-sm-12 pricing-box" style="padding-right:7px;margin-top:20px;">
								<div class="widget-box widget-color-gray" style="border-radius:5px;">
									<div class="widget-header" style="background:#f5f5f5;height:50px;line-height:50px;font-size:18px;border-left:2px solid #eee;border-right:2px solid #eee;border-top:2px solid #eee;border-radius:5px 5px 0px 0px;">
										<i class="glyphicon  glyphicon-volume-up dark"></i>
										<h5 class="widget-title bigger dark">满荣公告</h5>
									</div>
									<div class="widget-body" style="border-radius:0px 0px 5px 5px;border-left:2px solid #eee;border-right:2px solid #eee;border-bottom:2px solid #eee;">
										<div class="widget-main">
											<ul class="list-unstyled spaced2 clearfix">
												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告一</a>
													<span class="time">2017-02-02</span>
												</li>

												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告二</a>
													<span class="time">2017-02-02</span>
												</li>

												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告三</a>
													<span class="time">2017-02-02</span>
												</li>
												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告一</a>
													<span class="time">2017-02-02</span>
												</li>

												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告二</a>
													<span class="time">2017-02-02</span>
												</li>

												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告三</a>
													<span class="time">2017-02-02</span>
												</li>
												<li>
													<i class="ace-icon fa  fa-envelope dark"></i>
													<a href="">公告三</a>
													<span class="time">2017-02-02</span>
												</li>
											</ul>

										</div>

									</div>
						
							</div>
						
						</div>
					-->
						
				</div>
			</div>
		</div>
	</div>
</div>



