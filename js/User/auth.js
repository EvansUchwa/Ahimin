$(document).ready(function()
{
	$(".viewPassword").change(function()
	{
		if ($(this).prop('checked') == true) 
		{
			$('input[type="password"]').attr('type','text');
		}
		else
		{
			$('.psdIcon').attr('type','password');
		}
	});

	$('#formConnexion').submit(function(e)
	{
		let oldContent = $(".formSubBtn").html();
		$(".formSubBtn").html('Connexion<img src="'+domain+'img/sp9.gif">');
		e.preventDefault();
		let url = domain+'Modeles/Ajax/User/authConnexion.php';

		$.ajax
		({
					type: 'POST',
					url: url,
					data: $(this).serialize(),
					dataType: 'json',
					success: function(data){
						setTimeout(function()
						{ 
							$(".formSubBtn").html(oldContent);
							if (data.status == 'Success')
							 {
							 	if (window.location.search != '') 
							 	{
							 		window.location.href = domain+'accueil'+window.location.search;
							 	}
							 	else
							 	{
							 		window.location.href = domain+'Dashboard';
							 	}
							 }
							 else if(data.status == 'finaliseSignup')
							 {
							 	window.location.href = domain+'FinaliserInscription';
							 }
							 else
							 {
							 	outputModal(data.status,data.content);
							 }
						},500);
					},
					error: function()
					{
						alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
					}
				});
	});

	$("#formInscription").submit(function(e)
	{
		e.preventDefault();
		let $url = domain+'Modeles/Ajax/User/authInscription.php';
	    
	    let oldContent = $(".formSubBtn").html();
		$(".formSubBtn").html('Inscription<img src="'+domain+'img/sp9.gif">');

	     $.ajax({
						type: 'POST',
						url: $url,
						data : $(this).serialize()+'&domain='+domain,	
						dataType: 'json',
						success: function(data)
						{
							$(".formSubBtn").html(oldContent);
							setTimeout(function()
							{ 
								if (data.status == "Success" )
								{
									outputModal(data.status,'<p>Felicitation!1ère phase de l\'inscription effectuer,veuillez verifier votre messagerie mail pour activer le compte</p>');   
								}
							  	else
								{
								 	outputModal(data.status,data.content);  
								}
							},500);
						},
						error: function(data)
						{
							alert('Une erreur est survenue veuillez verifiez votre connexion');
						}
					});
				 

	});
});
