<div class="main" style="margin-top:20px;">
	<!--板块名称-->
	<div class="public-container clear">
		<div class="top">
			<span class="zh"><?php echo $cate['c_name'];?></span>
			<span class="en"><?php echo strtoupper($cate['ec_name']);?></span>
			<a class="more" href="<?php echo site_url('Article/index').'/'.$cate['c_id'];?>">MORE +</a>
		</div>
	</div>	<!--分类列表-->
	<?php if (count($soncatelist)>1||is_string($returnurl)):?>
	<div class="box">
		<div class="ctable">
			<div class="catelist">
				<div class="public-container clear">
					<div class="clist clear">
						<?php foreach ($soncatelist as $val): ?>
							<?php if ($val['c_id']==$cid): ?>
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
	<!--文章列表-->
	<div class="articlelist">
		<div class="public-container clear">
			<div class="piclist clear">
				<?php foreach ($articlelist as $value):?>
				<a href="<?php echo site_url('/Article/content').'/'.$value['a_id'];?>">
					<div class="pic-item clear">
						<div class="img"><img src="<?php echo $value['a_pic'];?>" alt=""></div>
						<div class="title"><?php echo $value['a_fulltitle'];?></div>
					</div>
				</a>
				<?php endforeach;?>
			</div>
		</div>
	</div>
	<!--分页-->
	<div id='amore' class="more">查看更多</div>
	<div class="c40"></div>
<script type="text/javascript">
var p = 2;
$("#amore").click(function(){
  var cid = <?php echo $cid;?>;
  var pagesize = <?php echo $per;?>;
  $.ajax({
    type:'POST',
    url:'/m.php/Article/moreAjax',
    data:{cid:cid,page:p,pagesize:pagesize},
    dataType:'JSON',
    success:function(msg){
      if (msg=='')
      {
        $("#amore").remove();
      }
      else
      {
        for(var p in msg){
          var content = '';
		  content += "<a href='"+msg[p].url+"'>";
		  content += "<div class='pic-item clear'>";
		  content += "<div class='img'><img src='"+msg[p].a_pic+"' alt=''></div>";
		  content += "<div class='title'>"+msg[p].a_fulltitle+"</div>";
		  content += "</div></a>";
          $(".piclist").append(content);
        }
      }
    },
  });
  p++;
});

</script>

</div>

