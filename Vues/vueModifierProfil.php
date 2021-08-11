<?php 
$this->_pageTitle = 'Modifier-Profil';
$this->_pageStyles = 'modal_dashForm';
$this->_pageScripts = 'image_modal_input_User/update';
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
            <h1>Modifier votre profil</h1>
            <hr>
        </div>

        <form method="post" action="" enctype="multipart/form-data" class="daForm" id="formUpdateProfil">

            <div class="dafFileField">
                <input type="text" value="<?= $userConnected->getPhoto() ?>" id="oldFile1">
                
                <input type="file" name="" id="dafFile1" class="fileSelect">
                

                <div class="dafFilesSelect">

                    <label for="dafFile1" id="profilFileLabel">
                        <img src="<?= $userConnected->getPhoto() ?>" class="filePreview1">
                        <div class="imgAction">
                            <i class="mdi mdi-file-download-outline"></i>
                            <i class="mdi mdi-window-close removeImg" id="1"></i>
                        </div>
                    </label>
        
                </div>
                

            </div>

            <div class="dafFormGroup1">
                <div class="dafField">
                    <label>Pseudo</label>
                    <input type="text" name="pseudo" placeholder="aA-zZ" id="selectPseudo" value="<?=
                    $userConnected->getPseudo() ?>">
                </div>

                <div class="dafField">
                    <label>Mail</label>
                    <input type="text" name="mail" placeholder="aA-zZ" id="selectMail" value="<?=
                    $userConnected->getMail() ?>">
                </div>
            </div>

            <div class="dafFormGroup1">
                <div class="dafField">
                    <label>Telephone</label>
                    <input type="tel" name="numero" placeholder="Numero de telephone..." id="selectTel" value="<?=
                    $userConnected->getNumero() ?>">
                </div>

                <div class="dafField">
                    <label>Whatsapp</label>
                    <input type="tel" name="whatsapp" placeholder="Numero whatsapp..." id="selectWht" value="<?=
                    $userConnected->getWhatsapp() ?>">
                </div>
            </div>

            <div class="dafFormGroup2">
                <div class="dafField">
                    <label>Statut</label>
                    <input type="text" name="statut" placeholder="Entreprise/Particulier..." id="selectStatus" value="<?= $userConnected->getStatut() ?>">

                    <ul class="scStatus">
                        <li>Entreprise</li>
                        <li>Particulier</li>
                    </ul>
                </div>

                <div class="dafField">
                    <label>Localisation(ville)</label>
                    <input type="text" name="localisation" placeholder="Localisation..." id="selectCity" value="<?= $userConnected->getLocalisation() ?>">
                    <ul class="scCitys">
                        <?php 
                        foreach ($villes as $ville) 
                        {
                            echo '<li>'.$ville->getVille().'</li>';
                        }
                         ?>
                    </ul>
                </div>
            </div>

            <div class="dafFormGroup2">
                <div class="dafField">
                    <label>Sexe</label>
                    <input type="text" name="sexe" placeholder="Sexe..." id="selectSexe" 
                    value="<?=$userConnected->getSexe() ?>">

                    <ul class="scSexes">
                        <li>Homme</li>
                        <li>Femme</li>
                    </ul>
                </div>
            </div>

            <?php if($userConnected->getStatut() == 'Entreprise'){  ?>
                <div class="dafFormGroup2" id="ffProfilStName" style="display: flex;">
                <div class="dafField">
                    <label>Nom entreprise</label>
                    <input type="text" name="nomEntreprise" placeholder="Nom de l'entreprise..." 
                    id="nomEntreprise" value="<?= $userConnected->getNomEntreprise() ?>">
                </div>
                </div>
            <?php }else{  ?>
                <div class="dafFormGroup2" id="ffProfilStName">
                <div class="dafField">
                    <label>Nom entreprise</label>
                    <input type="text" name="nomEntreprise" placeholder="Nom de l'entreprise..." 
                    id="nomEntreprise">
                </div>
                </div>
            <?php } ?>
            <div class="dafFormGroup3">
                <div class="dafField">
                    <label>Mot de passe</label>
                    <input type="text" name="password" placeholder="Mot de passe" id="password">
                </div>

                <div class="dafField">
                    <label>Confirmation ...</label>
                    <input type="text" name="password_confirm" placeholder="Confirmation..." id="password_confirm">
                </div>
            </div>

            <div class="dafFormGroup4">
                <div class="dafField">
                    <label>Description</label>
                    <textarea id="selectDescription" name="description"><?=$userConnected->getDescription() ?></textarea>
                </div>
            </div>

            <div class="dafFormBtn">
                <button type="submit">Enregistrer</button>
            </div>
            


        </form>
        

        

        
    </div>
</div>

<script type="text/javascript">
    const pageAction = 'Modifier Profil';
</script>