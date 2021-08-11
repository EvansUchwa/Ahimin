$(document).ready(function()
{
	$(".viewReplysBtn").click(function()
		{
			$(".replyComments").slideToggle();
		});


	$(document).on('click','.viewReplysBtn',function()
	{
		let commentId = $(this).attr('data-id');
		let url = domain+'Modeles/Ajax/Produit/getReplyCommentProduct.php';
		$.ajax
		({
			type: 'POST',
			url: url,
			data: {commentId : commentId,domain: domain},
			dataType: 'json',
			success: function(data){
				if (data.status == "Success") 
				{
					$('#rcm-'+commentId).html(data.content);
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
	
	$(document).on('click','.replyCommentBtn',function()
	{
		let commentId = $(this).attr('data-id');

		topDropDown($(this),$(".replyCommentForm"));
		$(".replyText").html($("#cmt-"+commentId).html());

		$("#addProductCommentReply").submit(function(e)
		{
			e.preventDefault();	

			let url = domain+'Modeles/Ajax/Produit/setReplyCommentProduct.php';
			let productId = $(this).attr('data-id');

			$.ajax
			({
				type: 'POST',
				url: url,
				data: $(this).serialize()+'&commentId='+commentId+'&domain='+domain, 
				dataType: 'json',
				success: function(data){
					if (data.status == "Success") 
					{
						// $('.comments').html(data.content);
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
		});
	})

	$("#addElementComment").submit(function(e)
	{
		e.preventDefault();	

		let url = domain+'Modeles/Ajax/Produit/setAndGetCommentProduct.php';
		let productId = $(this).attr('data-id');

		$.ajax
		({
			type: 'POST',
			url: url,
			data: $(this).serialize()+'&productId='+productId, 
			dataType: 'json',
			success: function(data){
				if (data.status == "Success") 
				{
					$('.comments').html(data.content);
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
	});




})
