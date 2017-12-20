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
							<a href="<?php echo site_url('/Guestbook/index');?>">留言管理</a>
						</li>
						<li class="active">留言列表</li>
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
								留言列表
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
		<style>
			.inputs{display:none;width:40px;}
		</style>
		<form class="form-horizontal" action="<?php echo site_url('/guestbook/batchDelGuestbook'); ?>" method="post">
			<div class="row">
				<div class="col-xs-12">
					<table id="sample-table-1" class="table table-striped table-bordered table-hover">
						<tr>
							<th width="25">
								<label class="position-relative">
									<input type="checkbox" class="ace">
									<span class="lbl"></span>
								</label>
							</th>
			                <th width="25" class="left">ID</th>
			                <th width="100" class="left">姓名</th>
			                <th width="300" class="left">标题</th>
			                <th class="left">留言内容</th>
			                <th width="136" class="left">留言时间</th>
			                <th width="136" class="left">审核时间</th>
			                <th width="55" class="left">状态</th>
			                <th width="65" class="left">操作</th>
						</tr>
						<?php foreach($guestbooklist as $key=>$guestbook): ?>
						<tr>
							<td class="left">
								<label class="position-relative">
									<input type="checkbox" class="ace" name="IDCheck[]" value="<?php echo $guestbook['g_id'];?>">
									<span class="lbl"></span>
								</label>
							</td>
							<td class="left"><?php echo $guestbook['g_id']; ?></td>
							<td class="left"><?php echo $guestbook['g_name'];?></td>
							<td class="hidden-480"><?php echo $guestbook['g_title'];?></td>
							<td><?php echo $guestbook['g_content'];?></td>
			            	<td class="left"><?php echo date('Y-m-d H:i:s',$guestbook['created_at']);?></td>
							<td class="left"><?php echo date('Y-m-d H:i:s',$guestbook['updated_at']);?></td>
							<td class="left"><?php echo $guestbook['g_status']==0?'未审核':'已审核';?></td>
							<td>
								<a class="green pull-left" title="修改" href="<?php echo site_url('/guestbook/update/'.$guestbook['g_id']); ?>"><i class="ace-icon fa fa-pencil bigger-130" style="margin:0px 5px;"></i></a>
								<a class="red pull-left" title="删除" href="<?php echo site_url('/guestbook/delGuestbook/'.$guestbook['g_id']); ?>"><i class="ace-icon fa fa-trash-o bigger-120" style="margin:0px 5px;"></i></a>
						</tr>
						<?php endforeach;?>
						<?php if (count($guestbooklist)<1): ?>
			                <tr class="unread checked">
			                    <td colspan="9" align="center">暂无记录</td>
			                </tr>
			            <?php endif;?>
					</table>
					<div class="clear">
			            <input type="submit" class="btn-danger btn" style="float:left;margin:20px 0;padding:0;" value="删除选中"/>
			            <input type="hidden" name="offset" value="<?php echo $offset;?>">
			            <div style="float:right;"><?php echo $links;?></div> 
			            <input type="button" class="btn-default btn" style="float:right;margin:20px 10px;padding:0;" value='<?php echo "共".$count."条";?>'/>
			        </div>
				</div>
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
 
$("input.inputs").blur(function(){
	//获取ID sort
	var id = $(this).attr('id');
	var sort = $(this).val();
	$.ajax({
		type:'POST',
		url:'/admin.php/ad/ajaxsort',
		data:{id:id,sort:sort},
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

