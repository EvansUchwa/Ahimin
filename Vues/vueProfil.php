<?php 
$this->_pageTitle = 'Profil';
$this->_pageStyles = 'modal_card_profil';
$this->_pageScripts = 'modal_additional_User/follow_User/rate';

// var_dump($userProfil);
 ?>

 <div class="modal" id="profilViewFollow" >
    <div class="pvfBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
        </div>

        <div class="pvfResult">
            <h3></h3>
            <hr>
            <div class="pvfResultList">
            </div>
        </div>

    </div>
</div>

 <div class="modal" id="elementAction" >
    <div class="evaBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
        </div>

        <div class="evaResult"></div>
    </div>
</div>

 <div class="modal" id="profilRate">
    <div class="prBody">
        <div class="modalHeader">
            <i class="mdi mdi-close closer"></i>
        </div>

        <div class="prResult" >
            <h4>Notes</h4>
            <div class="prStars" data-id="<?= $userProfil->getId() ?>">
                <i class="mdi mdi-star " data-id='1'></i>
                <i class="mdi mdi-star " data-id='2'></i>
                <i class="mdi mdi-star " data-id='3'></i>
                <i class="mdi mdi-star " data-id='4'></i>
                <i class="mdi mdi-star " data-id='5'></i>
            </div>
        </div>
        <div class="spinnerModal">
            <img src="../img/sp3.gif">
        </div>
        <div class="resultText"></div>
    </div>
</div>

 <div class="pageContent">
    <input type="radio" name="lol" id="userProductRadio" checked="">
    <input type="radio" name="lol" id="userServiceRadio">

    <div class="dashProfilUser">
        <div class="dpuBanner">
            <div class="dpuUserImg">
                <img src="<?= $userProfil->getPhoto() ?>">
            </div>
        </div>

        <div class="dpuProfilStars">
            <span class="mdi mdi-account-star-outline">
            Niveau:</span>
            <p>
                <?php 
                $color = 'grey';
                for ($i=1; $i <= 5; $i++) { 
                   if($i > $userProfil->getStars())
                   { $color = 'var(--colorWhite3) '; }
                   else{ $color = 'var(--colorPrincipal)'; }
                 ?>
                <i class="mdi mdi-star" style="color: <?= $color ?>;"></i>
                 <?php } ?>
            </p>
             <?php 
            if (isset($_SESSION) && !empty($_SESSION['id']) ) { ?>
            <button class="rateActionBtn">Hi,note moi</button> 
            <?php }else{  ?>
            <button class="notConnected">Hi,note moi</button>
            <?php } ?>
            
        </div>

        <div class="dpuName">
            <h3><?= $userProfil->getPseudo() ?> </h3>

             <?php 
            if (isset($_SESSION) && !empty($_SESSION['id']) 
                && $userProfil->getId() != $userConnected->getId()) { ?> 
    <button class="followBtn" data-id="<?= $userProfil->getId() ?>"><?= $userConnectedFollow  ?></button>
            <?php } ?>
        </div>

         <?php 
         if (isset($_SESSION) && !empty($_SESSION['id'])
            && $userProfil->getId() == $userConnected->getId()) { ?>
           <div class="followsView">
            <button class="viewFollowsBtn" id="viewFollowers" data-id="Abonné(e)(s)">Abonnées</button>
            <button class="viewFollowsBtn" id="viewFollowed" data-id="Abonnement(s)">Mes Abonnement</button>
            </div>
        <?php } ?>
        

        <div class="dpuDescription">
            <span class="mdi mdi-account-question-outline"> Description</span>
            <p><?= $userProfil->getDescription() ?>.</p>
        </div>

        <div class="dpuOtherInfo">     
            <div class="dpuLocalisation">
                <span><i class="mdi mdi-map-marker"></i> Localisation</span>
                <p><?= $userProfil->getLocalisation() ?></p>
            </div>

            <div class="dpuMail">
                 <span><i class="mdi mdi-email"></i> Mail</span>
                <a href=""><?= $userProfil->getMail() ?></a>
            </div>

            <div class="dpuNbAbonned">
                <span><i class="mdi mdi-account-group"></i> Nombre d'abonné</span>
                <p><?= $userProfil->getFollowers().' Abonné(e)(s)'; ?></p>
            </div>

            <div class="dpuSexe">
                <span><i class="mdi mdi-gender-male-female"></i> Sexe</span>
                <p><?= $userProfil->getSexe() ?></p>
            </div>


            <div class="dpuCreatedAt">
                <span><i class="mdi mdi-calendar-clock"></i>Date de creation</span>
                <p>Le <?= date('d-m-Y',strtotime($userProfil->getCreatedAt())) ?></p>
            </div>

            <div class="dpuNumero">
                 <span><i class="mdi mdi-phone"></i> Numero</span>
                <a href=""><?= $userProfil->getNumero() ?></a>
            </div>

            <div class="dpuWhatsapp">
                <span><i class="mdi mdi-whatsapp"></i> Whatsapp</span>
                <a href=""><?= $userProfil->getWhatsapp() ?></a>
            </div>

            <div class="dpuAccountType">
                <span><i class="mdi mdi-account-network"></i> Statut</span>
                <p><?= $userProfil->getStatut() ?></p>
            </div>
        </div>


        <div class="dpuPublication">
            <h3>Vos Publication</h3>
            <hr>
            <div>
                <button>
                    <label for="userProductRadio">Produit 
                        <span>(<?= count($allUserProducts) ?>)</span>
                    </label>
                </button>
                <button>
                    <label for="userServiceRadio">Service <span>(<?= count($allUserServices) ?>)</span></label>
                </button>
            </div>


        </div>
    </div>

    <div class="userProducts">
         <?php foreach ($allUserProducts as $allUserProduct) { ?>
            <a href="" class="cardProduct1">
                <div class="cp1Head">
                    <img src="<?= $allUserProduct->getPhoto1(); ?>" alt="<?= $allUserProduct->getTitre(); ?> Pic">
                </div>
                        
                 <div class="cp1Body">
                    <p><?= $allUserProduct->getTitre(); ?></p>
                    <p><?= $allUserProduct->getLocalisation(); ?></p>
                </div>

                <div class="cp1Foot">
                    <p><?= $allUserProduct->getLoves(); ?>
                     <i class="mdi mdi-heart-outline"></i></p>
                </div>

                <div class="actionBtn">
                    <label class="viewPBtn" id="<?= $allUserProduct->getId(); ?>">
                        <i class="mdi mdi-eye"></i>
                    </label>
                     <?php 
                    if (isset($_SESSION) && !empty($_SESSION['id'])
                        && $userProfil->getId() == $userConnected->getId()) { ?>
                    <label class="updatePBtn" id="<?= $allUserProduct->getId(); ?>">
                        <i class="mdi mdi-file-edit"></i>
                    </label>
                    <label class="deletePBtn" id="<?= $allUserProduct->getId(); ?>">
                        <i class="mdi mdi-delete"></i>
                    </label>
                    <?php } ?>
                    
                </div>
            </a>
        <?php } ?>
    </div>

    <div class="userServices">
        <?php foreach ($allUserServices as $allUserService) { ?>
            <a href="Produit/<?= $allUserService->getId(); ?>" class="cardProduct1">
                <div class="cp1Head">
                    <img src="<?= $allUserService->getPhoto1(); ?>" alt="<?= $allUserService->getTitre(); ?> Pic">
                </div>
                        
                 <div class="cp1Body">
                    <p><?= $allUserService->getTitre(); ?></p>
                    <p><?= $allUserService->getLocalisation(); ?></p>
                </div>

                <div class="cp1Foot">
                    <p><?= $allUserService->getLoves(); ?>
                     <i class="mdi mdi-heart-outline"></i></p>
                </div>

                <div class="actionBtn">
                    <label class="viewSBtn" id="<?= $allUserService->getId(); ?>">
                        <i class="mdi mdi-eye"></i>
                    </label>
                    <?php 
                    if (isset($_SESSION) && !empty($_SESSION['id'])
                        && $userProfil->getId() == $userConnected->getId()) { ?>
                        <label class="updateSBtn" id="<?= $allUserService->getId(); ?>">
                            <i class="mdi mdi-file-edit"></i>
                        </label>
                        <label class="deleteSBtn" id="<?= $allUserService->getId(); ?>">
                            <i class="mdi mdi-delete"></i>
                        </label>
                    <?php } ?>
                </div>
            </a>
        <?php } ?>
    </div>
</div>
<script type="text/javascript">let pageAction = "profil"</script>