<?php 

$this->_pageTitle = 'Validation';
$this->_pageStyles = 'index';
$this->_pageScripts = 'additional_';

 ?>

 <div class="validateAccountAnim">
     <img src="<?= $domaine ?>img/sp1.gif" alt="Account validation loader" class="avlSpinner">
     <div class="avText">
         <p>Votre compte a été activer avec succès!</p>
         <button>
             <a href="<?= $domaine ?>Auth">Connexion</a>
         </button>
     </div>
 </div>
<script type="text/javascript">let pageAction = "validerCompte"</script>