$("#navSearchForm").submit(function(e)
{
	e.preventDefault();
	let urlParam = "Resultats/"+$("#selectTypeSearch").val()+'s';

	if ($("#keywordSearch").val() == false && $("#selectTypeSearch").val() == false) 
	{
		
	}
	if ($("#selectTypeSearch").val() != false && $("#keywordSearch").val() == false)
	 {
	 	 urlParam+= '/keyword=All';
	 }
	 if ($("#selectTypeSearch").val() != false && $("#keywordSearch").val() != false)
	 {
	 	 urlParam+= '/keyword='+$("#keywordSearch").val();
	 }

	 $("#selectTypeSearch").val(null);
	 window.location = domain+''+urlParam;
});




$("#homeSearchForm").submit(function(e)
{
	e.preventDefault();
	let urlParam = "Resultats/"+$("#selectTypeSearch").val()+'s';

	if ($("#keywordSearch").val() == false && $("#selectCategorie").val() == false) 
	{
		urlParam+= '/keyword=All';
	}
	if ($("#keywordSearch").val() != false && $("#selectCategorie").val() == false)
	 {
	 	 urlParam+= '/keyword='+$("#keywordSearch").val();
	 }
	 if ($("#keywordSearch").val() != false && $("#selectCategorie").val() != false) 
	 {
	 	// urlParam+= '/keyword='+$("#keywordSearch").val();
	 }

	 if ($("#keywordSearch").val() == false && $("#selectCategorie").val() != false) 
	 {
	 	urlParam+= '/All/'+$("#selectCategorie").val();
	 	// console.log('ok')
	 }
	 $("#selectTypeSearch").val(null);
	 $("#selectCategorie").val(null);
	 window.location = domain+''+urlParam;
});

// selectTypeSearch
// keywordSearch
// selectCity
// selectCategorie

$(".q").click(function()
 	{
 		let qResponseId = $(this).attr('id');

 		$("h1").css('display','flex')
 		$(qResponseId).css('height','auto');
 		$(".qr:not("+qResponseId+")").css('height','0');
 		// $(qResponseId).css('background-color','red');
 	})