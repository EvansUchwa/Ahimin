<?php 


extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";


$replyComValidator = new FormValidator($_POST);

$replyComValidator->isAlphaNumeric("replyContent","Reponse du commentaire vide ou incorrect");

$replyComValidator->isLenghtValid("replyContent",3,400,"du commentaire");

$replyComValidator->notExistedOnDom("type",['produit','service'],"Type de commentaire inconnu");

// $replyComValidator->notExistedOnDom('class',['comments','reply_comments'],'Type de reponse inconnu');


if ($replyComValidator->isValidate()) 
{
    $userAction = new userManager();
    $replyCom = $userAction->setElementReplyComment($type,$replyContent,$commentId);
    
    if ($replyCom) 
     {
        $status.= 'Success';
        $content.= 'Commentaire Ajouter';
     }
     else
     {
         $status.= 'Ah';
         // $content.= $replyCom;
     }
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $replyComValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}

echo json_encode(['status'=>$status,'content'=>$content]);

// var_dump($_POST);

 ?>