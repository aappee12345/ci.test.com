function move()
{
	if (parseInt($(".productlist>#box_zj>.ul").css("margin-left"))<-(311*$(".productlist>#box_zj>.ul .p-item").length/2))
	{
		$(".productlist>#box_zj>.ul").css("margin-left","0px");
	}
	else
	{
		$(".productlist>#box_zj>.ul:first-child").css("margin-left",(parseInt($(".productlist>#box_zj>.ul:first-child").css("margin-left"))-1)+'px');
	}
}
