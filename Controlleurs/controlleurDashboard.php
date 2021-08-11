<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurDashboard
{
	private $_vueDashboard;
	private $_userConnected;
	private $_categories;
	private $_productRangeAction;
	private $_lastService;
	private $_bestService;
	private $_popularService;
	private $_domaine;

	function __construct($action)
	{
		if (isset($action) && count($action) > 2) 
		{
			echo 'Vous netes pas sense etre ici';
		}
		else
		{
			$this->generateDashboard();
		}
	}


	public function generateDashboard()
	{
		Session::getInstanceSession();

		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();

		$this->_userConnected = new userManager();

		$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

		$this->_productRangeAction = new produitManager();
		$lastProducts = $this->_productRangeAction->getLastPublished();
		$bestProducts = $this->_productRangeAction->getBestPublished();
		$popularProducts = $this->_productRangeAction->getPopularPublished();

		$this->_lastServices = new serviceManager();
		$lastServices = $this->_lastServices->getLastPublished();

		$this->_categories = new categorieManager();
		$allPrCategories = $this->_categories->getAllProductCategorie();
		$allSrCategories = $this->_categories->getAllServiceCategorie();
				

		$this->_vueDashboard = new Vue('Dashboard');
		$this->_vueDashboard->getDashDataVue(array('userConnected'=>$userConnected,
													'domaine'=>$domaine,
													'lastProducts'=>$lastProducts,
													'lastServices'=>$lastServices,
													'bestProducts'=>$bestProducts,
													'popularProducts'=>$popularProducts,
												    'allPrCategories'=>$allPrCategories,
												    'allSrCategories'=>$allSrCategories));
	}
}

 ?>
