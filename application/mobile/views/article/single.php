<div class="main" style="margin-top:20px;">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $cate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($cate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url('Article/index').'/'.$cate['c_id'];?>">MORE +</a>
		</div>
	</div>
	<!--分类列表-->
	<?php if (count($soncatelist)>1||is_string($returnurl)):?>
	<!-- <div class="box">
		<div class="ctable"> -->
			<div class="catelist">
				<div class="public-container clear">
					<div class="clist clear">
						<?php foreach ($soncatelist as $val): ?>
							<?php if ($val['c_id']==$cid): ?>
								<a href="<?php echo site_url('/Article/index').'/'.$val['c_id'];?>"><div class="c-item on"><?php echo $val['c_name'];?></div></a>
							<?php else: ?>
								<a href="<?php echo site_url('/Article/index').'/'.$val['c_id'];?>"><div class="c-item"><?php echo $val['c_name'];?></div></a>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php if (is_string($returnurl) && $returnurl!==false):?>
						<a href="<?php echo $returnurl;?>"><div class="c-item">返回上一级</div></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		<!-- </div>
	</div> -->
	<?php endif;?>
	<!--文章内容-->
	<div class="arcontent">
		<div class="public-container clear">
			<?php echo $articlelist['0']['a_content']?$articlelist['0']['a_content']:'暂无内容';?>
		</div>
	</div>
</div>
