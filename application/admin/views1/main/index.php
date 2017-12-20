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
							<a href="#">后台首页</a>
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
								后台首页
								<small>
									<i class="ace-icon fa fa-angle-double-right">您好，<?php echo $user['ma_username']?>&nbsp;<?php if ($role['r_id']==1): echo '(超级管理)';endif;?></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
						
							<style>
							.mianinfo{ font-size:14px; line-height:28px;}
							</style>

							<div class=" mr10 mianinfo"  >
							
							    <!--
							     ，</a>
							    <Br />
							    <Br />
							    <hr></div>
							    <table width="100%">
							    	<tr>
							    		<td width="33%">今日发表文章：<span style="color:red"><?php echo $count1;?></span></td>
							    		<td width="33%">本周发表文章：<span style="color:red"><?php echo $count2;?></span></td>
							    		<td width="33%">本站文章总数：<span style="color:red"><?php echo $count3;?></span></td>
							    	</tr>
							    </table>
							-->
							</div>
							<style>
							.announcement-heading{font-size: 50px;}
							.pricing-box .widget-header{text-align: left;text-indent: 20px;}
							.col-xs-24 li{float:left;width: 48%;border-bottom:1px solid #eee;margin-right: 2%;}
							.col-xs-24 a{color:#000;}
							.col-xs-24 a:hover{color:#428bca;}
							.col-xs-24 span.time{float:right;margin-right:10px;color:#888;}
							</style>
							<div class="col-lg-4">
					            <div class="panel panel-info">
					              <div class="panel-heading">
					                <div class="row">
					                  <div class="col-xs-6">
					                    <i class="fa fa-5x">TODAY</i>
					                  </div>
					                  <div class="col-xs-6 text-right">
					                    <p class="announcement-heading"><?php echo $count1;?></p>
					                    <p class="announcement-text">篇</p>
					                  </div>
					                </div>
					              </div>
					              <a href="#">
					                <div class="panel-footer announcement-bottom">
					                  <div class="row">
					                    <div class="col-xs-6">
					                      今日发表文章
					                    </div>
					                    <div class="col-xs-6 text-right">
					                      <i class="fa fa-arrow-circle-right"></i>
					                    </div>
					                  </div>
					                </div>
					              </a>
					            </div>
					        </div>
					        <div class="col-lg-4">
					            <div class="panel panel-warning">
					              <div class="panel-heading">
					                <div class="row">
					                  <div class="col-xs-6">
					                    <i class="fa fa-5x">WEEK</i>
					                  </div>
					                  <div class="col-xs-6 text-right">
					                    <p class="announcement-heading"><?php echo $count2;?></p>
					                    <p class="announcement-text">篇</p>
					                  </div>
					                </div>
					              </div>
					              <a href="#">
					                <div class="panel-footer announcement-bottom">
					                  <div class="row">
					                    <div class="col-xs-6">
					                      本周发表文章
					                    </div>
					                    <div class="col-xs-6 text-right">
					                      <i class="fa fa-arrow-circle-right"></i>
					                    </div>
					                  </div>
					                </div>
					              </a>
					            </div>
					        </div>
					        <div class="col-lg-4">
					            <div class="panel panel-danger">
					              <div class="panel-heading">
					                <div class="row">
					                  <div class="col-xs-6">
					                    <i class="fa fa-5x">ALL</i>
					                  </div>
					                  <div class="col-xs-6 text-right">
					                    <p class="announcement-heading"><?php echo $count3;?></p>
					                    <p class="announcement-text">篇</p>
					                  </div>
					                </div>
					              </div>
					              <a href="#">
					                <div class="panel-footer announcement-bottom">
					                  <div class="row">
					                    <div class="col-xs-6">
					                      本站文章总数
					                    </div>
					                    <div class="col-xs-6 text-right">
					                      <i class="fa fa-arrow-circle-right"></i>
					                    </div>
					                  </div>
					                </div>
					              </a>
					            </div>
					        </div>
							<div class="col-xs-12 col-sm-6 pricing-box">
								<div class="widget-box widget-color-white">
									<div class="widget-header" style="background:#fff;color:#000;">
										<i class="fa fa-desktop"></i>
										<h5 class="widget-title bigger lighter">系统信息</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<ul class="list-unstyled spaced2">
												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													角色：<?php echo $role['r_name'];?>
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													本次登录时间：<?php echo date('Y-m-d H:i:s',$manager['ma_lastlogintime']);?>
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													本次登录IP：<?php echo long2ip($manager['ma_lastloginip']);?>
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													程序版本：&nbsp;cqzz PHP高级版&nbsp;v <?php echo $version['version'];?>
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													系统环境：&nbsp;WINNT 、 PHP5.2.17 、Microsoft-IIS/6.0	
												</li>
											</ul>

										</div>

									</div>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6 pricing-box">
								<div class="widget-box widget-color-white">
									<div class="widget-header" style="background:#fff;color:#000;">
										<i class="glyphicon glyphicon-cog"></i>
										<h5 class="widget-title bigger lighter">功能注释</h5>
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<ul class="list-unstyled spaced2">
												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													文章置顶：置顶的文章会显示在首页;若栏目版式为单页，则会显示置顶的文章
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													文章推荐：推荐文章会以列表形式显示在内容页下方
												</li>

												<li>
													<i class="ace-icon fa fa-caret-right dark"></i>
													热门产品：热门产品会以列表形式显示在内容页下方
												</li>

												<li>
													<i class="ace-icon fa"></i>
													
												</li>

												<li>
													<i class="ace-icon fa"></i>
													
												</li>
											</ul>

										</div>

									</div>
								</div>
							</div>
							



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



