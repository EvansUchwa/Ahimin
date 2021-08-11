<?php 	


$this->_pageTitle = 'Finalisation';
$this->_pageStyles = 'modal_auth';
$this->_pageScripts = 'User/finaliserCompte_input_modal';

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

<div class="auth2PageContent">

	<div class="authPageLogo">
        <a href=""><img src="img/png/logfinal.png"></a>
    </div>

	<div class="authentificationArea">

		<div class="aaTitle">
        	<label ><span>Finalisation</span><br>
        	Pour finaliser votre compte veuillez renseigner les information suivantes...</label>
    	</div>

		<div class="aaSignup">
			<form method="post" action="" id="formFinaliseInscription">
				<div class="formField">
					<input type="tel" name="numero" placeholder="Numero de telephone..." id="profilTel">
				</div>

				<div class="formField">
					<input type="tel" name="whatsapp" placeholder="Numero whatsapp..." id="profilWht">
				</div>

				<div class="formField" id="ffProfilSexes">
					<input type="text" name="sexe" placeholder="Sexe..." id="selectSexe" readonly="">

					<ul class="scSexes">
						<li>Homme</li>
						<li>Femme</li>
					</ul>
				</div>

				<div class="formField" id="ffProfilStatus">
					<input type="text" name="statut" placeholder="Entreprise/Particulier..." id="selectStatus" readonly="">

					<ul class="scStatus">
						<li>Entreprise</li>
						<li>Particulier</li>
					</ul>

				</div>

				<div class="formField" id="ffProfilStName">
					<input type="text" name="nomEntreprise" placeholder="Nom de l'entreprise..." id="profilStName">
				</div>

				<div class="formField" id="ffCitys">
					<input type="text" name="localisation" placeholder="Localisation..." id="selectCity" readonly="">
					<ul class="scCitys">
						<?php 
						foreach ($villes as $ville) 
						{
							echo '<li>'.$ville->getVille().'</li>';
						}
						 ?>
					</ul>
				</div>

				<div class="formField">
					<input type="text" name="description" placeholder="Description..." id="profilDescription">
				</div>
				
				<div class="formBtn">
					<button type="submit">
                        <span>Finaliser</span><i class="mdi mdi-arrow-right-bold-outline"></i>
                    </button>
				</div>
			</form>
		</div>
	</div>
</div>
