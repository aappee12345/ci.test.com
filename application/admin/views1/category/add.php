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
							<a href="<?php echo site_url('/Category/index'); ?>">栏目管理</a>
						</li>
						<li class="active">添加栏目</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-150"></i>
						</div>
						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
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
									<label class="lbl" for="ace-settings-hover"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="page-content-area">
						<div class="page-header">
							<h1>
								栏目管理
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('c_name','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_name"> 栏目名称 </label>
										<div class="col-sm-11">
											<input type="text" name="c_name" id="c_name" placeholder="必填" value="<?php echo set_value('c_name'); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="p_id"> 所属栏目 </label>
										<div class="col-sm-5 se">
											<select name="p_id" id="parentID1" class="parent form-control1" style="width:auto;margin-right:10px;">
						                    	<?php if ($cid!=0): ?>
						                    	<option value="0">顶级栏目</option>
							                    <?php else: ?>
							                    <option selected value="0">顶级栏目</option>
							                	<?php endif; ?>
						                        <?php foreach ($topcates as $cate): ?>
						                        	<?php if ($cate['c_id']==$cid): ?>
														<option value="<?php echo $cate['c_id']; ?>" selected><?php echo $cate['c_name'];?></option>
							                        <?php else: ?>
														<option value="<?php echo $cate['c_id']; ?>"><?php echo $cate['c_name'];?></option>
							                    	<?php endif; ?>
						                        <?php endforeach; ?>
						                    </select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="ec_name"> 栏目英文名 </label>
										<div class="col-sm-11">
											<input type="text" class="col-xs-10 col-sm-5" name="ec_name" id="ec_name" value="<?php  echo set_value('ec_name'); ?>" placeholder="此处选填">
	                					</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="ec_navname"> 栏目导航英文名 </label>
										<div class="col-sm-11">
											<input type="text" class="col-xs-10 col-sm-5" name="ec_navname" id="ec_navname" value="<?php  echo set_value('ec_navname'); ?>" placeholder="此处选填">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('c_width','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_width"> 栏目图片宽度 </label>
										<div class="col-sm-11">
											<input type="text" name="c_width" id="c_width" placeholder="上传栏目图片时填写有效，默认200" value="<?php echo set_value('c_width'); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('c_height','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_height"> 栏目图片高度 </label>
										<div class="col-sm-11">
											<input type="text" name="c_height" id="c_height" placeholder="上传栏目图片时填写有效，默认200" value="<?php echo set_value('c_height'); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('a_width','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_width"> 文章图片宽度 </label>
										<div class="col-sm-11">
											<input type="text" name="a_width" id="a_width" placeholder="此栏目文章需上传图片时填写有效，默认200" value="<?php echo set_value('a_width'); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('a_height','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_height"> 文章图片高度 </label>
										<div class="col-sm-11">
											<input type="text" name="a_height" id="a_height" placeholder="此栏目文章需上传图片时填写有效，默认200" value="<?php echo set_value('a_height'); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="is_water"> 是否启用水印 </label>
										<div class="col-sm-11">
											<input type="radio" name="is_water" <?php echo set_radio('is_water', 1); ?> value="1"> 开启 
	                						<input type="radio" name="is_water" <?php echo set_radio('is_water', 0,true); ?> value="0"> 关闭 
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_is_nav"> 是否在导航显示 </label>
										<div class="col-sm-11">
											<input type="radio" name="c_is_nav" <?php echo set_radio('c_is_nav', 1,true); ?> value="1"> 是 
	                						<input type="radio" name="c_is_nav" <?php echo set_radio('c_is_nav', 0); ?> value="0"> 否	
										</div>
									</div>
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('c_page_num','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_page_num"> 每页记录数 </label>
										<div class="col-sm-11">
											<input type="text" class="col-xs-10 col-sm-5" name="c_page_num" id="c_page_num" value="<?php  echo set_value('c_page_num')?set_value('c_page_num'):12; ?>" placeholder="请填写整数">
	                					</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_pic"> 栏目图片 </label>
										<div class="col-sm-11">
												<input type="text" name="c_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="">
												<a href="javascript:;" class="file pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
													<input type="file" name="c_pic" id="c_pic">
												</a>
												<div class="showFileName pull-left inline" style="line-height:34px;text-indent:10px;"></div>
												<div class="fileerrorTip" style="margin-left:725px;"></div><span id="s" style="color:red;font-size:12px;line-height:28px;">* 上传图片大小不可超过8MB</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_type"> 栏目类型 </label>
										<div class="col-sm-11">
											<select name="c_type" id="parentID1" class="form-control1">
						                        <?php foreach ($typelist as $type):?>
						                        	<option value="<?php echo $type['t_id']; ?>" <?php echo set_select('c_type', $type['t_id']); ?>><?php echo $type['t_name'];?></option>
						                        <?php endforeach; ?>
						                    </select>	
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_title"> 栏目标题 </label>
										<div class="col-sm-11">
											<input type="text" class="col-xs-10 col-sm-5" name="c_title" id="c_title" value="<?php  echo set_value('c_title'); ?>" placeholder="栏目页面标题调用此处，若为空则调用网站配置处填写标题">
	                					</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_keys"> 栏目关键字 </label>
										<div class="col-sm-11">
											<textarea rows="3" name="c_keys" placeholder="栏目页面关键字调用此处，若为空则调用网站配置处填写关键字" style="width:66.66%;height:28px;" class="form-control1 control2"><?php  echo set_value('c_keys'); ?></textarea>
	                					</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_description"> 栏目描述 </label>
										<div class="col-sm-11">
											<textarea rows="3" name="c_description" placeholder="栏目页面描述调用此处，若为空则调用网站配置处填写描述" style="width:66.66%;height:56px;" class="form-control1 control2"><?php  echo set_value('c_description'); ?></textarea>
	                					</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="c_profile"> 栏目简介 </label>
										<div class="col-sm-11">
											<textarea rows="3" name="c_profile" placeholder="此处选填" style="width:640px;height:150px;" class="form-control1 control2"><?php  echo set_value('c_profile'); ?></textarea>
	                					</div>
									</div>
									<div class="row">
							            <div class="col-sm-8 col-sm-offset-1">
							                <input class="btn btn-info" type="submit" value="保存"/>
							            </div>
							        </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<script>
	    	/*栏目选择ajax查询下级栏目*/
	    	var ctext = '';
			$('.se').on('change','.parent',function(){
				//获取当前SELECTID
				var index = $(this).index()+1;
				//清除select
				//var index = 1;
				var num = $(".parent").length;
				for(var s = 1;s<=num;s++)
				{
					if (s>index)
					{
						$("#parentID"+s).remove();
					}
				}
				var cid = $(this).val();
				var ctext = $(this).find('option:selected').text()
				selectchange(index,cid,ctext);
			})
			function selectchange(index,cid,ctext){
				if (cid!=0&&ctext!='请选择')
				{
					$.ajax({    
				    	url:"/admin.php/category/ajaxson",// 跳转到 action    
				    	data:{cid:cid},
				    	type:'POST',    
				    	dataType:'JSON',    
				    	success:function(data) {    
				    		if (data[0])
				    		{
				    			//获取当前SELECTID
					        	var id = $('#parentID'+index).attr('id');
								var nextid = ++index;
								$(".se").append("<select name='p_id' id='parentID"+nextid+"' class='parent form-control1' style='width:auto;margin-right:10px;'></select>");
								$("#parentID"+nextid).append("<option value='"+cid+"'>请选择</option>");
				    			$(data).each(function(i,val){
						        	$("#parentID"+nextid).append("<option value='"+data[i].c_id+"'>"+data[i].c_name+"</option>");
								});
								return;
				    		}
				    		else
				    		{
				    			return;
				    		}
					     } 
					});  
				}
			}
	    </script>