<html>
<head>
	<title> 页面没有找到 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<style>
		body{background: url(/images/common/error-bg.jpg);border-radius: 10px;}
		table tbody.tb{background: url(/images/common/tz-002.png);overflow: hidden;}
		table td.td{background: url(/images/common/error.png) no-repeat 20px center;}
	</style>
</head>
<body>
<script type="text/javascript">
var t = 5;
setInterval('timego()',1000);
function isIFrameSelf(){
	try
	{
		if(window.top ==window)
		{return false;}
		else
		{return true;}
	}
	catch(e)
	{
		return true;
	}
}
function toHome(){
 if(!isIFrameSelf())
 	{ window.location.href="<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>";}
}
window.setTimeout("toHome()",5000);


function timego()
{
	t--;
	$("#t").html("<strong>页面没有找到 "+t+"秒钟之后将会带您进入<a href=\'http://<?php echo $_SERVER['HTTP_HOST'];?>\' style='color:#666;'>网站首页</a>!</strong>");
	
}

</script>

<table border="0" cellpadding="0" cellspacing="0">
 <tbody><tr><td height="134"></td></tr>
</tbody></table>
<table width="544" height="157" border="0" cellpadding="0" cellspacing="0" align="center">
  <tbody class="tb">
  	<tr valign="middle" align="middle">
	<td class="td">
	    <table border="0" cellpadding="0" cellspacing="0">
		 <tbody><tr>
		    <td id="t" style="padding-left:80px;padding-top:10px"><strong>页面没有找到 5秒钟之后将会带您进入<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>" style="color:#666;">网站首页</a>!</strong></td>
                 </tr>
            </tbody></table>
	</td>
  </tr>
</tbody></table>
<br>


</body></html>