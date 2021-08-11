<?php 
require_once('Vues/Vue.php');

class controlleurFinaliserInscription
{
	private $_vueFinaliserInscription;
	private $_ville;
	private $_domaine;

	function __construct($action)
	{
		if (isset($action) && count($action) > 1) 
		{
			die('Url de la finalisation incorrect');
		}
		else
		{
			$this->generateCompteFinalisationPage();
		}
	}


	public function generateCompteFinalisationPage()
	{
		Session::getInstanceSession();
		if (isset($_SESSION['id']) && !empty($_SESSION['id'])) 
		{
			$this->_domaine = new domaineManager();
			$this->_domaine = $this->_domaine->getDomaineUrl();

			$this->_ville = new villeManager();
			$villes = $this->_ville->getCitys();

			$this->_vueFinaliserInscription = new Vue('FinaliserInscription');
			$this->_vueFinaliserInscription->getDashDataVue(array('villes'=>$villes,'domaine'=>$this->_domaine->getDomaine()));
		}
		else
		{
			header('Location: Accueil');
		}
		
	}
}
 ?>