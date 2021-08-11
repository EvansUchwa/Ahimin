<?php 
$this->_pageTitle = 'Dashboard';
$this->_pageStyles = 'slick_modal_dashboard_card';
$this->_pageScripts = 'slick_modal_input_slicker';

// var_dump('xhswhhx'.URLS);
 ?>
<input type="radio" name="euwv" id="euwv1" checked="">
<div class="elementUserWouldView" id="firstStick">
    <label for="euwv1"><span>Produits</span></label>
</div>

<input type="radio" name="euwv" id="euwv2" >
<div class="elementUserWouldView" id="secondStick">
    <label for="euwv2"><span>Service</span></label>
</div>


<div class="pageContent">

 <div class="dashHomeTitle">
    <h1>Bonjour  <?= $userConnected->getPseudo() ?> !</h1>
    <p>Que cherchez vous Aujourd'hui?</p>
</div>


<section class="productSection">

    <div class="dashElementCategorie">
        <h2>Categorie Produit</h2>
        <div class="decList dashSlide">
            <?php foreach ($allPrCategories as $allPrCategorie) {?>
            <a href="Resultats/Produits/All/<?= $allPrCategorie->getCategorie(); ?>" class="dhcCategorie">
                <p><i class="<?= $allPrCategorie->getIcon(); ?>"></i></p>
                <p><?= $allPrCategorie->getCategorie(); ?></p>
            </a>
        <?php } ?>
        </div>
    </div>

    <div class="dashHomeLastPosted">
        <h2>Derniers Produits</h2>

        <div class="elementCardList dashSlide">
                <?php 
                foreach ($lastProducts as $lastProduct) { ?>
                    <a class="cardProduct1" href="Produit/<?= $lastProduct->getId(); ?>">
                        <div class="cp1Head">
                            <img src="<?= $lastProduct->getPhoto1(); ?>" alt="<?= $lastProduct->getTitre(); ?> Pic">
                        </div>
                        
                        <div class="cp1Body">
                            <p><?= $lastProduct->getTitre(); ?></p>
                            <p><?= $lastProduct->getLocalisation(); ?></p>
                        </div>

                        <div class="cp1Foot">
                            <p><?= $lastProduct->getLoves(); ?>
                            <i class="mdi mdi-heart-outline"></i></p>
                            <p><?= $lastProduct->getPrix(); ?> cfa</p>
                        </div>

                        <p class="cp1TimeInfo"><?= $lastProduct->getHourEcart(); ?></p>
                    </a>
                <?php } ?>

        </div>

    </div>

    <div class="dashHomePopularPosted">
        <h2>Produit populaire</h2>

        <div class="elementCardList dashSlide">
             <?php 
            foreach ($popularProducts as $popularProduct) { ?>
                <a class="cardProduct2" href="Produit/<?= $popularProduct->getId(); ?>">
                    <div class="cp2left">
                        <img src="<?= $popularProduct->getPhoto1() ?>">
                    </div>
                    
                    <div class="cp2Right">
                        <div class="cp2rHead">
                            <p><?= $popularProduct->getTitre() ?></p>
                           <p> <?= $popularProduct->getLoves() ?><i class="mdi mdi-heart-outline"></i></p>
                        </div>

                        <div class="cp2rBody">
                            <p> <?= $popularProduct->getLocalisation() ?></p>
                        </div>

                        
                        <div class="cp2rFoot">
                            <p> <?= $popularProduct->getPrix() ?> cfa</p>
                            <p class="cp2TimeInfo"> <?= $popularProduct->getHourEcart() ?></p>
                        </div>
                    </div>  
                </a>    
            <?php } ?>
        </div>
    </div>

        <div class="dashHomeBestPosted">
            <h2>Produit les mieux notés</h2>

            <div class="elementCardList dashSlide">
                <?php 
                foreach ($bestProducts as $bestProduct) { ?>
                    <a class="cardProduct1" href="Produit/<?= $bestProduct->getId(); ?>">
                        <div class="cp1Head">
                            <img src="<?= $bestProduct->getPhoto1(); ?>" alt="<?= $bestProduct->getTitre(); ?> Pic">
                        </div>
                        
                        <div class="cp1Body">
                            <p><?= $bestProduct->getTitre(); ?></p>
                            <p><?= $bestProduct->getLocalisation(); ?></p>
                        </div>

                        <div class="cp1Foot">
                            <p><?= $bestProduct->getLoves(); ?>
                            <i class="mdi mdi-heart-outline"></i></p>
                            <p><?= $bestProduct->getPrix(); ?> cfa</p>
                        </div>

                        <p class="cp1TimeInfo"><?= $bestProduct->getHourEcart(); ?></p>
                    </a>
                <?php } ?>

                </div>

        </div>
    
</section>


































<section class="serviceSection">

    <div class="dashElementCategorie">
        <h2>Categorie Service</h2>
        <div class="decList dashSlide">
            <?php foreach ($allSrCategories as $allSrCategorie) {?>
            <a href="Resultats/Services/All/<?= $allSrCategorie->getCategorie(); ?>" class="dhcCategorie">
                <p><i class="<?= $allSrCategorie->getIcon(); ?>"></i></p>
                <p><?= $allSrCategorie->getCategorie(); ?></p>
            </a>
            <?php } ?>
        </div>
    </div>

    <div class="dashHomeLastPosted">
            <h2>Derniers Service</h2>

            <div class="elementCardList dashSlide">
                   <?php 
                    foreach ($lastServices as $lastService) { ?>
                        <a class="cardProduct1" href="Service/<?= $lastService->getId(); ?>">
                            <div class="cp1Head">
                                <img src="<?= $lastService->getPhoto1(); ?>" alt="<?= $lastService->getTitre(); ?> Pic">
                            </div>
                            
                            <div class="cp1Body">
                                <p><?= $lastService->getTitre(); ?></p>
                                <p><?= $lastService->getLocalisation(); ?></p>
                            </div>

                            <div class="cp1Foot">
                                <p><?= $lastService->getLoves(); ?>
                                <i class="mdi mdi-heart-outline"></i></p>

                            </div>

                            <p class="cp1TimeInfo"><?= $lastService->getStatut(); ?></p>
                        </a>
                    <?php } ?>
            </div>

    </div>

    <div class="dashHomePopularPosted">
        <h2>Service populaire</h2>

        <div class="elementCardList dashSlide">
             <?php 
            foreach ($popularProducts as $popularProduct) { ?>
                <a class="cardProduct2" href="Produit/<?= $popularProduct->getId(); ?>">
                    <div class="cp2left">
                        <img src="<?= $popularProduct->getPhoto1() ?>">
                    </div>
                    
                    <div class="cp2Right">
                        <div class="cp2rHead">
                            <p><?= $popularProduct->getTitre() ?></p>
                           <p> <?= $popularProduct->getLoves() ?><i class="mdi mdi-heart-outline"></i></p>
                        </div>

                        <div class="cp2rBody">
                            <p> <?= $popularProduct->getLocalisation() ?></p>
                        </div>

                        
                        <div class="cp2rFoot">
                            <p> <?= $popularProduct->getPrix() ?> cfa</p>
                            <p class="cp2TimeInfo"> <?= $popularProduct->getHourEcart() ?></p>
                        </div>
                    </div>  
                </a>    
            <?php } ?>
        </div>
    </div>

        <div class="dashHomeBestPosted">
            <h2>Service mieux notés</h2>

            <div class="elementCardList dashSlide">
                   <?php 
                    foreach ($lastServices as $lastService) { ?>
                        <a class="cardProduct1" href="Service/<?= $lastService->getId(); ?>">
                            <div class="cp1Head">
                                <img src="<?= $lastService->getPhoto1(); ?>" alt="<?= $lastService->getTitre(); ?> Pic">
                            </div>
                            
                            <div class="cp1Body">
                                <p><?= $lastService->getTitre(); ?></p>
                                <p><?= $lastService->getLocalisation(); ?></p>
                            </div>

                            <div class="cp1Foot">
                                <p><?= $lastService->getLoves(); ?>
                                <i class="mdi mdi-heart-outline"></i></p>

                            </div>

                            <p class="cp1TimeInfo"><?= $lastService->getStatut(); ?></p>
                        </a>
                    <?php } ?>
                </div>

        </div>
    </div>
</section>



</div>

<div class="postArticle">
    <button>
        <i class="mdi mdi-plus-circle-outline"></i> Poster une annonce
    </button>
</div>

