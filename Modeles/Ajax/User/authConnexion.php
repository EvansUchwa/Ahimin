<?php 

require_once('../ajaxAutoload.php');

$status = "";
$content = "";

$pseudo = htmlspecialchars(addslashes(trim($_POST['pseudo'])));
$password = sha1($_POST['password']);

$authAction = new authManager();
$content.= $authAction->authLogin($pseudo,$password);

if ($content == "logged") 
{
    $status.= 'Success';
}
elseif ($content == "finaliseSignup") 
{
    $status.= 'finaliseSignup';
}
else
{
    $status.= 'Erreur';
}
echo json_encode(['content'=>$content,'status'=>$status]);

 ?>