<?php 


extract($_POST);
require_once('../ajaxAutoload.php');

$authValidator = new FormValidator($_POST);

$authValidator->isAlphaNumeric('pseudo','Pseudo incorrect');
$authValidator->isLenghtValid('pseudo',4,20,'du pseudo');
$authValidator->existed('pseudo','users','pseudo','Pseudo deja  utiliser');

$authValidator->isMail('mail','Mail incorrect');
$authValidator->isLenghtValid('mail',8,50,'du mail');
$authValidator->existed('mail','users','mail','Mail deja  utiliser');


$authValidator->isLenghtValid('password',4,50,'du mot de passe');
$authValidator->isPasswordConfirm('password','Les mot de passe ne correspondent pas');

$status = "";
$token = "";
$content = "";
if ($authValidator->isValidate()) 
{
    $pseudo = ucfirst($_POST['pseudo']);
    $mail = $_POST['mail'];
    $password = sha1($_POST['password']);
    $token.= 'Ahime_'.uniqid();

     $authAction = new authManager();
     $content.= $authAction->authSignup($pseudo,$mail,$password,$token);
     $status.= "Success";
     
// require 'phpmailer/Exception.php';
require '../phpmailer/PHPMailer.php';
require '../phpmailer/SMTP.php';


    try 
    {
        //Instantiation and passing `true` enables exceptions
        $mailSign = new PHPMailer(true);

          //Server settings
          $mailSign->isSMTP();     
 
          $mailSign->Host       = 'smtp.gmail.com';                 
          $mailSign->SMTPAuth   = true;                  
          $mailSign->Username   = 'johnsonevans686@gmail.com';             
          $mailSign->Password   = 'MonGmailBg2021';                         
          $mailSign->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
          $mailSign->Port       = 587;                                   

          //Recipients
          $mailSign->setFrom('ahimin@gmail.com', 'Ahimin');
          $mailSign->addAddress($mail);     
          $mailSign->addReplyTo('ahiminContact@gmail.com', 'Information');
     

          //Content
          $mailSign->isHTML(true);                                 
          $mailSign->Subject = 'Confirmation de compte';
          $mailSign->Body    = '<div style="width:100%;background-color: #efefef; padding: 20px 0px;">
                            <div style="width: 100%;text-align:center">
                              <img src="'.$domain.'img/png/logfinal.png" style="height:200px;margin: auto;text-align: center;object-fit:contain">
                            </div>

                            <div style="width: 80%;margin: auto;background-color: white;border: 1px solid #cccccc;border-radius: 5px; padding: 10px 15px;text-align: center;">

                            <h1 style="color: #0f3048;font-size: 25px;width: 100%;">Bienvenue cher utilisateur!</h1>

                            <p style="font-size: 15px;color: #666666;width: 100%;">
                            Pour achever votre inscription sur la plateforme Ahimin nous avons besoin de verifier votre adresse mail:
                            </p>

                            <button style="background-color: #ffc526; border: none;border-radius: 50px;padding: 12px;margin: auto; font-size: 20px">
                              <a href="'.$domain.'ValiderCompte/'.$token.'" style="text-decoration: none;color: white;">Verifier votre adresse mail</a>
                            </button>

                            <p style="font-size: 16px;color: #595959;width: 100%;">Vous avez recu ce mail parceque vous avez recemment tentez de crée un compte Ahimin.Une fois votre compte verifier vous pourrez commencez a utilisez votre compte pour partager et consulter les produits et service disponible.
                            </p>

                            <h3 style="text-align: right;text-decoration: underline;color: #0f3048;width: 100%;">Equipe Ahimin</h3>
                            </div>
                          </div>';
        $mailSign->AltBody = 'Merci pour votre confiance' ;

          if ($mailSign->send()) 
          {
            // $content = $mailSign->send();
          }
          else
          {
            // $content = $mailSign->send();
          }
    }
     catch (Exception $e) 
     {
        echo "Message could not be sent. Mailer Error: {$mailSign->ErrorInfo}";
    }
}
else
{
    $status = 'Erreur';
    $error = array();
    $errors = $authValidator->getError();
    foreach ($errors as $error) 
    {
        $content.= '<p>'.$error.'</p>';
    }
}


echo json_encode(['content'=>$content,'status'=>$status]);

 ?>