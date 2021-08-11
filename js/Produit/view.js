$(document).ready(function()
{
	let elementId = $("#addProductComment").attr('data-id');
	let posterId = $(".prPosterName").attr('data-id');
	
	$.ajax
	({
			type: 'POST',
			url: domain+'Modeles/Ajax/Produit/view.php',
			data: {elementId: elementId,posterId: posterId},
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
