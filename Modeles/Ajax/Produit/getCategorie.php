<?php 
extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";

$categorieAction = new categorieManager();
$prCategories = $categorieAction->getAllProductCategorie();

	foreach ($prCategories as $prCategorie) 
	{
		$status = 'Success';
		$content.= '<li>'.$prCategorie->getCategorie().'</li>';
	}

echo json_encode(['status'=>$status,'content'=>$content]);
 ?>