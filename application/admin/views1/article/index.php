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
						<li class="active">文章列表</li>
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
								文章列表
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
			<div class="row" style="padding-left:12px;margin-bottom:5px;">
				<a href="<?php echo site_url("/article/index/0"); ?>" class="btn btn-danger mr5">全部内容(<?php echo $count;?>)</a>
				<a href="<?php echo site_url("/article/recycle/0"); ?>" class="btn btn btn-info mr5">回收站(<?php echo $recyclecount;?>)</a>
			</div>
			<hr style="border-color:#aaa">
			<div class="input-group" style="margin-bottom:5px;">
				<span>地址：</span>
                <a href="<?php echo site_url("/article/index/0"); ?>" class="btn btn-info mr5">根目录</a>
                <?php echo $position;?>
	        </div>
	        <div class="input-group" style="margin-bottom:5px;">
                <span>栏目：</span>
                <?php foreach ($catelist as $cate):?>
					<a href="<?php echo site_url("/article/index/$cate[c_id]"); ?>" class="btn btn-info"><?php echo $cate['c_name'];?></a>
            	<?php endforeach;?>
            	
	        </div>
	        <form action="<?php echo site_url('/article/index'); ?>" method="POST">
		        <div class="input-group" style="margin-bottom:5px;">
		            <input type="text" name="keys" style="line-height:28px;" class="form-control1 col-xs-12 input-search" value="<?php echo isset($keys)?$keys:'';?>" placeholder="请输入新闻标题...">
		            <input type="hidden" name="cid" value="<?php echo $cid;?>">
		            <!--
                    <span class="input-group-btn">
                        <input class="btn btn-success" type="submit"><i class="fa fa-search"></i></input>
                    </span>
                -->
                	<span class="input-group-btn">
						<button type="button" class="btn btn-purple btn-sm" onclick="submit();">
							<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
						</button>
					</span>
		        </div>
		    </form>
		<form class="form-horizontal" action="<?php echo site_url('/article/batchDelArticle'); ?>" method="post">
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
							<th>文章名称</th>
							<th width="60" class="center">图片</th>
							<th class="left">所属栏目</th>
							<th width="81" class="left">功能</th>
							<th width="200" class="left">更新时间</th>
							<th width="80" class="left">操作</th>
						</tr>
						<?php foreach($articlelist as $key=>$article): ?>
						<tr>
							<td class="left">
								<label class="position-relative">
									<input type="checkbox" class="ace" name="IDCheck[]" value="<?php echo $article['a_id'];?>">
									<span class="lbl"></span>
								</label>
							</td>
							<td class="left"><?php echo $article['a_id']; ?></td>
							<td class="sort left"><span id="num<?php echo $article['a_id'];?>"><?php echo $article['a_sort']?$article['a_sort']:0;?></span><input type="text" name="a_sort" class="inputs" id="<?php echo $article['a_id'];?>" value="<?php echo $article['a_sort']?$article['a_sort']:0;?>"/></td>
							<td class="left"><a href="<?php echo site_url('/article/update/'.$article['a_id']); ?>"><?php echo $article['a_fulltitle']; if ($article['a_is_delete']==1):echo '<span style="color:red;">[回收站]</span>';endif; ?></a></td>
							<td style="padding:3px;" class="center">
								<?php if ($article['a_pic']!=''):?>
									<img src="<?php echo $article['a_pic'];?>" height="30"/>
								<?php endif;?>
							</td>
							<td class="left"><?php echo substr($article['a_position'],0,strlen($str)-9);?></td>
			            	<td class="left">
			            		<?php if ($article['a_recommend']==1): ?>
			            		<a class="orange pull-left" title="推荐" id="recommend<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','recommend');"><span class="ace-icon fa fa-thumbs-up center bigger-110" style="margin:0px 5px 0px 0px;"></span></a>
			            		<?php else: ?>
			            		<a class="light-grey pull-left" title="推荐" id="recommend<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','recommend');"><span class="ace-icon fa fa-thumbs-up center bigger-110" style="margin:0px 5px 0px 0px;"></span></a>
			            		<?php endif; ?>
			            		<?php if ($article['a_hot']): ?>
								<a class="red pull-left" title="热点" id="hot<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','hot');"><i class="ace-icon fa fa-bell bigger-130" style="margin:0px 5px;"></i></a>
								<?php else: ?>
								<a class="light-grey pull-left" title="热点" id="hot<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','hot');"><i class="ace-icon fa fa-bell bigger-130" style="margin:0px 5px;"></i></a>
								<?php endif; ?>
								
								<?php if ($article['a_top']=='1'): ?>
								<a class="blue pull-left" title="置顶" id="top<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','top');"><i class="ace-icon fa fa-arrow-up bigger-120" style="margin:0px 0px 0px 5px;"></i></a>
								<?php else: ?>
								<a class="light-grey pull-left" title="置顶" id="top<?php echo $article['a_id'];?>" onclick="updateart('<?php echo $article['a_id'];?>','top');"><i class="ace-icon fa fa-arrow-up bigger-120" style="margin:0px 0px 0px 5px;"></i></a>
								<?php endif; ?>
								</td>
					
							<td class="left" id="time<?php echo $article['a_id'];?>"><?php echo date('Y-m-d H:i:s',$article['updated_at']);?></td>
							<td>
								<a class="green pull-left" title="更新" href="javascript:void(0);" onclick="updateart('<?php echo $article['a_id'];?>','update')"><span class="ui-icon ace-icon glyphicon glyphicon-refresh center bigger-110 blue" style="margin:0px 5px 0px 0px;"></span></a>
								<a class="green pull-left" title="修改文章" href="<?php echo site_url('/article/update/'.$article['a_id']); ?>"><i class="ace-icon fa fa-pencil bigger-130" style="margin:0px 5px;"></i></a>
								<a class="red pull-left" title="删除文章" href="<?php echo site_url('/article/delArticle/'.$article['a_id'].'/'.$offset); ?>"><i class="ace-icon fa fa-trash-o bigger-120" style="margin:0px 0px 0px 5px;"></i></a>
						</tr>
						<?php endforeach;?>
						<?php if (count($articlelist)<1): ?>
			                <tr class="unread checked">
			                    <td colspan="9" align="center">暂无记录</td>
			                </tr>
			            <?php endif;?>
					</table>
					<div class="clear">
			            <input type="submit" class="btn-danger btn" name="submit" style="float:left;margin:20px 0;padding:0;" value="删除选中"/>
			            <input type="submit" class="btn-danger btn" name="submit" style="float:left;margin:20px 0;margin-left:10px;" value="放入回收站"/>
						<a href="<?php echo site_url('/article/add').'/'.$this->uri->segment(3); ?>" class="btn-success btn" style="float:left;margin:20px 10px;padding:0;">添加文章</a>
						<div style="float:left;margin:20px 10px;padding:0;">
							批量移动至
	                		<select name="a_cid" class="parent form-control1" style="width:auto;margin-right:10px;">
	                			<option value="0" selected>------</option>
								<?php foreach ($movecatelist as $cat): ?>
									<?php if ($cat['c_level']==0):?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo $cat['c_name'];?></option>
									<?php elseif ($cat['c_level']==1):?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo '|--'.$cat['c_name'];?></option>
									<?php elseif ($cat['c_level']==2):?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo '|--|--'.$cat['c_name'];?></option>
									<?php elseif ($cat['c_level']==3):?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo '|--|--|--'.$cat['c_name'];?></option>
									<?php elseif ($cat['c_level']==4):?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo '|--|--|--|--'.$cat['c_name'];?></option>
									<?php else:?>
										<option value="<?php echo $cat['c_id']; ?>"><?php echo '|--|--|--|--|--'.$cat['c_name'];?></option>
									<?php endif; ?>
		                        	<?php endforeach; ?>
	                		</select>
	                		<input type="submit" class="btn-success btn" name="submit" value="批量移动"/>
						</div>
						
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
 /*置顶 推荐 热点 更新功能*/
function updateart(id,type)
{
	$.ajax({
		type:'POST',
		url:'/admin.php/article/ajaxarticle',
		data:{id:id,type:type},
		dataType:'text',
		success:function(msg){
			if (msg)
			{
				if (msg==0)
				{
					$("#"+type+id).removeClass('btn-info');
					$("#"+type+id).addClass('btn-danger');
					if (type=='top')
					{
						$("#"+type+id).attr('class','light-grey pull-left');
					}
					else if (type=='recommend')
					{
						$("#"+type+id).attr('class','light-grey pull-left');
					}
					else if (type=='hot')
					{
						$("#"+type+id).attr('class','light-grey pull-left');
					}
				}
				else if (msg==1)
				{
					$("#"+type+id).removeClass('btn-danger');
					$("#"+type+id).addClass('btn-info');
					if (type=='top')
					{
						$("#"+type+id).attr('class','blue pull-left');
					}
					else if (type=='recommend')
					{
						$("#"+type+id).attr('class','orange pull-left');
					}
					else if (type=='hot')
					{
						$("#"+type+id).attr('class','red pull-left');
					}
				}
				else
				{
					$("#time"+id).text(msg);
				}
			}
		},
	});
}
$("input.inputs").blur(function(){
	//获取ID sort
	var id = $(this).attr('id');
	var sort = $(this).val();
	$.ajax({
		type:'POST',
		url:'/admin.php/article/ajaxsort',
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


