
/*公共菜单脚本*/
$(".nav-li").mouseover(function(){
	$(".nav-li .menu").css('display','block');
	$(".nav-li .menu-on").css('display','none');
	$(this).children('.menu').css('display','none');
	$(this).children('.menu-on').css('display','block');
});
$(".nav-li").mouseout(function(){
	$(".nav-li .menu").css('display','block');
	$(".nav-li .menu-on").css('display','none');
});


