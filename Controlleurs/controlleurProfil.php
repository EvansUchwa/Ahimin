<?php 
require_once('Vues/Vue.php');
/**
 * 
 */
class controlleurProfil
{
	private $_vueProfil;
	private $_userConnected;
	private $_categories;
	private $_allUserProduct;

	function __construct($action)
	{
		if (isset($action) && count($action) > 2) 
		{
			echo 'Vous netes pas sense etre ici';
		}
		else
		{
			$profilId = intval(filter_var($_GET['elementId'],FILTER_SANITIZE_URL));
			$this->generateProfil($profilId);
		}
	}


	public function generateProfil($profilId)
	{
		Session::getInstanceSession();
		$this->_userConnected = new userManager($profilId);

		$userConnected = null;
		$userConnectedFollow = null;
		$userConnectedFollow = null;
		$defaultVueMethod = 'getDashDataVue';

		$userProfil = $this->_userConnected->getUserProfilInfo($profilId);
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnected = $this->_userConnected->getUserConnectedInfo($_SESSION['id']);
			if ($_SESSION['id'] != $userProfil->getId()) 
			{
				$userConnectedFollow = $this->_userConnected->userConnectedFollow($userProfil->getId());
			}
		}
		else
		{
			$defaultVueMethod = 'getDataVue';
		}


		$nbProfilFollowed = $this->_userConnected->getNbProfilFollowed($profilId);

		$this->_allUserProduct = new produitManager();
		$allUserProducts = $this->_allUserProduct->getAllProductPostedByUser($profilId);

		$this->_allUserService = new serviceManager();
		$allUserServices = $this->_allUserService->getAllServicePostedByUser($profilId);

		

		

		$this->_vueDashboard = new Vue('Profil');
		$this->_vueDashboard->$defaultVueMethod(array('userConnected'=>$userConnected,
													'userProfil'=>$userProfil,
													'userConnectedFollow'=>$userConnectedFollow,
													'nbProfilFollowed'=>$nbProfilFollowed,
												    'allUserProducts'=>$allUserProducts,
													'allUserServices'=>$allUserServices));
	}
}

 ?>
