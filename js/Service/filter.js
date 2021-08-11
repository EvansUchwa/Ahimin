let serializeAppend = '&domain='+domain;
const uriExpKeyword = window.location.pathname.split('keyword=');
const uriExpCategorie = window.location.pathname.split('categorie=');


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


$(".sfreinitForm").click(function()
{
	 $("#selectCategorie").val('');
	 $("#selectSubCategorie").val('');
	 $("#selectCity").val();
	$(".lvFl").prop('checked',false);
	$(".dtFl").prop('checked',false);
	$(".dspFl").prop('checked',false);
})

$("#sfModalBodyForm").submit(function(e)
{
	let url =  domain+'Modeles/Ajax/Service/filter.php';
	e.preventDefault();
	$.ajax
		({
			type: 'POST',
			url: url,
			data: $(this).serialize()+''+serializeAppend,
			dataType: 'json',
			success: function(data)
			{
				$("#pfModal").css("display","none");
				$("#loaderModalResult").css("display","flex");
		
				setTimeout(function(){
					$("#loaderModalResult").css("display","none");
					$(".nbProductFind p").html(data.nbFind+' service(s) trouvé(s)')
					$(".pclCards").html(data.content);	
				},1500);
			},
			error: function()
			{
				alert('Erreur lors du chargement de page veuillez verifier votre connexion!')
			}
		})
	// 
});
