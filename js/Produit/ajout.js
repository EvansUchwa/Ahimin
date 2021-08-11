
	$('#formAjoutProduit').submit(function(e)
	{
		e.preventDefault();
		let file1 = $("#dafFile1")[0].files[0];
		let file2 = $("#dafFile2")[0].files[0];
		let file3 = $("#dafFile3")[0].files[0];
		let file4 = $("#dafFile4")[0].files[0];

		let urImg1 = getCompressedImg(file1,1,'prdImg1',true);
		if (urImg1.uploadStatus != 'Erreur') 
		{
			let urImg2 = getCompressedImg(file2,2,'prdImg2')	
			if (urImg2.uploadStatus != 'Erreur') 
			{
				let urImg3 = getCompressedImg(file3,3,'prdImg3')
				if (urImg3.uploadStatus != 'Erreur') 
				{
					let urImg4 = getCompressedImg(file4,3,'prdImg4')
					if (urImg4.uploadStatus != 'Erreur') 
					{
						let titre = $("#selectTitre").val();
						let prix = $("#selectPrix").val();
						let type = $("#selectType").val();
						let categorie = $("#selectCategorie").val();
						let subCategorie = $("#selectSubCategorie").val();
						let livraison = $("#selectLivraison").val();
						let etat = $(".etatCl:checked").val();
						let description = $("#selectDescription").val();
						// let localisation = $("#selectLocalisation").val();
						$(".formSubBtn").html('<img src="'+domain+'img/sp7.gif">');
						setTimeout(function()
						{  
							let url = domain+'Modeles/Ajax/Produit/ajout.php';
							$.ajax
							({
								type: 'POST',
								url: url,
								data: {titre: titre,prix: prix,
									   type: type,livraison: livraison,
									   categorie: categorie,subCategorie: subCategorie,
									   description: description,etat: etat,
									   photo1: localStorage.getItem('prdImg1'),
									   photo2: localStorage.getItem('prdImg2'),
									   photo3: localStorage.getItem('prdImg3'),
									   photo4: localStorage.getItem('prdImg4'),
										domain: domain},
								dataType: 'json',
								success: function(data){
									$(".formSubBtn").html('Ajouter');
									// $("#selectTitre").val(null);
									// $("#selectPrix").val(null);
									// $("#selectType").val(null);
									// $("#selectCategorie").val(null);
									// $("#selectSubCategorie").val(null);
									// $("#selectLivraison").val(null);
									// $(".etatCl").prop('checked',false);
									// $("#selectDescription").val(null);
									setTimeout(function(){outputModal(data.status,data.content)	},500);
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

