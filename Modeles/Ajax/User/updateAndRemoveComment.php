<?php 
extract($_POST);
require_once('../ajaxAutoload.php');

$status = null;
$content = null;

$updateCommentValidator = new FormValidator($_POST);
$updateCommentValidator->notExistedOnDom('elementType',['produit','service'],'Type de commentaire inconnu');

$updateCommentValidator->notExistedOnDom('class',['comments','reply_comments'],'Type de suppression inconnu');

if ($action == 'update') 
{
	$updateCommentValidator->isAlphaNumeric("updateComContent","Commentaire du produit vide ou incorrect");

	$updateCommentValidator->isLenghtValid("updateComContent",3,400,'du commentaire');
	if($updateCommentValidator->isValidate())
	{
		$userAction = new userManager();
		$commentUpdate = $userAction->updateComment($class,$elementType,$updateComContent,$commentId);

		if ($commentUpdate == true) 
		{
			$status = 'Success';
			$content = 'Updated';
		}
		else
		{
			$status = 'Erreur';
			$content = $commentUpdate;
		}
	}
	else
	{
	    $status.= 'Erreur';
	    $error = array();
	    $errors = $updateCommentValidator->getError();
	    foreach ($errors as $error) 
	    {
	        $content.= '<p>'.$error.'</p>';
	    }
	}
}
elseif($action == 'delete')
{
	if($updateCommentValidator->isValidate())
	{
		$userAction = new userManager();
		$commentDelete = $userAction->deleteComment($class,$elementType,$commentId);

		if ($commentDelete == true) 
		{
			$status = 'Success';
			$content = 'Deleted';
		}
		else
		{
			$status = 'Erreur';
			$content = $commentDelete;
		}
	}
	else
	{
	    $status.= 'Erreur';
	    $error = array();
	    $errors = $updateCommentValidator->getError();
	    foreach ($errors as $error) 
	    {
	        $content.= '<p>'.$error.'</p>';
	    }
	}
	
}

echo json_encode(['content'=>$content,'status'=>$status]);

 ?>