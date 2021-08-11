<?php 
$this->_pageTitle = 'Resultat produit checher';
$this->_pageStyles = 'modal_searchPage_card';
$this->_pageScripts = 'modal_input_Produit/filter';

 ?>

<div class="pageContent">

    <div class="productFilter">
        <div class="pfBtnDiv">
            <button class="pfBtn">Filtre <i class="mdi mdi-tune-variant"></i></button>
        </div>  
    </div>

    <!-- <div class="elementRange" style="">
        <div class="erBtnDiv">
            <select id="selectRange">
                <option value="newToOld">Plus recent au moins recent</option>
                <option value="oldToNew">Moins recent au plus recent</option>
                <option value="aToz">De A a Z</option>
                <option value="zToa">De Z a A</option>
            </select>
        </div>
        
    </div> -->

    <div class="nbProductFind">
        <p><?= count($elementResults) ?> produit(s) trouvé(s)</p>
    </div>

    <div class="modal" id="pfModal">

        <div class="pfModalBody">
            <div class="modalHeader">
                <span>Filtrer par </span>
                <i class="mdi mdi-close closer"></i>
            </div>

            <form id="pfModalBodyForm" method="post">
                <div class="pfmFormField">
                    <label>Categorie</label>
                    <input type="text" id="selectCategorie" name="categorie" readonly="">
                    <ul class="scCategories">
                        <?php foreach ($categories as $categorie) {?>
                            <li id="<?= $categorie->getCategorie() ?>"><?= $categorie->getCategorie() ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="pfmFormField">
                    <label>Sous-categorie</label>
                    <input type="text" id="selectSubCategorie" name="subCategorie" readonly="">
                    <ul class="scSubCategories">
                    
                    </ul>
                </div>

                <div class="pfmFormField" id="pfmFormFieldPrice">
                    <label>Prix</label>
                    <div>
                        <div>
                            <input type="number" name="prixMin" placeholder="Minimum">
                        </div>
                        <div>
                            <input type="number" name="prixMax" placeholder="Maximum">
                        </div>
                    </div>
                </div>

                <div class="pfmFormField">
                    <label>Ville</label>
                    <input type="text" name="ville" id="selectCity">
                    <ul class="scCitys">
                        <?php foreach ($villes as $ville) {?>
                            <li><?= $ville->getVille() ?></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="pfmFormField">
                    <label>Date</label>

                    <ul class="chkDates">
                        <li>
                            <input type="radio" name="date" id="checkDf1" value="1h">
                            <label for="checkDf1">1 heure</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf2" value="1d">
                            <label for="checkDf2">1 jour</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf3" value="1w">
                            <label for="checkDf3">1 semaine</label></li>
                        <li>
                            <input type="radio" name="date" id="checkDf4" value="1m">
                            <label for="checkDf4">1 mois</label></li>
                    </ul>
                    
                </div>

                <div class="pfmFormField">
                   <label>Etoiles</label>

                    <ul class="chkLoves">
                        <li>
                            <input type="radio" name="nbLove" id="checkLve1" value="0to10">
                            <label for="checkLve1">0 A 10<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve2" value="10to20">
                            <label for="checkLve2">10 A 20<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve3" value="20to30">
                            <label for="checkLve3">20 A 30<i class="mdi mdi-heart-outline"></i> </label></li>
                        <li>
                            <input type="radio" name="nbLove" id="checkLve4" value="30to+">
                            <label for="checkLve4">+ DE 30 <i class="mdi mdi-heart-outline"></i></label></li>
                    </ul>
                </div>

                <div class="pfmFormField">
                   <label>Etat</label>

                    <ul class="chkEtat">
                        <li>
                            <input type="radio" name="etat" id="chkEtat1" value="Neuf">
                            <label for="chkEtat1">Neuf</label>
                        </li>
                        <li>
                            <input type="radio" name="etat" id="chkEtat2" value="Occasion">
                            <label for="chkEtat2">Occasion</label>
                        </li>
                    </ul>
                </div>
                
            </form>

            <div class="modalFooter">
                <button class="pfreinitForm" type="submit">Reinitialiser</button>
                <button form="pfModalBodyForm" type="submit">Filtrer</button>
            </div>
        </div>

    </div>


<div class="elementCardList">
    <div class="eclCards">
        <?php
        if (is_array($elementResults) && !empty($elementResults)) {
        foreach ($elementResults as $elementResult) { ?>
            <a class="cardProduct1" data-id="<?= $elementResult->getId(); ?>"
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
                    <p><?= $elementResult->getPrix(); ?> cfa</p>
                </div>

                <p class="cp1TimeInfo"><?= $elementResult->getHourEcart(); ?></p>
            </a>
        <?php } }else { ?>
        <div class="notFound">
            <img src="<?= $domaine->getDomaine() ?>img/ils/notFound3.png" alt='Result not found'>
            <h3>Desolé,Aucun resultat ne correspond a votre recherche!</h3>
        </div>
        <?php  } ?>
    </div>

</div>

<?php if(count($elementResults) > 3){  ?>
    <div class="seeMoreProduct">
        <button id="smpBtn">Voir plus</button>
    </div>
<?php } ?>


</div>
