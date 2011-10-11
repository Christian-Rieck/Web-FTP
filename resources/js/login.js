function loginForm(form) {
	
	$.get(ROOT + "Ajax/LoginForm/&form=" + form, function(data)
	{
		$("#form-box").hide();
		$("#form-box").html(data);
		$("#form-box").fadeIn();		
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