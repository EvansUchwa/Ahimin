<?php 
$this->_pageTitle = 'Ajouter-Service';
$this->_pageStyles = 'modal_dashForm';
$this->_pageScripts = 'image_modal_input_Service/ajout';

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
			<h1>Ajouter votre service</h1>
			<hr>
		</div>

		<form method="post" action="" enctype="multipart/form-data" class="daForm" id="formAjoutService">

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
							<i class="mdi mdi-window-close removeImg"></i>
						</div>
					</label>
					
					<label for="dafFile2">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview2" alt="filePreview2">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg" ></i>
						</div>
					</label>

					<label for="dafFile3">
						<img src="<?= $domaine->getDomaine() ?>img/png/placeholder.png" 
						class="filePreview3" alt="filePreview3">
						<div class="imgAction">
							<i class="mdi mdi-file-download-outline"></i>
							<i class="mdi mdi-window-close removeImg"></i>
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
					<label>Titre du service</label>
					<input type="text" name="titre" placeholder="aA-zZ" 
							id="selectTitre" required=""
							minlength="2" maxlength="30">
							<p></p>
				</div>
			</div>



			<div class="dafFormGroup1">
				<div class="dafField">
					<label>Categorie</label>
					<input type="text" name="categorie" placeholder=""
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


			<div class="dafFormGroup2">
				<div class="dafField">
					<label>Disponible de</label>
										 
					<input type="text" name="openHour" 
									id="selectOpenHour" class="readonly" 
									required="" autocomplete="off" >
									<p></p>
					<ul class="scOpenHour">
						<?php 
						$baseh = 0;
						// echo 3 % 2;
						for ($i=0; $i <= 23; $i++) 
						{ 
							if ($i > 9) 
							{
								$ol = 0;
						?>
						<li><?= $i.":0".$ol ?></li>
						<li><?= $i.":".($ol+30) ?></li>
						 <?php
							}
							else
							{			
							 	$ol = 0;
						?> 
						<?php  ?>
						<li><?= $baseh."".$i.":0".$ol ?></li>
						<li><?= $baseh."".$i.":".($ol+30) ?></li>

						<?php } } ?>
					</ul>
				</div>

				<div class="dafField">
					<label>A</label>
					<input type="text" name="closeHour" 
										id="selectCloseHour" class="readonly" 
										required="">
										<p></p>
					<ul class="scCloseHour">
						<?php 
						$baseh = 0;
						// echo 3 % 2;
						for ($i=0; $i <= 23; $i++) 
						{ 
							if ($i > 9) 
							{
								$ol = 0;
						?>
						<li><?= $i.":0".$ol ?></li>
						<li><?= $i.":".($ol+30) ?></li>
						 <?php
							}
							else
							{			
							 	$ol = 0;
						?> 
						<?php  ?>
						<li><?= $baseh."".$i.":0".$ol ?></li>
						<li><?= $baseh."".$i.":".($ol+30) ?></li>

						<?php } } ?>
					</ul>
				</div>
			</div>

			<div class="dafFormGroup3">
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