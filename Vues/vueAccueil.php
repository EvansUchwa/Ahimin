<?php 

$this->_pageTitle = 'Accueil';
$this->_pageStyles = 'modal_index_slick';
$this->_pageScripts = 'slick.min_input_modal_slicker';

 ?>

<div class="pageContent">
	<div class="indexbanner">
		<div class="ibTitle">
			<h1>Dejà 1000 annonces <br>publiés</h1>
			<p>Faite promouvoir vos produits</p>
			<div>
				<button><a href="">Postez une annonce!</a></button> Ou 
				<button>Consultez nos annonces</button>
			</div>
		</div>		
	</div>


	<div class="elementCategories">

		<div class="ecTitle">
			<h2>Nos categorie</h2>
		</div>

		<div class="ecCategories">
			<input type="radio" name="ec" id="ecP">
			<div class="eclabel">
				<label for="ecP">Categorie Produit</label>
			</div>

			<input type="radio" name="ec" id="ecS">
			<div class="eclabel">
				<label for="ecS">Categorie Service</label>
			</div>

			<div class="ecProduit">
				<?php foreach ($allPrCategories as $allPrCategorie) {?>
	        	<a href="">
	        		<span class="<?= $allPrCategorie->getIcon() ?>">
	        		 <?= $allPrCategorie->getCategorie() ?> </span>
	        		<span>10</span>
	        	</a>
	   			 <?php } ?>
				
			</div>

			<div class="ecService">
				<?php foreach ($allSrCategories as $allSrCategorie) {?>
					<a href="">
						<span class="<?= $allSrCategorie->getIcon() ?>"><?= $allSrCategorie->getCategorie() ?></span>
					<span>10</span></a>
		        <?php } ?>
			</div>
		</div>

		<div class="ecImg">
			<img src="img/svg/categorieIndex.svg">
		</div>
		
</div>


<div class="whyPost">
	<div class="wpTitle">
		<img src="img/ils/whyPost.png">
		<h2>Pourquoi poster sur Ahime?</h2>
	</div>

	<div class="wpRaisons">
		<div>
			<i class="mdi mdi-store-outline"></i>
			<span>C'est gratuit, et les modifications aussi</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
		</div>

		<div>
			<i class="mdi mdi-eye-plus-outline"></i>
			<span>Faites connaitre vos produits ou vos services</span>
			<p> Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur.</p>
		</div>

		<div>
			<i class="mdi mdi-star-plus-outline"></i>
			<span>Personnaliser votre compte et faites vous connaitre</span>
			<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>

	<div class="wpBtn">
		<button><a href="">Poster une annonce</a></button>
	</div>
</div>

<div class="userVisitorPart">
	<div class="uvpNumber">
		<h2>Deja 1000 visiteurs et 500 vendeur,acheteur et autre particulier inscrit</h2>
	</div>

	<div class="uvpComments">
		<div class="uvpCom">
			<i class="mdi mdi-format-quote-open-outline"></i>
			<div>
				<p>Tres bon site, franchement bv dolor sit amet, consectetur adipisicing elit.</p>
				<span>Jocelyne(inscrite)</span>
			</div>
			<img src="img/ban3.jpg">
		</div>

		<div class="uvpCom">
			<i class="mdi mdi-format-quote-open-outline"></i>
			<div>
				<p>Tres bon site, franchement bv dolor sit amet, consectetur adipisicing elit.</p>
				<span>Jocelyne(inscrite)</span>
			</div>
			<img src="img/ban3.jpg">
		</div>
	</div>
</div>

<!-- <div class="ourTools">
	<div class="otTitle">
		<h2>Faites nous confiance</h2>
	</div>

	<ol>
		<li>Combien de gens ont vu votre annonce</li>
		<li>Combien d'entre eux y ont reagis</li>
	</ol>
</div> -->


<!-- <div class="bottomBanner">
    <div>
        <span class="mdi mdi-home-outline"></span>
        <span>Accueil</span>
    </div>

    <div>
        <span class="mdi mdi-phone-settings-outline"></span>
        <span>Contact</span>
    </div>

    <div class="bbPost">
        <span class="mdi  mdi-plus-circle" id="rmModalShower"></span>
        <span>Poster</span>
    </div>

    <div>
        <span class="mdi mdi-account-outline"></span>
        <span>Membre</span>
    </div>

    <div>
        <span class="mdi mdi-information-outline"></span>
        <span>Infos</span>
    </div>
</div> -->

<div class="postArticle">
    <button>
        <i class="mdi mdi-plus-circle-outline"></i> Poster une annonce
    </button>
</div>

</div>

