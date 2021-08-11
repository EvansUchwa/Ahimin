<?php 
require_once('Vues/Vue.php');

class controlleurAccueil
{
	private $_vueAccueil;
	private $_ville;
	private $_categories;

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

		$this->_ville = new villeManager();
		$villes = $this->_ville->getCitys();

		$this->_categories = new categorieManager();
		$allPrCategories = $this->_categories->getAllProductCategorie();
		$allSrCategories = $this->_categories->getAllServiceCategorie();

		$this->_vueAccueil = new Vue('Accueil');
		$this->_vueAccueil->getDataVue(array('villes'=>$villes,
											'allPrCategories'=>$allPrCategories,
											'allSrCategories'=>$allSrCategories));


	}
}
 ?>