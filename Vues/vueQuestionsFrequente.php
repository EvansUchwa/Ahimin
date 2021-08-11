<?php 
$this->_pageTitle = 'Questions Frequente';
	$this->_pageStyles = 'modal_question';
	$this->_pageScripts = 'User/connexion';
 ?>

<div class="pageContent">
	<div class="questionImg">
		<img src="img/needHelp.png" alt="Questions Banner">
	</div>

	 <div class="questionTypeListe">
	 	<label for="ql1">Les annonces <i class="mdi mdi-chevron-right"></i></label>
	 	<input type="checkbox" id="ql1">
	 	<ol class="olq">
	 		<li>
	 			<a href="#res" id="#qr1" class="q">La publication d'annonce est elle gratuite ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr2" class="q">Comment publier une annonce ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr3" class="q">Comment modifier son annonce ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr4" class="q">Delai de mise en ligne d'une annonce</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr5" class="q">Quel sont les informations obligatoire pour la publication de son annonce?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr6" class="q">Comment rendre visible son annonce ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr7" class="q">Comment arrêter la diffusion de son annonce ?</a>
	 		</li>
	 	</ol>

	 	<label for="ql4">Photos d'annonce <i class="mdi mdi-chevron-right"></i></label>
	 	<input type="checkbox" id="ql4"> 
	 	<ol>
	 		<li>
	 			<a href="#res" id="#qr8" class="q">Comment ajouter des photos a son annonce ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr9" class="q">Comment modifier les photos de son annonce ?</a>
	 		</li>
	 	</ol>

	 	<label for="ql2">Compte client <i class="mdi mdi-chevron-right"></i></label>
	 	<input type="checkbox" id="ql2">
	 	<ol>
	 		<li>
	 			<a href="#res" id="#qr10" class="q">Comment créé son compte(s'inscrire) ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr11" class="q">Comment se connecter ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr12" class="q">Pourquoi crée un compte ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="#qr13" class="q">Comment ajouter une annonce a ma selection</a>
	 		</li>
	 	</ol>

	 	<label for="ql3">Recherche d'annonce <i class="mdi mdi-chevron-right"></i></label>
	 	<input type="checkbox" id="ql3" class="q">
	 	<ol >
	 		<li>
	 			<a href="#res" id="" class="q">Comment chercher son annonce sur la page d'accueil ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="" class="q">Comment chercher son annonce sur la page d'accueuil de son compte ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="" class="q">Comment voir toutes les annonce ?</a>
	 		</li>
	 		<li>
	 			<a href="#res" id="" class="q">Comment voir les annonce d'une categorie ?</a>
	 		</li>

	 		<li>
	 			<a href="#res" id="" class="q">Comment voir les annonces d'une sous-categorie?</a>
	 		</li>

	 		<li>
	 			<a href="#res" id="" class="q">Comment voir les annonces d'une villes?</a>
	 		</li>

	 		<!-- <li>
	 			<a id="">Comment filter ces annonces?</a>
	 		</li>

	 		<li>
	 			<a id="">Comment filter ces annonces?</a>
	 		</li>

	 		<li>
	 			<a id="">Comment filter ces annonces?</a>
	 		</li>

	 		<li>
	 			<a id="">Comment filter ces annonces?</a>
	 		</li> -->
	 		
	 	</ol>
	 </div>

	 <div class="emptyDv" id="res">
	 	
	 </div>

	 <div class="qresponseTitle" >
	 	<h1 ><i class="mdi mdi-check-decagram"></i>Reponse</h1>
	 </div>


	 <div class="questionResponse" >
	 	<div id="qr1" class="qr">
	 		<h2>La publication d'annonce est elle gratuite ?</h2>
	 		<p>Oui vous pouvez publier une annonce gratuitement sur Ahimin.bj. Et ce n'est oas tout,vous pouvez aussi modifier et augmentez la visisibilité de votre annonce sur Ahimin.bj</p>

	 		<h4>Deposer une annonce gratuitement <a id="">Ici</a></h4>
	 	</div>

	 	<div id="qr2" class="qr">
	 		<h2>Comment publier une annonce ?</h2>

	 		<h3>Sur mobile(android/ios) </h3>
	 		<div>
	 			<h4>Etape 1</h4>
	 			<p>Connecter vous,si vous avez deja un compte,si vous n'avez pas de compte crée le en vous inscrivant <a id="">ICI</a> </p>
	 			<img src="" alt="Image Phase 1">
	 			<h4>Etape 2</h4>
	 			<p>Cliquer sur le bouton + en bas de votre ecran au milieu de l'ecran</p>
	 			<img src="" alt="Image Phase 2">
	 			<h4>Etape 3</h4>
	 			<p>Vous n'avez plus qu'a remplir le formulaire en ajoutant: </p>
	 			<ul>
	 				<li>La ou les photos</li>
	 				<li>Le nom(titre du produit)</li>
	 				<li>La categorie(a choisir) </li>
	 				<li>La sous categorie</li>
	 				<li>Le prix</li>
	 				<li>La Livraison(Si vous livrer ou non)</li>
	 				<li>L'etat(neuf ou d'occasion)</li>
	 				<li>La description(Les informations,caractéristique ou details du produit)</li>
	 			</ul>
	 			<img src="" alt="Image Phase 3">
	 		</div>

	 		<h3>Deposer une annonce sur votre pc/tablette</h3>
	 		<div>
	 			
	 		</div>
	 	</div>

	 	<div id="qr3" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>

	 		<p>Une fois connecté il vous suffit de cliquer sur l'image de votre profil <br>Ensuite cliquer sur Mon profil.<br> Au niveau des publications retrouver l'annonce en question et cliquer dessus puis sur l'icone de modification(<i class="mdi mdi-update"></i>),vous serez rediriger sur la page de modification. <br> Faite vos modification et enregister les. </p>
	 	</div>

	 	<div id="qr4" class="qr">
	 		<h2>Delai de mise en ligne d'une annonce ?</h2>

	 		<p>Il n'y as aucun délai...<br>Votre publication est disponible aussitot que vous la poster.</p>
	 	</div>

	 	<div id="qr5" class="qr">
	 		<h2>Quel sont les informations obligatoire pour la publication de son annonce ?</h2>
	 			<ul>
	 				<li>La ou les photos</li>
	 				<li>Le nom(titre du produit)</li>
	 				<li>La categorie(a choisir) </li>
	 				<li>La sous categorie</li>
	 				<li>Le prix</li>
	 				<li>La Livraison(Si vous livrer ou non)</li>
	 				<li>L'etat(neuf ou d'occasion)</li>
	 				<li>La description(Les informations,caractéristique ou details du produit)</li>
	 			</ul>
	 	</div>

	 	<div id="qr6" class="qr">
	 		<h2>Comment rendre visible son annonce ?</h2>

	 		<p>
	 			Pour ça il n'y as pas de secret, il vous suffit de copier le lien de votre annonce puis de le partager au maximum le lien de votre publication sur vos reseaux sociaux ceci augmentera votre nombre de vue et donc la position de votre annonces dans le classement des annonce populaire :)...
	 		</p>
	 	</div>

	 	<div id="qr7" class="qr">
	 		<h2>Comment arrêter la diffusion de son annonce ?</h2>

	 		<p>Une fois connecté il vous suffit de cliquer sur l'image de votre profil <br>Ensuite cliquer sur Mon profil.<br> Au niveau des produit pulier retrouver l'annonce en question et cliquer dessus puis sur l'icone de suppresion(<i class="mdi mdi-delete"></i>).Vous devriez voir apparaitre un message de confirmation .<br> Cliquer sur oui. </p>
	 	</div>

	 	<div id="qr8" class="qr">
	 		<h2>Comment ajouter des photos a son annonce ?</h2>

	 		<p>
	 			Une fois sur la page d'ajout de produit ,cliquer sur un des cercle et choississez l'image a ajouter.Repetez l'operation selon le nombre d'image a ajouter.
	 			<br>
	 			Nombre d'image Limité a 4(pour l'instant)...
	 		</p>
	 	</div>


	 	<div id="qr9" class="qr">
	 		<h2>Comment modifier les photos de son annonce ?</h2>
	 		<p>Une fois connecté il vous suffit de cliquer sur l'image de votre profil <br>Ensuite cliquer sur Mon profil.<br> Au niveau des pulication(produits ou services) retrouver l'annonce en question et cliquer dessus puis sur l'icone de modification(<i class="mdi mdi-update"></i>).Vous serez rediriger sur la page de modification .<br> Cliquer sur l'image(ou les images) a modifier et choisissez les nouvelles. </p>
	 	</div>

	 	<div id="qr10" class="qr">
	 		<h2>Comment créé son compte(s'inscrire) ?</h2>
	 		<h3>Sur mobile</h3>
	 		<p>Sur la page d'accueil cliquer sur Menu(en haut a droite) puis sur Inscription
	 			<br>
	 			Une fois sur la page d'inscription remplissez le formulaire en mettant:
	 			<ul>
	 				<li>Un pseudo</li>
	 				<li>Un mail</li>
	 				<li>Un mot de passe</li>
	 				<li>La confirmation du mot de passe</li>
	 			</ul>
	 			<br>Vous recevrez alors sur votre mail(dans la messagerie) un message de validation de votre compte,Cliquez sur le bouton valider mon compte ,Si votre compte est valider,cliquer sur le bouton Connexion et connecter vous...
	 			<br><br>
	 			Ou alors connecter vous directement avec votre compte Gmail(c'est plus simple)
	 		</p>
	 	</div>

	 	<div id="qr11" class="qr">
	 		<h2>Comment se connecter ?</h2>
	 		<h3>Sur mobile</h3>
	 		<p>Sur la page d'accueil cliquer sur Menu(en haut a droite) puis sur Connexion</p>
	 		<h3>Sur pc Cliquer directement sur Connexion</h3>

	 		<p>Une fois sur la page de Connexion mettez votre Pseudo et votre mot de passe puis cliquez sur le boutton Connection</p>
	 	</div>

	 	<div id="qr12" class="qr">
	 		<h2>Pourquoi crée un compte ?</h2>

	 		<p>L'inscription est obligatoire si vous voulez poster une annonce
	 			<br>
	 		En effet la loi exige aux organisme(comme nous) de connaitre les coordonnées de leurs annonceurs.</p>
	 	</div>

	 	<div id="qr13" class="qr">
	 		<h2>Comment ajouter une annonce a ma selection</h2>
	 		<p>En cours....</p>
	 	</div>

	 	<div id="qr14" class="qr">
	 		<h2>Comment chercher son annonce sur la page d'accueil ?</h2>

	 		<p>
	 			Sur la page d'accueil dans le formulaire veuillez selectionner le type de recherche(produits ou services).
	 			<br>
	 			Puis entrez un mot clé(Exemple: Voiture Honda)
	 			Si vous le souhaitez vous pouvez aiguisez la recherche en selectionnant la categorie dans laquelle votre produit/service se situe... 
	 			<br>
	 			Vous verrez les resultats sur la page des resultats.
	 		</p>

	 	</div>

	 	<div id="qr15" class="qr">
	 		<h2>Comment chercher son annonce sur la page d'accueuil de son compte ?</h3>
	 			<p>
	 			Une fois connecté en dessous de la barre du Logo
	 			il ya un formulaire, veuillez selectionner le type de recherche(produits ou services).
	 			<br>
	 			Puis entrez un mot clé(Exemple: Voiture Honda),vous serez redirigez  sur la page des resultats.
	 		</p>
	 	</div>

	 	<div id="qr16" class="qr">
	 		<h2>Comment voir toutes les annonce ?</h3>
	 		<p>Sur la page d'acceuil(que vous soyez connectez ou non) choisissez le type d'annonce(produit ou service) a voir puis cliquez sur cherchez,vous serez redirigez  sur la page des resultats</p>
	 	</div>

	 	<div id="qr17" class="qr">
	 		<h2>Comment voir les annonce d'une categorie ?</h3>
	 	</div>

	 	<div id="qr18" class="qr">
	 		<h2>Comment voir les annonces d'une sous-categorie?</h3>
	 	</div>

	 	<div id="qr19" class="qr">
	 		<h2>Comment voir les annonces d'une villes?</h3>
	 	</div>


	 	<!-- <div id="qr20" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr21" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr22" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr23" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr24" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr25" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr26" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div>

	 	<div id="qr27" class="qr">
	 		<h2>Comment modifier son annonce ?</h3>
	 	</div> -->


	 </div>
</div>
