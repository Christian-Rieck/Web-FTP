function ajaxfade(script, outputdiv, num)
{		
    var hoehe = $("#slider").height();
	if(hoehe == 0)
	{
		$(outputdiv).html("<center><div style=\"padding:15px\"><img src=\"images/ajax-loader.gif\" style=\"display: block; padding-bottom: 10px\" />Lade...</div></center>");
	}
	
	if (num == "bottomLoader")
	{
		$("#bottomLoader").fadeIn("fast");
	}
	else if (num != null)
	{
		$("#loader_" + num).fadeIn("fast");
	}
	else
	{
		$("#loader").fadeIn("fast");
	}

	$.get(script, function(data)
	{
		$(outputdiv).hide();
	    $(outputdiv).html(data);
	    $(outputdiv).fadeIn("fast");
    });   
}

function settings()
{	
	var n = $("#settings");
	
	if (n.css('top') == "0px")
	{
		var animate = n.outerHeight() + 10 + "px";
		n.animate({top: '-' + animate}, 'slow');
	}
	else
	{
		$.get('ajax/settings.php', function(data)
		{
			n.html(data);
	    	n.animate({top: '0px'}, 'slow');
	    });
	}
}