<?php 
// var_dump($_POST);
require_once '../ajaxAutoload.php';

$nomEntreprise = '';
$status = "";
$content = "";

$userAction = new userManager();
$oldInfo = $userAction->getUserConnectedInfo();

extract($_POST);
$userUpValidator = new FormValidator($_POST);

$userUpValidator->isAlphaNumeric('pseudo','Pseudo incorrect');
$userUpValidator->isLenghtValid('pseudo',4,20,'du pseudo');
if ($pseudo != $oldInfo->getPseudo()) 
{
    $userUpValidator->existed('pseudo','users','pseudo','Pseudo deja  utiliser',true);
}

$userUpValidator->isMail('mail','Mail incorrect');
$userUpValidator->isLenghtValid('mail',8,50,'du mail');
if ($mail != $oldInfo->getMail()) 
{
    $userUpValidator->existed('mail','users','mail','Mail deja  utiliser',true);
}



$userUpValidator->isPhoneNumber('+229','numero','Le numero doit etre au format +22900000000');
if ($numero != $oldInfo->getNumero()) 
{
    $userUpValidator->existed('numero','users','numero','Numero deja  utiliser',true);
}


$userUpValidator->isPhoneNumber('+229','whatsapp','Le numero doit etre au format +22900000000');
if ($whatsapp != $oldInfo->getWhatsapp()) 
{
    $userUpValidator->existed('whatsapp','users','numero','Numero Whatsapp deja  utiliser',true);
}


$userUpValidator->notExistedOnDom('sexe',['Homme','Femme'],'Sexe non repertorié');

$userUpValidator->notExistedOnDom('statut',['Entreprise','Particulier'],'Statut non repertorié');

$userUpValidator->notExisted('localisation','villes','ville','Ville inconnu');

    if (isset($_POST['nomEntreprise']) && !empty($_POST['nomEntreprise'])) 
    {
        $userUpValidator->isAlphaNumeric('nomEntreprise','Le nom de votre entreprise doit etre au format alphanumerique');
        $userUpValidator->isLenghtValid('nomEntreprise',2,30,'du nom de l\'entreprise');
        if ($nomEntreprise != $oldInfo->getNomEntreprise()) 
        {
            $userUpValidator->existed('nomEntreprise','users','nomEntreprise','Nom d\'entreprise deja  utiliser');
        }
        
    }

$userUpValidator->isAlphaNumeric('description','La description doit etre au format alphanumerique');
$userUpValidator->isLenghtValid('description',2,400,'de la description');

if (!empty($_POST['password']) || !empty($_POST['confirm_password'])) 
{
    $userUpValidator->isLenghtValid('password',4,50,'du mot de passe');
    $userUpValidator->isPasswordConfirm('password','Les mot de passe ne correspondent pas');
}



if ($userUpValidator->isValidate()) 
{

    if (!empty($password)) { $password = sha1($_POST['password']); }
     $content.= $userAction->updateUser($pseudo,$mail,$numero,$whatsapp,$sexe,
                                $localisation,$statut,$nomEntreprise,$description,
                                $photo1,$oldFile1,$password);
     $status.= "Success";
}
else
{
    $status = 'Erreur';
    $error = array();
    $errors = $userUpValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


echo json_encode(['content'=>$content,'status'=>$status]);
 ?>