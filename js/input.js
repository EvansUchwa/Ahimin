 $(".readonly").on('keydown paste focus mousedown', function(e){
        // if(e.keyCode != 9) // ignore tab
            e.preventDefault();
});


    function chooseInput(inputer,value,chooseList,search = null,sValue = null)
    {
        if (search != null) 
        {
            if (sValue  == 'Produit') 
            {
                $.get(domain+"Modeles/Ajax/Produit/getCategorie.php", function(data) {
                  dataParse = jQuery.parseJSON(data);
                  $(".scCategories").html(dataParse.content);
                });
                
            }
            else if(sValue  == 'Service')
            {
                $.get(domain+"Modeles/Ajax/Service/getCategorie.php", function(data) {
                    dataParse = jQuery.parseJSON(data);
                  $(".scCategories").html(dataParse.content);
                  // console.log()
                });
            }
        }
        inputer.val(value.html());
        inputer.attr('value',value.html());
        chooseList.css('display','none');
    }
const Categorie_Subcategorie = {
        Alimentation: {
            value: ['Produits vivrier', 'Intrant', 'Equipement agricoles', 'Produits pastoral', 'Provende', 'Equipement d\'elevage','Produit de Peche', 'Equipement de peche','Patisserie et Boulangerie','Autres']
        },
        Art: {
            value: ['Tableau', 'Sculpture', 'Dessin', 'Textile', 'Autres accessoires']
        },
        Automobile: {
            value: ['Voiture', 'Motos','Velos','Bateau','Pièces detaché']
        },
        Boisson: {
            value: ['Brasserie', 'Vin','Champagne','Aperitif','Jus','Autre alcool']
        },
        Construction: {
            value: ['Accessoires plomberie', 'Accessoires electricité', 'Accessoires maçonnerie', 'Accessoires peinture', 'Accessoires soudure', 
                    'Accessoires slimatisation', 'Accessoires surveillance', 'Autres accessoires']
        },
        Divertissement: {
            value: ['Jeux Videos', 'Jeux de société', 'Livre', 'Cd']
        },
        Enfance: {
            value: ['Jouets', 'Accessoires educatif', 'Accessoires Alimentaire', 'Autres accessoires']
        },
        ElectroMenager: {
            value: ['Mixeur', 'Micro Onde', 'Four electrique', 'Ventilateur','Aspirateur','Climatiseur',
            		'Pileuse Electrique','Friteuse Electrique','Lave vaiselle','Machine a laver']
        },
        Immobilier: {
            value: ['Parcelle', 'Maison','Villa','Appartement','Chambre a louer']
        },
        Menager: {
            value: ['Fauteuil', 'Lit', 'Chaise', 'Table', 'Rechaud', 
                    'Gaz', 'Four traditionnel', 'Clopote']
        },
        Habillement: {
            value: ['Tissus', 'Vetements','Chaussure', 'Bijoux','Accessoires']
        },
        Santé: {
            value: ['Produit Cosmetique', 'Complement alimentaire', 'Pharmacopé']
        },
        Sport: {
            value: ['Equipement de jeu', 'Equipement de Protection', 'Vetements']
        },
        Electronique: {
            value: ['Ordinateurs', 'Telephonie','TV','Imprimante','Photocopieuse','Camera','Appareil Photo','Drone','Speaker','Accessoires']
        },
        'Aide a domicile':
        {
            value: ['Menage' ,'Cuisine', 'Bricolage','Gardiennage' ,'Autre']
        },
        'Aide a la personne':
        {
            value: ['Covoiturage','Course','Livraison','Babysitting ou Nounou','Autre']
        },
        'Mode':
        {
            value: [ 'Styliste','Couturier(ère)','Manequinnat','Autre']
        },
        'Cours et Formation':
        {
            value: ['Repetiteur','Coach Sportif','Coach Personnel','Autre Formation' ]
        },
        Audiovisuel:
        {
            value: ['Photographie et Videos','Infographie et Design','Montage','Autre']
        },
        Informatique:
        {
            value: ['Maintenance','Reseaux','Surveillance','Creation de Site Web','Creation d\'application Mobile','Creation de Logiciel']
        },
        'Beauté et Bien être':
        {
            value: ['Manicure et Pedicure','Coiffure','Massage']
        },
        Evenementiel:
        {
            value: ['Service Traiteur','Sonorisatin(Dj)','Decoration(Bache etc..)']
        },
        Restauration:
        {
            value: ['Restaurant','Bar','Cafeteria','Autre']
        }
};
// filterCategories.slideUp();
function showDropDown(dropResult)
{
    
    if (dropResult.css('opacity') == 0) 
    {
        dropResult.fadeIn(50,function()
        {
         dropResult.css('opacity','1')
        });
    }
    else
    {
        dropResult.fadeOut(50,function()
        { 
            dropResult.css('opacity','0')
        });
    }
}



function autoInput(input,value)
{
    input.val(value);
}

function showDependInput(actionnerInput,value,dependInput)
{

    if (actionnerInput.val() == value) 
    {
        dependInput.slideDown(250,function()
        {
            dependInput.css('display','flex')
        })
    }
    else
    {
        dependInput.slideUp(250,function()
        {
            dependInput.css('display','none')
        })
    }
}

function assignSubCategories(object,curentCategorie,inputCategorie,inputSubCategorie,categories,subCategories,listClass)
{
    categories.slideUp(250,function(){ categories.css('opacity','0')});
    let filterCategorieId = curentCategorie.attr('id');

    let indexOfCategorie = 0;
    inputCategorie.val(filterCategorieId);

    if (Object.getOwnPropertyNames(object).indexOf(filterCategorieId) == -1) 
    {
        // console.log('pas bon')
    }
    else
    {
        // console.log('bon')
        indexOfCategorie = Object.getOwnPropertyNames(object).indexOf(filterCategorieId);
        let OutputSubCategorie = "";
        Object.values(object)[indexOfCategorie].value.forEach(function(item, index, array) 
        {
            OutputSubCategorie+= '<li class="subCategorie">'+item+'</li>'
        });
        subCategories.html(OutputSubCategorie);
        // inputSubCategorie.val(subCategories.children().first().html())
    }
}


$("#selectType").click(function()
{
    showDropDown($(".scTypes"));
})
$("#selectCategorie").click(function()
{
    showDropDown($(".scCategories"));
})
$("#selectSubCategorie").click(function()
{
    showDropDown($(".scSubCategories"));
})
$("#selectLivraison").click(function()
{
    showDropDown($(".scLivraisons"));
})
$("#selectSexe").click(function()
{
    showDropDown($(".scSexes"));
});
$("#selectStatus").click(function()
{
    showDropDown($(".scStatus"));
});
$("#selectCity").click(function()
{
    showDropDown($(".scCitys"));
});
$("#selectDate").click(function()
{
    showDropDown($(".scDates"));
});
$("#selectLove").click(function()
{
    showDropDown($(".scLoves"));
});
$("#selectTypeSearch").click(function()
{
    showDropDown($(".scTypeSearch"));
});
// $("#selectRange").click(function()
// {
//     showDropDown($(".scRanges"));
//     if ($(this).val() != '') 
//     {
//         alert('con')
//     }
// });
$("#selectOpenHour").click(function()
{
    showDropDown($(".scOpenHour"));
});
$("#selectCloseHour").click(function()
{
    showDropDown($(".scCloseHour"));
});



// Page d'accueil
let ibsfDropCategory = $('#selectCategorie');
let ibsfCategorys = $('.scCategories');

let ibsfDropSubCategory = $('#selectSubCategorie');
let ibsfSubCategorys = $('.scSubCategories');


// Assignation des sous categories correspondantes a la categorie selectionner
$(document).on("click",".scCategories li",function()
{
    assignSubCategories(Categorie_Subcategorie,$(this),ibsfDropCategory,ibsfDropSubCategory,ibsfCategorys
,ibsfSubCategorys,'ibsfSubCategory');
    chooseInput($("#selectCategorie"),$(this),$(".scCategories"));
});



let inputStar = $("#inputStar");
let filterStars = $(".filterStars");

let inputDate = $("#inputDate");
let filterDates = $(".filterDates");




// Pour la deuxieme partie de l'inscription



// Ici on genere automatiquement le code du pays pour les champs telephone
$("#profilTel").keydown(function()
    { 
       
    })


$(document).on('click',".scSubCategories li",function()
{
    chooseInput($("#selectSubCategorie"),$(this),$(".scSubCategories"));
});
$(".scStatus li").click(function()
{
    chooseInput($("#selectStatus"),$(this),$(".scStatus"));
    showDependInput($("#selectStatus"),'Entreprise',$("#ffProfilStName"))
 });

$(".scTypes li").click(function()
{
    chooseInput($("#selectType"),$(this),$(".scTypes"));
 });
$(".scSexes li").click(function()
{
    chooseInput($("#selectSexe"),$(this),$(".scSexes"));
 });
$(".scCitys li").click(function()
{
    chooseInput($("#selectCity"),$(this),$(".scCitys"));
});
$(".scLivraisons li").click(function()
{
    chooseInput($("#selectLivraison"),$(this),$(".scLivraisons"));
 });

$(".scDates li").click(function()
{
    chooseInput($("#selectDate"),$(this),$(".scDates"));
});
$(".scLoves li").click(function()
{
    chooseInput($("#selectLove"),$(this),$(".scLoves"));
 });
$(".scTypeSearch li").click(function()
{
    chooseInput($("#selectTypeSearch"),$(this),$(".scTypeSearch"),true,$(this).html());
 });
// $(".scRanges li").click(function()
// {
//     chooseInput($("#selectRange"),$(this),$(".scRanges"));
//  });
$(".scOpenHour li").click(function()
{
    chooseInput($("#selectOpenHour"),$(this),$(".scOpenHour"));
 });
$(".scCloseHour li").click(function()
{
    chooseInput($("#selectCloseHour"),$(this),$(".scCloseHour"));
 });







// $('.chkLoves li').click(function()
// {
    // $(this).attr('id','radioDateSlt');
// })
