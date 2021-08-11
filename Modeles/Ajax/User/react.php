<?php 
require_once '../ajaxAutoload.php';

extract($_POST);

$content = "";

$userAction = new userManager();

if ($typeReact == 'Collect') 
{
    $setLike = $userAction->setUserCollect($elementId,$posterId,$type);
}
elseif ($typeReact == 'Love') 
{
    $setLike = $userAction->setUserLove($elementId,$posterId,$type);
}

$content.= $setLike; 


echo json_encode(['status'=>'Success','content'=>$content]);
 ?>