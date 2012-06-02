$(document).ready(function() {	
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