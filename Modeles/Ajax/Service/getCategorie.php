<?php 
extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";

$categorieAction = new categorieManager();
$srCategories = $categorieAction->getAllServiceCategorie();

	foreach ($srCategories as $srCategorie) 
	{
		$status = 'Success';
		$content.= '<li>'.$srCategorie->getCategorie().'</li>';
	}

echo json_encode(['status'=>$status,'content'=>$content]);
 ?>