<?php 


extract($_POST);

require_once('../ajaxAutoload.php');
$content = "";
$status = "";


$commentValidator = new FormValidator($_POST);

$commentValidator->notExistedOnDom('type',['produit','service'],'Type de commentaire inconnu');
$commentValidator->isAlphaNumeric("comment","Commentaire du produit vide ou incorrect");

$commentValidator->isLenghtValid("comment",3,400,'du commentaire');


if ($commentValidator->isValidate()) 
{

    $userAction = new userManager();

    $commentElements = $userAction->setElementComment($type,$comment,$elementId);
    if (is_array($commentElements) && !empty($commentElements)) 
     {
        $status.= 'Success';
        $append = '';
        foreach ($commentElements as $commentElement) 
        {
            if($commentElement->getAutorId() == $_SESSION['id'])
            {
                $append = '<label id="deleteCommentBtn" data-id="'.$commentElement->getId().'"
                                label-action="delete" label-type="comments">
                        Supprimer</label>
                        <label id="updateCommentBtn" data-id="'.$commentElement->getId().'"
                                label-action="update">
                        Modifier</label>';
            }
            
            $content.='<li class="comment">
                            <div class="commentInfo">
                                <div class="commentImgUserAndDate">
                                    <img src="'.$commentElement->getPhoto().'" alt="User '.$commentElement->getId().' Pic">
                                    <div>
                                        <a href="">'.$commentElement->getPseudo().'</a>
                                        <i class="mdi mdi-clock"></i>
                                         <span>'.$commentElement->convertedDate().'</span>
                                    </div>
                                </div>
                                <div class="commentContent">    
                                     <p id="cmt-'.$commentElement->getId().'">'.$commentElement->getContent().'</p>
                                </div>
                            </div>

                            <div class="commentAction">
                                <label class="replyCommentBtn" data-id="'.$commentElement->getId().'">
                                Repondre</label>
                                <label class="viewReplysBtn"
                                data-id="'.$commentElement->getId().'">
                                Voir les reponses</label>
                                '.$append.'
                            </div>
                        </li>';
        }
     }
     else
     {
         $content.= '<div class="notFound">
                                <img src="'.$domain.'img/ils/notFound3.png" alt="Result not found">
                                <h3>Aucun commentaire pour ce produit :(.Soyez le premier a commenter!</h3>
                            </div>';
     }
}
else
{
    $status.= 'Erreur';
    $error = array();
    $errors = $commentValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}

echo json_encode(['status'=>$status,'content'=>$content]);

 ?>