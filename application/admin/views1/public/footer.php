<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span>
			                <a href="http://www.cqzz.net/" target="_blank" class="blue" style="font-size:12px;">技术支持：重庆满荣网络技术有限公司</a>　　电话：189-0831-3333
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = 
				$('#sample-table-2')
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
			    } );
			
			
				$(document).on('click', 'th input:checkbox' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			})
			$(".file").on("change","input[type='file']",function(){
			    var filePath=$(this).val();
			    if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
			        $(".fileerrorTip").html("").hide();
			        var arr=filePath.split('\\');
			        var fileName=arr[arr.length-1];
			        $(".showFileName").html(fileName);
			    }else{
			        $(".showFileName").html("");
			        $(".fileerrorTip").html("<div class='alert alert-danger' style='line-height:20px;padding:0px 8px;margin-bottom:8px;margin-top:2px;'><i class='ace-icon fa fa-times'></i>&nbsp;&nbsp;您未上传文件，或者您上传文件类型有误！</div>").show();
			        $("#s").remove();
			        return false 
			    }
			})

			$(".file1").on("change","input[type='file']",function(){
			    var filePath=$(this).val();
			    if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
			        $(".fileerrorTip1").html("").hide();
			        var arr=filePath.split('\\');
			        var fileName=arr[arr.length-1];
			        $(".showFileName1").html(fileName);
			    }else{
			        $(".showFileName1").html("");
			        $(".fileerrorTip1").html("<div class='alert alert-danger' style='line-height:20px;padding:0px 8px;margin-bottom:8px;margin-top:2px;'><i class='ace-icon fa fa-times'></i>&nbsp;&nbsp;您未上传文件，或者您上传文件类型有误！</div>").show();
			        $("#s").remove();
			        return false 
			    }
			})

			$(".file2").on("change","input[type='file']",function(){
			    var filePath=$(this).val();
			    if(filePath.indexOf("jpg")!=-1 || filePath.indexOf("png")!=-1){
			        $(".fileerrorTip2").html("").hide();
			        var arr=filePath.split('\\');
			        var fileName=arr[arr.length-1];
			        $(".showFileName2").html(fileName);
			    }else{
			        $(".showFileName2").html("");
			        $(".fileerrorTip2").html("<div class='alert alert-danger' style='line-height:20px;padding:0px 8px;margin-bottom:8px;margin-top:2px;'><i class='ace-icon fa fa-times'></i>&nbsp;&nbsp;您未上传文件，或者您上传文件类型有误！</div>").show();
			        $("#s").remove();
			        return false 
			    }
			})
		</script>
		
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.onpage-help.css" />
		<!-- <link rel="stylesheet" href="<?php echo base_url();?>docs/assets/js/themes/sunburst.css" /> -->

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?php echo base_url();?>assets/js/ace/elements.onpage-help.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace/ace.onpage-help.js"></script>
		<!--<script src="<?php echo base_url();?>docs/assets/js/rainbow.js"></script>-->
		<!--<script src="<?php echo base_url();?>docs/assets/js/language/generic.js"></script>-->
		<!--<script src="<?php echo base_url();?>docs/assets/js/language/html.js"></script>-->
		<!--<script src="<?php echo base_url();?>docs/assets/js/language/css.js"></script>-->
		<!--<script src="<?php echo base_url();?>docs/assets/js/language/javascript.js"></script>-->
		<script type="text/javascript">
        function getDate01() {
            mydate = new Date();
            var myweekday = mydate.getDay();
            var myyear = mydate.getFullYear();//年
            var mymonth = mydate.getMonth() + 1;//月
            var myday = mydate.getDate();//日
            var myHour = mydate.getHours();
            var myMinutes = mydate.getMinutes();
            var mySeconds = mydate.getSeconds();
            var newMunutes = myMinutes;
            var newSec = mySeconds;
            var thesjd = "";
            if (myHour <= 6) { thesjd = "凌晨"; }
            if (myHour < 12 && myHour > 6) { thesjd = "上午"; }
            if (myHour >= 12 && myHour < 18) { thesjd = "下午"; }
            if (myHour >= 18 && myHour < 24) { thesjd = "晚上"; }
            if (myMinutes < 10) { newMunutes = "0" + myMinutes; }
            if (mySeconds < 10) { newSec = "0" + mySeconds; }
            if (myweekday == 0)
                weekday = " 星期日 ";
            else if (myweekday == 1)
                weekday = " 星期一 ";
            else if (myweekday == 2)
                weekday = " 星期二 ";
            else if (myweekday == 3)
                weekday = " 星期三 ";
            else if (myweekday == 4)
                weekday = " 星期四 ";
            else if (myweekday == 5)
                weekday = " 星期五 ";
            else if (myweekday == 6)
                weekday = " 星期六 ";
            var times = "今天是" + myyear + "年" + mymonth + "月" + myday + "日" + weekday + " " + thesjd + " " + myHour + ":" + newMunutes + ":" + newSec;
            setTimeout("getDate01()", 1000)
            document.getElementById("day_day").innerHTML = times;
        }
    $(function () {
        getDate01();
        $("body").attr("class", "skin-1");
    });
</script>
	</body>
</html>
