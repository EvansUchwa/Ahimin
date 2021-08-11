$(document).ready(function()
{
	const elementId = $(".elementDetails").attr('element-id');
	const elementType = $(".elementDetails").attr('element-type');
	let commentId = null;

	$(document).on("click",".updateCommentBtn",function()
	{
		let commentContent = $("#cmt-"+$(this).attr('data-id')).html();
		let commentId = $(this).attr('data-id');
		let typeUpdate = $(this).attr('label-type');

		if ($(this).attr('label-action') == 'update')
		 {
		 	// alert('je modifie '+commentContent)
		 	$("#elementAction").css('display','flex');
		 	$(".evaResult").html('<form id="updateCommentForm" data-id="'+elementId+'">'+
		 	        		'<label>Modifier votre commentaire</label>'+
		 	        		'<textarea name="updateComContent">'+commentContent+'</textarea>'+
		 	        		'<button>Enregistrer</button>'+
		 	        	'</form>');

		 	$(document).on('submit','#updateCommentForm',function(e)
			{
				e.preventDefault();
				let newUrl = null;

				if (elementType == 'produit')
				 {
				 	newUrl = elementType.replace('p','P');
				 }
				 else if(elementType == 'service')
				 {
				 	newUrl = elementType.replace('s','S');
				 }
				 else
				 {

				 }

				 let url = domain+'Modeles/Ajax/User/updateAndRemoveComment.php';
				 $.ajax
				({
					type: 'POST',
					url: url,
					data: $(this).serialize()+'&elementType='+elementType+'&commentId='+commentId+'&action=update&class='+typeUpdate,
					dataType: 'json',
					success: function(data){
						if (data.status == "Success") 
						{
							window.location = domain+newUrl+'/'+elementId;
						}
						else
						{
							alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
						}
					},
					error: function()
					{
						alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
					}
				})

				
				
			});

		 }
	});


	// Pour suppimer un commentaire
	$(document).on('click',".deleteCommentBtn",function()
	{
		let commentContent = $("#cmt-"+$(this).attr('data-id')).html();

		let typeDelete = $(this).attr('label-type');

		let commentId = $(this).attr('data-id');

		if ($(this).attr('label-action') == 'delete')
		 {
		 	// alert('je supprime '+commentContent)
		 	$("#elementAction").css('display','flex');
		 	$(".evaResult").html('<div>'+
					        		'<p>Voulez vous vraiment supprimer ce commentaire?</p>'+
					        		'<section>'+
					        			'<span class="confirmDelete">Oui</span> <span class="closer">Non</span>'+
					        		'</section>'+
					        	'</div>');
		 }

		 
		 $(document).on('click','.confirmDelete',function(e)
		{
			e.preventDefault();
			let newUrl = null;

			if (elementType == 'produit')
			 {
			 	newUrl = elementType.replace('p','P');
			 }
			 else if(elementType == 'service')
			 {
			 	newUrl = elementType.replace('s','S');
			 }
			 else
			 {

			 }

			 let url = domain+'Modeles/Ajax/User/updateAndRemoveComment.php';
			 $.ajax
			({
				type: 'POST',
				url: url,
				data: {elementType: elementType,commentId:commentId,
					action: 'delete',class: typeDelete},
				dataType: 'json',
				success: function(data){
					if (data.status == "Success") 
					{
						window.location = domain+newUrl+'/'+elementId;
					}
					else
					{
						alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
					}
				},
				error: function()
				{
					alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
				}
			})
		});

	});
	


	$(document).on('click','.viewReplysBtn',function()
	{
		// $(this).parent().append('<div class="contentLoader" style="display:flex;">'+
  //      							'<img src="'+domain+'img/sp6.gif">'+
  //                   			'</div>');
		let commentId = $(this).attr('data-id');
		let url = domain+'Modeles/Ajax/User/getReplyComment.php';
		$('#rcm-'+commentId).slideToggle();
		
		$.ajax
		({
			type: 'POST',
			url: url,
			data: {commentId : commentId,domain: domain,type: elementType},
			dataType: 'json',
			beforeSend: function()
			{
				// $(".contentLoader").css('display','flex');
			},
			success: function(data){
				if (data.status == "Success") 
				{
					// $(".contentLoader").css('display','none');
					$('#rcm-'+commentId).html(data.content);

				}
				else
				{
					// $(".contentLoader").css('display','none');
					$('#rcm-'+commentId).html(data.content);
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
		commentId = $(this).attr('data-id');

		topDropDown($(this),$(".replyCommentForm"));
		$(".replyText").html($("#cmt-"+commentId).html());

	})

	// Pour les reponse au commentaire
	$("#addElementCommentReply").submit(function(e)
		{
			e.preventDefault();	
			let url = domain+'Modeles/Ajax/User/setReplyComment.php';
			let replyType = $(this).attr('label-type');

			$.ajax
			({
				type: 'POST',
				url: url,
				data: $(this).serialize()+'&commentId='+commentId+'&domain='+domain+'&type='+elementType, 
				dataType: 'json',
				success: function(data){
					if (data.status == "Success") 
					{
						topDropDown($(this),$(".replyCommentForm"));
						$("#replyCommentField").val(null);
						commentId = null;
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

	// Pour les soumission de commentaire
	$("#addElementComment").submit(function(e)
	{
		e.preventDefault();	

		let url = domain+'Modeles/Ajax/User/setAndGetComment.php';

		$.ajax
		({
			type: 'POST',
			url: url,
			data: $(this).serialize()+'&elementId='+elementId+'&type='+elementType, 
			dataType: 'json',
			success: function(data){
				if (data.status == "Success") 
				{
					$('.comments').html(data.content);
					$("#commentField").val(null);
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
