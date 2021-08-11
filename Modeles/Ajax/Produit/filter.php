<?php 

$lastProductId = null;
$date = null;
$nbLove = null;
$etat = null;
extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";
$nbFind = 0;

// // lastProductId
// // typeLetSee

$filterProductValidator = new FormValidator($_POST);

if (!empty($categorie)) 
{
	$filterProductValidator->notExisted("categorie","product_categories","categorie","Categorie non repertorié");
}
if (!empty($ville)) 
{
	$filterProductValidator->notExisted("ville","villes","ville","Ville non repertorié");
}
if (!empty($nbLove)) 
{
	$filterProductValidator->notExistedOnDom('nbLove',["0to10","10to20","20to30","30to+"],'Nombre de mention Love non repertorié');
}
if (!empty($date)) 
{
	$filterProductValidator->notExistedOnDom('date',["1h","1d","1w","1m"],'Periode non repertorié');
}
if (!empty($etat)) 
{
	$filterProductValidator->notExistedOnDom('etat',["Neuf","Occasion"],'Etat non repertorié');
}
// $searchProductValidator->
// $searchProductValidator->

if ($filterProductValidator->isValidate()) 
	{
		$prFinds = null;
		$produitAction = new produitManager();
		if (isset($base)) 
		{
			$prFinds = $produitAction->getProductFilterResult($base,null,
																$categorie,$subCategorie,
																$nbLove,$ville,$date,$prixMin,$prixMax,
																$etat,$lastProductId);
		}
		elseif(isset($baseCategorie))
		{
			$prFinds = $produitAction->getProductFilterResult(null,$baseCategorie,
																$categorie,$subCategorie,$nbLove,
																$ville,$date,$prixMin,$prixMax,
																$etat,$lastProductId);
		}
		else
		{
			$prFinds = $produitAction->getProductFilterResult(null,null,
																$categorie,$subCategorie,$nbLove,
																$ville,$date,$prixMin,$prixMax,
																$etat,$lastProductId);
		}
		

			if (is_array($prFinds) && !empty($prFinds)) 
			{
				foreach ($prFinds as $prFind) 
				{
					$content.= '<a class="cardProduct1" data-id="'.$prFind->getId().'"
					href="'.$domain.'Produit/'.$prFind->getId().'">
					                <div class="cp1Head">
					                    <img src="'.$prFind->getPhoto1().'" alt="'.$prFind->getTitre().' Pic">
					                </div>
					                
					                <div class="cp1Body">
					                    <p>'.$prFind->getTitre().'</p>
					                    <p>'.$prFind->getLocalisation().'</p>
					                </div>

					                <div class="cp1Foot">
					                    <p>'.$prFind->getLoves().'
					                    <i class="mdi mdi-heart-outline"></i></p>
					                    <p>'.$prFind->getPrix().' cfa</p>
					                </div>

					                <p class="cp1TimeInfo">'.$prFind->getHourEcart().'</p>
					            </a>';
				}
				$nbFind = count($prFinds);
			}
			else
			{
				$content.= '';
				$nbFind = 0;
			}
		
	}
	else
	{
		$status = 'Error';
		$error = array();
		$errors = $filterProductValidator->getError();
		foreach ($errors as $error) 
		{
			$content.= '<p>'.$error.'</p>';
		}
	}


echo json_encode(['status'=>$status,'content'=>$content,'nbFind'=>$nbFind]);

// var_dump($_POST);
 ?>