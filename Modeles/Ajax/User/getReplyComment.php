<?php 
extract($_POST);
require_once('../ajaxAutoload.php');
$content = "";
$status = "";

$userAction = new userManager();
$commentReplys = $userAction->getElementReplyComment($type,$commentId);
    if (is_array($commentReplys) && !empty($commentReplys)) 
     {
        $status.= 'Success';
        $append = '';
        foreach ($commentReplys as $replyCom) 
        {
            if(isset($_SESSION) && !empty($_SESSION['id']) && $replyCom->getAutorId() == $_SESSION['id'])
            {
                $append = '<label class="deleteCommentBtn" data-id="'.$replyCom->getId().'"
                                label-action="delete" label-type="reply_comments">
                        Supprimer</label>
                        <label class="updateCommentBtn" data-id="'.$replyCom->getId().'"
                                label-action="update" label-type="reply_comments">
                        Modifier</label>';
            }
            else
            {
                $append = '<label class="notConnected">Supprimer</label>
                        <label class="notConnected">Modifier</label>';
            }

            $content.= '<li class="replyComment">
                            <div class="commentInfo">
                                <div class="commentImgUserAndDate">
                                    <img src="'.$replyCom->getPhoto().'" alt="User '.$replyCom->getId().' Pic">
                                    <div>
                                        <a href="">'.$replyCom->getPseudo().'</a>
                                        <i class="mdi mdi-clock"></i>
                                         <span>'.$replyCom->convertedDate().'</span>
                                    </div>
                                </div>
                                <div class="commentContent">    
                                     <p id="cmt-'.$replyCom->getId().'">'.$replyCom->getContent().'</p>
                                </div>
                            </div>

                            <div class="commentAction">
                                <label class="replyCommentBtn" data-id="'.$replyCom->getCommentId().'">Repondre</label>'.$append.'
                            </div>
                        </li>';
        }
     }
     else
     {
         $content.= '<div class="commentNotFound">
                        <h3>:( Aucune reponse</h3>
                    </div>';
     }
echo json_encode(['status'=>$status,'content'=>$content]);
 ?>