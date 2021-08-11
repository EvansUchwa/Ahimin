<?php 
require_once('Vues/Vue.php');

class controlleurAjout
{
	private $_vueAjouterProduit;
	private $_ville;
	private $_categories;
	
	function __construct($action)
	{
		if (isset($action) && count($action) > 2) 
		{
			die('Url de l\'ajout de produit incorrect');
		}
		else
		{
			Session::getInstanceSession();
			if (isset($_SESSION) && !empty($_SESSION['id'])) 
			{
				$typeAjout = $action['addType'];
				$this->generateAjouterProduit($typeAjout);
			}
			else
			{
				header('Location: '.URLBASE.'Auth/Connexion');
			}
			
		}
	}


	public function generateAjouterProduit($typeAjout)
	{
		$typeAjoutVue = "";

		$this->_categories = new categorieManager();
		if ($typeAjout == 'Produit') 
		{
			$categories = $this->_categories->getAllProductCategorie();
			$typeAjoutVue = "AjouterProduit";
		}
		elseif ($typeAjout == 'Service') 
		{
			$categories = $this->_categories->getAllServiceCategorie();
			$typeAjoutVue = "AjouterService";
		}
		

		$this->_vueAjouterProduit = new Vue($typeAjoutVue);
		$this->_vueAjouterProduit->getDashDataVue(array('categories'=>$categories));
	}
}
