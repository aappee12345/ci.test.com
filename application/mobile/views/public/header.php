<!--
<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Cache-Control" content="no-transform" />
  <meta name="screen-orientation" content="portrait" />
  <meta name="x5-orientation" content="portrait" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="layoutmode" content="standard" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="renderer" content="webkit" />
  <meta name="wap-font-scale" content="no" />
  <meta content="telephone=no" name="format-detection" />
  <meta http-equiv="Pragma" content="no-cache" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/mobile/reset.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/mobile/common.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/mobile/index.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/mobile/slider.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/mobile/swiper.min.css" />



  <script src="<?php echo base_url();?>js/mobile/jquery.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>js/mobile/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>js/mobile/jssor.slider-23.0.0.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>js/mobile/slider.js" type="text/javascript"></script>

 </head>
 <body>
  <div class="public-header">
   <div class="clear">
    <div class="logo">
     <a href="<?php echo base_url();?>"><img src="<?php echo $logo;?>" alt="" /></a>
    </div>
    <div class="menu">
     <img src="<?php echo base_url();?>images/mobile/menu.jpg" alt=""/>
    </div>
   </div>
  </div>
  <div class="ml" style="">
   <div class="menulist clear" style="overflow:visible;">
    <a href="<?php echo base_url();?>">
     <div class="item">
      首页
     </div></a>
    <a href="<?php echo site_url('Article/index/18');?>">
      <div class="item">
        公司简介
      </div>
    </a>
    <a href="<?php echo site_url('Article/index/2');?>">
      <div class="item">
        产品简介
      </div>
    </a>
    <a href="<?php echo site_url('Article/index/3');?>">
     <div class="item">
      产品展示
     </div></a>
    <a href="<?php echo site_url('Article/index/4');?>">
     <div class="item">
      新闻中心
     </div></a>
    <a href="<?php echo site_url('Article/index/5');?>">
     <div class="item">
      业绩展示
     </div></a>
    <a href="<?php echo site_url('Article/index/6');?>">
     <div class="item">
      服务承诺
     </div></a>
     <a href="<?php echo site_url('Article/index/7');?>">
      <div class="item">
        人才招聘
      </div>
    </a>
    <a href="<?php echo site_url('Article/index/8');?>">
      <div class="item">
        联系方式
      </div>
    </a>
   </div>
  </div>
  <div class="hx"></div>
  <div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:640px;height:350px;overflow:hidden;visibility:visible;">
   <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
    <div style="position:absolute;display:block;background:url(<?php echo base_url();?>images/mobile/loading.gif) no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
   </div>
   <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:640px;height:350px;overflow:hidden;background:none;">
    <?php foreach ($AdList as $value):?>
      <div>
        <img data-u="image" border="0" src="<?php echo $value['g_path'];?>" alt="" />
      </div>
    <?php endforeach;?>
   </div>
   <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
    <div data-u="prototype" style="width:12px;height:12px;"></div>
   </div>
   <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
   <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
  </div>
  <script type="text/javascript">jssor_1_slider_init();</script>
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>重庆福泉环保科技有限公司</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="no-transform"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=2.0, user-scalable=1"> -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="layoutmode" content="standard">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="renderer" content="webkit">
<!--uc浏览器判断到页面上文字居多时，会自动放大字体优化移动用户体验。添加以下头部可以禁用掉该优化-->
<meta name="wap-font-scale" content="no">
<meta content="telephone=no" name="format-detection" />
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">

<link rel="stylesheet" href="<?php echo base_url();?>css/mobile/reset.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/mobile/common.css"/>
<script src="<?php echo base_url();?>js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/mobile/index.css"/>
<link rel="stylesheet" href="http://static.pigcms.com/wap/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/mobile/pigstyle.css">
<link type="text/css" href="<?php echo base_url();?>css/mobile/style.css" rel="stylesheet"/>
<script src="<?php echo base_url();?>js/mobile/zepto.min.js"></script>
<script src="<?php echo base_url();?>js/mobile/swiper.jquery.min.js"></script>


</head>
<body faiscoMobi="true" onload="gundong()">
  <div class="public-header clear">
      <img class="logo" src="<?php echo $logo;?>"/>
      <img class="menu" src="<?php echo base_url();?>images/mobile/phone-nav.png"/>
      <div class="menulist clear" style="overflow:visible;z-index:1000;">
        <a href="/"><div class="item">首页</div></a>
        <?php foreach ($headnavlist as $hnav):?>
          <a href="/m.php?m=about&a=index"><div class="item"><?php echo $hnav['c_name'];?></div></a>
        <?php endforeach;?>
      </div>
  </div>
<!--首页轮播图-->
<section class="scroll">
    <!-- Swiper -->
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
          <?php foreach ($AdList as $ad):?>
            <div class="swiper-slide">
                <img src="<?php echo $ad['g_path'];?>" width="100%">
            </div>
          <?php endforeach;?>   
        </div>
        <?php if (count($AdList)>1):?>
        <div class="swiper-pagination swiper-pagination-banner"></div>
        <?php endif;?>
    </div>
    <script>
        var swiper = new Swiper('.swiper-container-banner', {
            loop:true,
            autoplay: 5000,//可选选项，自动滑动
            // 如果需要分页器
            pagination: '.swiper-pagination-banner'
        });
    </script>
</section>
