$("#formFinaliseInscription").submit(function(e)
{
	e.preventDefault();
	let $url = domain+'Modeles/Ajax/User/finaliserInscription.php';
    // const modal_err_suc = $(".popup_r_l_error");
			
     $.ajax({
					type: 'POST',
					url: $url,
					data : $(this).serialize(),	
					dataType: 'json',
					beforeSend:function()
					{},
					success: function(data)
					{
						if (data.status == "Finaliser")
						{
					         window.location = 'Dashboard'; 
						}
					  	else
						{
						 	$(":root").css("--modalFormBg", "#ef513a");
						 	$(".modalHeaderAbsolute").html('<p><span class="mdi mdi-cloud-check"></span></p>');
							$("#formModalResults").css("display","flex");
							$(".fmResult").html('<h3>Erreur</h3>'+data.content)
						}
					},
					error: function(data)
					{
						alert('Une erreur est survenue veuillez verifiez votre connexion');
					}
				});
			 

});
