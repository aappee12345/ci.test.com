<!--
<div class="about">
	<div class="public-container clear">
		<div class="al wow fadeInLeft">
			<div class="img">
				<a href="<?php echo site_url(array('Article','index',$rescid));?>">
					<img src="<?php echo $aboutcate['c_pic'];?>" alt="<?php echo $aboutcate['c_name'];?>">
				</a>
			</div>
			<div class="zh">科技领先，勤奋务实．高效创新</div>
			<div class="en">Advanced technology, diligent and practical. Efficient innovation</div>
		</div>
		<div class="ar wow fadeInRight" data-wow-delay="0.5s">
			<div class="top">
				<span class="zh"><?php echo $aboutcate['c_name'];?></span>
				<span class="en"><?php echo strtoupper($aboutcate['ec_name']);?></span>
				<a class="more" href="<?php echo site_url(array('Article','index',$rescid));?>">MORE +</a>
			</div>
			<a href="<?php echo site_url(array('Article','index',$rescid));?>">
				<div class="desc">
					<?php echo $about['a_profile'];?>
				</div>
			</a>
		</div>
	</div>
</div>

<div class="product">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $productcate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($productcate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url(array('Article','index','3',$area));?>">MORE +</a>
		</div>
		<div class="productlist">
			<div class="plist clear">
				<?php foreach ($productlist as $k=>$value):?>
				<div class="p-item wow fadeInUp" data-wow-duration="<?php echo ($k+1)/2;?>s">
					<div class="img">
						<a href="<?php echo site_url(array('Article','content',$value['a_id'],$area));?>"><img src="<?php echo $value['a_pic'];?>" alt="<?php echo $value['a_fulltitle'];?>"></a>
					</div>
					<a href="<?php echo site_url(array('Article','content',$value['a_id'],$area));?>"><div class="title"><?php echo $value['a_fulltitle'];?></div></a>
				</div>
				<?php endforeach;?>
				
			</div>
		</div>
	</div>
</div>



<div class="news">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $newscate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($newscate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url(array('Article','index','4'));?>">MORE +</a>
		</div>
		<div class="newslist">
			<div class="nlist clear">
				<?php foreach ($newslist as $key=>$value):?>
					<a href="<?php echo site_url(array('Article','content',$value['a_id']));?>">
						<div class="n-item wow fadeInUp clear" data-wow-duration="1.5s" data-wow-delay="<?php echo $key/2;?>s">
							<div class="date">
								<div class="m"><?php echo date('M',$value['updated_at']);?></div>
								<div class="d"><?php echo date('d',$value['updated_at']);?></div>
							</div>
							<div class="info">
								<div class="title"><?php echo $value['a_fulltitle'];?></div>
								<div class="desc"><?php echo $value['a_profile'];?></div>
							</div>
						</div>
					</a>
				<?php endforeach;?>
			</div>
		</div>
	</div>
</div>

<div class="product">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $zizhicate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($zizhicate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url(array('Article','index','35'));?>">MORE +</a>
		</div>
		<div class="productlist" style="overflow:hidden;">
			<div id="box_zj" class="plist clear" style="width:10000px;height:230px;overflow:hidden;">
				<div class="ul" style="width:auto;float:left;z-index:1;">
					<?php foreach ($zizhilist as $k=>$value):?>
					<div class="p-item">
						<div class="img">
							<a href="<?php echo site_url(array('Article','content',$value['a_id']));?>"><img src="<?php echo $value['a_pic'];?>" alt="<?php echo $value['a_fulltitle'];?>"></a>
						</div>
						<a href="<?php echo site_url(array('Article','content',$value['a_id']));?>"><div class="title"><?php echo $value['a_fulltitle'];?></div></a>
					</div>
					<?php endforeach;?>
				</div>
				
				
			</div>
		</div>
	</div>
</div>
<style>
.friend-link{width: 100%;background: #f0f0f0;}
.friend-link .linklist{float:left;width: 1150px;height:auto;overflow: visible;}
.friend-link img.linkmore{float:right;display:block;margin-top:8px;width: 18px;height: 13px;cursor:pointer;}
.friend-link span{float:left;white-space: nowrap;line-height: 32px;font-size: 14px;font-weight: bold;color:#000;}
.friend-link a{float:left;white-space: nowrap;display:inline-block;line-height: 32px;font-size: 12px;margin-right: 15px;color:#000;}
</style>
<div class="friend-link">
	<div class="public-container clear">
		<div class="linklist" style="height: 32px; overflow: hidden;">
			<span>友情链接：</span>
			<?php foreach ($linklist as $value):?>
				<a href="<?php echo $value['l_wzurl'];?>" target="_blank" title="<?php echo $value['l_wzname'];?>"><?php echo $value['l_wzname'];?></a>
			<?php endforeach;?>
		</div>
		<img src="<?php echo base_url();?>images/default/linkmore.jpg" alt="" class="linkmore">
	</div>
</div>
<script src="<?php echo base_url();?>js/wfgd.js"></script>
<script>
$(document).ready(function () {
  if ($(".linklist").css('overflow')=='visible')
  {
    if ($(".linklist").height()<=32)
    {
      $(".linkmore").hide();
    }
    else
    {
      $(".linkmore").show();
      $(".linklist").css({'height':'32px','overflow':'hidden'});
    }
  }

  $(".linkmore").click(function(){

    if ($(".linklist").css('overflow')=='hidden')
    {
      $(".linklist").css({'height':'auto','overflow':'visible'});
    }
    else
    {
      $(".linklist").css({'height':'32px','overflow':'hidden'});
    }
  });

});

</script>
-->

<?php if (!empty($cate1['articlelist']) || $has_cate1===1):?>
  <div class="index-product">
   <div class="public-container">
    <p class="cate-top"></p>
    <!--标题-->
    <div class="cate-title clear">
     <div class="cate-title-left"></div>
     <div class="cate-title-text">
      
      	<?php foreach ($allcates as $cate):?>
			<?php if ($cate['c_biaoshi']==='1'):?>
				<div class="zh">
					<?php echo $cate['c_name'];?>
				</div>
      			<div class="en">
      	 			<?php echo $cate['ec_name'];$cas = $cate;?>
      			</div>
			<?php endif;?>
      	<?php endforeach;?>
     </div>
     <div class="cate-title-right"></div>
    </div>
    <!--分类列表-->
    <div class="cate-list clear">
    	<?php foreach ($allcates as $ca1):?>
			<?php if ($ca1['p_id']==$cas['c_id']):?>
				<a href="<?php echo site_url(array('Article','index',$ca1['c_id'],$area));?>">
			      <div class="cate-block">
			       <?php echo $ca1['c_name'];?>
			      </div>
			  </a>
			<?php endif;?>
    	<?php endforeach;?>
    </div>
    <!--产品列表-->
    <div class="product-list clear">
     <div class="list row clear">
     	<?php $i = 0;?>
     	<?php foreach ($cate1['articlelist'] as $c):?>	
     		<?php if ($i < 3):?>
		<a href="<?php echo site_url(array('Article','content',$c['a_id']));?>">
       		<div class="pli wow fadeIn animated" data-wow-delay=".25s">
       			<div class="img">
         			<img src="<?php echo strstr($c['a_pic'],'/upload');?>" alt="<?php echo $c['a_fulltitle'];?>" />
        		</div>
        		<div class="title"><?php echo $c['a_fulltitle'];$i++;?></div>
       		</div>
   	  	</a>
   	  	<?php endif;?>
     	<?php endforeach;?>
     </div>
    </div>
    <a href="<?php echo site_url(array('Article','index',$cas['c_id']));?>"><div class="more">more</div></a>
   </div>
  </div>
<?php endif;?>
<?php if (!empty($cate2['article']) || $has_cate2===1):?>
  <!--公司简介-->
  <div class="index-about">
   <div class="public-container">
    <p class="cate-top" style="height:70px;"></p>
    <!--标题-->
    <div class="cate-title clear" style="margin-bottom:50px;">
     <div class="cate-title-left-f"></div>
     <div class="cate-title-text">
     	<?php foreach ($allcates as $cate):?>
			<?php if ($cate['c_biaoshi']==='2'):?>
				<div class="zhf">
					<?php echo $cate['c_name'];?>
				</div>
      			<div class="enf">
      	 			<?php echo $cate['ec_name'];$cas = $cate;?>
      			</div>
			<?php endif;?>
      	<?php endforeach;?>
     </div>
     <div class="cate-title-right-f"></div>
    </div>
    <!--描述-->
    <a href="<?php echo site_url(array('Article','index',$cas['c_id']));?>">
     <div class="about-desc wow bounceIn animated" data-wow-delay=".25s">
     	<?php echo $cate2['article']['a_profile'];?>
     </div>
 	</a>
    <a href="<?php echo site_url(array('Article','index',$cas['c_id']));?>"><div class="more f">more</div></a>
   </div>
  </div>
<?php endif;?>
<?php if (!empty($cate3['articlelist']) || $has_cate3===1):?>
  <!--企业资质-->
  <div class="index-product">
   <div class="public-container">
    <p class="cate-top"></p>
    <!--标题-->
    <div class="cate-title clear">
     <div class="cate-title-left"></div>
     <div class="cate-title-text">
     <?php foreach ($allcates as $cate):?>
		<?php if ($cate['c_biaoshi']==='3'):?>
			<div class="zh">
				<?php echo $cate['c_name'];?>
			</div>
  			<div class="en">
  	 			<?php echo $cate['ec_name'];$cas = $cate;?>
  			</div>
		<?php endif;?>
  	<?php endforeach;?>
     </div>
     <div class="cate-title-right"></div>
    </div>
    <!--资质列表-->
    <div class="product-list clear">
     <div class="list row clear">
     	<?php foreach ($cate3['articlelist'] as $c):?>	
     		<?php if ($i < 3):?>
     			<a href="<?php echo site_url(array('Article','content',$c['a_id']));?>" title="<?php echo $c['a_fulltitle']?>">
			       <div class="pli wow bounceInRight" data-wow-delay=".25s">
			        <div class="img">
			         <img src="<?php echo strstr($c['a_pic'],'/upload');?>" alt="<?php echo $c['a_fulltitle']?>" />
			        </div>
			        <div class="title"><?php echo $c['a_fulltitle']?></div>
			       </div>
				</a>
     		<?php endif;?>
     	<?php endforeach;?>
     </div>
    </div>
    <a href="<?php echo site_url(array('Article','index',$cas['c_id']));?>"><div class="more">more</div></a>
   </div>
  </div>
<?php endif;?>
<?php if (!empty($cate4['articlelist']) || $has_cate4===1):?>
  <!--工程案例-->
  <div class="index-case">
   <div class="public-container">
    <p class="cate-top"></p>
    <!--标题-->
    <div class="cate-title clear">
     <div class="cate-title-left"></div>
     <div class="cate-title-text">
      <?php foreach ($allcates as $cate):?>
		<?php if ($cate['c_biaoshi']==='4'):?>
			<div class="zh">
				<?php echo $cate['c_name'];?>
			</div>
  			<div class="en">
  	 			<?php echo $cate['ec_name'];$cas = $cate;?>
  			</div>
		<?php endif;?>
  	<?php endforeach;?>
     </div>
     <div class="cate-title-right"></div>
    </div>
    <!--资质列表-->
    <div class="product-list clear">
     <div class="list row clear">
     	<?php foreach ($cate4['articlelist'] as $c):?>	
     		<?php if ($i < 3):?>
     		 <a href="<?php echo site_url(array('Article','content',$c['a_id']));?>" title="<?php echo $c['a_fulltitle'];?>">
		       <div class="pli wow bounceInLeft" data-wow-delay=".25s">
		        <div class="img">
		         <img src="<?php echo strstr($c['a_pic'],'/upload');?>" alt="<?php echo $c['a_fulltitle'];?>" />
		        </div>
		        <div class="title">
		         <?php echo $c['a_fulltitle'];?>
		        </div>
		       </div>
		    </a>
     		<?php endif;?>
     	<?php endforeach;?>
     </div>
    </div>
    <a href="<?php echo site_url(array('Article','index',$cas['c_id']));?>"><div class="more">more</div></a>
   </div>
  </div>
<?php endif;?>
