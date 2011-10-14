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
    }
    else
    {
    	$("#loginTabUser").addClass("active");
    	$("#loginTabFtp").removeClass("active");
    }

}