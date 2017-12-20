<!--
<div class="main" style="background:#fff;margin:0;">
	<div class="public-container clear">
		<div class="top" style="margin:0">
			<span class="zh"><?php echo $cate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($cate['ec_name']);?></span>
			<div class="position"><?php echo $position;?></div>
		</div>
	</div>
	<?php if (count($soncatelist)>1||is_string($returnurl)):?>
	<div class="box">
		<div class="ctable">
			<div class="catelist">
				<div class="public-container clear">
					<div class="clist clear">
						<?php foreach ($soncatelist as $val): ?>
							<?php if ($val['c_id']==$cid): ?>
								<a href="<?php echo site_url(array('Article','index',$val['c_id']));?>"><div class="c-item on"><?php echo $val['c_name'];?></div></a>
							<?php else: ?>
								<a href="<?php echo site_url(array('Article','index',$val['c_id']));?>"><div class="c-item"><?php echo $val['c_name'];?></div></a>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php if (is_string($returnurl) && $returnurl!==false):?>
						<a href="<?php echo $returnurl;?>"><div class="c-item">返回上一级</div></a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<div class="arcontent">
		<div class="public-container clear">
			<?php echo $articlelist['0']['a_content']?$articlelist['0']['a_content']:'暂无内容';?>
		</div>
	</div>
</div>
-->
<style>
.catelists .cates{float:left;display:block;height:40px;line-height:40px;font-weight: bold;margin-top:12px;margin-right: 10px;}
.catelists .cates.on{float:left;display:block;background: #fff;color:#1DB841;height:40px;line-height:40px;font-weight: bold;border-radius:6px;}
.catelists .cates:hover{float:left;display:block;background: #fff;color:#1DB841;height:40px;line-height:40px;font-weight: bold;border-radius:6px;}
</style>
<div class="wrap">
  <!--一级分类-->
  <div class="product-cates">
    <div class="public-container">
      <div class="catelists">
      	<?php foreach ($soncatelist as $val): ?>
			<?php if ($val['c_id']==$cid): ?>
				<a href="<?php echo site_url(array('Article','index',$val['c_id']));?>"><div class="cates on"><?php echo $val['c_name'];?></div></a>
			<?php else: ?>
				<a href="<?php echo site_url(array('Article','index',$val['c_id']));?>"><div class="cates"><?php echo $val['c_name'];?></div></a>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php if (is_string($returnurl) && $returnurl!==false):?>
		<a href="<?php echo $returnurl;?>"><div class="c-item">返回上一级</div></a>
		<?php endif ?>
        <!-- <a href="/index.php?m=about&a=index&cid=7" class="cates on">公司简介</a> -->
        </div>
    </div>
  </div>
  <!--产品列表-->
  <div class="index-product" style="padding-top:35px;">
    <div class="public-container">
      <div class="article-content"><?php echo $articlelist['0']['a_content']?$articlelist['0']['a_content']:'暂无内容';?></div></div>
  </div>
</div>