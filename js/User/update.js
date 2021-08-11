$(document).ready(function()
{
	$('#formUpdateProfil').submit(function(e)
	{
		e.preventDefault();

		let file1 = $("#dafFile1")[0].files[0];

		let urImg1 = getCompressedImg(file1,1,'prdImg1');
		if (urImg1.uploadStatus != 'Erreur') 
		{

						let pseudo = $("#selectPseudo").val();
						let mail = $("#selectMail").val();
						let numero = $("#selectTel").val();
						let whatsapp = $("#selectWht").val();
						let statut = $("#selectStatus").val();
						let localisation = $("#selectCity").val();

						let password = $("#password").val();
						let confirm_password = $("#confirm_password").val();
						let sexe = $("#selectSexe").val();
						let description = $("#selectDescription").val();
						let oldFile1 = $("#oldFile1").val();
						let nomEntreprise = $("#nomEntreprise").val();

						setTimeout(function()
						{  
							let url = domain+'Modeles/Ajax/User/update.php';
							$.ajax
							({
								type: 'POST',
								url: url,
								data: {pseudo: pseudo,mail: mail,sexe: sexe,
									   numero: numero,whatsapp: whatsapp,
									   statut: statut,localisation: localisation,
									   description: description,
									   photo1: localStorage.getItem('prdImg1'),
									   password: password,
									   confirm_password: confirm_password,
									   oldFile1: oldFile1,nomEntreprise: nomEntreprise},
								dataType: 'json',
								beforeSend:function(){
			                		$("#loaderModalResult").css("display","flex");
			          			},
								success: function(data){
									if (data.status == "Success") 
									{
										$("#loaderModalResult").css("display","none");
										outputModal(data.status,'Modification Enregister')	
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
		else
		{
			outputModal(urImg1.uploadStatus,urImg1.uploadResult);
		}

	});
});
