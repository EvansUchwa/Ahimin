<?php 

/**
 * 
 */
class controlleurDeconnexion
{
	
	function __construct($action)
	{
		if (isset($action) && count($action) > 1) 
		{
			// code...
		}
		else
		{
			$this->deconnexion();
		}
	}

	public function deconnexion()
	{
		Session::getInstanceSession();
		$_SESSION = [];
		session_destroy();

		setcookie('id','',time()-60*60*24*30,"/");
		setcookie('token','',time()-60*60*24*30,"/");

		header('Location: Auth/Connexion');
	}
}

 ?>