<style>
    .row span{text-indent:20px;text-align:left;width:auto;display: inline-block;}
    .row .col-md-2 span{float: right;display:inline-block}
</style>
<div id="page-wrapper">
	<div class="graphs">
		<div class="form-group">
	        <div class="row">
	            <div class="col-md-10 grid_box1">
	            </div>
	            <div class="col-md-2 grid_box1">
	                <a href="<?php echo site_url('admin/adminnav/addfunc'); ?>" class="btn btn-sm btn-success warning_3">添加功能</a>
	                <a href="<?php echo site_url('Admin/adminnav/funcindex'); ?>" class="btn btn-sm btn-success warning_3">功能列表</a>
	                </div>
	            <div class="clearfix"> </div>
	        </div>
	    </div>
	    <form action="" method="post">
	    <?php foreach($navlist as $nav): ?>
	        <?php if ($nav['resourceGrade'] == 2): ?>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-md-2 grid_box1">
	                        <span><?php echo $nav['resourceName']; ?> :</span>
	                    </div>
	                    <div class="col-md-10">
	                        <?php foreach($navlist as $na): ?>
	                            <?php if ($na['parentID'] == $nav['resourceID']): ?>
	                                <?php if ($na['delFlag']==0): ?>
	                                    <span><input type="checkbox" checked name="func[]" value="<?php echo $na['resourceID']; ?>"/> <?php echo $na['resourceName']; ?></span>
	                                    <?php else:?>
	                                    <span><input type="checkbox" name="func[]" value="<?php echo $na['resourceID']; ?>"/> <?php echo $na['resourceName']; ?></span>
	                                <?php endif; ?>
	                            <?php endif; ?>
	                        <?php endforeach; ?>

	                    </div>
	                    <div class="clearfix"> </div>
	                </div>
	            </div>
	        <?php endif; ?>
	    <?php endforeach; ?>
	    <div class="form-group">
	        <div class="row">
	            <div class="col-md-2 grid_box1">

	            </div>
	            <div class="col-md-10">
	                <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>

	            </div>
	            <div class="clearfix"> </div>
	        </div>
	    </div>
	    </form>
	</div>
</div>