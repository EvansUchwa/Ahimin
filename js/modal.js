
function showHideModal(actionner1,modalDiv,timeParam)
{

	actionner1.click(function(e)
	{
		e.preventDefault();

		if(modalDiv.css('display') == 'flex')
		{
			modalDiv.css('display','none');
		}
		else
		{
			modalDiv.css('display','flex');
		}
		
	})
}

function topDropDown(actionner,modal)
	{
		if (modal.css('bottom') == "0px") 
		{
			modal.css('bottom','-100%')
		}
		else
		{
			modal.css('bottom','0px');
		}
	}

function outputModal(status,content)
{
	let colorModal = "";
	let icon = "";
	if (status == 'Success') 
	{
		colorModal = "var(--successColor)";
		icon = '<span class="mdi mdi-cloud-check"></span>';
	}
	else
	{
		icon = '<span class="mdi mdi-cloud-alert"></span>';
		colorModal = "var(--errorColor)";
	}

	$(":root").css("--modalFormBg", colorModal);
	$("#formModalResults").css("display","flex");
	$(".modalHeaderAbsolute").html('<p>'+icon+'</p>');
	$(".fmResult").html('<h3>'+status+'</h3>'+'<p>'+content+'</p>')
}
function outputModalNotice(status,content)
{
	$("#noticeModalResult").css("display","flex");
	$(".noticeListUl").html(content)
}


$(".closer").click(function()
{
		$(this).parent().parent().parent().css('display','none');
})

// Pour le boutton poste
showHideModal($('.postArticle'),$('#modalChoiceTypePost'));
showHideModal($('.bbPost'),$('#modalChoiceTypePost'));

// 
showHideModal($('.bbProduct'),$('#modalChoiceProductPost'));
// 
showHideModal($('.bbService'),$('#modalChoiceServicePost'));


// Affichage et Disparition du modal espace membre
showHideModal($('.rmModalShower'),$('#registerModal'));

// Ici on affiche les caractéristique  de rangement des produit
$("#prBtn") .click(function()
{
	showDropDown($('.prRanges'));
});

// Affichage et Disparition du popup de filtre des produits
showHideModal($(".pfBtn"),$("#pfModal"));

// Pour les Follows sur la page profil
// showHideModal($(".viewFollowsBtn"),$("#profilViewFollow"));

// Modal de reponse au commentaire
$(".closercForm").click(function(e) { e.preventDefault()
	 topDropDown($(this),$('.replyCommentForm')) })




