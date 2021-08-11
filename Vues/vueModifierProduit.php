<?php 
$this->_pageTitle = 'Modifier-Produit';
$this->_pageStyles = 'modal_dashForm';
$this->_pageScripts = 'image_modal_input_Produit/update';
 ?>
<div class="modal" id="formModalResults" >
    <div class="formModalBody">

        <div class="modalHeaderAbsolute">
            
        </div>

        <div class="fmResult">
            
        </div>

        <div class="modalFooterAbsolute">
            <button class="closer">Ok</button>
        </div>

    </div>
</div>

<div class="pageContent">
	<div class="dashAdd">
		<div class="daTitle">
			<h1>Modifier votre produit</h1>
			<hr>
		</div>

		<form method="post" action="" enctype="multipart/form-data" class="daForm" id="formModifierProduit">

			<div class="dafFileField">
				<input type="file" name="" id="dafFile1" class="fileSelect" 
				value="<?= $product->getPhoto1() ?>">
				<input type="file" name="" id="dafFile2" class="fileSelect"
				value="<?= $product->getPhoto2() ?>">
				<input type="file" name="" id="dafFile3" class="fileSelect"
				value="<?= $product->getPhoto3() ?>">
				<input type="file" name="" id="dafFile4" class="fileSelect"
				value="<?= $product->getPhoto4() ?>">

				<input type="text" id="prId" value="<?= $product->getId() ?>">
				<input type="text" id="oldFile1" value="<?= $product->getPhoto1() ?>">
				<input type="text" id="oldFile2" value="<?= $product->getPhoto2() ?>">
				<input type="text" id="oldFile3" value="<?= $product->getPhoto3() ?>">
				<input type="text" id="oldFile4" value="<?= $product->getPhoto4() ?>">

				<div class="dafFilesSelect">

					<label for="dafFile1" id="okk">
						<img src="<?= $product->getPhoto1() ?>" class="filePreview1">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="1"></i>
						</div>
					</label>
					
					<label for="dafFile2">
						<img src="<?= $product->getPhoto2() ?>" class="filePreview2">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="2"></i>
						</div>
					</label>

					<label for="dafFile3">
						<img src="<?= $product->getPhoto3() ?>" class="filePreview3">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="3"></i>
						</div>
					</label>

					<label for="dafFile4">
						<img src="<?= $product->getPhoto4() ?>" class="filePreview4">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="4"></i>
						</div>
					</label>
		
				</div>
				

			</div>

			<div class="dafFormGroup1">
				<div class="dafField">
					<label>Titre du produit</label>
					<input type="text" name="titre" placeholder="aA-zZ" id="selectTitre"
					value="<?= $product->getTitre() ?>">
				</div>

				<div class="dafField">
					<label>Type</label>
					<input type="text" name="type" placeholder="Gros ou Detail" id="selectType" readonly="" value="<?= $product->getType() ?>">
					<ul class="scTypes">
						<li>Gros</li>
						<li>Detail</li>
						<li>Les deux</li>
					</ul>
				</div>
			</div>
			


			<div class="dafFormGroup2">
				<div class="dafField">
					<label>Categorie</label>
					<input type="text" name="categorie" placeholder="Art,Automobile etc..." id="selectCategorie" readonly="" value="<?= $product->getCategorie() ?>">
					<ul class="scCategories">
						<?php foreach ($categories as $categorie) {?>
						<li id="<?= $categorie->getCategorie() ?>"><?= $categorie->getCategorie() ?></li>
						<?php } ?>
						
					</ul>
				</div>

				<div class="dafField">
					<label>Sous-categorie</label>
					<input type="text" name="subCategorie" placeholder="..." id="selectSubCategorie" readonly="" value="<?= $product->getSubCategorie() ?>">

					<ul class="scSubCategories">
						
					</ul>
				</div>
			</div>

			<div class="dafFormGroup3">
				<div class="dafField">
					<label>Prix</label>
					<input type="text" name="prix" placeholder="aA-zZ" id="selectPrix"
					value="<?= $product->getPrix() ?>">
				</div>

				<div class="dafField">
					<label>Livraison</label>
					<input type="text" name="livraison" placeholder="Oui ou Non" id="selectLivraison" readonly="" value="<?= $product->getLivraison() ?>">
					<ul class="scLivraisons">
						<li>Oui-Payante</li>
						<li>Oui-Gratuite</li>
						<li>Non</li>
					</ul>
				</div>
			</div>

			<div class="dafFormGroup4">
				<div class="dafField">
					<label>Etat</label>
					<div>
						<input type="radio" name="etat" value="Neuf" 
		id="etat1" class="etatCl" <?= ($product->getEtat() == "Neuf") ? 'checked' : '' ?>>
						<label for="etat1">Neuf</label>
					</div>

					<div>
						<input type="radio" name="etat" value="Occasion"
					id="etat2" class="etatCl" <?= ($product->getEtat() == "Occasion") ? 'checked' : '' ?>>
						<label for="etat2">Occasion</label>
					</div>
	

					
				</div>
			</div>


			<div class="dafFormGroup4">
				<div class="dafField">
					<label>Description</label>
					<textarea id="selectDescription" name="description"><?= trim($product->getDescription()) ?></textarea>
				</div>
			</div>

			<div class="dafFormBtn">
				<button>Sauvegarder</button>
			</div>
			


		</form>
		

		

		
	</div>
</div>

<script type="text/javascript">
	const pageAction = "ModifierProduit";
</script>