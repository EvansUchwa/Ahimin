<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?= $pageTitle ?></title>
	<meta charset="utf-8">
	<meta name="description" content="Axime est un site d'annonce madame et monsieur">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/materialdesignicons.min.css" 
	media="print" onload="this.media='all'">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/menuBase.css"
	media="print" onload="this.media='all'">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/menu.css"
	media="print" onload="this.media='all'">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/animation.css"
	media="print" onload="this.media='all'">

	
	<?php 
	$styles = explode('_',$pageStyles);
	$i = 1;
	while ($i <= count($styles)) {
	?>
	<link rel="stylesheet" type="text/css" href="<?= URLBASE.'css/'.$styles[$i-1].'.css' ?>"
	media="print" onload="this.media='all'">	
	<?php $i++; } ?>
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/responsiveBase.css"
	media="print" onload="this.media='all'">
	 <link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/responsive.css"
	 media="print" onload="this.media='all'">
</head>
<body>
<nav class="navbar">
	<div class="navFirstRow">
		<div class="nfrFirst">
			<span>Contactez nous au:</span>
				<a href="">
					+229 94677352
				</a>
				<span> | </span>
				<a href="">
					+229 94677352
				</a>
		</div>

		<div class="nfrLast">

			<a href="<?= URLBASE ?>Auth/Connexion">
				Connexion
			</a>
			<span> | </span>
			<a href="<?= URLBASE ?>Auth/Inscription">
				Inscription
			</a>
			</div>
		</div>
	</div>

	<div class="navSecondRow">
		
		<div class="nsrLogo">
			<img src="<?= URLBASE ?>img/png/logfinalb.png">
		</div>

		<div class="nsrAction">
			<div class="nsrPcLink">
				<ul>
					<li>
						<a href="<?= URLBASE ?>Accueil">Accueil</a>
					</li>
					<li>
						<label>Produit</label>
						<ul class="navHoveredList">
							<li><a href="<?= URLBASE ?>Ajout/Type=Produit">Ajouter</a></li>
							<li class="ok"><a href="<?= URLBASE ?>Resultats/Service/keyword=All">Tous les produits</a></li>
							<li class="liNavCategorie">
								<label>Categorie de produits</label>
								<ul class="lncCategorie">
									<?php foreach ($allPrCategories as $allPrCategorie) {?>
									<li>
								        <a href="Resultats/Produits/All/<?= $allPrCategorie->getCategorie(); ?>" class="">
								            <i class="<?= $allPrCategorie->getIcon(); ?>"></i>
								            <span><?= $allPrCategorie->getCategorie(); ?></span>
								        </a>
								    </li>
								    <?php } ?>
								</ul>
							</li>
						</ul>
					</li>

					<li>
						<label>Service</label>
						<ul class="navHoveredList">
							<li class="ok"><a href="<?= URLBASE ?>Ajout/Type=Service">Ajouter</a></li>
							<li class="ok"><a href="<?= URLBASE ?>Resultats/Service/keyword=All">Tous les services</a></li>
							
							<li class="liNavCategorie">
								<label>Categorie de service</label>
								<ul class="lncCategorie">
									<?php foreach ($allSrCategories as $allSrCategorie) {?>
									<li>
										<a href="Resultats/Services/All/<?= $allSrCategorie->getCategorie(); ?>" class="">
							          	<i class="<?= $allSrCategorie->getIcon(); ?>"></i>
							            <span><?= $allSrCategorie->getCategorie(); ?></span>
								        </a>
									</li>
							        <?php } ?>
								</ul>
							</li>
						</ul>
					</li> 
					<li>
						<label>A propos</label>
						<ul class="navHoveredList">
							<li class="ok"><a href="<?= URLBASE ?>Ajout/Type=Service">Qui somme nous</a></li>
							<li><a href="<?=URLBASE ?>questions">Questions frequente</a></li>
							<li><a href="">Comment chercher</a></li>
						</ul>
					</li> 
					<li>
						<a href="<?= URLBASE ?>Contact">Contact</a>
					</li>
				</ul>
			</div>

		</div>

		<div class="mobilensrAction">
			<div class="mobileHmb">
	            <input type="checkbox" id="chkHmb">
	            <label for="chkHmb" id="mhmbBars">
	                <div></div>
	                <div></div>
	            </label>

	            <ul class="mhmbLink">
	                    <section class="mhmbLink">
	                        <label for="chkHmb"><i class="mdi mdi-arrow-left"></i></label>
	                    </section>
	                    <li>
	                        <a href="">Accueil</a>
	                    </li>
	                    <li>
	                        <label for="chkHmb1">Produits</label>
	                        <input type="checkbox" id="chkHmb1">
	                        <div>
	                            <a href="<?= URLBASE ?>Ajout/Type=Produit">Ajouter un produit</a>
	                            <a href="<?= URLBASE ?>Resultats/Produits/keyword=All">Voir les produit</a>
	                            <a href="">Top des produit</a>
	                            <label for="chkCat1">Categorie de produit</label>
	                            <input type="checkbox"  id="chkCat1">
	                            <div>
	                                <?php foreach ($allPrCategories as $allPrCategorie) {?>
								        <a href="Resultats/Produits/All/<?= $allPrCategorie->getCategorie(); ?>">
								        	<?= $allPrCategorie->getCategorie(); ?>
								        </a>
								    <?php } ?>
	                            </div>
	                        </div>
	                    </li>
	                    <li>
	                        <label for="chkHmb2">Service</label>
	                        <input type="checkbox" id="chkHmb2">
	                        <div>
	                            <a href="<?= URLBASE ?>Ajout/Type=Service">Ajouter un service</a>
	                            <a href="<?= URLBASE ?>Resultats/Services/keyword=All">Tous les service</a>
	                            <a href="">Top des service</a>
	                            <label for="chkCat2">Categorie de service</label>
	                            <input type="checkbox"  id="chkCat2">
	                            <div>
	                                <?php foreach ($allSrCategories as $allSrCategorie) {?>
										<a href="Resultats/Services/All/<?= $allSrCategorie->getCategorie(); ?>" class="">
											<?= $allSrCategorie->getCategorie(); ?>
								        </a>
							        <?php } ?>
	                            </div>
	                        </div>
	                    </li>
	                    <li>
	                        <label for="chkHmb3">A propos</label>
	                        <input type="checkbox"  id="chkHmb3">
	                        <div>
	                            <a href="">Qui sommes nous?</a>
	                            <a href="">Aide</a>
	                            <a href="">Mentions Legales</a>
	                        </div>
	                    </li>
	                    <li>
	                        <a href="">Connexion</a>
	                        <a href="">Inscription</a>
	                    </li>
	            </ul>
	            
	        </div>

	        <input type="checkbox" id="nsrCheckPhoneAuth">
			
			<div class="nsrPhoneAuth">
				<label class="mdi mdi-account-outline iconOverlay" for="nsrCheckPhoneAuth">
				</label>

				<ul>
					<li>
						<a href="<?= URLBASE ?>Auth/Connexion" class="hoveredLink">
							<span>Connexion</span>
						</a>
					</li>
					<li>
						<a href="<?= URLBASE ?>Auth/Inscription" class="hoveredLink">
							<span>Inscription</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		
	</div>

</nav>


<div class="nsrSearch">
		<form id="navSearchForm" class="navSearchForm" method="post">
			<div>
				<input type="input" name="" id="selectTypeSearch" placeholder="Type" 
				readonly="" required="">
					<ul class="scTypeSearch">
						<li>Produit</li>
						<li>Service</li>
					</ul>
			</div>
			
		<input type="text" name="" placeholder="Je cherche..." id="keywordSearch">
		<button type="submit" class="mdi mdi-magnify"></button>
	</form>	
</div>

<div class="modal" id="loaderModalResult">
    <div class="loaderModalBody">
        <img src="<?= URLBASE ?>img/sp7.gif">
    </div>
</div>



<div class="modal" id="loaderModalResult">
    <div class="loaderModalBody">
        <img src="<?= URLBASE ?>img/sp7.gif">
    </div>
</div>

<?= $content ?>
<p class="domJs" id="<?= URLBASE ?>"></p>

<div class="modal" id="modalChoiceTypePost">
    <div class="mctpBody">
        <div class="modalHeader">
            <i class="mdi mdi-close" id="mctpClose"></i>
        </div>

        <div class="mctp">
            <img src="<?= URLBASE ?>img/ils/addContent.png" 
            alt="Add Content Illustration">
            <div>
                <a href="Ajout/Type=Service">
                   Ajouter un service
                </a>
                <a href="Ajout/Type=Produit">
                   Ajouter un produit
                </a>
            </div>
        </div>
    </div>
</div>




<footer>
	<div class="footLogoSocial">
		<img src="<?= URLBASE ?>img/png/logfinalmin.png" class="logoMinImg">
		<div class="flsSocialLink">
			<a href=""><i class="mdi mdi-map-marker-outline"></i> Cotonou Bj</a>
			<a href=""><i class="mdi mdi-phone-outline"></i> +229 84677352</a>
			<a href=""><i class="mdi mdi-email-outline"></i> Mail@gmail.com</a>
			<div class="flsslIcon">
				<a href=""> <i class="mdi mdi-facebook"></i> </a>
				<a href=""><i class="mdi mdi-whatsapp"></i></a>
				<a href=""><i class="mdi mdi-instagram"></i></a>
			</div>
		</div>
	</div>

	<div class="footHelpService">
		<p class="footSectionTitle">
			Aide et Services
		</p>
		<a href="">Qui sommes nous</a>
		<a href="">Comment ca marche?</a>
		<a href="">Souscrir a l'offre proffesionnel?</a>
	</div>

	<div class="footUtilityLink">
		<p class="footSectionTitle">
			Liens utiles
		</p>
		<a href="">Accueil</a>
		<a href="">A propos</a>
		<a href="">Contact</a>
		<a href="">Produit</a>
		<a href="">Publier une annonce</a>
	</div>

	<div class="footLegalInfo">
		<p class="footSectionTitle">
			Infos Légales
		</p>
		<a href="">Condition Generales</a>
		<a href="">Mention Legales</a>
		<a href="">Cooki</a>
	</div>

	<hr class="footBars">

	<div class="footCopy">
		<p>2021 &copy; Designed By Evans Dsv & Jose K</p>
	</div>
</footer>
<script type="text/javascript" src="<?= URLBASE ?>js/jquery.min.js" defe></script>
<script type="text/javascript" defer>
	let domain = $('.domJs').attr('id');

	$(".nsrLogo").click(function(){ window.location = domain+"Accueil" })
	window.addEventListener('scroll',function(){

	if (scrollY > 0) 
	 {
	 	document.querySelector('.navFirstRow').style.display = "none";

	 	if (window.screen.availWidth  > 576) 
	 	{
	 		document.documentElement.style.setProperty('--navHeight','100px');
	 		document.querySelector('.navbar').style.height = "var(--navHeight)";
	 		document.querySelector('.navSecondRow').style.height = "var(--navHeight)";
	 		// document.querySelector('.navSecondRow .navHoveredList').style.top = "calc(var(--navHeight) / 2)";
	 	}
	 	else
	 	{
	 		document.querySelector('.navbar').style.height = "calc(var(--navHeight) - 20px)";
	 		document.querySelector('.navSecondRow').style.height = "calc(var(--navHeight) - 20px)";
	 	}
	 	document.querySelector('.navbar').style.boxShadow = "rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px";
	 }
	 else
	 {
	 	if (window.screen.availWidth  > 576) 
	 	 {
	 	 	document.documentElement.style.setProperty('--navHeight','170px');
            document.querySelector('.navFirstRow').style.display = "flex";
            document.querySelector('.navSecondRow').style.height = "calc(var(--navHeight) - 35%)";
          }
          else
          {
          	document.querySelector('.navSecondRow').style.height = "var(--navHeight)";
          }
	 	
	 	document.querySelector('.navbar').style.height = "var(--navHeight)";
	 	document.querySelector('.navbar').style.boxShadow = "box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;";

	 }

	})




// 	document.addEventListener("DOMContentLoaded", function() {
//     var elements = document.getElementsByTagName("INPUT");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("Champs non remplis");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// })
</script>
<script type="text/javascript" src="<?= URLBASE ?>js/search.js" defer></script>
<?php 
	$scripts = explode('_',$pageScripts);
	$j = 1;
	while ($j <= count($scripts)) 
	{?>
	<script type="text/javascript" src="<?= URLBASE.'js/'.$scripts[$j-1].'.js' ?>" defer></script>
<?php $j++; }?>

</body>
</html>