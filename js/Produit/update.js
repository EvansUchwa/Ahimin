
	$('#formModifierProduit').submit(function(e)
	{
		e.preventDefault();
		let file1 = $("#dafFile1")[0].files[0];
		let file2 = $("#dafFile2")[0].files[0];
		let file3 = $("#dafFile3")[0].files[0];
		let file4 = $("#dafFile4")[0].files[0];
		 let serialize = $(this).serialize();

		let urImg1 = getCompressedImg(file1,1,'prdImg1');
		if (urImg1.uploadStatus != 'Erreur') 
		{
			let urImg2 = getCompressedImg(file2,2,'prdImg2')	
			if (urImg2.uploadStatus != 'Erreur') 
			{
				let urImg3 = getCompressedImg(file3,3,'prdImg3')
				if (urImg3.uploadStatus != 'Erreur') 
				{
					let urImg4 = getCompressedImg(file4,4,'prdImg4')
					if (urImg4.uploadStatus != 'Erreur') 
					{
						let titre = $("#selectTitre").val();
						let prix = $("#selectPrix").val();
						let type = $("#selectType").val();
						let categorie = $("#selectCategorie").val();
						let subCategorie = $("#selectSubCategorie").val();
						let livraison = $("#selectLivraison").val();
						let description = $("#selectDescription").val();
						let oldFile1 = $("#oldFile1").val();
						let oldFile2 = $("#oldFile2").val();
						let oldFile3 = $("#oldFile3").val();
						let oldFile4 = $("#oldFile4").val();
						let productId = $("#prId").val()
						let etat = $(".etatCl:checked").val();

						setTimeout(function()
						{  
							let url = domain+'Modeles/Ajax/Produit/update.php';
							$.ajax
							({
								type: 'POST',
								url: url,
								data: {titre: titre,prix: prix,etat: etat,
									   type: type,livraison: livraison,
									   categorie: categorie,subCategorie: subCategorie,
									   description: description,productId: productId,
									   photo1: localStorage.getItem('prdImg1'),
									   photo2: localStorage.getItem('prdImg2'),
									   photo3: localStorage.getItem('prdImg3'),
									   photo4: localStorage.getItem('prdImg4'),
									   oldFile1: oldFile1,oldFile2: oldFile2,
									   oldFile3: oldFile3,oldFile4: oldFile4},
								dataType: 'json',
								beforeSend:function(){
			                		$("#loaderModalResult").css("display","flex");
			          			},
								success: function(data){
									if (data.status == "Success") 
									{
										$("#loaderModalResult").css("display","none");
										outputModal(data.status,data.content)
									}
									else
									{
										$("#loaderModalResult").css("display","none");
										outputModal(data.status,data.content)
									}
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

