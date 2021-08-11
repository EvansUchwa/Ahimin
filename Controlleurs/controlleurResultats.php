<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurResultats
{
	private $_vueResultats;
	private $_userConnected;
	private $_categories;
	private $_elementSearch;
	private $_ville;

	function __construct($action)
	{
		if (isset($action) && count($action) > 3) 
		{
			echo 'Vous netes pas sense etre ici';
		}
		else
		{
			if (isset($action['typeSearch'])) 
			{
				$methodControl = null;
				Session::getInstanceSession();
				if (isset($_SESSION) && !empty($_SESSION['id'])) 
				{
					$methodControl = 'generateResutatPage';
				}
				else
				{
					$methodControl = 'generateResutatPageNotConnected';
				}

				if (isset($action['keyword']) && !isset($action['categorie'])) 
				{
					$keyword = $_GET['keyword'];

					if (!empty($keyword)) 
					{
						$this->$methodControl($action['typeSearch'],$keyword,null,null);
					}
				}
				elseif (isset($action['categorie']) && !isset($action['keyword'])) 
				{
					$categorie = $action['categorie'];
					$this->$methodControl($action['typeSearch'],null,$categorie);
				}
				
			}
			
		}
	}


	public function generateResutatPage($searchType,$titre = null,$categorie = null)
	{
		$methodGetResult = null;
		$elementSearchVue= null;
		$elementResults = null;
		$elementCategorie = null;
		if ($searchType == 'Produits') 
		{
			$this->_elementSearch = new produitManager();
			$elementSearchVue = 'Produits';
			$methodGetResult = 'getProductResult';
			$elementCategorie = 'getAllProductCategorie';
		}
		elseif($searchType == 'Services')
		{
			$this->_elementSearch = new serviceManager();
			$elementSearchVue = 'Services';
			$methodGetResult = 'getServiceResult';
			$elementCategorie = 'getAllServiceCategorie';
		}
		else
		{
			var_dump($action);
		}


		Session::getInstanceSession();
		$this->_userConnected = new userManager();
		$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

		if ($titre != null && $categorie == null) 
		{
			$elementResults = $this->_elementSearch->$methodGetResult($titre,null,5);
		}
		elseif($categorie != null && $titre == null)
		{
			$this->_product = new produitManager();
			$elementResults = $this->_elementSearch->$methodGetResult(null,$categorie,5);
		}

		$this->_ville = new villeManager();
		$villes = $this->_ville->getCitys();

		$this->_categories = new categorieManager();
		$allCategories = $this->_categories->$elementCategorie();

		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();


		$this->_vueResultats = new Vue($elementSearchVue);
		$this->_vueResultats->getDashDataVue(array('userConnected'=>$userConnected,
												    'categories'=>$allCategories,
												    'villes'=>$villes,
													'elementResults'=>$elementResults,
												    'domaine'=>$domaine));
	}




	public function generateResutatPageNotConnected($searchType,$titre = null,$categorie = null)
	{
		$methodGetResult = null;
		$elementSearchVue= null;
		$elementResults = null;
		$elementCategorie = null;
		if ($searchType == 'Produits') 
		{
			$this->_elementSearch = new produitManager();
			$elementSearchVue = 'Produits';
			$methodGetResult = 'getProductResult';
			$elementCategorie = 'getAllProductCategorie';
		}
		elseif($searchType == 'Services')
		{
			$this->_elementSearch = new serviceManager();
			$elementSearchVue = 'Services';
			$methodGetResult = 'getServiceResult';
			$elementCategorie = 'getAllServiceCategorie';
		}
		else
		{
			var_dump($action);
		}

		if ($titre != null && $categorie == null) 
		{
			$elementResults = $this->_elementSearch->$methodGetResult($titre,null,5);
		}
		elseif($categorie != null && $titre == null)
		{
			$this->_product = new produitManager();
			$elementResults = $this->_elementSearch->$methodGetResult(null,$categorie,5);
		}

		$this->_ville = new villeManager();
		$villes = $this->_ville->getCitys();

		$this->_categories = new categorieManager();
		$allCategories = $this->_categories->$elementCategorie();

		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();


		$this->_vueResultats = new Vue($elementSearchVue);
		$this->_vueResultats->getDataVue(array('categories'=>$allCategories,
												    'villes'=>$villes,
													'elementResults'=>$elementResults,
												    'domaine'=>$domaine));
	}


}

 ?>
