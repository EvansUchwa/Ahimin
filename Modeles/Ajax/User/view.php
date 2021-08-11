<?php 
require_once '../ajaxAutoload.php';

$elementId = $_POST['elementId'];
$posterId = $_POST['posterId'];
$type = $_POST['type'];

$content = "";

$userAction = new userManager();

$setView = $userAction->setUserView($elementId,$posterId,$type);

if (isset($_SESSION) && !empty($_SESSION['id'])) 
{
    $content.= $setView; 
}
else
{
    $content = 0;
}



echo json_encode(['status'=>'Success','content'=>$content]);
 ?>