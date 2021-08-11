<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurAuth
{
	private $_typeAuth;
	function __construct($action)
	{
		if (isset($action) && count($action) > 2) 
		{
			die('Vous devez etre sur la page Authentification');
		}
		else
		{
			$this->generateAuthPage();
		}
	}

	public function generateAuthPage()
	{
		$this->_typeAuth = new Vue('Auth');
		$typeAuth = $this->_typeAuth->getDataVue([]);

	}
}
 ?>