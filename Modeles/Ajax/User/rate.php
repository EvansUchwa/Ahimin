<?php 
extract($_POST);
require_once('../ajaxAutoload.php');
$status = null;
$content = null;
// var_dump($_POST);

$raterValidator = new FormValidator($_POST);

$raterValidator->notExisted('profilId','users','id','Profil deja  utiliser');
$raterValidator->notExistedOnDom('nbStar',[1,2,3,4,5],'Type de note inexistant');

if ($raterValidator->isValidate()) 
{
    $userAction = new userManager();
	$addRate = $userAction->toggleRate($profilId,$nbStar);
    if ($addRate) 
    {
        $status = 'Success';
        $content = 'Votre note a bien été enregistrer';
    }
    else
    {
        $content = $addRate;
    }
}
else
{
    $status = 'Erreur';
    $error = array();
    $errors = $raterValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


echo json_encode(['content'=>$content,'status'=>$status]);

 ?>