<?php 

class Vue
{
	private $_vueFile;
	private $_categories;
	private $_pageTitle;
	private $_pageStyles;
	private $_pageScripts;
	private $_userConnected;

	function __construct($action)
	{
		$this->_vueFile = 'Vues/vue'.ucfirst($action).'.php';
	}

	public function getDataVue($dataFile)
	{
		$this->_categories = new categorieManager();
		$allPrCategories = $this->_categories->getAllProductCategorie();
		$allSrCategories = $this->_categories->getAllServiceCategorie();

		$vueLoaded = $this->getVue($this->_vueFile,$dataFile);

		$vueFinal = $this->getVue('Vues/base_template.php',array('pageTitle'=>$this->_pageTitle,
															'pageStyles'=>$this->_pageStyles,
															'pageScripts'=>$this->_pageScripts,
															'allPrCategories'=>$allPrCategories,
															'allSrCategories'=>$allSrCategories,
															'content'=>$vueLoaded));

		echo $vueFinal;
	}
	public function getDashDataVue($dataFile)
	{
		Session::getInstanceSession();
		
		$this->_userConnected = new userManager();
		
			$userConnected = $this->_userConnected->getUserConnectedInfo();
			$notices = $this->_userConnected->getNotViewNoticeNb();

			$this->_categories = new categorieManager();
			$allPrCategories = $this->_categories->getAllProductCategorie();
			$allSrCategories = $this->_categories->getAllServiceCategorie();

			$vueLoaded = $this->getVue($this->_vueFile,$dataFile);

			$vueFinal = $this->getVue('Vues/base_template_dash.php',array(
																'pageTitle'=>$this->_pageTitle,
															'userConnected'=>$userConnected,
															'notices'=>$notices,
																'allPrCategories'=>$allPrCategories,
																'allSrCategories'=>$allSrCategories,
																'pageStyles'=>$this->_pageStyles,
																'pageScripts'=>$this->_pageScripts,
																'content'=>$vueLoaded));

			echo $vueFinal;
		
	}

	public function getVue($vueFile,$dataFile)
	{
		if (file_exists($vueFile)) 
		{
			extract($dataFile);

			ob_start();

			require_once($vueFile);

			return ob_get_clean();
		}
		else
		{
			throw new Exception('La page '.$vueFile.' demandé est introuvable');
		}
	}
}



 ?>