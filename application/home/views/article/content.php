<!--
<div class="main" style="margin:0;background:#fff;">
	<div class="public-container">
		<div class="top">
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
							<?php if ($val['c_id']==$article['a_cid']): ?>
								<a href="<?php echo site_url(array('Article','index',$val['c_id'],$area));?>"><div class="c-item on"><?php echo $val['c_name'];?></div></a>
							<?php else: ?>
								<a href="<?php echo site_url(array('Article','index',$val['c_id'],$area));?>"><div class="c-item"><?php echo $val['c_name'];?></div></a>
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
		<div class="artitle"><?php echo $article['a_fulltitle']?></div>
		<div class="ardetail">发布时间:<?php echo date('Y-m-d H:i:s',$article['updated_at']);?>&nbsp;&nbsp;&nbsp;阅读次数:<?php echo $article['a_click'];?></div>
		<div class="arcontent">

			<div class="public-container clear">
				<?php if ($article['a_is_getimg']==1):?>
				<img src="<?php echo strstr($article['a_pic'],'/upload');?>" width="600" style="display:block;margin:auto;" alt="">
				<?php endif;?>
				<?php echo $article['a_content'];?>
			</div>
		</div>

		<div class="tar clear">
            <a href="<?php echo $npinfo['prev']['url']?$npinfo['prev']['url']:'javascript:void(0);';?>"><div class="prevart <?php if (!isset($npinfo['prev']['title'])): echo 'off';endif;?>">上一篇：<?php echo isset($npinfo['prev']['title'])?$npinfo['prev']['title']:'没有了';?></div></a>
            <a href="<?php echo $npinfo['next']['url']?$npinfo['next']['url']:'javascript:void(0);';?>"><div class="nextart <?php if (!isset($npinfo['next']['title'])): echo 'off';endif;?>">下一篇：<?php echo isset($npinfo['next']['title'])?$npinfo['next']['title']:'没有了';?></div></a>
      	</div>

		<div class="recommendnews clear">
		    <div class="title">相关文章</div>
		        <div class="newslist clear">
		        <div class="left">
		        	<?php foreach ($recommendarticle as $k=>$value):?>
		        		<?php if (($k+1)%2==1): ?>
			                <div class="news-item">
			           			<a href="<?php echo site_url(array('Article','content',$value['a_id']));?>"><div class="ntitle"><?php echo $value['a_fulltitle'];?></div></a>
			           			<div class="time"><?php echo date('Y-m-d',$value['updated_at']);?></div>
			          		</div>
			        	<?php endif; ?>
		      		<?php endforeach;?>
		     	</div>
		     	<div class="right">
		     		<?php foreach ($recommendarticle as $k=>$value): ?>
		     			<?php if (($k+1)%2==0): ?>
		          			<div class="news-item">
		           				<a href="<?php echo site_url(array('Article','content',$value['a_id']));?>"><div class="ntitle"><?php echo $value['a_fulltitle'];?></div></a>
		           				<div class="time"><?php echo date('Y-m-d',$value['updated_at']);?></div>
		         			</div>
		         		<?php endif; ?>
		      		<?php endforeach; ?>
		     	</div>
	      	</div>
	   	</div>
	   <div class="c20"></div>


		<div class="recommendnews clear">
		    <div class="title">热门产品</div>
		      <div class="plist clear">
		      	<?php foreach ($hotproduct as $k=>$value):?>
		          <div class="p-item">
		            <div class="img"><a href="<?php echo site_url(array('Article','content',$value['a_id'],$area));?>"><img src="<?php echo $value['a_pic'];?>" alt=""></a></div>
		            <div class="ptitle"><?php echo $value['a_fulltitle'];?></div>
		          </div>
		    	<?php endforeach;?>
		      </div>
		   </div>
	    <div class="c20"></div>

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
			<?php if ($val['c_id']==$article['a_cid']): ?>
				<a href="<?php echo site_url(array('Article','index',$val['c_id'],$area));?>"><div class="cates on"><?php echo $val['c_name'];?></div></a>
			<?php else: ?>
				<a href="<?php echo site_url(array('Article','index',$val['c_id'],$area));?>"><div class="cates"><?php echo $val['c_name'];?></div></a>
			<?php endif; ?>
		<?php endforeach; ?>
		<?php if (is_string($returnurl) && $returnurl!==false):?>
		<a href="<?php echo $returnurl;?>"><div class="c-item">返回上一级</div></a>
		<?php endif ?>
        <!-- <a href="/index.php?m=news&a=index&cid=9" class="cates on">人才招聘</a></div> -->
        </div>
    </div>
  </div>
</div>
  <div class="index-product" style="padding-top:35px;">
    <div class="public-container">
      <div class="article-title"><?php echo $article['a_fulltitle'];?></div>
      <div class="article-desc">
        <span>发布时间：<?php echo date('Y-m-d H:i:s',$article['updated_at']);?></span>
        <span>阅读次数：<?php echo $article['a_click'];?>次</span></div>
      <div class="article-content"><?php echo $article['a_content'];?></div></div>
  </div>
</div>
