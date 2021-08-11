<?php 	

extract($_POST);
require_once('../ajaxAutoload.php');
$content = "";
$status = "";

$addServiceValidator = new FormValidator($_POST);

$addServiceValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");
$addServiceValidator->isLenghtValid("titre",2,30,"du titre");

$addServiceValidator->notExisted("categorie","service_categories","categorie","Categorie non repertorié");

$addServiceValidator->notExisted("subCategorie","souscategoriesrv","sousCategorie","Sous-Categorie non repertorié");

$addServiceValidator->isHour("openHour","Format de l'heure d'ouverture(H:m) du service non valide",'de l\'Heure d\'ouverture');
$addServiceValidator->isHour("closeHour","Format l'heure de fermeture(H:m) du service non valide",'de l\'Heure de fermeture');


$addServiceValidator->isAlphaNumeric("description","Description du produit vide ou incorrect");
$addServiceValidator->isLenghtValid("description",2,400,'de la description');

if ($addServiceValidator->isValidate()) 
{
    $domain = $_POST['domain'];

    $serviceAction = new serviceManager();
    $serviceAdd = $serviceAction->add($photo1,$photo2,$photo3,$photo4,
                                    $titre,$categorie,$subCategorie,$openHour,$closeHour,
                                    $description,$domain);

    if ($serviceAdd) 
    {
        $status = 'Success';
        $content = 'Service Ajouté <a href="'.$domain.'Service/'.$serviceAdd.'">Voir Ici</a>';
    }
    // var_dump($_POST);
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $addServiceValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


echo json_encode(['status'=>$status,'content'=>$content]);

 ?>