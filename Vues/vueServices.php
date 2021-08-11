<?php 
$this->_pageTitle = 'Resultat produit checher';
$this->_pageStyles = 'modal_searchPage_card';
$this->_pageScripts = 'modal_input_Service/filter';

// var_dump($elementResults);
 ?>

<div class="pageContent">

    <div class="productFilter">
        <div class="pfBtnDiv">
            <button class="pfBtn">Filtre <i class="mdi mdi-tune-variant"></i></button>
        </div>  
    </div>

    <div class="productRange">
        <div class="prBtnDiv">
            <input type="" name="" placeholder="Ranger par" id="selectRange">
            <ul class="scRanges">
                <li class="">Plus recent au moins recent</li>
                <li class="">Moins recent au plus recent</i></li>
                <li class="">A a Z</li>
                <li class="">Z a A</li>
            </ul>
        </div>
        
    </div>

    <div class="nbProductFind">
        <p><?= count($elementResults) ?> service(s) trouvé(s)</p>
    </div>

    <div class="modal" id="pfModal">

        <div class="pfModalBody">
            <div class="modalHeader">
                <span>Filtrer par </span>
                <i class="mdi mdi-close pfmModalClose"></i>
            </div>

            <form id="sfModalBodyForm" method="post">
                <div class="pfmFormField">
                    <label>Categorie</label>
                    <input type="text" id="selectCategorie" name="categorie" 
                            placeholder="..." readonly="">
                    <ul class="scCategories">
                        <?php foreach ($categories as $categorie) {?>
                    <li id="<?= $categorie->getCategorie() ?>"><?= $categorie->getCategorie() ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="pfmFormField">
                    <label>Sous-categorie</label>
                    <input type="text" name="subCategorie" placeholder="..." 
                                        id="selectSubCategorie" readonly="">
                    <ul class="scSubCategories">
                        
                    </ul>
                </div>

                <div class="pfmFormField">
                    <label>Ville</label>
                    <input type="text" name="ville" id="selectCity" readonly="">
                    <ul class="scCitys">
                        <?php foreach ($villes as $ville) {?>
                            <li><?= $ville->getVille() ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div></div>

                <div class="pfmFormField">
                    <label>Disponibilité</label>

                    <ul class="chkDates">
                        <li>
                            <input type="radio" name="disponibility" id="checkDsFl1" 
                            value="Disponible" class="dspFl">
                            <label for="checkDsFl1">Disponile</label>
                        </li>
                        <li>
                            <input type="radio" name="disponibility" id="checkDsFl2" 
                            value="Indisponible" class="dspFl">
                            <label for="checkDsFl2">Indisponible</label>
                        </li>
                    </ul>
                    
                </div>

                

                <div class="pfmFormField">
                    <label>Date</label>

                    <ul class="chkDates">
                        <li>
                            <input type="radio" name="date" id="checkDf1" value="1h" class="dtFl">
                            <label for="checkDf1">1 heure</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf2" value="1d" class="dtFl">
                            <label for="checkDf2">1 jour</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf3" value="1w" class="dtFl">
                            <label for="checkDf3">1 semaine</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf4" value="1m" class="dtFl">
                            <label for="checkDf4">1 mois</label></li>
                    </ul>
                    
                </div>

                <div class="pfmFormField">
                   <label>J'adore</label>

                    <ul class="chkLoves">
                        <li>
                            <input type="radio" name="nbLove" id="checkLve1" value="0to10" class="lvFl">
                            <label for="checkLve1">0 A 10<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve2" value="10to20" class="lvFl">
                            <label for="checkLve2">10 A 20<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve3" value="20to30" class="lvFl">
                            <label for="checkLve3">20 A 30<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve4" value="30to+" class="lvFl">
                            <label for="checkLve4">+ DE 30 <i class="mdi mdi-heart-outline"></i></label></li>
                    </ul>
                </div>
                
            </form>

            <div class="modalFooter">
                <button class="sfreinitForm" type="submit">Reinitialiser</button>
                <button form="sfModalBodyForm" type="submit">Filtrer</button>
            </div>
        </div>

    </div>


<div class="produtCardList">
    <div class="pclCards">
        <?php 
        $colorBg = null;
        if (is_array($elementResults) && !empty($elementResults)) {
            if ($elementResult->getStatut() == 'green') 
            {
               $colorBg = 'green';
            }
            else
            {
                $colorBg = 'red';
            }
        foreach ($elementResults as $elementResult) { ?>
            <a class="cardProduct1" 
            href="<?= $domaine->getDomaine() ?>Produit/<?= $elementResult->getId(); ?>">
                <div class="cp1Head">
                    <img src="<?= $elementResult->getPhoto1(); ?>" alt="<?= $elementResult->getTitre(); ?> Pic">
                </div>
                
                <div class="cp1Body">
                    <p><?= $elementResult->getTitre(); ?></p>
                    <p><?= $elementResult->getLocalisation(); ?></p>
                </div>

                <div class="cp1Foot">
                    <p><?= $elementResult->getLoves(); ?>
                    <i class="mdi mdi-heart-outline"></i></p>
                    
                </div>


                <p class="cp1TimeInfo" style="background-color: <?= $colorBg ?>"><?= $elementResult->getStatut(); ?></p>
            </a>
        <?php } }else { ?>
        <div class="notFound">
            <img src="<?= $domaine->getDomaine() ?>img/ils/notFound3.png" alt='Result not found'>
            <h3>Desolé,Aucun resultat ne correspond a votre recherche!</h3>
        </div>
        <?php  } ?>
    </div>

</div>


</div>
