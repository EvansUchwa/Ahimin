let serializeAppend = '&domain='+domain;
const uriExpKeyword = window.location.pathname.split('keyword=');
const uriExpCategorie = window.location.pathname.split('All/');


if (uriExpKeyword.length > 1)
{ 
	const uekLenght = uriExpKeyword.length;
 	const base =  uriExpKeyword[uekLenght -1];
 	serializeAppend+= "&base="+base;
  	// console.log(base);
}
if (uriExpCategorie.length > 1) 
{
 	const uecLenght = uriExpCategorie.length;
 	const baseCategorie =  uriExpCategorie[uecLenght -1];
 	serializeAppend+= "&baseCategorie="+baseCategorie;
  	// console.log(baseCategorie);
}

$(".pfreinitForm").click(function()
{
	$("#selectCategorie").val('');
 	$("#selectSubCategorie").val('');
	$("#selectCity").val();
	$(".lvFl").prop('checked',false);
	$(".dtFl").prop('checked',false);
})


$(document).on('submit',"#pfModalBodyForm",function(e)
{
	let url =  domain+'Modeles/Ajax/Produit/filter.php';
	e.preventDefault();
	$.ajax
		({
			type: 'POST',
			url: url,
			data: $(this).serialize()+''+serializeAppend,
			dataType: 'json',
			beforeSend:function(){
          		$("#loaderModalResult").css("display","flex");
			},
			success: function(data)
			{
				$(".eclCards").html(data.content);
				$("#pfModal").css("display","none");

				if (data.content == '')
				{
					$("#loaderModalResult").css("display","none");
					$("#smpBtn").hide();
					$(".seeMoreProduct").html('<div class="notFound">'+
					            '<img src="'+domain+'img/ils/notFound3.png" alt="Result not found">'+
					            '<h3>Desolé,Aucun resultat disponible</h3></div>');
				}
				else
				{
					setTimeout(function(){
					$("#loaderModalResult").css("display","none");
					$(".nbProductFind p").html(data.nbFind+' produit(s) trouvé(s)')
					$(".seeMoreProduct").html('<button id="smpBtn">Voir plus</button>');
					},100);
				}
				
			},
			error: function()
			{
				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
			}
		})
	// 
});


// $("#selectRange").change(function()
// {
// 	let rangeValue = $(this).val();

// 	if ($('#pfModalBodyForm').serialize() == 'categorie=&subCategorie=&prixMin=&prixMax=&ville=')
// 	 {
// 	 	url = domain+'Modeles/Ajax/User/seeMore.php';
// 	 	obj = {range: 'ranger',rangeValue:rangeValue, typeLetSee:'produit',domain: domain};
// 	 }
// 	 else
// 	 {
// 	 	serializeAppend+= "&range=ranger&rangeValue"+rangeValue;
// 	 	url = domain+'Modeles/Ajax/Produit/filter.php';
// 	 	obj = $('#pfModalBodyForm').serialize()+''+serializeAppend;
// 	 }

// 	$.ajax
// 		({
// 			type: 'POST',
// 			url: url, 
// 			data: obj,
// 			dataType: 'json',
// 			success: function(data)
// 			{
// 				if (data.content == '')
// 				{
// 					$("#smpBtn").hide();
// 					$(".eclCards").html('Pas trouver');
// 				}
// 				else
// 				{
// 					setTimeout(function(){
// 					$("#loaderModalResult").css("display","none");
// 					$(".eclCards").html(data.content);
// 					},100);
					
// 				}
				
// 			},
// 			error: function()
// 			{
// 				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
// 			}
// 		})
// })


$(document).on('click',"#smpBtn",function(e)
{
	let lastProductId = $(".eclCards").children().last().attr('data-id')
	let typeLetSee = 'produit';


	let url =  null;
	let obj = null;
	e.preventDefault();

	// console.log($('#pfModalBodyForm').serialize())
	if ($('#pfModalBodyForm').serialize() == 'categorie=&subCategorie=&prixMin=&prixMax=&ville=')
	 {
	 	url = domain+'Modeles/Ajax/User/seeMore.php';
	 	obj = {lastProductId:lastProductId, typeLetSee:typeLetSee,domain: domain,
	 			range: 'ranger',rangeValue: $("#selectRange").val() };
	 }
	 else
	 {
	 	serializeAppend+= "&lastProductId="+lastProductId;
	 	url = domain+'Modeles/Ajax/Produit/filter.php';
	 	obj = $('#pfModalBodyForm').serialize()+''+serializeAppend;
	 }


	$.ajax
		({
			type: 'POST',
			url: url, 
			data: obj,
			dataType: 'json',
			beforeSend: function()
			{ $("#loaderModalResult").css("display","flex"); },
			success: function(data)
			{
				if (data.content == '')
				{
					$("#loaderModalResult").css("display","none");
					$("#smpBtn").hide();
					$(".seeMoreProduct").html('<div class="notFound">'+
					            '<img src="'+domain+'img/ils/notFound3.png" alt="Result not found">'+
					            '<h3>Desolé,plus aucun resultat disponible</h3></div>');
				}
				else
				{
					setTimeout(function(){
					$("#loaderModalResult").css("display","none");
					$(".eclCards").append(data.content);
					},100);
					
				}
				
			},
			error: function()
			{
				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
			}
		})
})