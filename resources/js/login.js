$(document).ready(function() {
	$(".tab").click(function() {
	
		form = $(this).attr("id");
		
		$.get(ROOT + "Ajax/LoginForm/&form=" + form, function(data)
		{
			$("#formBox").hide();
			$("#formBox").html(data);
			$("#formBox").fadeIn();		
	    });
	    
	    if(form == "loginTabFtp")
	    {
	    	$("#loginTabFtp").addClass("active");
	    	$("#loginTabUser").removeClass("active");
	    	$("#loginTabRegister").removeClass("active");
	    }
	    else if(form == "loginTabUser")
	    {
	    	$("#loginTabUser").addClass("active");
	    	$("#loginTabFtp").removeClass("active");
	    	$("#loginTabRegister").removeClass("active");
	    }
	    else
	    {
	    	$("#loginTabRegister").addClass("active");
	    	$("#loginTabUser").removeClass("active");
	    	$("#loginTabFtp").removeClass("active");
	    }
	    
	});
});