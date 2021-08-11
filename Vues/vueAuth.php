<?php 
$this->_pageTitle = "Authentification";
$this->_pageStyles = 'modal_auth';
$this->_pageScripts = 'input_modal_User/auth';

// require_once('configAuthGoogle.php');

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


 <div class="authPageContent">

    <div class="authPageLogo">
        <a href="<?=URLBASE ?>Accueil"><img src="<?= URLBASE ?>img/png/logfinal.png"></a>
    </div>

    <div class="authentificationArea">
        <?php if($_GET['typeAuth'] == 'Connexion'){ ?>
            <input type="radio" name="lol" id="connexionRadio" checked="">
            <input type="radio" name="lol" id="inscriptionRadio">
        <?php }elseif($_GET['typeAuth'] == 'Inscription'){ ?>
            <input type="radio" name="lol" id="connexionRadio" >
            <input type="radio" name="lol" id="inscriptionRadio" checked="">
        <?php  } ?>
        

        <div class="aaTitle">
            <label for="connexionRadio">Connexion</label>
            <span>Ou</span>
            <label for="inscriptionRadio">Inscription</label>
        </div>

        <div class="aaLogin">
            <form method="POST" action="" id="formConnexion">
                <div class="formField">
                    <input type="text" name="pseudo" placeholder="Pseudo..." class="usrIcon">
                </div>

                <div class="formField">
                    <input type="password" name="password" placeholder="Mot de passe..." class="psdIcon">
                </div>

                <div class="footForm">
                    <div class="rememberMe">
                        <input type="checkbox" class="viewPassword" 
                        >
                        <label>Afficher mot de passe</label>
                    </div>
                    <a href="">Mot de passe oublié?</a>
                </div>

                <div class="formBtn">
                    <button type="submit" class="formSubBtn">
                        Connexion<i class="mdi mdi-arrow-right-bold-outline"></i>
                    </button>
                </div>
            </form>

            <div class="aaOtherLogin">
                <p>Ou connectez vous avec <span class="mdi mdi-google"></span></p>
            </div>
        </div>

        <div class="aaSignin">
            <form method="POST"  id="formInscription">
                <div class="formField">
                    <input type="text" name="pseudo" placeholder="Pseudo..." class="usrIcon">
                </div>
                <div class="formField">
                    <input type="mail" name="mail" placeholder="Mail..." id="mailIcon">
                </div>
                <div class="formField">
                    <input type="password" name="password" placeholder="Mot de passe..." class="psdIcon">
                </div>
                <div class="formField">
                    <input type="text" name="password_confirm" placeholder="Confirmation...">
                </div>
                <div class="footForm">
                    <div class="rememberMe">
                        <input type="checkbox" class="viewPassword" 
                        >
                        <label>Afficher mot de passe</label>
                    </div>
                </div>
                <div class="formBtn">
                    <button type="submit" class="formSubBtn">
                        Inscription<i class="mdi mdi-arrow-right-bold-outline"></i>
                    </button>
                </div>
            </form>

            <div class="aaOtherLogin">
                <p>Ou connectez vous avec <span class="mdi mdi-google"></span></p>
            </div>
        </div>
    </div>
</div>