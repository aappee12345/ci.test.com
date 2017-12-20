<style>
.catelists .cates{float:left;display:block;height:40px;line-height:40px;font-weight: bold;margin-top:12px;margin-right: 10px;}
.catelists .cates.on{float:left;display:block;background: #fff;color:#1DB841;height:40px;line-height:40px;font-weight: bold;border-radius:6px;}
.catelists .cates:hover{float:left;display:block;background: #fff;color:#1DB841;height:40px;line-height:40px;font-weight: bold;border-radius:6px;}
</style>
    <div class="wrap">
      <!--分类-->
      <div class="product-cates">
        <div class="public-container">
          	<div class="catelists clear">
          	<?php foreach ($soncatelist as $cate):?>
          		<?php if ($cate['c_id']==$cid): ?>
          		<a href="<?php echo site_url(array('Article','index',$cate['c_id']));?>" class="cates on"><?php echo $cate['c_name'];?></a>
          		<?php else:?>
          		<a href="<?php echo site_url(array('Article','index',$cate['c_id']));?>" class="cates"><?php echo $cate['c_name'];?></a>
          		<?php endif;?>
          	<?php endforeach;?>
          	<?php if (is_string($returnurl) && $returnurl!==false):?>
				<a href="<?php echo $returnurl;?>"><div class="cates">返回上一级</div></a>
			<?php endif ?>
        	</div>
      	</div>
   		</div>
      <!--列表-->
      <div class="index-product" style="padding-top:35px;">
        <div class="public-container">
	        <div class="product-list clear">
	            <div class="list clear">
	            	<?php foreach ($articlelist as $article):?>
	            		<a href="<?php echo site_url(array('Article','content',$article['a_id']))?>">
			                <div class="pli">
			                  <div class="img">
			                    <img src="<?php echo strstr($article['a_pic'],'/upload');?>" alt="<?php echo $article['a_fulltitle'];?>"></div>
			                  <div class="title"><?php echo $article['a_fulltitle'];?></div></div>
			            </a>
	            	<?php endforeach;?>
	            </div>
	        </div>
	        <?php if ($totals>0):?>
		    	<div class="public-container clear" style="text-align:right;margin-top:40px;">
					<div class="pages clear" style="width:auto;display:inline-block;">
						<input type="button" class="btn-default btn" style="float:right;border-radius:4px;height:32px;line-height:20px;background:#2393e7;color:#fff;border:0;display:block;margin:0 10px;padding:6px;" value="每页<?php echo $per;?>条,共<?php echo $totals;?>条">
						<div style="float:right;display:block;">
							<?php echo $links;?>
						</div>	
					</div>
				</div>
	        <?php endif;?>
        </div>
      </div>
    </div>
 