<?php 
require_once '../ajaxAutoload.php';


$profilId = $_POST['profilId'];
$content = "";


$followClass = new userManager();
$setFollow = $followClass->toggleFollow($profilId);

if ($setFollow == 0 || $setFollow == 1) { $content.= $setFollow." abonné(e)"; }
elseif ($setFollow >= 2) { $content.= $setFollow." abonné(e)s "; }





echo json_encode(['status'=>'Success','content'=>$content]);
 ?>