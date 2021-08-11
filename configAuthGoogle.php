<?php 
require_once('Modeles/oAuth/googleApi/vendor/autoload.php');

$gclientAuth = new Google_Client();
$gclientAuth->setClientId("176702322182-dir11u4jds0e37p0b3cn6p6lgubc2g8q.apps.googleusercontent.com");
$gclientAuth->setClientSecret("uysTnWt06Zs8WVk4c6gVx_wu");
$gclientAuth->setapplicationName("Axime Authentification");
$gclientAuth->setRedirectUri("http://localhost/Ahime_POO/index.php");
$gclientAuth->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$gLoginUrl = $gclientAuth->createAuthUrl();
 ?>