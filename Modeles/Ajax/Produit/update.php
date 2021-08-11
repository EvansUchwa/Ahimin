<?php 

// var_dump($_POST);

extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";


$updateProductValidator = new FormValidator($_POST);

$updateProductValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");
$updateProductValidator->isLenghtValid("titre",2,30,'du titre');

$updateProductValidator->notExistedOnDom("type",['Gros','Detail','Les deux'],"Type du produit non repertorié");

$updateProductValidator->notExistedOnDom("etat",['Neuf','Occasion'],"Etat du produit non repertorié");

$updateProductValidator->notExisted("categorie","product_categories","categorie","Categorie non repertorié");

$updateProductValidator->notExisted("subCategorie","souscategories","sousCategorie","Sous-categorie non repertorié");

$updateProductValidator->isAlphaNumeric("titre","Titre du produit vide ou incorrect");

$updateProductValidator->isLenghtValid("prix",2,8,'du prix');

$updateProductValidator->notExistedOnDom("livraison",['Oui-Payante','Oui-Gratuite','Non'],"Type de livraison non repertorié");

$updateProductValidator->isAlphaNumeric("description","Description du produit vide ou incorrect");
$updateProductValidator->isLenghtValid("description",2,400,"de la description");

if ($updateProductValidator->isValidate()) 
{
    $domainClass = new domaineManager();
    $domain = $domainClass->getDomaineUrl()->getDomaine();

    $productAction = new produitManager();
    $updateProduct = $productAction->update($photo1,$photo2,$photo3,$photo4,
     									$oldFile1,$oldFile2,$oldFile3,$oldFile4,
                        				$titre,$type,$prix,$etat,$categorie,
                        				$subCategorie,$description,$livraison,$domain,$productId);
    if ($updateProduct == 1) 
     {
        $status.= 'Success';
        $content.= 'Modification Enregistré avec succes';
     }
     else
     {
         $status.= 'Success';
         $content.= $updateProduct;
     }
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $updateProductValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}

echo json_encode(['status'=>$status,'content'=>$content]);
 ?>