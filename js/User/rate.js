function setGreyColor(obj,action = null)
{
	if (action != null) 
	{
		obj.css('color','var(--colorWhite3)')
		obj.prevAll().css('color','var(--colorWhite3)')
		obj.nextAll().css('color','var(--colorWhite3)')
	}
}

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

$(".rateActionBtn").click(function()
{
	$("#profilRate").css('display','flex');

	let currentRate = localStorage.getItem('currentRate');

	$(".prStars i:nth-child("+currentRate+")").css('color','var(--colorPrincipal)');
	$(".prStars i:nth-child("+currentRate+")").prevAll().css('color','var(--colorPrincipal)');

})

$(".prStars i").mouseenter(function()
{
	$(this).css('color','var(--colorPrincipal)')
	$(this).prevAll().css('color','var(--colorPrincipal)')
	$(this).nextAll().css('color','var(--colorWhite3)')

	$(this).mouseleave(function()
	{
		setGreyColor($(this),true)
	})
	
});

$(".prStars i").click(function()
	{
		let nbStar = $(this).attr('data-id');
		const profilId = $(this).parent().attr('data-id')

		let url = domain+'Modeles/Ajax/User/rate.php';
		
		localStorage.setItem('currentRate',nbStar);

		// $(".spinnerModal").css('display','flex');
		
		$.ajax
		({
			type: 'POST',
			url: url,
			data: {profilId: profilId,nbStar: nbStar},
			dataType: 'json',
			success: function(data){
				if (data.status == "Success") 
				{
					setTimeout(function()
					{
						$(".resultText").text(data.content);
					 	$(".resultText").slideDown(); 

					 	setTimeout(function()
						{
							$(".closer").click();
						},1500);
					 },100)
				}
				else
				{
					
				}
			},
			error: function()
			{
				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
			}
		})
	})

