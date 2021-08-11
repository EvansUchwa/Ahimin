<?php 	

extract($_POST);
require_once('../ajaxAutoload.php');
$content = "";
$status = "";


$addProductValidator = new FormValidator($_POST);

$addProductValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");
$addProductValidator->isLenghtValid("titre",2,30,'du titre');

$addProductValidator->notExistedOnDom("type",['Gros','Detail','Les deux'],"Type du produit non repertorié");
$addProductValidator->notExistedOnDom("etat",['Neuf','Occasion'],"Etat du produit non repertorié");

$addProductValidator->notExisted("categorie","product_categories","categorie","Categorie non repertorié");

$addProductValidator->notExisted("subCategorie","souscategories","sousCategorie","Sous-categorie non repertorié");

$addProductValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");

$addProductValidator->isLenghtValid("prix",2,8,'du prix');

$addProductValidator->notExistedOnDom("livraison",['Oui-Payante','Oui-Gratuite','Non'],"Type de livraison non repertorié");

$addProductValidator->isAlphaNumeric("description","Description du produit vide ou incorrect");
$addProductValidator->isLenghtValid("description",2,400,'de la description');

if ($addProductValidator->isValidate()) 
{
    $domain = $_POST['domain'];

     $productAction = new produitManager();
     $productAdd = $productAction->add($_POST['photo1'],$_POST['photo2'],
                                        $_POST['photo3'],$_POST['photo4'],
                                        $titre,$type,$prix,$etat,$categorie,
                                        $subCategorie,$description,$livraison,$domain);
     if ($productAdd) 
     {
        $status.= 'Success';
        $content = 'Produit ajouté <a href="'.$domain.'Produit/'.$productAdd.'">Voir Ici</a>';
     }
     else
     {
         $status.= 'Success';
     }
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $addProductValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


echo json_encode(['status'=>$status,'content'=>$content]);

 ?>
