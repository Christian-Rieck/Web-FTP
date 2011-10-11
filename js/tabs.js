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

function bottomNewServer()
{	
	var n = $("#bottomAction");
	
	if(n.css('top') == "0px")
	{
		n.animate({
			top: '-' + n.outerHeight() + 'px'
		}, 'slow');
		n.parent().slideUp('slow');
	}
	else
	{
		n.animate({top: '0px'}, 'slow');
	    n.parent().slideDown('slow');
	}
}

function removeServer(serverID)
{
	if(confirm('Möchten Sie den gewählten Server aus der Liste entfernen?'))
		$("#serverList option[value="+serverID+"]").remove();
}