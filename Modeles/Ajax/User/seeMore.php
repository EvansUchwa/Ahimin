<?php 

$date = null;
$nbLove = null;
$range = null;
extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";
// newToOld
// oldToNew
// aToz
// zToa

if ($typeLetSee == 'produit') 
{
	$seeMoreProducts = null;
	$produitAction = new produitManager();

	// if ($range == 'ranger') 
	// {
	// 	if ($rangeValue == 'newToOld') 
	// 	{
	// 		$seeMoreProducts = $produitAction->getAllProducts(5,null,''.$typeLetSee.'s.id desc ');
	// 	}
	// 	elseif ($rangeValue == 'oldToNew') 
	// 	{
	// 		$seeMoreProducts = $produitAction->getAllProducts(5,null,''.$typeLetSee.'s.id asc ');
	// 	}
	// 	elseif($rangeValue == 'aToz')
	// 	{
	// 		$seeMoreProducts = $produitAction->getAllProducts(5,null,''.$typeLetSee.'s.titre asc ');
	// 	}
	// 	elseif($rangeValue == 'zToa')
	// 	{
	// 		$seeMoreProducts = $produitAction->getAllProducts(5,null,''.$typeLetSee.'s.titre desc ');
	// 	}
		
	// }
	// else
	// {
	// 	$seeMoreProducts = $produitAction->getAllProducts(5,$lastProductId);
	// }
	
	$seeMoreProducts = $produitAction->getAllProducts(5,$lastProductId);
	// var_dump($seeMoreProducts);
	if (is_array($seeMoreProducts) && !empty($seeMoreProducts)) 
	{
		$status = 'Success';
		foreach ($seeMoreProducts as $seeMoreProduct) 
				{
					$content.= '<a class="cardProduct1" data-id="'.$seeMoreProduct->getId().'"
								href="'.$domain.'Produit/'.$seeMoreProduct->getId().'">
					                <div class="cp1Head">
					                    <img src="'.$seeMoreProduct->getPhoto1().'"
					                     alt="'.$seeMoreProduct->getTitre().' Pic">
					                </div>
					                
					                <div class="cp1Body">
					                    <p>'.$seeMoreProduct->getTitre().'</p>
					                    <p>'.$seeMoreProduct->getLocalisation().'</p>
					                </div>

					                <div class="cp1Foot">
					                    <p>'.$seeMoreProduct->getLoves().'
					                    <i class="mdi mdi-heart-outline"></i></p>
					                    <p>'.$seeMoreProduct->getPrix().' cfa</p>
					                </div>

					                <p class="cp1TimeInfo">'.$seeMoreProduct->getHourEcart().'</p>
					            </a>';
				}
	}
	else
	{
		$content.='';
	}

}



echo json_encode(['status'=>$status,'content'=>$content]);
 ?>