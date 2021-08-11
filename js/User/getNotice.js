$("#viewNoticeList").click(function()
{

	let notViewedNb = parseInt($(this).children('span').html());


	if (notViewedNb == "" || notViewedNb == 0) 
	{
		
	}
	else
	{
		$(this).children('span').html('');
		$(this).css("color","black");
	}
		$.ajax({
		method: 'POST',
		url: domain+'Modeles/Ajax/User/getNotice.php',
		dataType: 'json',
		data: {notViewedNb: notViewedNb,domain: domain},
		success: function(data)
		{
		 if (data.status == 'Success') 
		 {
		 	outputModalNotice('Success',data.content);
		 }
		 else
		 {
		 	outputModalNotice('Success',data.content);
		 }
		},
		error: function(){  }
	})
	
});