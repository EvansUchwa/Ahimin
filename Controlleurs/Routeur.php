<?php 

/**
 * 
 */
class Routeur
{
	private $_controlleurClass;
	public function routeRequete()
	{

		spl_autoload_register(function($class){
			if (file_exists('Modeles/'.$class.'.php')) 
			{
				require_once('Modeles/'.$class.'.php');
			}
			else
			{
				require_once('Modeles/oAuth/'.$class.'.php');
			}
			
		});

		
		try 
		{
			$url = [];
			$code = '';
			if (isset($_GET['url'])) 
			{
				$url = $_GET['url'];

				$controlleur = ucfirst(filter_var($url,FILTER_SANITIZE_URL));
				// $controlleurClass= 'controlleur'.preg_replace('%-([a-zA-Z0-9-_]+)|-|_| |/|\/|[0-9]%','',$controlleur);
				$controlleurClass = 'controlleur'.preg_replace('%-([/-a-zA-Z0-9]+)%','',$controlleur);
				$controlleurFile = null;
				if ($controlleurClass == 'controlleurProduit' || $controlleurClass == 'controlleurService') 
				{
					$controlleurFile = 'Controlleurs/controlleurElement.php';
					$controlleurClass ='controlleurElement';
				}
				else
				{
					$controlleurFile = 'Controlleurs/'.$controlleurClass.'.php';
				}
				

				if (file_exists($controlleurFile)) 
				{
					require_once($controlleurFile);
					$this->_controlleurClass = new $controlleurClass($_GET);
				}
				else
				{
					die('Controlleur'.$controlleur.' non trouver');
				}
			}
			elseif(isset($_GET['code']))
			{
				$controlleurClass= 'controlleurAuthGoogle';
				$controlleurFile = 'Controlleurs/'.$controlleurClass.'.php';

				require_once('configAuthGoogle.php');

				if (file_exists($controlleurFile)) 
				{
					require_once($controlleurFile);
					$this->_controlleurClass = new $controlleurClass($gclientAuth);
				}
				else
				{
					die('Controlleur '.$controlleur.' inexistant');
				}
			}
			else
			{
				require_once('Controlleurs/controlleurAccueil.php');
				$this->_controlleurClass = new controlleurAccueil($url);
			}
		} 
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
}


 ?>