<?php 
require_once('Vues/Vue.php');

class controlleurContact
{
	private $_vueContact;
	private $_ville;
	function __construct($action)
	{
		if (isset($action) && count($action) > 1) 
		{
			die('Url de l\'accueil incorrect');
		}
		else
		{
			$this->generateAccueil();
		}
	}


	public function generateAccueil()
	{
		$this->_vueContact = new Vue('Contact');
		$this->_vueContact->getDataVue([]);
	}
}
 ?>