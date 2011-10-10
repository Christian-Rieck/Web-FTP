$(document).ready(function() 
{
	//On Click Event
	$("ul.tabs li a").click(function() 
	{
		$("ul.tabs li a").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();

		var activeTab = $(this).attr("href");
		$(activeTab).fadeIn();
	});
	
	//On Click Event
	$("#ssl").click(function() 
	{
		if($("#ssl").attr("checked") == "checked")
			$("input[name=port]").attr("placeholder", "993");
		else
			$("input[name=port]").attr("placeholder", "21");
	});
});