<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurModifier
{
	private $_vueModifier;

	private $_product;
	private $_service;
	private $_profil;
	private $_userConnected;
	private $_categories;
	private $_ville;


	function __construct($action)
	{
		if (isset($action) && count($action) > 3) 
		{
			echo 'Vous netes pas sense etre ici';
		}
		else
		{
			$elementType = $action['elementType'];
			$elementId = $action['elementId'];

			if ($elementType == "Produit") 
			{
				$this->generateModifierProduitPage($elementId);
			}
			elseif($elementType == "Service")
			{
				$this->generateModifierServicePage($elementId);
			}
			elseif($elementType == "Profil")
			{
				$this->generateModifierProfilPage($elementId);
			}
			else
			{

			}
		}
	}


	public function generateModifierProduitPage($productId)
	{
		Session::getInstanceSession();
		$this->_userConnected = new userManager();
		$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

		$this->_product = new produitManager();
		$product = $this->_product->getProductInfos($productId);

		$this->_categories = new categorieManager();
		$categories = $this->_categories->getAllProductCategorie();

		$this->_vueModifier = new Vue('ModifierProduit');
		$this->_vueModifier->getDashDataVue(array('userConnected'=>$userConnected,
													'categories'=>$categories,
													'product'=>$product));
	}

	public function generateModifierServicePage($serviceId)
	{
		Session::getInstanceSession();
		$this->_userConnected = new userManager();
		$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

		$this->_service = new serviceManager();
		$service = $this->_service->getServiceInfos($serviceId);

		$this->_categories = new categorieManager();
		$categories = $this->_categories->getAllServiceCategorie();

		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();

		$this->_vueModifier = new Vue('ModifierService');
		$this->_vueModifier->getDashDataVue(array('userConnected'=>$userConnected,
													'domaine'=>$domaine,
													'categories'=>$categories,
													'service'=>$service));
	}

	public function generateModifierProfilPage($productId)
	{
		Session::getInstanceSession();
		$this->_userConnected = new userManager();
		$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

		$this->_ville = new villeManager();
		$villes = $this->_ville->getCitys();

		$this->_vueModifier = new Vue('ModifierProfil');
		$this->_vueModifier->getDashDataVue(array('userConnected'=>$userConnected,
														'villes'=>$villes));
	}
}

 ?>
