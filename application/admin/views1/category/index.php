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
						<li class="active">栏目列表</li>
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
								栏目列表
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
<style>
	.inputs{display:none;width:40px;}
	.inputp{display:none;width:40px;}
</style>
		<form class="form-horizontal" action="<?php echo site_url('/category/batchDelCategory'); ?>" method="post">
			<div class="row">
				<div class="col-xs-12">
					<table id="sample-table-1" class="table table-striped table-bordered table-hover">
						<tr>
							<th width="25" class="left">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</th>
							<th width="25" class="left">ID</th>
							<th width="70" class="left">排序号</th>
							<th class="left">栏目名称</th>
							<!-- <th width="60" class="center">栏目封面</th> -->
							<th width="400">所属栏目</th>
							<th width="120" class="left">栏目版式</th>
							<th width="70" class="left">分页数</th>
							<th width="110" class="left">操作</th>
						</tr>
						<?php foreach($catelist as $key=>$cate): ?>
						<tr>
							<td class="left">
								<label class="position-relative">
									<input type="checkbox" class="ace" name="IDCheck[]" value="<?php echo $cate['c_id'];?>">
									<span class="lbl"></span>
								</label>
							</td>
							<td class="left">
								<?php echo $cate['c_id']; ?>
							</td>
							<td class="sort left"><span id="num<?php echo $cate['c_id'];?>"><?php echo $cate['c_sort']?$cate['c_sort']:0;?></span><input type="text" name="c_sort" class="inputs" id="<?php echo $cate['c_id'];?>" value="<?php echo $cate['c_sort']?$cate['c_sort']:0;?>"/></td>
							<td class="left"><a style="text-decoration:none;" href="<?php echo site_url('/category/update/'.$cate['c_id']); ?>"><?php for ($i=1;$i<=$cate['c_level'];$i++):echo '┗┉┉';endfor;echo '&nbsp;'.$cate['c_name']; ?></a></td>
							<!-- <td style="padding:3px;text-align: center;"><?php if ($cate['c_pic']!=''):?><img src="<?php echo $cate['c_pic'];?>" height="30"/><?php endif;?></td> -->
							<?php if ($cate['p_id']==0): ?>
			            		<td class="left"><?php echo $cate['p_name'];?></td>
			            	<?php else: ?>
			        			<td class="left"><?php echo $cate['p_name'].$cate['c_name'];?></td>
			        		<?php endif; ?>
							<td class="left"><?php echo $cate['t_name']; ?></td>
							<td class="pagenum left"><span id="pagenum<?php echo $cate['c_id'];?>"><?php echo $cate['c_page_num']; ?></span><input type="text" name="c_page_num" class="inputp" id="<?php echo $cate['c_id'];?>" value="<?php echo $cate['c_page_num']?$cate['c_page_num']:1;?>"/></td>
							<td class="left">
								<a class="green pull-left" title="添加内容" style="cursor:pointer;" href="<?php echo site_url('/article/add/'.$cate['c_id']); ?>"><span class="ui-icon ace-icon glyphicon glyphicon-edit center bigger-110 blue" style="margin:0px 5px 0px 0px;"></span></a>
								<a class="green pull-left" title="添加子分类" style="cursor:pointer;" href="<?php echo site_url('/category/addson/'.$cate['c_id']); ?>"><span class="ui-icon ace-icon fa fa-plus center bigger-110 blue" style="margin:0px 5px;"></span></a>
								<a class="green pull-left" title="修改分类" href="<?php echo site_url('/category/update/'.$cate['c_id']); ?>"><i class="ace-icon fa fa-pencil bigger-130" style="margin:0px 5px;"></i></a>
								<a class="red pull-left" title="删除分类" href="<?php echo site_url('/category/delCategory/'.$cate['c_id']); ?>"><i class="ace-icon fa fa-trash-o bigger-120" style="margin:0px 0px 0px 5px;"></i></a>
							</td>
						</tr>
						<?php endforeach;?>
						<?php if (count($catelist)<1): ?>
			                <tr class="unread checked">
			                    <td colspan="7" align="center">暂无记录</td>
			                </tr>
			            <?php endif;?>
					</table>
					<div class="clear">
			            <input type="submit" class="btn-danger btn" style="float:left;margin:20px 0;padding:0;" value="删除选中"/>
						<a href="<?php echo site_url('/category/add/0'); ?>" class="btn-success btn" style="float:left;margin:20px 10px;padding:0;">添加栏目</a>
			            <!-- <input type="hidden" name="offset" value="<?php echo $offset;?>"> -->
			            <!-- <div style="float:right;"><?php echo $links;?></div> -->
			            <input type="button" class="btn-default btn" style="float:right;margin:20px 10px;padding:0;" value='<?php echo "共".$count."条";?>'/>
			        </div>
				</div><!-- /.span -->
			</div>
		</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(".sort").click(function(){
	$(this).find('span').hide();
	$(this).find('input').show().focus();
});

$(".pagenum").click(function(){
	$(this).find('span').hide();
	$(this).find('input').show().focus();
});

$("input.inputs").blur(function(){
	//获取ID sort
	var id = $(this).attr('id');
	var sort = $(this).val();
	$.ajax({
		type:'POST',
		url:'/admin.php/category/ajaxsort',
		data:{id:id,sort:sort},
		dataType:'JSON',
		success:function(msg){
			setTimeout("GoOn()",200);
		}
	});
});

$("input.inputp").blur(function(){
	//获取ID sort
	var id = $(this).attr('id');
	var num = $(this).val();
	$.ajax({
		type:'POST',
		url:'/admin.php/category/ajaxpagenum',
		data:{id:id,num:num},
		dataType:'JSON',
		success:function(msg){
			setTimeout("GoOn()",200);
		}
	});
});

function GoOn(){ 
	if($(':focus').length==0) {
		window.history.go(0);
	}
}
</script>