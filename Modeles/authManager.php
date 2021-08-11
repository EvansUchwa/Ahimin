<?php 

class authManager extends Requete
{
	private $_user;
	public function authSignup($pseudo,$mail,$password,$token)
	{
		$statutCompte = 0;

		$domainAction = new domaineManager();
		$domain = $domainAction->getDomaineUrl()->getDomaine();

		$photo = '';
		

		$this->databaseConnect();
		if ($this->insertObject('users(pseudo,mail,token,photo,password,activation)','(:pseudo,:mail,:token,:photo,:password,:activation)',
													['pseudo'=>$pseudo,
													'mail'=>$mail,
													'token'=>$token,
													'photo'=>$photo,
													'password'=>$password,
													'activation'=>0
													]))
		{
			setcookie('id',$this->lastInsert(),time()+60*60*24*30,null,null,false,true);
			setcookie('token',$token,time()+60*60*24*30,null,null,false,true);
			return 1;
		}
	}

	
	public function authLogin($pseudo,$password)
	{
		$this->databaseConnect();
		
		$this->_user = $this->getSimpleObject('users',' pseudo = "'.$pseudo.'" AND password = "'.$password.'" ','User');
		
		if (is_object($this->_user)) 
		{
			setcookie('id',$this->_user->getId(),time()+60*60*24*30,null,null,false,true);
			setcookie('token',$this->_user->getToken(),time()+60*60*24*30,null,null,false,true);

			Session::getInstanceSession();

			$_SESSION['id'] = $this->_user->getId();
			$_SESSION['token'] = $this->_user->getToken();

			if (($this->_user->getActivation()) == 0.5) 
			{
				return "finaliseSignup";
			}
			elseif (($this->_user->getActivation()) == 1) 
			{
				return "logged";
			}
			
		}
		else
		{
			return "Identifiant incorrect!";
		}
		
	}


	public function getInscriptionValidation($token)
	{
		$this->databaseConnect();
		if ($this->getSimple('users','token ="'.$token.'" ')) 
		{
			$this->updateObject('users','activation = :activation WHERE 
								token = "'.$token.'" ',
								['activation'=>0.5]);
			return true;
		}
		else
		{
			return -1;
		}
	}
	

	public function addFinaliseAccountInfo($session,$numero,$whatsapp,$sexe,$status,$nomEntreprise,$localisation,$description)
	{
		$this->databaseConnect();
		$domainAction = new domaineManager();
		$domain = $domainAction->getDomaineUrl()->getDomaine();

		$photo = "";
		if ($sexe == 'Femme') 
		{
			$photo = $domain.'img/Users/defaultUserFemale.png';
		}
		else
		{
			$photo = $domain.'img/Users/defaultUserMale.png';
		}
		return $this->updateObject('users','numero = :numero,whatsapp = :whatsapp,
											sexe = :sexe,statut = :statut,
											nomEntreprise = :nomEntreprise,
											description = :description,
											localisation = :localisation,
											activation = :activation,
											photo = :photo WHERE id ='.$session,
											['numero'=>$numero,'whatsapp'=>$whatsapp,
											  'sexe'=>$sexe,'statut'=>$status,
											  'nomEntreprise'=>$nomEntreprise,
											  'localisation'=>$localisation,
											  'description'=>$description,
											  'activation'=>1,
												'photo'=>$photo]);
	}

	
}

 ?>