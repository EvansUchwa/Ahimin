<?php 

// var_dump($_POST);

extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";


$updateServiceValidator = new FormValidator($_POST);

$updateServiceValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");
$updateServiceValidator->isLenghtValid("titre",2,30,"du titre");

$updateServiceValidator->notExisted("categorie","service_categories","categorie","Categorie non repertorié");

$updateServiceValidator->notExisted("subCategorie","souscategoriesrv","sousCategorie","Sous-Categorie non repertorié");

$updateServiceValidator->isHour("openHour","Format de l'heure d'ouverture(H:m) du service non valide",'de l\'Heure d\'ouverture');
$updateServiceValidator->isHour("closeHour","Format l'heure de fermeture(H:m) du service non valide",'de l\'Heure de fermeture');


$updateServiceValidator->isAlphaNumeric("description","Description du produit vide ou incorrect");
$updateServiceValidator->isLenghtValid("description",2,400,'de la description');

if ($updateServiceValidator->isValidate()) 
{
    $domainClass = new domaineManager();
    $domain = $domainClass->getDomaineUrl()->getDomaine();

    $serviceAction = new serviceManager();

    $updateService = $serviceAction->update($photo1,$photo2,$photo3,$photo4,
     									$oldFile1,$oldFile2,$oldFile3,$oldFile4,
                        				$titre,$categorie,$subCategorie,$openHour,$closeHour,
                        		          $description,$domain,$serviceId);
    if ($updateService == 1) 
     {
        $status.= 'Success';
        $content.= 'Modification Enregistré avec succes';
     }
     else
     {
         $status.= 'Success';
         $content.= $updateService;
     }
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $updateServiceValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}

echo json_encode(['status'=>$status,'content'=>$content]);
 ?>