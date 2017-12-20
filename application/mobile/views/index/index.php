<!--
<div class="about">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $aboutcate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($aboutcate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url('Article/index/18');?>">MORE +</a>
		</div>
		<div class="img">
			<a href="<?php echo site_url('Article/index/18');?>"><img src="<?php echo $aboutcate['c_pic'];?>"></a>
		</div>
		<a href="<?php echo site_url('Article/index/18');?>">
			<div class="detail">
				重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。公司汇集了大批原国企经营管理者及技术人才，有较强的技术实力和经营管理能力，公司拥有员工100多人．其中技术人员40多人。重庆市万通仪器仪表有限公司是集工贸一体化的高科技民营企业，下属两个分公司。地处风景秀丽的重庆“后花园”北碚火车站旁．交通便利。运输方便．占地面积10000平方米。公司汇集了大批原国企经营管理者及技术人才，有较强的技术实力和经营管理能力，公司拥有员工100多人．其中技术人员40多人。
			</div>
		</a>
	</div>
</div>
<div class="product">
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $productcate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($productcate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url('Article/index/11');?>" style="background:#f5f5f5;">MORE +</a>
		</div>
		<div class="productlist">
			<div class="plist">
				<?php foreach($productlist as $value):?>
				<div class="p-item">
					<div class="img">
						<a href="<?php echo site_url('Article/content').'/'.$value['a_id'];?>"><img src="<?php echo $value['a_pic'];?>" alt="<?php echo $value['a_fulltitle'];?>"></a>
					</div>
					<a href="<?php echo site_url('Article/content').'/'.$value['a_id'];?>"><div class="title"><?php echo $value['a_fulltitle'];?></div></a>
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
			<a class="more" href="<?php echo site_url('Article/index/20');?>">MORE +</a>
		</div>
		<div class="newslist">
			<div class="nlist clear">
				<?php foreach ($newslist as $key=>$value):?>
					<a href="<?php echo site_url('Article/content').'/'.$value['a_id'];?>">
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
-->


<?php if (!empty($cate1['articlelist']) || $has_cate1===1):?>
<div class="index-product">
  <div class="public-container">
    <p class="cate-top"></p>
     <!--标题-->
      <div class="cate-title clear">
        <div class="cate-title-left"></div>
        <div class="cate-title-text">
          <div class="zh">产品展示</div>
          <div class="en">PRODUCT DISPLAY</div>
        </div>
        <div class="cate-title-right"></div>
      </div>
      <!--分类列表-->
      <div class="cate-list clear">
        <a href="/m.php?m=product&a=index&cid=12"><div class="cate-block">废气处理设备</div></a><a href="/m.php?m=product&a=index&cid=39"><div class="cate-block">PP设备</div></a><a href="/m.php?m=product&a=index&cid=21"><div class="cate-block">废水处理设备</div></a>      </div>
      <!--产品列表-->
      <div class="product-list clear">
        <div class="list clear">
          <a href="/m.php?m=product&a=content&id=93">
              <div class="pli">
                <img src="/upload/image/20161220/20161220111716_91905.jpg" alt="">
                <div class="title">隔油池</div>
              </div>
            </a><a href="/m.php?m=product&a=content&id=92">
              <div class="pli">
                <img src="/upload/image/20161220/20161220104317_65129.jpg" alt="">
                <div class="title">二氧化氯发生器</div>
              </div>
            </a><a href="/m.php?m=product&a=content&id=91">
              <div class="pli">
                <img src="/upload/image/20161220/20161220104236_19522.jpg" alt="">
                <div class="title">二氧化氯发生器</div>
              </div>
            </a><a href="/m.php?m=product&a=content&id=90">
              <div class="pli">
                <img src="/upload/image/20161220/20161220103957_96412.jpg" alt="">
                <div class="title">PP防腐槽</div>
              </div>
            </a>        </div>
      </div>
      <a href="/m.php?m=product&a=index"><div class="more">more</div></a>
  </div>
</div>
<?php endif;?>
<div class="index-about">
  <div class="public-container">
    <p class="cate-top"></p>
    <!--标题-->
      <div class="cate-title clear">
        <div class="cate-title-left-f"></div>
        <div class="cate-title-text">
          <div class="zhf">公司简介</div>
          <div class="enf">COMPANY  PROFILE</div>
        </div>
        <div class="cate-title-right-f"></div>
      </div>
      <!--描述-->
      <div class="about-desc">
        　　重庆福泉环保科技有限公司是集科研产品设计、生产制造、产品销售、工程设计、项目承包、安装调试、技术咨询、技术培训为一体的综合型专业企业公司。在污水处理、废气治理、噪声控制、行业用水处理等领域的技术研发、工程设计和施工中拥有丰富的经验。
　　公司拥有完善的水、气、固废污染控制专业实验设备和分析测试仪器，建立数套各种生化处理工艺的模拟实验设备，为工程设计提供切合实际的技术参数，在确保污染治理达标的同时，最大限度地降低工程投资和运行费用。      </div>
      <a href="/m.php?m=about&a=index">
        <div class="more f">more</div>
    </a>
  </div>
</div>
<div class="index-product">
  <div class="public-container">
    <p class="cate-top"></p>
     <!--标题-->
      <div class="cate-title clear">
        <div class="cate-title-left"></div>
        <div class="cate-title-text">
          <div class="zh">企业资质</div>
          <div class="en">QUALIFICATION</div>
        </div>
        <div class="cate-title-right"></div>
      </div>
      <!--资质列表-->
      <div class="product-list clear">
        <div class="list clear">
          <a href="/m.php?m=zizhi&a=content&id=13">
              <div class="pli">
                <img src="/upload/image/20161219/20161219145840_17094.jpg" alt="">
                <div class="title">重庆市环境保护产业协会会员证书</div>
              </div>
            </a><a href="/m.php?m=zizhi&a=content&id=12">
              <div class="pli">
                <img src="/upload/image/20161219/20161219145736_94105.jpg" alt="">
                <div class="title">重庆市环境污染治理资质证书</div>
              </div>
            </a>        </div>
      </div>
      <a href="/m.php?m=zizhi&a=index"><div class="more">more</div></a>
  </div>
</div>
<!--工程案例-->
<div class="index-case">
  <div class="public-container">
    <p class="cate-top"></p>
     <!--标题-->
      <div class="cate-title clear">
        <div class="cate-title-left"></div>
        <div class="cate-title-text">
          <div class="zh">工程案例</div>
          <div class="en">ENGINEERING CASE</div>
        </div>
        <div class="cate-title-right"></div>
      </div>
      <!--资质列表-->
      <div class="product-list clear">
        <div class="list clear">
          <a href="/m.php?m=case&a=content&id=25">
              <div class="pli">
                <img src="/upload/image/20161219/20161219152249_44241.jpg" alt="">
                <div class="title">CASS反应池</div>
              </div>
            </a><a href="/m.php?m=case&a=content&id=24">
              <div class="pli">
                <img src="/upload/image/20161219/20161219152235_42437.jpg" alt="">
                <div class="title">CASS曝气池</div>
              </div>
            </a><a href="/m.php?m=case&a=content&id=23">
              <div class="pli">
                <img src="/upload/image/20161219/20161219152218_70023.jpg" alt="">
                <div class="title">UASB池</div>
              </div>
            </a><a href="/m.php?m=case&a=content&id=22">
              <div class="pli">
                <img src="/upload/image/20161219/20161219152157_21197.jpg" alt="">
                <div class="title">UASB反应池废气处理系统</div>
              </div>
            </a>        </div>
      </div>
      <a href="/m.php?m=case&a=index"><div class="more">more</div></a>
  </div>
</div>
<script src="/Public/mobile/js/index.js"></script>
   <footer class="clear">
     <div class="ewm">
       <img src="/upload/article/20161220/5858d5e378289.png" alt="" />
     </div>
      <style>
      .info .address a{text-decoration: none;}
     .footli{
      float: left;
      background: #1bb4fc;
      width: 33.33%;
      height: auto;
    }
     </style>
     <div class="info">
       <p class="address"><span>重庆福泉环保科技有限公司　</span>版权所有</p>
       <p class="address">地址：重庆市江津区石河沟</p>
       <p class="address"><span>Q Q：</span><span><a href="tel:425233382" style="color:#fff;">425233382</a></span></p>
       <p class="address" style="overflow:hidden;"><span style="float:left;display:block;">电话：</span><span><a href="tel:023-47580586" style="display:block;float:left;color:#fff">023-47580586</a><a href="tel:15310638286" style="display:block;float:left;color:#fff">/15310638286</a><a href="tel:13667679160" style="display:block;float:left;color:#fff">/13667679160</a></span></p>
       <p class="address"><a href="http://www.cqzz.net" target="_blank"><span style="color:#FFFFFF;">重庆满荣网络技术有限公司</span></a><span style="color:#FFFFFF;">&nbsp;</span><a href="http://www.cqzz.net" target="_blank"><span style="color:#FFFFFF;">重庆建网站</span></a></p>
     </div>
    
       <div style="position:fixed;bottom:0;z-index:101;">
        <div class="footli"><a href="tel:023-47580586"><img src="/Public/mobile/images/foot-tel.png"/></a></div>
        <div class="footli"><a href="http://map.baidu.com/?newmap=1&s=con%26wd%3D重庆市江津区石河沟%26c%3D132&from=alamap&tpl=mapsite"><img src="/Public/mobile/images/foot-addr.png"/></a></div>
        <div class="footli"><a href="mqqwpa://im/chat?chat_type=wpa&uin=425233382&version=1&src_type=web&web_src=cqklqx.com"><img src="/Public/mobile/images/foot-qq.png"/></a></div>
       </div>
   </footer>
<script src="<?php echo base_url();?>js/mobile/common.js"></script>
<script src="<?php echo base_url();?>js/wfgd.js"></script>
<script>
$(".menu").click(function(e) {  
    if($(".menulist").css('display')=="block")
    {
  
        $(".menulist").hide();

    }else{

        $(".menulist").show();

    }
        e.stopPropagation();  
});  
$(document).click(function(event) {  
    $(".menulist").hide();  
});
/*计算图片高度*/
var picwidth = $(".list .pli img").width();
$(".list .pli img").css('height',picwidth/1.7);
</script>
</body>
</html>