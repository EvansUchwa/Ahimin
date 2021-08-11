$(document).ready(function()
{
	function reactToogle(reacter,addIcon,removeIcon)
	{
		if (reacter.css('color') == 'rgb(0, 0, 0)') 
		{
			reacter.css('color','#cc0000');
			reacter.children('span').attr('class',addIcon);
			reacter.css('animation','myReact 1s 1');
		}
		else
		{
			reacter.css('color','black');
			reacter.children('span').attr('class',removeIcon);
			reacter.css('animation','myReact 1s 1');
		}	
	}

	$(".reactLove").click(function(e)
	{
		e.preventDefault();
		reactToogle($(this),'mdi mdi-heart','mdi mdi-heart-outline');	

		const typeElement = $(this).attr("element-type");

		let url = domain+'Modeles/Ajax/User/react.php';
		let elementId = $(this).attr('id');
		let posterId = $(this).attr('data-id');
		$.ajax
		({
			type: 'POST',
			url: url,
			data: {elementId: elementId,posterId: posterId,type: typeElement,typeReact: 'Love'},
			dataType: 'json',
			success: function(data){
			if (data.status == "Success") 
			{
				$("#nbPersonneLoved").html(data.content);
	// animation: myReact 2s infinite;
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
		})
	});



	$(".reactCollect").click(function(e)
	{
		e.preventDefault();
		reactToogle($(this),'mdi mdi-tag-plus','mdi mdi-tag-plus-outline');	

		const typeElement = $(this).attr("element-type");

		let url = domain+'Modeles/Ajax/User/react.php';
		let elementId = $(this).attr('id');
		let posterId = $(this).attr('data-id');
		$.ajax
		({
			type: 'POST',
			url: url,
			data: {elementId: elementId,posterId: posterId,type: typeElement,typeReact: 'Collect'},
			dataType: 'json',
			success: function(data){
			if (data.status == "Success") 
			{
					alert('Produit ajouter a ma collection');
				// animation: myReact 2s infinite;
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
		})
	});
})
