<?php 
extract($_POST);
require_once('../ajaxAutoload.php');
  Session::getInstanceSession();


  $nomEntreprise = "";

  $finaliseValidator = new FormValidator($_POST);

  $finaliseValidator->isPhoneNumber('+229','numero','Le numero doit etre au format +22900000000');
  $finaliseValidator->existed('numero','users','numero','Numero deja  utiliser');

  $finaliseValidator->isPhoneNumber('+229','whatsapp','Le numero doit etre au format +22900000000');
  $finaliseValidator->existed('whatsapp','users','numero','Numero whatsapp deja  utiliser');

  $finaliseValidator->notExistedOnDom('sexe',['Homme','Femme'],'Sexe non repertorié');

  $finaliseValidator->notExistedOnDom('statut',['Entreprise','Particulier'],'Statut non repertorié');

  $finaliseValidator->notExisted('localisation','villes','ville','Ville inconnu');

  if (isset($_POST['nomEntreprise']) && !empty($_POST['nomEntreprise'])) 
  {
    $finaliseValidator->isAlphaNumeric('nomEntreprise','Le nom de votre entreprise doit etre au format alphanumerique');
    $finaliseValidator->isLenghtValid('nomEntreprise',2,30,'nom de l\'entreprise');
  }

  $finaliseValidator->isAlphaNumeric('description','La description doit etre au format alphanumerique');
  $finaliseValidator->isLenghtValid('description',2,400,'de la description');
  

  $status = "";
  $content = "";
  if ($finaliseValidator->isValidate()) 
  {
    $authAction = new authManager();
    $content.= $authAction->addFinaliseAccountInfo($_SESSION['id'],$numero,$whatsapp,$sexe,$statut,$nomEntreprise,$localisation,$description);

    if ($content == true) 
    {
      $status.= 'Finaliser';
    }
    else
    {
      // $status.= 'Error';
    }
  }
  else
  {
    $status = 'Error';
    $error = array();
    $errors = $finaliseValidator->getError();
    foreach ($errors as $error) 
    {
      $content.= '<p>'.$error.'</p>';
    }
  }

echo json_encode(['content'=>$content,'status'=>$status]);

 ?>