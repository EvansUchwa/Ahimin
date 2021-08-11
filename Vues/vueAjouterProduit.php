<?php 
$this->_pageTitle = 'Ajouter-Produit';
$this->_pageStyles = 'modal_dashForm';
$this->_pageScripts = 'image_modal_input_Produit/ajout';

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
			<h1>Ajouter votre produit</h1>
			<hr>
		</div>

		<form method="post" action="" enctype="multipart/form-data" class="daForm" id="formAjoutProduit">

			<div class="dafFileField">
				<input type="file" name="" id="dafFile1" class="fileSelect">
				<input type="file" name="" id="dafFile2" class="fileSelect">
				<input type="file" name="" id="dafFile3" class="fileSelect">
				<input type="file" name="" id="dafFile4" class="fileSelect">

				<div class="dafFilesSelect">

					<label for="dafFile1" id="okk">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview1" alt="filePreview1">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="1"></i>
						</div>
					</label>
					
					<label for="dafFile2">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview2" alt="filePreview2">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="2"></i>
						</div>
					</label>

					<label for="dafFile3">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview3" alt="filePreview3">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" id="3"></i>
						</div>
					</label>

					<label for="dafFile4">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview4" alt="filePreview4">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" ></i>
						</div>
					</label>
		
				</div>
				

			</div>

			<div class="dafFormGroup1">
				<div class="dafField">
					<label>Titre du produit</label>
					<input type="text" name="titre" placeholder="aA-zZ" 
							id="selectTitre" required=""
							minlength="2" maxlength="30">
							<p></p>
				</div>

				<div class="dafField">
					<label>Type</label>
					<input type="text" name="type" placeholder="Gros ou Detail" 
										id="selectType" readonly="" 
										required="">
										<p></p>
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
					<input type="text" name="categorie" placeholder="Art,Automobile etc..."
										 id="selectCategorie" readonly="" 
										 required="">
										 <p></p>
					<ul class="scCategories">
						<?php foreach ($categories as $categorie) {?>
							<li id="<?= $categorie->getCategorie() ?>"><?= $categorie->getCategorie() ?></li>
						<?php } ?>
						
					</ul>
				</div>

				<div class="dafField">
					<label>Sous-categorie</label>
					<input type="text" name="subCategorie" placeholder="..." 
										id="selectSubCategorie" readonly=""
										required="">
										<p></p>
					<ul class="scSubCategories">
					</ul>
				</div>
			</div>

			<div class="dafFormGroup3">
				<div class="dafField">
					<label>Prix</label>
					<input type="text" name="prix" placeholder="A partir de ...cfa" 
										id="selectPrix" required=""
										minlength="2" maxlength="8">
										<p></p>
				</div>

				<div class="dafField">
					<label>Livraison</label>
					<input type="text" name="Livraison" placeholder="Oui ou Non" 
										id="selectLivraison" readonly="" 
										required="">
										<p></p>
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
							id="etat1" class="etatCl">
						<label for="etat1">Neuf</label>
					</div>

					<div>
						<input type="radio" name="etat" value="Occasion"
							id="etat2" class="etatCl">
						<label for="etat2">Occasion</label>
					</div>
				</div>
			</div>

			<div class="dafFormGroup4">
				<div class="dafField">
					<label>Description</label>
					<textarea id="selectDescription" name="description"
								minlength="2" maxlength="400" required=""></textarea>
				</div>
			</div>

			<div class="dafFormBtn">
				<button class="formSubBtn">Ajouter</button>
			</div>
			


		</form>
		

		

		
	</div>
</div>