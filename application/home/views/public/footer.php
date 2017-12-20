<!--加载尾部-->
  <div class="public-footer">
   <div class="public-container">
    <div class="img">
     <a href="<?php echo base_url();?>"><img src="<?php echo $logo1;?>" alt="底部LOGO" /></a>
    </div>
    <div class="right">
     <div class="menu clear">
      <a class="menu-li" href="<?php echo base_url();?>">首页</a>
      <?php foreach ($footnavlist as $nav):?>
        <a class="menu-sper" href="javascript:void(0);"> / </a>
        <a class="menu-li" href="<?php echo site_url(array('Article','index',$nav['c_id']))?>"><?php echo $nav['c_name'];?></a>
      <?php endforeach;?>
     </div>
     <div class="down">
      <div class="info clear">
       <div class="info1 clear">
        <div class="le">
         <p>网站名称：<?php echo $copy;?></p>
         <p>地 址： <?php echo $address;?></p>
        </div>
        <div class="ri">
         <p> 备案号：<?php echo $beian;?> </p> 
         <p> 技术支持：<a href="http://www.cqzz.net/" target="_blank" title="重庆满荣网络技术有限公司">重庆满荣网络技术有限公司</a>&nbsp; <a href="http://www.cqzz.net/" target="_blank" title="重庆做网站">重庆做网站</a> </p>
        </div>
       </div>
       <div class="info2">
        <div class="tel">
         <span>电话：</span>
         <span class="num"><?php echo $phone;?></span>
        </div>
        <div class="qq">
         QQ：<?php echo $qq;?>
        </div>
       </div>
      </div>
      <div class="ewm clear">
       <div class="eimg eimg1">
        <img class="ewm1" src="<?php echo $weixin;?>" alt="微信咨询" />
        <div class="title">
         微信咨询
        </div>
       </div>
       <div class="eimg eimg2">
        <img class="ewm1" src="<?php echo $ewm;?>" alt="手机网站" />
        <div class="title">
         手机网站
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <script src="<?php echo base_url();?>js/wow.min.js"></script>
  <script>  if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
    new WOW().init();
  };
  </script>
  <script>    /*轮播*/
    $('.slider6').bxSlider({
    mode: 'horizontal',
      slideWidth: 1920, 
      controls:false,
      auto:true,
      parse:1000,
    });
    </script>
  <!--DUWN-->
 </body>
</html>