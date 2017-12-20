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
							<a href="<?php echo site_url('/Article/index'); ?>">文章管理</a>
						</li>
						<li class="active">修改文章</li>
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
								修改文章
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" action="<?php echo site_url('/article/update'); ?>" method="post" enctype="multipart/form-data">
									<div class="form-group" style="margin-bottom:0;">
								    	<div class="col-sm-1">
								    	</div>
								        <div class="col-sm-5">
								            <?php echo form_error('a_fulltitle','<div class="alert alert-danger" style="line-height:20px;padding:0px 15px;margin-bottom:5px;"><i class="ace-icon fa fa-times"></i>&nbsp;&nbsp;','</div>'); ?>
								        </div>
								    </div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_fulltitle"> 文章标题 </label>
										<div class="col-sm-11">
											<input type="text" name="a_fulltitle" id="a_fulltitle" placeholder="必填" value="<?php  echo set_value('a_fulltitle')?set_value('a_fulltitle'):$article['a_fulltitle']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_title"> 文章副标题 </label>
										<div class="col-sm-11">
											<input type="text" name="a_title" id="a_title" placeholder="必填" value="<?php  echo set_value('a_title')?set_value('a_title'):$article['a_title']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_link"> 文章外链 </label>
										<div class="col-sm-11">
											<input type="text" name="a_link" id="a_link" placeholder="必填" value="<?php  echo set_value('a_link')?set_value('a_link'):$article['a_link']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_keys"> 文章关键字 </label>
										<div class="col-sm-11">
											<textarea name="a_keys" placeholder="文章关键字以英文逗号分隔" style="width:66.66%;height:28px;" class="form-control1 col-xs-10 col-sm-5"><?php  echo set_value('a_keys')?set_value('a_keys'):$article['a_keys']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_description"> 文章描述 </label>
										<div class="col-sm-11">
											<textarea name="a_description" placeholder="此处选填" style="width:66.66%;height:56px;" class="form-control1 col-xs-10 col-sm-5"><?php  echo set_value('a_description')?set_value('a_description'):$article['a_description']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_cid"> 所属栏目 </label>
										<div class="col-sm-5 se">
											<?php foreach ($catelist as $key=>$cate): ?>
						                		<select name="a_cid" id="parentID<?php echo $key+1;?>" class="parent form-control1" style="width:auto;margin-right:10px;">
													<?php foreach ($cate['catelist'] as $cat): ?>
														<?php if ($cate['selected']['c_id']==$cat['c_id']):?>
														<option value="<?php echo $cat['c_id']; ?>" selected><?php echo $cat['c_name'];?></option>
														<?php else:?>
														<option value="<?php echo $cat['c_id']; ?>"><?php echo $cat['c_name'];?></option>
														<?php endif;?>
							                        <?php endforeach; ?>
						                		</select>
						                	<?php endforeach;?>
										</div>
	
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right"> 首页缩略图片 </label>
										<div class="col-sm-11">
											<input type="text" name="a_index_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="<?php echo strstr($article['a_index_pic'],'/upload');?>">
											<a href="javascript:;" class="file1 pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
												<input type="file" name="a_index_pic">
											</a>
											<div class="showFileName1 pull-left inline" style="line-height:34px;text-indent:10px;"></div>
											<div class="fileerrorTip1" style="margin-left:725px;">
												
											</div><span id="s" style="color:red;font-size:12px;line-height:28px;">* 上传图片大小不可超过8MB&nbsp;&nbsp;&nbsp;&nbsp;</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right"> 缩略图片 </label>
										<div class="col-sm-11">
											<input type="text" name="a_file" class="col-xs-10 col-sm-5 pull-left inline" placeholder="图片地址" value="<?php echo strstr($article['a_pic'],'/upload');?>">
											
											<a href="javascript:;" class="file2 pull-left inline" style="margin-left:5px;margin-top:2px;">选择文件
												<input type="file" name="a_pic">

											</a>
											<div class="showFileName2 pull-left inline" style="line-height:34px;text-indent:10px;"></div>
											<div class="fileerrorTip2" style="margin-left:725px;">
												
											</div><span id="s" style="color:red;font-size:12px;line-height:28px;">* 上传图片大小不可超过8MB&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<span id="s" style="font-size:12px;">
												<label>
													<input name="a_is_getimg" type="checkbox" class="ace" <?php if($article['a_is_getimg']=='1'): echo 'checked'; endif;?> value="1">
													<span class="lbl"> </span>
												</label>&nbsp;&nbsp;文章内容是否调用缩略图片
											</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="created_at"> 发布时间 </label>
										<div class="col-sm-11">
											<input type="text" name="created_at" id="created_at" placeholder="必填" value="<?php  echo set_value('created_at')?set_value('created_at'):date('Y-m-d H:i:s',$article['created_at']); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="updated_at"> 修改时间 </label>
										<div class="col-sm-11">
											<input type="text" name="updated_at" id="updated_at" placeholder="必填" value="<?php  echo set_value('updated_at')?set_value('updated_at'):date('Y-m-d H:i:s',$article['updated_at']); ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_click"> 阅读次数 </label>
										<div class="col-sm-11">
											<input type="text" name="a_click" id="a_click" placeholder="必填" value="<?php  echo set_value('a_click')?set_value('a_click'):$article['a_click']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_source"> 文章来源 </label>
										<div class="col-sm-11">
											<input type="text" name="a_source" id="a_source" placeholder="必填" value="<?php  echo set_value('a_source')?set_value('a_source'):$article['a_source']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_author"> 文章作者 </label>
										<div class="col-sm-11">
											<input type="text" name="a_author" id="a_author" placeholder="必填" value="<?php  echo set_value('a_author')?set_value('a_author'):$article['a_author']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_sort"> 排序号 </label>
										<div class="col-sm-11">
											<input type="text" name="a_sort" id="a_sort" placeholder="必填" value="<?php  echo set_value('a_sort')?set_value('a_sort'):$article['a_sort']; ?>" class="col-xs-10 col-sm-5">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_profile"> 文章摘要 </label>
										<div class="col-sm-11">
											<textarea rows="7" name="a_profile" placeholder="此处选填" class="form-control1 col-xs-10 col-sm-5"><?php  echo set_value('a_profile')?set_value('a_profile'):$article['a_profile']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-1 control-label no-padding-right" for="a_content"> 文章内容 </label>
										<div class="col-sm-11" style="padding-left:0;">
											<!-- <input type="text" name="a_content" id="a_content" placeholder="必填" value="<?php echo set_value('a_content'); ?>" class="col-xs-10 col-sm-5"> -->
											<textarea rows="7" name="a_content" id="a_content" placeholder="此处选填" class="form-control1 col-xs-10 col-sm-5"><?php  echo set_value('a_content')?set_value('a_content'):$article['a_content']; ?></textarea>
										</div>
									</div>
									<div class="row">
							            <div class="col-sm-8 col-sm-offset-1">
							                <input class="btn btn-info" type="submit" value="保存"/>
							                <input type="hidden" name="a_id" value="<?php echo $article['a_id'];?>">
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
								$(".se").append("<select name='a_cid' id='parentID"+nextid+"' class='parent form-control1' style='width:auto;margin-right:10px;'></select>");
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
<script type="text/javascript" src="<?php echo base_url();?>editor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>editor/ueditor.all.js"></script>
<script type="text/javascript">
    var editor = new UE.ui.Editor({ initialFrameWidth:950,initialFrameHeight:400,scaleEnabled:true });
    editor.render("a_content");
</script>
<script src="<?php echo base_url();?>js/jquery.datetimepicker.full.min.js"></script>
<script>
	$('#created_at').datetimepicker({value:'<?php echo date("Y-m-d H:i:s",time())?>', format: "Y-m-d H:i:s"});
	$('#updated_at').datetimepicker({value:'<?php echo date("Y-m-d H:i:s",time())?>', format: "Y-m-d H:i:s"});
</script>
