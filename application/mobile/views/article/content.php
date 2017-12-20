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
	<div class="box">
		<div class="ctable">
			<div class="catelist">
				<div class="public-container clear">
					<div class="clist clear">
						<?php foreach ($soncatelist as $val): ?>
							<?php if ($val['c_id']==$article['a_cid']): ?>
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
		</div>
	</div>
	<?php endif;?>
	<div class="public-container clear">
		<div class="c20"></div>
		<!--文章标题-->
		<div class="artitle"><?php echo $article['a_fulltitle']?></div>
		<!--文章详情-->
		<div class="ardetail">发布时间:<?php echo date('Y-m-d H:i:s',$article['updated_at']);?>&nbsp;&nbsp;&nbsp;阅读次数:<?php echo $article['a_click'];?></div>
		<!--文章内容-->
		<div class="arcontent">
			<div class="public-container clear">
				<?php echo $article['a_content'];?>
			</div>
		</div>
		
		<div class="c80"></div>
		<div class="tar clear">
            <a href="<?php echo $npinfo['prev']['url']?$npinfo['prev']['url']:'javascript:void(0);';?>"><div class="prevart <?php if (!isset($npinfo['prev']['title'])): echo 'off';endif;?>">上一篇：<?php echo isset($npinfo['prev']['title'])?$npinfo['prev']['title']:'没有了';?></div></a>
            <a href="<?php echo $npinfo['next']['url']?$npinfo['next']['url']:'javascript:void(0);';?>"><div class="nextart <?php if (!isset($npinfo['next']['title'])): echo 'off';endif;?>">下一篇：<?php echo isset($npinfo['next']['title'])?$npinfo['next']['title']:'没有了';?></div></a>
      	</div>
		<div class="c20"></div>
	</div>
	
</div>
