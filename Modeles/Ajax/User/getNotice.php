<?php 

extract($_POST);
require_once('../ajaxAutoload.php');
$notViewedNb = $_POST['notViewedNb'];

$userManager = new UserManager();
$notices = $userManager->getNotices($notViewedNb);

$noticesView = "";

if ($notices != null) 
{
    $queryAction = new Requete();
    $typeUrl = null;
    foreach ($notices as $notice) 
    {
        if ($notice->getType() == 'Abonnement' || $notice->getType() == 'Note') 
        {
            $typeUrl = 'Profil/';
        }
        else
        {
            $typeUrl = $notice->getType().'/';
        }
        $userInfo = $queryAction->getSimple('users','id='.$notice->getNoticerId(),'pseudo,photo');
        $noticesView.= '<li><img src="'.$userInfo['photo'].'">
                            <a href="'.$domain.$typeUrl.$notice->getElementId().'">
                            '.$userInfo['pseudo'].' '.$notice->getContent().'
                            </a>
                            <p><span class="'.$notice->getIcon().'"></span></p>
                        </li>';
    }
}
else
{
    $noticesView.= '<div class="noticeNotFound">
                        <img src="'.$domain.'img/ils/notFound2.png" alt="Result not found">
                        <h5>Aucune Notification</h5>
                    </div>';
}

$userManager->setNoticesViewed($notViewedNb);

echo json_encode(['status'=>'Success','content'=>$noticesView]);
 ?>