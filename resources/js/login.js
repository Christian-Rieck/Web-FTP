function loginForm(form) {
	
	$.get(ROOT + "Ajax/LoginForm/&form=" + form, function(data)
	{
		$("#formBox").hide();
		$("#formBox").html(data);
		$("#formBox").fadeIn();		
    });
    
    if(form == "ftp")
    {
    	$("#loginTabFtp").addClass("active");
    	$("#loginTabUser").removeClass("active");
    	$("#loginTabRegister").removeClass("active");
    }
    else if(form == "user")
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

}