$("#viewPassword").change(function()
	{
		if ($(this).prop('checked') == true) 
		{
			$('.psdIcon').attr('type','text');
		}
		else
		{
			$('.psdIcon').attr('type','password');
		}
	});

$("#formInscription").submit(function(e)
{
	e.preventDefault();
	let $url = domain+'Modeles/Ajax/User/authInscription.php';
    // const modal_err_suc = $(".popup_r_l_error");
			
     $.ajax({
					type: 'POST',
					url: $url,
					data : $(this).serialize()+'&domain='+domain,	
					dataType: 'json',
					beforeSend:function()
					{},
					success: function(data)
					{
						if (data.status == "Success" )
						{
							outputModal(data.status,'<p>Felicitation!1ère phase de l\'inscription effectuer,veuillez verifier votre messagerie mail pour activer le compte</p>');   
						}
					  	else
						{
						 	outputModal(data.status,data.content);  
						}
					},
					error: function(data)
					{
						alert('Une erreur est survenue veuillez verifiez votre connexion');
					}
				});
			 

});
