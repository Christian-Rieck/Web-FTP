$(document).ready(function() {
	$(".item").click(function() {
		var i, p, c, oi, ni;
		
		i = $(this);
		p = i.parent();
		c = p.children(".checked");
		oi = c.children(".content").children(".icon");
		ni = i.children(".content").children(".icon");
		
		c.removeClass("checked");
		
		oi.css("background-image", oi.css("background-image").replace("/active/", "/inactive/"));
		
		i.addClass("checked");
		
		ni.css("background-image", ni.css("background-image").replace("/inactive/", "/active/"));
		
		p.children(".triangle").animate({
				top: i.index() * 70 + 24
			}, 500);
		
		var co = i.parent().parent().children(".content");
		var menu = i.attr("id");
		
		$.get(ROOT + "Ajax/UserMenu/&menu=" + menu, function(data) {	
				co.hide();
				co.children().html(data);
				co.fadeIn();		
	    	});
	});
});