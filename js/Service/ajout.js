	$('#formAjoutService').submit(function(e)
	{
		e.preventDefault();
		let file1 = $("#dafFile1")[0].files[0];
		let file2 = $("#dafFile2")[0].files[0];
		let file3 = $("#dafFile3")[0].files[0];
		let file4 = $("#dafFile4")[0].files[0];

		let urImg1 = getCompressedImg(file1,1,'srvImg1',true);
		if (urImg1.uploadStatus != 'Erreur') 
		{
			let urImg2 = getCompressedImg(file2,2,'srvImg2')	
			if (urImg2.uploadStatus != 'Erreur') 
			{
				let urImg3 = getCompressedImg(file3,3,'srvImg3')
				if (urImg3.uploadStatus != 'Erreur') 
				{
					let urImg4 = getCompressedImg(file4,3,'srvImg4')
					if (urImg4.uploadStatus != 'Erreur') 
					{
						let titre = $("#selectTitre").val();
						let categorie = $("#selectCategorie").val();
						let subCategorie = $("#selectSubCategorie").val();
						let openHour = $("#selectOpenHour").val();
						let closeHour = $("#selectCloseHour").val();
						let description = $("#selectDescription").val();

						$(".formSubBtn").html('<img src="'+domain+'img/sp7.gif">');

						setTimeout(function()
						{  
							let url = domain+'Modeles/Ajax/Service/ajout.php';
							$.ajax
							({
								type: 'POST',
								url: url,
								data: {titre: titre,categorie: categorie,subCategorie:subCategorie,
									   openHour: openHour,closeHour: closeHour,
									   description: description,
									   photo1: localStorage.getItem('srvImg1'),
									   photo2: localStorage.getItem('srvImg2'),
									   photo3: localStorage.getItem('srvImg3'),
									   photo4: localStorage.getItem('srvImg4'),
										domain: domain},
								dataType: 'json',
								success: function(data){
									// $("#selectTitre").val(null);
									// $("#selectCategorie").val(null);
									// $("#selectSubCategorie").val(null);
									// $("#selectOpenHour").val(null);
									// $("#selectCloseHour").val(null);
									// $("#selectDescription").val(null);
									$(".formSubBtn").html('Ajouter');
									setTimeout(function(){outputModal(data.status,data.content)},1500);
								},
								Erreur: function()
								{
									alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
								}
							})
						},1000);
					}
					else{ outputModal(urImg4.uploadStatus,urImg4.uploadResult); }
				}
				else{ outputModal(urImg3.uploadStatus,urImg3.uploadResult); } 
			}
			else{ outputModal(urImg2.uploadStatus,urImg2.uploadResult);}
		}
		else
		{
			outputModal(urImg1.uploadStatus,urImg1.uploadResult);
		}
		
	});

