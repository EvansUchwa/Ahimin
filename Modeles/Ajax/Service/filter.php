<?php 

$date = null;
$nbLove = null;
$disponibility = null;
extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";
$nbFind = 0;


$filterServiceValidator = new FormValidator($_POST);

if (!empty($categorie)) 
{
	$filterServiceValidator->notExisted("categorie","service_categories","categorie","Categorie non repertorié");
}
if (!empty($nbLove)) 
{
	$filterServiceValidator->notExistedOnDom('nbLove',["0to10","10to20","20to30","30to+"],'Nombre de mention Love non repertorié');
}
if (!empty($date)) 
{
	$filterServiceValidator->notExistedOnDom('date',["1h","1d","1w","1m"],'Periode non repertorié');
}
// $searchServiceValidator->
// $searchServiceValidator->

if ($filterServiceValidator->isValidate()) 
	{
		$serviceAction = new serviceManager();
		if (isset($base)) 
		{
			$srFinds = $serviceAction->getServiceFilterResult($base,null,$categorie,
																$disponibility,
																$nbLove,$ville,$date);
		}
		elseif(isset($baseCategorie))
		{
			$srFinds = $serviceAction->getServiceFilterResult(null,$baseCategorie,$categorie,
																$disponibility,
																$nbLove,$ville,$date);
		}
		else
		{
			$srFinds = $serviceAction->getServiceFilterResult(null,null,
																$categorie,
																$disponibility,
																$nbLove,$ville,$date);
		}
		

			if (is_array($srFinds) && !empty($srFinds)) 
			{
				foreach ($srFinds as $srFind) 
				{
					$content.= '<a class="cardProduct1" 
								href="'.$domain.'Service/'.$srFind->getId().'">
					                <div class="cp1Head">
					                    <img src="'.$srFind->getPhoto1().'" alt="'.$srFind->getTitre().' Pic">
					                </div>
					                
					                <div class="cp1Body">
					                    <p>'.$srFind->getTitre().'</p>
					                    <p>'.$srFind->getLocalisation().'</p>
					                </div>

					                <div class="cp1Foot">
					                    <p>'.$srFind->getLoves().'
					                    <i class="mdi mdi-heart-outline"></i></p>
					                </div>

					                <p class="cp1TimeInfo">'.$srFind->getStatut().'</p>
					            </a>';
				}
				$nbFind = count($srFinds);
			}
			else
			{
				$content.= '<div class="notFound">
					            <img src="'.$domain.'img/ils/notFound3.png" alt="Result not found">
					            <h3>Desolé,Aucun resultat ne correspond a votre recherche!</h3>
					        </div>';

				// var_dump($srFinds);
				$nbFind = 0;
			}
		
	}
	else
	{
		$status = 'Error';
		$error = array();
		$errors = $filterServiceValidator->getError();
		foreach ($errors as $error) 
		{
			$content.= '<p>'.$error.'</p>';
		}
	}

// var_dump($srFinds);

echo json_encode(['status'=>$status,'content'=>$content,'nbFind'=>$nbFind]);
 ?>