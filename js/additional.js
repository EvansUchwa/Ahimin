if (pageAction == "profil") 
{
	$(".viewPBtn").click(function(e)
	{
		e.preventDefault();
		 window.location = domain+'Produit/'+$(this).attr('id'); 
	})
	$(".updatePBtn").click(function(e)
	{
	 	e.preventDefault();
		 window.location = domain+'Modifier/Produit/'+$(this).attr('id');
	})
	$(".deletePBtn").click(function(e){ window.location = ''; })


	$(".viewSBtn").click(function(e)
	{
		e.preventDefault();
		 window.location = domain+'Service/'+$(this).attr('id'); 
	})
	$(".updateSBtn").click(function(e)
	{
	 	e.preventDefault();
		 window.location = domain+'Modifier/Service/'+$(this).attr('id');
	})
	$(".deletePBtn").click(function(e){ window.location = ''; })
}



if (pageAction == 'validerCompte') 
{
	setTimeout(function()
	{
		$(".avlSpinner").slideUp();
	 $(".avText").slideDown();
	},4000)
}


