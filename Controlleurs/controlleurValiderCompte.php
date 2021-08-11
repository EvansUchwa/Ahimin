<?php 
require_once('Vues/Vue.php');

class controlleurValiderCompte
{
	private $_vueValiderCompte;
	private $_inscriptionValidation;
	private $_domaine;

	function __construct($action)
	{
		if (isset($action) && count($action) > 2) 
		{
			die('Url de la verification incorrect');
		}
		else
		{
			$token = $action['token'];
			$this->generateValidationPage($token);
		}
	}


	public function generateValidationPage($param)
	{
		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();

		$this->_inscriptionValidation = new authManager();
		$inscriptionValidation = $this->_inscriptionValidation->getInscriptionValidation($param);

		$this->_vueValiderCompte = new Vue('ValiderCompte');
		$this->_vueValiderCompte->getDataVue(array('inscriptionValidation'=>$inscriptionValidation,
													'domaine'=>$domaine->getDomaine()));
	}
}
 ?>