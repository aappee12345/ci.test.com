<div id="page-wrapper">
	<div class="graphs">
		<form action="" method="post">
			<div class="form-group clearfix">
		    	<div class="col-sm-2">
		    	</div>
		        <div class="col-sm-8">
		            <?php echo form_error('resourceName','<div class="alert alert-danger" style="margin-bottom:0px;">','</div>'); ?>
		        </div>
		        <div class="col-sm-2">
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="row">
		            <div class="col-md-2 grid_box1">
		                功能名称：
		            </div>
		            <div class="col-md-10">
		                <input type="text" class="form-control1" name="resourceName" id="resourceName" value="<?php echo $adminnavinfo['resourceName']; ?>" placeholder="功能名称">
		            </div>
		            <div class="clearfix"> </div>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="row">
		            <div class="col-md-2 grid_box1">
		                功能链接：
		            </div>
		            <div class="col-md-10">
		                <input type="text" class="form-control1" name="accessPath" id="accessPath" value="<?php echo $adminnavinfo['accessPath']; ?>" placeholder="若为顶级功能，此处为空">
		            </div>
		            <div class="clearfix"> </div>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="row">
		            <div class="col-md-2 grid_box1">
		                功能所属：
		            </div>
		            <div class="col-md-10">
		                <select name="parentID" id="parentID" class="form-control1">
		                	<?php if ($adminnavinfo['parentID']==1):?>
								<option selected value="1">顶级功能</option>
			                <?php else:?>
			            		<option value="1">顶级功能</option>
			            	<?php endif;?>
		                    
		                    <?php foreach ($adminnavlist as $adminnav): ?>
		                        <?php if ($adminnav['resourceID']==$adminnavinfo['parentID']): ?>
		                        <option value="<?php echo $adminnav['resourceID']; ?>" selected><?php echo $adminnav['resourceName']; ?></option>
		                        <?php else: ?>
		                        <option value="<?php echo $adminnav['resourceID']; ?>"><?php echo $adminnav['resourceName']; ?></option>
		                        <?php endif; ?>
		                    <?php endforeach; ?>
		                </select>
		            </div>
		            <div class="clearfix"> </div>
		        </div>
		    </div>
		    <div class="form-group clearfix">
		    	<div class="col-sm-2">
		    	</div>
		        <div class="col-sm-8">
		            <?php echo form_error('resourceGrade','<div class="alert alert-danger" style="margin-bottom:0px;">','</div>'); ?>
		        </div>
		        <div class="col-sm-2">
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="row">
		            <div class="col-md-2 grid_box1">
		                功能级别：
		            </div>
		            <div class="col-md-10">
		                <input type="text" class="form-control1" name="resourceGrade" id="resourceGrade" value="<?php echo $adminnavinfo['resourceGrade']; ?>" placeholder="若为顶级功能，此处填写2，否则填3">
		            </div>
		            <div class="clearfix"> </div>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="row">
		            <div class="col-md-2 grid_box1">

		            </div>
		            <div class="col-md-10">
		                <input type="submit" name="submit" class="btn btn-sm btn-success warning_3" value="保存"/>
						<input type="hidden" name="resourceID" value="<?php echo $adminnavinfo['resourceID']; ?>">
		            </div>
		            <div class="clearfix"> </div>
		        </div>
		    </div>
		</form>
	</div>
</div>