<?php 
require_once('Vues/Vue.php');

class controlleurQuestions
{
	private $_vueQuestions;
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

		$this->_vueAccueil = new Vue('questionsFrequente');
		$this->_vueAccueil->getDataVue(array());
	}
}
 ?>