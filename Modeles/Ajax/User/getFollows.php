<?php 
extract($_POST);
// var_dump($_POST);
require_once('../ajaxAutoload.php');
$status = null;
$content = null;

$getFollowsValidator = new FormValidator($_POST);

$getFollowsValidator->notExistedOnDom('followType',['Abonné(e)(s)','Abonnement(s)'],'Demande non repertorié');

if($getFollowsValidator->isValidate()) 
{
	// $content = 'tout va bien';
	$userAction = new userManager();
	$getTheFollows = $userAction->getTheFollows($followType);

	if (is_array($getTheFollows) && !empty($getTheFollows)) 
	{
		foreach ($getTheFollows as $getTheFollow) 
		{
			$status = 'Success';
			$content .= '<a href="">
		                    <img src="'.$getTheFollow->getPhoto().'">
		                    <p>'.$getTheFollow->getPseudo().'</p>
		                </a>';
		}
	}
	else
	{
		$status = 'Success';
		$content = '<p>Vous n\'avez pas d\''.$followType.'</p>';
	}
}
else
{
	$status = 'Erreur';
    $error = array();
    $errors = $getFollowsValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


// var_dump($getTheFollows) ;
echo json_encode(['status'=>$status,'content'=>$content]);

 ?>