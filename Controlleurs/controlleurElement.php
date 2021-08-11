<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurElement
{
	private $_vueElement;
	private $_element;
	private $_userConnected;
	private $_elementAutor;
	private $_domaine;

	function __construct($action)
	{
		if (isset($action) && count($action) > 3) 
		{
			echo 'Vous netes pas sense etre ici';
		}
		else
		{
			$elementId = $action['elementId'];
			$elementType = $action['url'];
			$this->generateElementPage($elementType,$elementId);
			// var_dump($action);
		}
	}


	public function generateElementPage($elementType,$elementId)
	{
		$vueAsked = null;
		$elementClass = null;
		$elementInfoMethod = null;

		if ($elementType == 'Produit') 
		{
			$vueAsked = 'Produit';
			$elementClass = 'produitManager';
			$elementInfoMethod = 'getProductInfos';
		}
		elseif ($elementType == 'Service') 
		{
			$vueAsked = 'Service';
			$elementClass = 'serviceManager';
			$elementInfoMethod = 'getServiceInfos';
		}
		else
		{
			
		}

		$userConnected = null;
		$userLoved = null;
		$defaultVueMethod = 'getDashDataVue';

		$this->_userConnected = new userManager();
		Session::getInstanceSession();
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);

			$userLoved = $this->_userConnected->getLoved($elementId,strtolower($elementType));
		}
		else
		{
			$defaultVueMethod = 'getDataVue';
		}


		$this->_element = new $elementClass($elementId);
		$element = $this->_element->$elementInfoMethod($elementId);

		$this->_domaine = new domaineManager();
		$domaine = $this->_domaine->getDomaineUrl();


		$elementAutor = $this->_userConnected->getUserAutor($element->getUserId());

		$elementComments = $this->_userConnected->getAllElementComment(strtolower($elementType),$elementId);

		$this->_vueElement = new Vue($vueAsked);
		$this->_vueElement->$defaultVueMethod(array('userConnected'=>$userConnected,
												'domaine'=>$domaine,
													'element'=>$element,
													'elementAutor'=>$elementAutor,
												 'userLoved'=>$userLoved,
												 'elementComments'=>$elementComments));
	}
}

 ?>
