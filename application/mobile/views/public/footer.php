 <!--footer-->
  <div class="hx"></div>
  <div class="public-footer row">
   <div class="public-container">
    <div class="footerinfo clear">
     <div class="address wow fadeInUp animate">
      地址：<?php echo $address;?>
     </div>
     <div class="address wow fadeInUp animate">
      电话：<?php echo $tel;?>
     </div>
     <div class="address wow fadeInUp animate">
      技术支持：
      <a href="http://www.cqzz.net" target="_blank">重庆满荣网络技术有限公司</a>
     </div>
    </div>
   </div>
   <div class="foot" style="position:static;display:inline-block;opacity:0;background:#e09d10;">
    <div class="footli">
     <a href="tel:<?php echo $tel;?>"><img src="<?php echo base_url();?>images/mobile/foot-tel.png" /></a>
    </div>
    <div class="footli">
     <a href="http://map.baidu.com/?newmap=1&amp;s=con%26wd%3D<?php echo $address;?>%26c%3D132&amp;from=alamap&amp;tpl=mapsite"><img src="<?php echo base_url();?>images/mobile/foot-addr.png" /></a>
    </div>
    <div class="footli">
     <a href="mqqwpa://im/chat?chat_type=wpa&amp;uin=<?php echo $qq;?>&amp;version=1&amp;src_type=web&amp;web_src=cqklqx.com"><img src="<?php echo base_url();?>images/mobile/foot-qq.png" /></a>
    </div>
   </div>
   <div class="foot" style="width:100%;">
    <div class="footli">
     <a href="tel:<?php echo $tel;?>"><img src="<?php echo base_url();?>images/mobile/foot-tel.png" /></a>
    </div>
    <div class="footli">
     <a href="http://map.baidu.com/?newmap=1&amp;s=con%26wd%3D<?php echo $address;?>%26c%3D132&amp;from=alamap&amp;tpl=mapsite"><img src="<?php echo base_url();?>images/mobile/foot-addr.png" /></a>
    </div>
    <div class="footli">
     <a href="mqqwpa://im/chat?chat_type=wpa&amp;uin=<?php echo $qq;?>&amp;version=1&amp;src_type=web&amp;web_src=cqklqx.com"><img src="<?php echo base_url();?>images/mobile/foot-qq.png" /></a>
    </div>
   </div>
  </div>
  <script src="<?php echo base_url();?>js/mobile/common.js"></script>
  <script src="<?php echo base_url();?>js/mobile/wow.min.js"></script>
  <script>if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
  new WOW().init();
};
</script>
 </body>
</html>