$(document).ready(function() {
	$(".window > .mainpart > .menu > .item").click(function() {
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
		$("#topMenu > .bar > .content > ul > li").removeClass("marked");
		$("#topMenu").css("height", "");
		
		me = false;
	}
	
	function openMenu(li) {
		var m, p;
		
		$("#topMenu").css("height", "100%");
		m = $("#topMenu > .menu > div");
		p = m.parent();
		
		m.css("left", li.position().left + "px");
		//m.html(m.children("#™_" + li.attr("value")).html());
		//m.children("#™_" + li.attr("value")).removeClass("hidden");
		
		m.children().addClass("hidden");
		m.children("#tm_" + li.attr("tag")).removeClass("hidden");
		
		$("#topMenu > .bar > .content > ul > li").removeClass("marked");
		li.addClass("marked");
		
		p.show();
		
		p.click(function() {
			closeMenu();
		});
		
		me = true;
	}
	
	$("#topMenu > .bar > .content > ul > li").click(function() {
		if (me)
			closeMenu();
		else
			openMenu($(this));
	});
	
	$("#topMenu > .bar > .content > ul > li").mouseover(function() {
		if (me)
			openMenu($(this));
	});
});

function viewServerReady(){
	$(".window > .mainpart > .content > div > .server").ready(function(){
		$(".window > .mainpart > .content > div > .server > .list > .item").click(function() {
			var i, p, c;
			
			i = $(this);
			p = i.parent();
			c = p.children(".item");
			
			c.removeClass("marked");
			
			i.addClass("marked");
		});
	});
}