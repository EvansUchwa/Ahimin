<?php 
$this->_pageTitle = 'Modifier Service';
$this->_pageStyles = 'modal_dashForm';
$this->_pageScripts = 'image_modal_input_Service/update';

 ?>

 <div class="modal" id="formModalResults" >
    <div class="formModalBody">

        <div class="modalHeaderAbsolute">
            
        </div>

        <div class="fmResult">
            
        </div>

        <div class="modalFooterAbsolute">
            <button class="fmrHider">Ok</button>
        </div>

    </div>
</div>

<div class="pageContent">
	<div class="dashAdd">
		<div class="daTitle">
			<h1>Ajouter votre service</h1>
			<hr>
		</div>

		<form method="post" action="" enctype="multipart/form-data" class="daForm" 
		id="formModifierService">

			<div class="dafFileField">
				<input type="file" name="" id="dafFile1" class="fileSelect" 
				value="<?= $service->getPhoto1() ?>">
				<input type="file" name="" id="dafFile2" class="fileSelect"
				value="<?= $service->getPhoto2() ?>">
				<input type="file" name="" id="dafFile3" class="fileSelect"
				value="<?= $service->getPhoto3() ?>">
				<input type="file" name="" id="dafFile4" class="fileSelect"
				value="<?= $service->getPhoto4() ?>">

				<input type="text" id="srId" value="<?= $service->getId() ?>" style="display: none;">
				<input type="text" id="oldFile1" value="<?= $service->getPhoto1() ?>">
				<input type="text" id="oldFile2" value="<?= $service->getPhoto2() ?>">
				<input type="text" id="oldFile3" value="<?= $service->getPhoto3() ?>">
				<input type="text" id="oldFile4" value="<?= $service->getPhoto4() ?>">

				<div class="dafFilesSelect">

					<label for="dafFile1" >
						<img src="<?= $service->getPhoto1() ?>" 
						class="filePreview1" alt="filePreview1">
						<span class="mdi mdi-file-download-outline"></span>
					</label>
					
					<label for="dafFile2">
						<img src="<?= $service->getPhoto2() ?>" 
						class="filePreview2" alt="filePreview2">
						<span class="mdi mdi-file-download-outline"></span>
					</label>

					<label for="dafFile3">
						<img src="<?= $service->getPhoto3() ?>" 
						class="filePreview3" alt="filePreview3">
						<span class="mdi mdi-file-download-outline"></span>
					</label>

					<label for="dafFile4">
						<img src="<?= $service->getPhoto4() ?>" 
						class="filePreview4" alt="filePreview4">
						<span class="mdi mdi-file-download-outline"></span>
					</label>
		
				</div>
				

			</div>

			<div class="dafFormGroup1">
				<div class="dafField">
					<label>Titre du service</label>
					<input type="text" name="titre" placeholder="aA-zZ" 
							id="selectTitre" required=""
							minlength="2" maxlength="30" value="<?= $service->getTitre() ?>">
				</div>
			</div>
			
			<div class="dafFormGroup1">

				<div class="dafField">
					<label>Categorie</label>
					<input type="text" name="categorie" placeholder="Art,Automobile etc..."
										 id="selectCategorie" readonly="" 
										 required="" value="<?= $service->getCategorie() ?>">
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
										required="" value="<?= $service->getsubCategorie() ?>">
										<p></p>
					<ul class="scSubCategories">
						
					</ul>
				</div>
			</div>


			<div class="dafFormGroup2">
				<div class="dafField">
					<label>Disponible de</label>
					<input type="text" name="openHour" 
						id="selectOpenHour" required="" value="<?= $service->getOpenHour() ?>">
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
						id="selectCloseHour" required="" value="<?= $service->getCloseHour() ?>">
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

			<div class="dafFormGroup4">
				<div class="dafField">
					<label>Description</label>
					<textarea id="selectDescription" name="description"
								minlength="2" maxlength="400" required=""><?= $service->getDescription() ?></textarea>
				</div>
			</div>

			<div class="dafFormBtn">
				<button>Ajouter</button>
			</div>
			


		</form>
		

		

		
	</div>
</div>