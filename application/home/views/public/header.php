<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $net_title;?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
	<meta name="keywords" content="<?php echo $net_keys;?>"/>
	<meta name="description" content="<?php echo $net_description;?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/ace.min.css';?>">
	<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css"/>
	<link rel="stylesheet" href="<?php echo base_url();?>css/common.css"/>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery1.42.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.SuperSlide.2.1.2.js"></script>
  <style type="text/css">
    *{zoom:1}
    .fullSlide{ position:relative; background:#000; margin:0 auto; }
    .fullSlide .bd{ position:relative; z-index:0; }
    .fullSlide .bd li img{width:100%; vertical-align:top;  } 
    .fullSlide .hd{display:block;position:relative; z-index:1; margin-top:-30px; height:30px; line-height:30px;  text-align:center;
       /*background:#000; filter:alpha(opacity=60);opacity:0.6 */
    }
    .fullSlide .hd ul{ text-align:center;  padding-top:5px;  }
    .fullSlide .hd ul li{ cursor:pointer; display:inline-block; *display:inline; zoom:1; width:8px; height:8px; margin:5px; background:url(/Public/default/images/tg_flash_p.png) -18px 0; overflow:hidden; 
      font-size:0;
    }
    .fullSlide .hd ul .on{ background-position:0 0; }
    .fullSlide .prev,.fullSlide .next{ z-index:1; display:block; width:55px; height:55px; position:relative; margin:-20% 0 0 3%; float:left;  background:url(/Public/default/images/arrow.png) 0 0 no-repeat; filter:alpha(opacity=40);opacity:0.4  }
    .fullSlide .next{  background-position:right 0; float:right; margin-right:3%  }
    .fullSlide .prev:hover,.fullSlide .next:hover{ filter:alpha(opacity=80);opacity:0.8 }
  </style>



		<link rel="stylesheet" href="<?php echo base_url();?>css/index.css"/>
	</head>
<body>
<link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css">
<div class="public-header">
	<div class="logo">
		<a href="/"><img class="logo1" src="<?php echo $logo;?>" alt=""></a>
		<div class="text">重庆市万通仪器仪表有限公司</div>
	</div>
	<div class="public-menu">
		<div class="public-menu-in">
			<div class="public-menu-inner">
				<?php if ($area!=''):?>
				<a href="/<?php echo strtolower($area);?>.html">
				<?php else:?>
				<a href="/">
				<?php endif;?>
					<div class="menu-item">网站首页</div>
				</a>
				<?php foreach ($headnavlist as $nav):?>
					<a href="<?php echo site_url(array('Article','index',$nav['c_id']));?>">
						<div class="menu-item"><?php echo $nav['c_name'];?></div>
					</a>
				<?php endforeach;?>
			</div>	
			<div class="menu-move m<?php echo $topcid+1;?>"></div>
		</div>
	</div>
</div>
<script>
window.onload = function(){
	var pw = $(document.body).width();
	if (pw>1550)
    {
    	$("<div class='tel'>023-6826-5598</div>").appendTo(".public-header");
    }
    else
    {
    	$(".public-menu").css({'position':'static','right':'0px','float':'right','margin-right':'80px'});
    }

	var ni1 = $(".productlist>#box_zj>.ul .p-item").length;
	$(".productlist>#box_zj").append($(".productlist>#box_zj>.ul").clone());
	if (ni1>3)
	{
		setInterval(move,20);
	}
}
$(window).resize(function () {          //当浏览器大小变化时
    var pw = $(document.body).width();          //浏览器时下窗口可视区域高度
    if (pw<=1550)
    {
    	$(".public-header .tel").hide();
    	$(".public-menu").css({'position':'static','right':'0px','float':'right','margin-right':'80px'});
    	//$(".public-menu").css('right','80px');
    }
    else
    {
    	$(".public-header .tel").show();

    	$(".public-menu").css('right','300px');
    }
});
$(".menu-item").mouseover(function(){
	$(".menu-move").stop(true,true);
	var index = $(this).parent().index();
	var left = parseInt($(".menu-move").css("left"));
	left = 86*parseInt(index)-15;
	$(".menu-move").animate({"left":left+"px"},300);
});
$(".public-menu-in").mouseleave(function(){
	var c = $(".menu-move").attr('class');
	var left = -15;
	switch (c)
	{
		case "menu-move m1":
		left = -15+86*(1-1);
		break;
		case "menu-move m2":
		left = -15+86*(2-1);
		break;
		case "menu-move m3":
		left = -15+86*(3-1);
		break;
		case "menu-move m4":
		left = -15+86*(4-1);
		break;
		case "menu-move m5":
		left = -15+86*(5-1);
		break;
		case "menu-move m6":
		left = -15+86*(6-1);
		break;
		case "menu-move m7":
		left = -15+86*(7-1);
		break;
		case "menu-move m8":
		left = -15+86*(8-1);
		break;
		case "menu-move m9":
		left = -15+86*(9-1);
		break;
	}
	$(".menu-move").animate({"left":left+"px"},300);
});
</script>
		</div>
	</div>

<div class="fullSlide row" style="padding:50px 80px 0px 80px;background:#fff;">
<div class="bd">
  <ul>
  	<?php foreach ($AdList as $ad): ?>
    <li>
        <a target="_blank" href="#"><img src="<?php echo $ad['g_path'];?>"/></a>
      </li>  
      <?php endforeach; ?>
  </ul>
</div>
<div class="hd"><ul></ul></div>
  <style>
    .f{z-index:100;}
    .f1{display:block;position:absolute;left:50%;margin-left:-600px;top:30%;width:580px;height: 195px;z-index:2000;}
    .f2{display:none;position:absolute;left:50%;margin-left:-600px;top:30%;width:580px;height: 195px;z-index:2000;}
    .f3{display:none;position:absolute;left:50%;margin-left:-600px;top:30%;width:580px;height: 195px;z-index:2000;}
    .f .inner{position: absolute;width: 600px;height: 174px;}
    .f .inner .shi{position: absolute;background: url(<?php echo base_url().'images/default/banner-bg.png';?>) no-repeat center;top:0;right:0;width: 570px;height: 177px;z-index: 101;padding-top: 25px;padding-left: 40px;}
    .f .inner .shi p:nth-child(1){color:#fff;font-size: 49px;line-height:58px;margin-top:10px;font-family:'微软雅黑';font-weight:bold;text-indent: 62px;z-index: 5102;font-style: italic;}
    .f .inner .shi p:nth-child(2){color: #fff;font-size: 31px;line-height:36px;font-family:Arial;font-weight:bold;text-indent: 56px;z-index: 5102;font-style: italic;}
    .f .inner .shi p:nth-child(2) span{color:#fff;}
    .f .inner .shi p:nth-child(3){font-size: 31px;line-height:36px;text-indent: 50px;color:#fff;font-family: Arial;font-weight:bold;z-index: 5102;font-style: italic;}
  </style>
	<div class="f f1 wow fadeIn animate" data-wow-delay="1s" data-wow-duration="2s">
	    <div class="inner">
	          <div class="shi">
	            <p class="p1" data-wow-duration="1s">科技领先 高效创新</p>
	            <p class="p2" data-wow-delay="1s" data-wow-duration="1s">SCIENCE AND TECHNOLOGY</p>
	            <p class="p3" data-wow-delay="2s" data-wow-duration="1s">INNOVATION</p>
	          </div>
	      </div>
	</div>
	<div class="f f2 wow fadeIn animate" data-wow-delay="1s" data-wow-duration="2s">
	    <div class="inner">
	          <div class="shi">
	            <p class="p1" data-wow-duration="1s">科技领先 高效创新</p>
	            <p class="p2" data-wow-delay="1s" data-wow-duration="1s">SCIENCE AND TECHNOLOGY</p>
	            <p class="p3" data-wow-delay="2s" data-wow-duration="1s">INNOVATION</p>
	          </div>
	      </div>
	    </div>
	</div>
	<div class="f f3 wow fadeIn animate" data-wow-delay="1s" data-wow-duration="2s">
	    <div class="inner">
	          <div class="shi">
	            <p class="p1" data-wow-duration="1s">科技领先 高效创新</p>
	            <p class="p2" data-wow-delay="1s" data-wow-duration="1s">SCIENCE AND TECHNOLOGY</p>
	            <p class="p3" data-wow-delay="2s" data-wow-duration="1s">INNOVATION</p>
	          </div>
	      </div>
	    </div>
	</div>
</div>
 -->
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0022)http://www.fqhbkj.com/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo $net_title;?></title>
  <meta name="keywords" content="<?php echo $net_keys;?>" />
  <meta name="description" content="<?php echo $net_description;?>" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/common.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>css/slider.css" />
  <script src="<?php echo base_url();?>js/jquery.js"></script>
  <script src="<?php echo base_url();?>js/slider.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>css/index.css" />
 </head>
 <body>
  <!--公共导航菜单等-->
  <link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css" />
  <div class="public-header">
   <div class="public-container clear">
    <div class="logo">
     <a href="<?php echo base_url();?>"><img src="<?php echo $logo;?>" alt="" /></a>
    </div>
    <div class="nav clear">
	<?php if ($area!=''):?>
		<a class="link <?php if ($topcid==0): echo 'on';endif;?>" href="<?php echo base_url().strtolower($area);?>.html">首页</a>
     	<a class="sper" href="javascript:void(0);"> | </a>
	<?php else:?>
		<a class="link <?php if ($topcid==0): echo 'on';endif;?>" href="<?php echo base_url();?>">首页</a>
     	<a class="sper" href="javascript:void(0);"> | </a>
	<?php endif;?>
	
	<?php foreach ($headnavlist as $key=>$nav):?>
		<?php if ($key+1==count($headnavlist)):?>
			<?php if ($topcid==$nav['c_id']):?>
				<a class="link on" href="<?php echo site_url(array('Article','index',$nav['c_id']));?>"><?php echo $nav['c_name'];?></a>
			<?php else:?>
				<a class="link" href="<?php echo site_url(array('Article','index',$nav['c_id']));?>"><?php echo $nav['c_name'];?></a>
			<?php endif;?>
		<?php else:?>
			<?php if ($topcid==$nav['c_id']):?>
			<a class="link on" href="<?php echo site_url(array('Article','index',$nav['c_id']));?>"><?php echo $nav['c_name'];?></a>
     		<a class="sper" href="javascript:void(0);"> | </a>
			<?php else:?>
			<a class="link" href="<?php echo site_url(array('Article','index',$nav['c_id']));?>"><?php echo $nav['c_name'];?></a>
     		<a class="sper" href="javascript:void(0);"> | </a>
			<?php endif;?>
			
		<?php endif;?>
	<?php endforeach;?>
    </div>
   </div>
  </div>
  <!--轮播图-->
  <div id="lunbo">
   <div class="bx-wrapper" style="max-width: 1920px;">
    <div class="bx-viewport">
     <div class="slider6">
     	<?php foreach ($AdList as $ad): ?>
			<div class="slide bx-clone">
		       <a href="<?php echo $ad['g_link'];?>"><img src="<?php echo $ad['g_path'];?>" /></a>
		    </div>
     	<?php endforeach;?>
     </div>
    </div>
   </div>
  </div>
