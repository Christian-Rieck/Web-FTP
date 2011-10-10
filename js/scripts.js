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

/* -----------------------------------*/
/* ----------->>> TOOLS <<<-----------*/
/* -----------------------------------*/

// properties
function properties(file, num)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/properties.php?file='+file, function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('properties');
				n.removeClass('edit');
				n.removeClass('move');
				n.removeClass('chmod');
				n.removeClass('rename');
				n.removeClass('delete');
	    	}			
		});
		n.removeClass('properties');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/properties.php?file='+file, function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('properties');
	}
}

// edit
function edit(editfile, num, curdir)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('move') || n.hasClass('rename') || n.hasClass('chmod') || n.hasClass('properties') || n.hasClass('delete'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/edit.php?dir='+curdir+'&file='+editfile+'&num='+num, function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('edit');
				n.removeClass('move');
				n.removeClass('rename');
				n.removeClass('chmod');
				n.removeClass('properties');
				n.removeClass('delete');
	    	}			
		});
		n.removeClass('edit');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/edit.php?dir='+curdir+'&file='+editfile+'&num='+num, function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('edit');
	}
}

// move
function move(name, num)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('edit') || n.hasClass('rename') || n.hasClass('chmod') || n.hasClass('properties') || n.hasClass('delete'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/move.php?name=' + name + '&num='+num, function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('move');
				n.removeClass('edit');
				n.removeClass('rename');
				n.removeClass('chmod');
				n.removeClass('properties');
				n.removeClass('delete');
	    	}			
		});
		n.removeClass('move');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/move.php?name=' + name + '&num='+num, function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('move');
	}
}

// chmod
function chmod(chmod, tochmod, curdir, num)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('move') || n.hasClass('rename') || n.hasClass('delete') || n.hasClass('properties') || n.hasClass('edit'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/chmod.php?num='+num+'&chmod=' + chmod + '&tochmod=' + tochmod + '&dir=' + curdir + '', function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('chmod');
				n.removeClass('move');
				n.removeClass('rename');
				n.removeClass('delete');
				n.removeClass('properties');
				n.removeClass('edit');
	    	}			
		});
		n.removeClass('chmod');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/chmod.php?num='+num+'&chmod=' + chmod + '&tochmod=' + tochmod + '&dir=' + curdir + '', function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('chmod');
	}
}

// rename
function rename(old, curdir, type, num)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('properties') || n.hasClass('delete'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/rename.php?type=' + type + '&curdir=' + curdir + '&old=' + old + '&num='+num, function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('rename');
				n.removeClass('edit');
				n.removeClass('move');
				n.removeClass('chmod');
				n.removeClass('properties');
				n.removeClass('delete');
	    	}			
		});
		n.removeClass('rename');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/rename.php?type=' + type + '&curdir=' + curdir + '&old=' + old + '&num='+num, function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('rename');
	}
}

// delete
function deletest(todelete, curdir, type, num)
{
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);

	if (n.hasClass('properties') || n.hasClass('edit') || n.hasClass('move') || n.hasClass('chmod') || n.hasClass('rename') || n.hasClass('delete'))
	{
		n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
		n.parent().animate({height: '0px'}, 'slow');
		m.slideUp('slow', function(){
			n.html('');
			n.css('top', '0px');

			if(n.hasClass('move') || n.hasClass('rename') || n.hasClass('chmod') || n.hasClass('properties') || n.hasClass('edit'))
			{
				$("#loader_" + num).fadeIn("fast");
				m.css('display', 'block');
	    
	    		$.get('ajax/delete.php?type='+type+'&delete='+todelete+'&dir='+curdir+'&num='+num, function(data)
				{
					n.html(data);
					
					m.slideDown('slow');
			    
			    	n.css('top', '-' + n.outerHeight() + 'px');
			    	n.parent().css('height', '0px');
					n.animate({top: '0px'}, 'slow');
					
					n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
					$("#loader_" + num).fadeOut("fast");
				});
				n.addClass('delete');
				n.removeClass('move');
				n.removeClass('rename');
				n.removeClass('chmod');
				n.removeClass('properties');
				n.removeClass('edit');
	    	}			
		});
		n.removeClass('delete');
	}
	else
	{
		$("#loader_" + num).fadeIn("fast");
		m.css('display', 'block');
	    
	    $.get('ajax/delete.php?type='+type+'&delete='+todelete+'&dir='+curdir+'&num='+num, function(data)
		{
			n.html(data);
			
			m.slideDown('slow');
	    
	    	n.css('top', '-' + n.outerHeight() + 'px');
	    	n.parent().css('height', '0px');
			n.animate({top: '0px'}, 'slow');
			
			n.parent().animate({height: n.outerHeight() + 'px'}, 'slow');
			$("#loader_" + num).fadeOut("fast");
		});
		n.addClass('delete');
	}
}





function delete_multi(curdir)
{
	var multidelete="";
	$('.multi_delete:checked').each(function(index) {
		multidelete = multidelete + $(this).val() + "//";
	});

	$("#loader").fadeIn("fast");
	$.post( 
		'ajax/showdirectory.php?dir='+curdir+'&multidelete='+multidelete, 
		{ 
			multidelete: multidelete
		},
		function(data)
		{
			$('#slider').hide();
			$('#slider').html(data);
			$('#slider').fadeIn("fast");
		}
	);
}

function closeNotification()
{
	$(".notification").fadeOut("slow");
}

function savefile(filetosave, curdir, num)
{
	var code = $('#code').val();
	var m = $("#tools_" + num);
	var n = $("#tool_" + num);
	
	$("#loader_" + num).fadeIn("fast");
	
	n.animate({top: '-' + n.outerHeight() + 'px'}, 'slow');
	m.slideUp('slow', function(){
		n.html('');
		n.css('top', '0px');
	});
	
	n.parent().animate({height: '0px'}, 'slow', function(){
		$.post( 
			'ajax/showdirectory.php?dir='+curdir+'', 
			{ 
				newfilecontent: code, 
				filetosave   : filetosave
			},
			function(data)
			{
				$('#slider').html(data);
				$('#slider').hide();
				$('#slider').fadeToggle("");
				$("#ajaxdiv").css("height", "auto");
			}
		);
	});
}

function getfile(file)
{	
	var n = $("#bottomAction");	
		$.ajax({
			type: "POST",
			url: "ajax/download.php", 
			data: "dir=" + file,
			cache: false,
			success: function(data)
			{}
    	});
}

function Rechte(num)
{
	document.getElementsByName('chmodform_' + num)[0].newchmod.value=""+
	  Oct(document.getElementsByName('chmodform_' + num)[0].or.checked, document.getElementsByName('chmodform_' + num)[0].ow.checked, document.getElementsByName('chmodform_' + num)[0].ox.checked)+
	  Oct(document.getElementsByName('chmodform_' + num)[0].gr.checked, document.getElementsByName('chmodform_' + num)[0].gw.checked, document.getElementsByName('chmodform_' + num)[0].gx.checked)+
	  Oct(document.getElementsByName('chmodform_' + num)[0].ar.checked, document.getElementsByName('chmodform_' + num)[0].aw.checked, document.getElementsByName('chmodform_' + num)[0].ax.checked);
}

function chmodcheckbox(num)
{
	var chmodvalue = document.getElementsByName('chmodform_' + num)[0].newchmod.value;
	
	var ownerbin = parseInt(chmodvalue.charAt(0)).toString(2);
	var groupbin = parseInt(chmodvalue.charAt(1)).toString(2);
	var otherbin = parseInt(chmodvalue.charAt(2)).toString(2);

	while(ownerbin.length<3)
		ownerbin="0"+ownerbin; 
	while(groupbin.length<3)
		groupbin="0"+groupbin;
	while(otherbin.length<3)
		otherbin="0"+otherbin;

	document.getElementsByName('chmodform_' + num)[0].or.checked = parseInt(ownerbin.charAt(0)); 
	document.getElementsByName('chmodform_' + num)[0].gr.checked = parseInt(groupbin.charAt(0));
	document.getElementsByName('chmodform_' + num)[0].ar.checked = parseInt(otherbin.charAt(0));
	document.getElementsByName('chmodform_' + num)[0].ow.checked = parseInt(ownerbin.charAt(1)); 
	document.getElementsByName('chmodform_' + num)[0].gw.checked = parseInt(groupbin.charAt(1));
	document.getElementsByName('chmodform_' + num)[0].aw.checked = parseInt(otherbin.charAt(1));
	document.getElementsByName('chmodform_' + num)[0].ox.checked = parseInt(ownerbin.charAt(2)); 
	document.getElementsByName('chmodform_' + num)[0].gx.checked = parseInt(groupbin.charAt(2));
	document.getElementsByName('chmodform_' + num)[0].ax.checked = parseInt(otherbin.charAt(2));
}

/* -----------------------------------*/
/* ---------->>> BOTTOM <<<-----------*/
/* -----------------------------------*/

function newdirectory(curdir)
{	
	var n = $("#bottomAction");
	
	if(n.hasClass('newdirectory') || n.hasClass('newfile') || n.hasClass('upload'))
	{
		n.animate({
			top: '-' + n.outerHeight() + 'px'
		}, 'slow');
		n.parent().slideUp('slow', function(){
		
		if(n.hasClass('newfile') || n.hasClass('upload'))
		{
			$("#bottomLoader").fadeIn("fast");
			$.get('ajax/newdirectory.php?dir='+curdir+'', function(data)
			{
				n.html(data);
	    		n.animate({top: '0px'}, 'slow');
	    		n.parent().slideDown('slow');
	    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
	    		$("#bottomLoader").fadeOut("fast");
	    	});
	    	n.addClass('newdirectory');
	    	n.removeClass('newfile');
	    	n.removeClass('upload');
	    }
		});
		n.removeClass('newdirectory');
	}
	else
	{
		$("#bottomLoader").fadeIn("fast");
		$.get('ajax/newdirectory.php?dir='+curdir+'', function(data)
		{
			n.html(data);
    		n.animate({top: '0px'}, 'slow');
    		n.parent().slideDown('slow');
    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
    		$("#bottomLoader").fadeOut("fast");
    	});
    	n.addClass('newdirectory');
    }	
}

function newfile(curdir)
{	
	var n = $("#bottomAction");
	
	if(n.hasClass('newdirectory') || n.hasClass('newfile') || n.hasClass('upload'))
	{
		n.animate({
			top: '-' + n.outerHeight() + 'px'
		}, 'slow');
		n.parent().slideUp('slow', function(){
		
		if(n.hasClass('newdirectory') || n.hasClass('upload'))
		{
			$("#bottomLoader").fadeIn("fast");
			$.get('ajax/newfile.php?dir='+curdir+'', function(data)
			{
				n.html(data);
	    		n.animate({top: '0px'}, 'slow');
	    		n.parent().slideDown('slow');
	    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
	    		$("#bottomLoader").fadeOut("fast");
	    	});
	    	n.addClass('newfile');
	    	n.removeClass('newdirectory');
	    	n.removeClass('upload');
	    }
		});
		n.removeClass('newfile');
	}
	else
	{
		$("#bottomLoader").fadeIn("fast");
		$.get('ajax/newfile.php?dir='+curdir+'', function(data)
		{
			n.html(data);
    		n.animate({top: '0px'}, 'slow');
    		n.parent().slideDown('slow');
    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
    		$("#bottomLoader").fadeOut("fast");
    	});
    	n.addClass('newfile');
    }	
}

function upload(curdir)
{	
	var n = $("#bottomAction");
	
	if(n.hasClass('newdirectory') || n.hasClass('newfile') || n.hasClass('upload'))
	{
		n.animate({
			top: '-' + n.outerHeight() + 'px'
		}, 'slow');
		n.parent().slideUp('slow', function(){
		
		if(n.hasClass('newfile') || n.hasClass('newdirectory'))
		{
			$("#bottomLoader").fadeIn("fast");
			$.get('ajax/upload.php?dir='+curdir+'', function(data)
			{
				n.html(data);
	    		n.animate({top: '0px'}, 'slow');
	    		n.parent().slideDown('slow');
	    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
	    		$("#bottomLoader").fadeOut("fast");
	    	});
	    	n.addClass('upload');
	    	n.removeClass('newfile');
	    	n.removeClass('newdirectory');
	    }
		});
		n.removeClass('upload');
	}
	else
	{
		$("#bottomLoader").fadeIn("fast");
		$.get('ajax/upload.php?dir='+curdir+'', function(data)
		{
			n.html(data);
    		n.animate({top: '0px'}, 'slow');
    		n.parent().slideDown('slow');
    		$('html, body').animate({scrollTop: $('html').height()}, 'slow');
    		$("#bottomLoader").fadeOut("fast");
    	});
    	n.addClass('upload');
    }	
}

function showcheckbox()
{
	n = $(".multi_delete");
	if (n.css('display') == "none")
	{
		n.fadeIn();
	}
	else
	{
		n.fadeOut();
	}
}