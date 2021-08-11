$(document).ready(function()
{

	$(".notConnected").click(function()
	{
		$("#elementAction").css('display','flex');
		$(".evaResult").html('<div>'+
					        		'<p>Veuillez vous connectez ou vous Inscrire pour effectuer cette action</p>'+
					        		'<section>'+
					        			'<a href="'+domain+'Auth/Connexion">Connexion</a>'+
					        			'<a href="'+domain+'Auth/Inscription">Inscription</a>'+
					        		'</section>'+
					        	'</div>');
	});
	const elementId = $(".elementDetails").attr('element-id');
	const elementType = $(".elementDetails").attr('element-type');

	let posterId = $(".elementPosterName").attr('data-id');
	
	

	$.ajax
	({
			type: 'POST',
			url: domain+'Modeles/Ajax/User/view.php',
			data: {elementId: elementId,posterId: posterId,type: elementType},
			dataType: 'json',
			success: function(data){
			if (data.status == "Success") 
			{
				// console.log(data)
			}
			else
			{
				
			}
				// console.log(data)
			},
			error: function()
			{
				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
			}
	});
})
