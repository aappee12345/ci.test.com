<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0028)<?php echo site_url(array('Area','index'));?> -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>地区分站 - <?php foreach ($net_keys as $key):?>
<?php echo $key;?>_<?php endforeach;?><?php echo $copy;?></title>
<style type="text/css">
body,div,span,object,iframe,h1,h2,h3,h4,p,dl,dt,dd,ol,ul,li
{margin:0;padding:0;border:0;}
body{background:#fff;color:#666;position:relative;font-size:100%;font:12px/1.5 微软雅黑,arial,sans-serif;vertical-align:baseline;width:100%;overflow-x:hidden;}
a{text-decoration:none;outline:none;}
a:link{color:#666;}
a:visited{color:#666;}
a:hover,a:active,a:focus{color:#940402;text-decoration:none;outline:none;}
ul,ol,li{list-style-type:none;}




.clearfix:after{content: ".";display: block;height: 0;clear: both;overflow: hidden;visibility: hidden;}
.clearfix{zoom:1}
.region{margin-top:10px;border:1px solid #e0e1dc;}
.region h3{background:#eee;line-height:30px;padding-left:10px;position:relative;}
.region .item{padding:10px;line-height:28px;display:block;}
.region .item a{padding-left:15px;padding-right:15px;float:left;}
.region .item a:hover{text-decoration:none;background:#3480ce;color:#fff;}
.more_region{position:absolute;right:10px;line-height:28px;top:0;font-weight:normal;}
#container{width:1000px;margin:0 auto;margin-top:10px;border:1px solid #f4f4f4;padding:10px;}
.hot{border-bottom:2px solid #eb2830;padding-bottom:8px;}
.hot li{float:left;margin-right:10px;margin-bottom:10px;}
.hot li a{display:block;line-height:32px;padding-left:16px;padding-right:16px;background:#f4f4f4;}
.hot li a:hover{text-decoration:none;background:#eb2830;color:#fff;}
.city_list{padding-top:10px;}
.item{padding:10px 0;line-height:24px;overflow:hidden;border-bottom:1px dashed #ddd;}
.item dt{float:left;font-family:arial;font-weight:bold;font-size:18px;width:35px;padding-left:25px;color:#444;}
.item dd{margin:0 0 0 55px;padding-left:15px;border-left:1px dashed #b2b2b2;}
.item dd a{padding:1px 12px 1px 12px;white-space:nowrap;float:left;}
.item dd a:hover{text-decoration:none;background:#eb2830;color:#fff;}
#foot{width:1022px;margin:0 auto;text-align:center;margin-top:10px;line-height:24px;color:#666;border-top:2px solid #eb2830;
padding-top:10px;}
#foot a{color:#666;}
.return{position:relative;height:36px;padding:6px;width:1000px;margin:0 auto;text-align:left;font:bold 22px/42px "微软雅黑";color:#737372;}
.return a{position:absolute;right:10px;top:12px;height:36px;width:100px;text-align: center;display:block;background:#eb2830;color:#fff;line-height: 36px;font-size:12px;font-weight: bold;}
.return a:hover{text-decoration:none;background:#f39c11;color:#fff;}
</style>
</head>
<body>
<!-- 主体部分 -->
<div class="return">企业分站<a href="<?php echo base_url();?>">返回首页</a></div>
<div id="container">
	<div class="hot">
		<ul class="clearfix">
			<?php foreach ($arealist as $area):?>
				<?php if ($area['area_pid']==0):?>
					<li><a href="/<?php echo $area['area_pinyin'];?>.html" target="_blank"><?php echo $area['area_name'];?></a></li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="city_list">
		<?php foreach ($arealists as $area):?>
			<dl class="item clearfix">
				<dt><?php echo $area['zimu'];?></dt>
				<dd>
					<?php foreach ($area['areas'] as $a):?>
						<a href="/<?php echo $a['area_pinyin'];?>.html" target="_blank"><?php echo $a['area_name'];?></a>
					<?php endforeach;?>
				</dd>
			</dl>
		<?php endforeach;?>
		
	  	</div>
</div>
<div id="foot">
<div class="copyright">
<?php echo $copy;?> 
<?php foreach ($net_keys as $key):?>

<a href="<?php echo base_url();?>"><?php echo $key;?></a>
<?php endforeach;?>
</div>
</div>

</body></html>