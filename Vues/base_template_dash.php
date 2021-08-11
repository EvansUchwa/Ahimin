<!DOCTYPE html>
<html>
<head>
	<html lang="fr-FR">
	<title><?= $pageTitle ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/materialdesignicons.css">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/menuBase.css">
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/menuDash.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/animation.css"> -->
	<?php 
	$styles = explode('_',$pageStyles);
	$i = 1;
	while ($i <= count($styles)) {
	?>
	<link rel="stylesheet" type="text/css" href="<?= URLBASE.'css/'.$styles[$i-1].'.css' ?>">	
	<?php $i++; } ?>
	<link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/responsiveBase.css">
	 <link rel="stylesheet" type="text/css" href="<?= URLBASE ?>css/responsiveDash.css">
</head>
<body>

<div class="modal" id="noticeModalResult">
   	<div class="noticeModalBody">

		<div class="modalHeaderAbsolute">
			<p class="noticeColor"><span class="mdi mdi-bell"></span></p>
		</div>

		<div class="noticeList">
			<h3>Notification</h3>
			<ul class="noticeListUl">
				
			</ul>
		</div>

		<div class="modalFooterAbsolute">
			<button class="noticeColor closer">Ok</button>
	   	</div>

	</div>
</div>

<nav class="navbar">

	<div class="navSecondRow" id="fixedNavRow">
		
		<div class="nsrLogo">
			<img src="<?= URLBASE ?>img/png/loga2.png" id="logoStick" alt='Site Logo'>
		</div>
		
		<div class="nsrPcLink">
			<ul>
				<li>
					<a href="<?= URLBASE ?>Dashboard">Accueil</a>
				</li>
				<li>
					<label>Produit</label>
					<ul class="navHoveredList">
						<li><a href="<?= URLBASE ?>Ajout/Type=Produit">Ajouter</a></li>
						<li><a href="<?= URLBASE ?>Profil/<?= $userConnected->getId() ?>">Mes produits</a></li>
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
						<li><a href="<?= URLBASE ?>Profil/">Mes services</a></li>
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
						<li><a href="<?= URLBASE ?>Profil/">Comment publier</a></li>
						<li><a href="">Comment chercher</a></li>
					</ul>
				</li> 
				<li>
					<a href="">Contact</a>
				</li>
			</ul>
		</div>

		<div class="nsrAction">
			<input type="checkbox" id="nsrCheckPhoneAuth">
			<input type="checkbox" id="nsrCheckMenu">

			<div class="nsrNotice iconOverlay">
				<?php
					if ($notices == null || $notices == 0) {  
				?>
				<label class="mdi mdi-bell noticeNotExist" id="viewNoticeList">
					<span class="noticeNumber"></span>
				</label>
				<?php } else { ?>
				<label class="mdi mdi-bell noticeExist" id="viewNoticeList" >
					<span class="noticeNumber"><?= $notices ?></span>
				</label>
				<?php } ?>
				
			</div>

			

		<input type="checkbox" id="nfrlCheckAuth">
		<div class="nfrLast" >
			<label for="nfrlCheckAuth">
				<!-- <p><?= $userConnected->getPseudo(); ?></p> -->
				<img src="<?= $userConnected->getPhoto(); ?>" alt='User First Nav Picture'>
				<i class="mdi mdi-chevron-down"></i>
			</label>

			<ul>
					<li>
						<a href="<?= URLBASE ?>Profil/<?= $userConnected->getId(); ?>" 
							class="hoveredLink">
							<i class="mdi mdi-login navIcon"></i><span>Mon compte</span>
						</a>
					</li>
					<li>
						<a href="<?= URLBASE ?>Modifier/Profil/<?= $userConnected->getId() ?>" class="hoveredLink">
							<i class="mdi mdi-account-plus-outline navIcon"></i><span>Reglages</span>
						</a>
					</li>
					<li>
						<a href="<?= URLBASE ?>Deconnexion" class="hoveredLink">
							<i class="mdi mdi-account-plus-outline navIcon"></i><span>Deconnexion</span>
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

<?= $content ?>


<div class="modal" id="modalChoiceTypePost">
    <div class="mctpBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
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

<div class="modal" id="modalChoiceProductPost">
    <div class="mcppBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer" ></i>
        </div>

        <div class="mcpp">
            <img src="<?= URLBASE ?>img/ils/addContent.png" 
            alt="Add Content Illustration">
            <div>
            	<p>Produits</p>
            	<a href="<?= URLBASE ?>Resultats/Produits/keyword=All">
                    Les produits
                </a>
                <a href="<?= URLBASE ?>Profil/<?= $userConnected->getId() ?>">
                    Mes produits
                </a>
                <a href="<?= URLBASE ?>Ajout/Type=Produit">
                    Ajouter un produit
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalChoiceServicePost">
    <div class="mcspBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
        </div>

        <div class="mcsp">
            <img src="<?= URLBASE ?>img/ils/addContent.png" 
            alt="Add Content Illustration">
            <div>
            	<p>Produits</p>
                <a href="<?= URLBASE ?>Resultats/Services/keyword=All">
                    Les services
                </a>
                <a href="<?= URLBASE ?>Profil/<?= $userConnected->getId() ?>">
                    Mes services
                </a>
                <a href="<?= URLBASE ?>Ajout/Type=Service">
                    Ajouter un service
                </a>
            </div>
        </div>
    </div>
</div>


<div class="bottomBanner">
    <div>
        <a href="<?= URLBASE ?>Dashboard" class="mdi mdi-home-outline"></a>
        <!-- <span>Accueil</span> -->
    </div>

    <div class="bbProduct">
        <span class="mdi mdi-phone-settings-outline"></span>
        <!-- <span>Produit</span> -->
    </div>

    <div class="bbPost">
        <span class="mdi  mdi-plus-circle" id="rmModalShower"></span>
        <!-- <span>Poster</span> -->
    </div>

    <div class="bbService">
        <span class="mdi mdi-handshake-outline"></span>
        <!-- <span>Service</span> -->
    </div>

    <div>
        <span class="mdi mdi-information-outline"></span>
        <!-- <span>Infos</span> -->
    </div>
</div>



<p class="domJs" id="<?= URLBASE ?>"></p>






<footer>
	<div class="footLogoSocial">
		<img src="<?= URLBASE ?>img/png/logfinalmin.png" class="logoMinImg" alt='Site Logo Min'>
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


<script type="text/javascript" src="<?= URLBASE ?>js/jquery.min.js"></script>
<script type="text/javascript">
	let domain = $('.domJs').attr('id');
	$(".nsrLogo").click(function(){ window.location = domain+"Accueil" })
	window.addEventListener('scroll',function(){

	if (scrollY > 0) 
	 {
	 	document.documentElement.style.setProperty('--navHeight','80px');	
	 	document.querySelector('.navbar').style.height = "var(--navHeight)";
	 	document.querySelector('.navbar').style.boxShadow = "rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px";
	 }
	 else
	 {
	 	document.documentElement.style.setProperty('--navHeight','100px');
	 	document.querySelector('.navbar').style.height = "var(--navHeight)";
	 	document.querySelector('.navbar').style.boxShadow = "box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;";

	 }

	})
</script>
<script type="text/javascript" src="<?= URLBASE ?>js/additional.js"></script>
<script type="text/javascript" src="<?= URLBASE ?>js/search.js"></script>
<script type="text/javascript" src="<?= URLBASE ?>js/User/getNotice.js"></script>
<?php 
	$scripts = explode('_',$pageScripts);
	$j = 1;
	while ($j <= count($scripts)) 
	{?>
	<script type="text/javascript" src="<?= URLBASE.'js/'.$scripts[$j-1].'.js' ?>"></script>
	<?php $j++; }?>
</body>
</html>