<?php 

/**
 * 
 */
class controlleurAuthGoogle
{
	
	 function __construct($gclientAuth)
	{
		if (isset($_GET['code'])) 
		{
			$gclientAuth->authenticate($_GET['code']);
		}
		else
		{
			// header('Location: Auth');
			// exit();
		}

		$gOAuth = new Google_Service_Oauth2($gclientAuth);
		if ($gclientAuth->getAccessToken()) 
		{
			$userData = $gOAuth->userinfo->get();
			// var_dump($userData);

			$checkUserGoogleAuth = new authGoogleManager();
			$cUGA = $checkUserGoogleAuth->checkUserGoogleAuth(array(
															'userMail'=>$userData['email'],
															'userPic'=>$userData['picture'],
															'userPrname'=>$userData['givenName'],
															'userName'=>$userData['familyName']));

			if ($cUGA == 'logged') 
			{
				header('Location: Dashboard');
			}
			elseif($cUGA == 'signed')
			{
				header('Location: Dashboard');
			}
		}
		else
		{
			header('Location: Auth');
		}
		
		// $gOAuth = new Google_Service_Oauth2($gclientAuth);
		// $userData = $gOAuth->userinfo_v2_me->get();

		// var_dump($userData);
	}
}
 ?>