<style>
    .row span{text-indent:20px;text-align:left;width:auto;display: inline-block;}
    .row .col-md-2 span{float: right;display:inline-block}
</style>
<div id="page-wrapper">
	<div class="graphs">
		<div class="table-responsive">
		    <table class="table table-bordered">
		        <thead>
		        <tr>
		            <th width="40">ID</th>
		            <th width="120">功能名称</th>
		            <th width="120">功能所属</th>
		            <th>功能链接</th>
		            <th width="130">操作</th>
		        </tr>
		        </thead>
		        <tbody>
		        <?php foreach($navlist as $adminnava): ?>
		            <tr class="unread checked">
		                <td><?php echo $adminnava['resourceID']; ?></td>
		                <td><?php echo $adminnava['resourceName']; ?></td>
		                    <td>
		                    <?php echo $adminnava['parentName']; ?>
		                    </td>
		                <td><?php echo $adminnava['accessPath']; ?></td>
		                <td>
		                    <a href="<?php echo site_url('Admin/adminnav/updatefunc/'.$adminnava['resourceID']); ?>" class="btn btn-sm btn-success warning_3">修改</a>
		                    <a href="<?php echo site_url('Admin/adminnav/delfunc/'.$adminnava['resourceID']); ?>" class="btn btn-sm btn-success warning_3">删除</a>
		                </td>
		            </tr>
		        <?php endforeach;?>
		        <?php if (count($navlist)<1): ?>
		            <tr class="unread checked">
		                <td colspan="5" align="center">暂无功能</td>
		            </tr>
		        <?php endif; ?>
		        </tbody>
		    </table>
		    <div class="clear">
		        <div style="float:right;"><?php echo $links;?></div>
		    </div>
		</div>
	</div>
</div>
