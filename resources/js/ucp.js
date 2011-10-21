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
	
	var me = false;
			
	function closeMenu() {
		$("#topMenu > .menu").hide(200);
		$("#topMenu > .content > .bar > li").removeClass("marked");
		
		me = false;
	}
	
	function openMenu(li) {
		var m, p;
		
		m = $("#topMenu > .menu > div");
		p = m.parent();
		
		m.css("left", li.position().left + "px");
		m.html("Ein Testeintrag");
		
		$("#topMenu > .content > .bar > li").removeClass("marked");
		li.addClass("marked");
		
		p.show();
		
		p.click(function() {
			closeMenu();
		});
		
		me = true;
	}
	
	$("#topMenu > .content > .bar > li").click(function() {
		if	(me)
			closeMenu();
		else
			openMenu($(this));
	});
	
	$("#topMenu > .content > .bar > li").mouseover(function() {
		if (me)
			openMenu($(this));
	});
});