<?php 


/**
 * 
 */
class userManager extends Requete
{
	public function __construct($profilId = null)
	{
		$this->databaseConnect();
		Session::getInstanceSession();
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$this->verifUserExistAndConnected();
		}
		

		if ($profilId != null) 
		{
			$this->profilExist($profilId);
		}
	}

	public function verifUserExistAndConnected()
	{
		$userConnectedId = null;
		$userConnectedId = $_SESSION['id'];

		if (!($this->countSelect('users','id ='.$userConnectedId))) 
		{
			header('Location: Accueil');
		}
		
	}

	public function profilExist($profilId)
	{
		$this->databaseConnect();

		if ($this->countSelect('users','id ='.$profilId) == 0) 
		{
			header('Location: dashboard');
		}
	}

	public function getUserConnectedInfo()
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		$this->databaseConnect();

		return $this->getSimpleObject('users','id = '.$userConnectedId,'User');
	}

	public function getUserProfilInfo($profilId)
	{
		$this->databaseConnect();
		return $this->getSimpleObject('users','id = '.$profilId,'User');
	}


	

	public function getUserAutor($keyId)
	{
		$this->databaseConnect();
		return $this->getSimpleObject('users','id = '.$keyId,'User');
	}

	
	// Pour les notifications
		public function setNotice($receiverId,$noticerId,$elementId,$type,$content,$icon)
	{
		if ($receiverId != $noticerId) 
		{
			return $this->insertObject('notification(receiverId,noticerId,elementId,
											type,content,statut,icon)',
								'(:receiverId,:noticerId,:elementId,
								:type,:content,:statut,:icon)',
								['receiverId'=>$receiverId,
								'noticerId'=>$noticerId,
								'elementId'=>$elementId,
								'type'=>$type,
								'content'=>$content,
								'statut'=>(-1),
								'icon'=>$icon]);
			
		}
	}
	public function getNotices($nbNotView)
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		$this->databaseConnect();
		return $this->getAllParamObject('notification','WHERE receiverId = '.$userConnectedId,'Notification');
	}

	public function setNoticesViewed($nbNotView)
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		$this->databaseConnect();
		return $this->updateObject('notification','statut = :statut WHERE receiverId = '.$userConnectedId.' AND statut = -1 ORDER BY id desc LIMIT '.$nbNotView,
			['statut'=>1]);
	}
	public function getNotViewNoticeNb()
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}

		$this->databaseConnect();
		return $this->countSelect('notification','receiverId = '.$userConnectedId.' AND statut = -1');
	}

	// Pour les note de profil
	public function toggleRate($profilId,$nbStar)
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		
		//Si le follow de l'utilisateur existe deja sur ce profil
		if ($this->countSelect('stars','raterId ='.$userConnectedId.' AND profilId ='.$profilId)) 
		{
			$insertRate = $this->updateObject('stars','nbStar = :nbStar WHERE raterId ='.$userConnectedId.'
												AND profilId ='.$profilId,['nbStar'=>$nbStar]);
		}
		//Si la note de l'utilisateur n'existe pas sur ce profil
		else
		{
			$insertRate = $this->insertObject('stars(raterId,profilId,nbStar)',
								'(:raterId,:profilId,:nbStar)',
								['raterId'=>$userConnectedId,
								'profilId'=>$profilId,
								'nbStar'=>$nbStar]); 
		}

		// Ici on recupere avant tout le nombre de note desur le profil
		$nbRater = $this->countSelect('stars','profilId = '.$profilId);

		$nbTotalStars = 0;

		$nss = $this->getSimpleAll('stars','profilId = '.$profilId,'nbStar');
		foreach ($nss as $ns) 
		{
			$nbTotalStars = $nbTotalStars + $ns['nbStar'];
		}
		$myn = ceil($nbTotalStars/$nbRater);

		return $this->updateObject('users','stars = :stars WHERE id ='.$profilId,['stars'=>$myn]);
	}

	// Pour les follow
	public function toggleFollow($profilId)
	{
		$this->databaseConnect();

		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		

		// Ici on recupere avant tout le nombre de follow sur le profil
		$nbFollower = $this->countSelect('follows','profilId = '.$profilId);

		//Si le follow de l'utilisateur existe deja sur ce profil
		if ($this->getSimple('follows','followerId ='.$userConnectedId.' AND profilId ='.$profilId)) 
		{
			// On le retire du nombre total de follow sur ce profil
			$this->delete('follows','profilId = '.$profilId.' AND followerId ='.$userConnectedId);
			$this->updateObject('users','followers = :followers WHERE id ='.$profilId,
											['followers'=>$nbFollower - 1]);

			return $nbFollower - 1;
		}
		//Si le follow de l'utilisateur n'existe pas sur ce profil
		else
		{
			$this->setNotice($profilId,$userConnectedId,$profilId,'follows',
			's\'est abonné a vous','mdi mdi-account-multiple-plus');
			// On l'ajoute au nombre total de follow sur ce profil
			if ($this->insertObject('follows(followerId,profilId)',
								'(:followerId,:profilId)',
								['followerId'=>$userConnectedId,'profilId'=>$profilId])) 
			{	

				if ($this->updateObject('users','followers = :followers 
										WHERE id ='.$profilId,
											['followers'=>$nbFollower + 1])) 
				{
					return ($nbFollower + 1);
				}
			}
			else
			{

			}
		}
		
	}

	public function getProfilFollower()
	{
		$this->databaseConnect();
		return $this->getSimple('follows','profilId = '.$_SESSION['id']);
	}

	public function getNbProfilFollowed($profilId)
	{
		$this->databaseConnect();
		return $this->countSelect('follows','followerId = '.$profilId);
	}


	public function userConnectedFollow($profilFollowed)
	{
		if($this->countSelect('follows','profilId ='.$profilFollowed.' AND followerId ='.$_SESSION['id']))
		{
			return 'Se desabonner';
		}
		else
		{
			return 'S\'abonner';
		}
	}

	public function getTheFollows($type)
	{
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}

		if ($type == 'Abonné(e)(s)') 
		{
			return $this->getAllJoinObject('users.id,pseudo,photo','follows',
			'LEFT JOIN users ON follows.followerId = users.id WHERE profilId = '.$userConnectedId.'
			ORDER by users.pseudo','User');
		}
		else
		{
			return $this->getAllJoinObject('users.id,pseudo,photo','follows',
			'LEFT JOIN users ON follows.profilId = users.id WHERE followerId = '.$userConnectedId.'
			ORDER by users.pseudo','User');
		}
		
	}



	public function getFollowExist($profilId)
	{
		$this->databaseConnect();
		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}

		return $this->countSelect('follows','followerId ='.$userConnectedId.' AND profilId ='.$profilId);
	}


	public function updateUser($pseudo,$mail,$numero,$whatsapp,$sexe,
								$localisation,$status,$nomEntreprise,$description,
								$newPhoto,$oldPhoto,$password)
	{
		$photo = "";
		$domainAction = new domaineManager();
		$domain = $domainAction->getDomaineUrl()->getDomaine();

		if ($newPhoto != 'null') 
		{
			$photo = $this->photoUpdateUpload($domain,$newPhoto);
		}
		else
		{

			$photo = "";
			if ($sexe == 'Femme') 
			{
				$photo = $domain.'img/Users/defaultUserFemale.png';
			}
			else
			{
				$photo = $domain.'img/Users/defaultUserMale.png';
			}
		}


		if (empty($password)) 
		{
			return $this->updateObject('users','pseudo = :pseudo,mail = :mail,numero = :numero,
									whatsapp = :whatsapp,sexe = :sexe,localisation = :localisation,
									statut = :statut,nomEntreprise = :nomEntreprise,
									description = :description,photo = :photo
									 WHERE id = '.$_SESSION['id'],
									['pseudo'=>$pseudo,'mail'=>$mail,
									'numero'=>$numero,'whatsapp'=>$whatsapp,
									'sexe'=>$sexe,'localisation'=>$localisation,
									'statut'=>$status,'nomEntreprise'=>$nomEntreprise,
									'description'=>$description,
									'photo'=>$photo]);
		}
		else
		{
			return $this->updateObject('users','pseudo = :pseudo,mail = :mail,numero = :numero,
									whatsapp = :whatsapp,sexe = :sexe,localisation = :localisation,
									statut = :statut,nomEntreprise = :nomEntreprise,
									description = :description,photo = :photo,
									password = :password WHERE id = '.$_SESSION['id'],
									['pseudo'=>$pseudo,'mail'=>$mail,
									'numero'=>$numero,'whatsapp'=>$whatsapp,
									'sexe'=>$sexe,'localisation'=>$localisation,
									'statut'=>$status,'nomEntreprise'=>$nomEntreprise,
									'description'=>$description,
									'photo'=>$photo,
									'password'=>$password]);
		}
	}

	// Pour les jadore
	public function setUserLove($elementId,$loverId,$type)
	{
		$this->databaseConnect();

		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}
		

		// Ici on recupere avant tout le nombre de love sur le produit
		$nbLove = $this->countSelect('loves','elementId = '.$elementId.' AND type ="'.$type.'" ');

		//Si le love de l'utilisateur existe deja sur ce produit
		if ($this->getSimple('loves','userId ='.$userConnectedId.' AND elementId ='.$elementId.' AND type ="'.$type.'" ')) 
		{
			// On le retire du nombre total de love sur ce produit
			$this->delete('loves','elementId = '.$elementId.' AND userId ='.$userConnectedId.' AND type ="'.$type.'" ');
			$this->updateObject($type.'s','loves = :loves WHERE id ='.$elementId,
											['loves'=>$nbLove - 1]);

			return $nbLove - 1;
		}
		//Si le love de l'utilisateur n'existe pas sur ce produit
		else
		{
			$this->setNotice($loverId,$userConnectedId,$elementId,'Love',
			'a adoré un de vos '.$type.' ','mdi mdi-account-heart');

			// On l'ajoute au nombre total de love sur ce produit
			if ($this->insertObject('loves(userId,elementId,type)',
								'(:userId,:elementId,:type)',
								['userId'=>$userConnectedId,'elementId'=>$elementId,'type'=>$type])) 
			{	

				if ($this->updateObject($type.'s','loves = :loves WHERE id ='.$elementId,
											['loves'=>$nbLove + 1])) 
				{
					return ($nbLove + 1);
				}
			}
			else
			{

			}
		}
	}

	public function getLoved($elementId,$type,$checkLove = true)
	{
		$this->databaseConnect();
		if($checkLove == true)
		{
			$userConnectedId = null;
			if (isset($_SESSION) && !empty($_SESSION['id'])) 
			{
				$userConnectedId = $_SESSION['id'];
			}

			if ($type == 'produit') 
			{
				return $this->countSelect('loves','userId ='.$userConnectedId.' 
										AND elementId ='.$elementId.' AND type = "'.$type.'" ');
			}
			else
			{
				return $this->countSelect('loves','userId ='.$userConnectedId.' 
										AND elementId ='.$elementId.' AND type = "'.$type.'"');
			}
		}
	}


	// Pour les collection
	public function setUserCollect($elementId,$loverId,$type)
	{
		$this->databaseConnect();

		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}

		// Ici on recupere avant tout le nombre de love sur le produit
		$nbCollect = $this->countSelect('collections','elementId = '.$elementId.' AND type ="'.$type.'" ');

		//Si le love de l'utilisateur existe deja sur ce produit
		if ($this->getSimple('collections','userId ='.$userConnectedId.' AND elementId ='.$elementId.' AND type ="'.$type.'" ')) 
		{
			// On le retire du nombre total de love sur ce produit
			$this->delete('collections','elementId = '.$elementId.' AND userId ='.$userConnectedId.' AND type ="'.$type.'" ');

			return $nbCollect - 1;
		}
		//Si le love de l'utilisateur n'existe pas sur ce produit
		else
		{
			// On l'ajoute au nombre total de love sur ce produit
			if ($this->insertObject('collections(userId,elementId,type)',
								'(:userId,:elementId,:type)',
								['userId'=>$userConnectedId,'elementId'=>$elementId,'type'=>$type])) 
			{	
				return ($nbCollect + 1);
			}

		}
	}
	


	// Pour les vue
	public function setUserView($elementId,$viewerId,$type)
	{
		$this->databaseConnect();

		$userConnectedId = null;
		if (isset($_SESSION) && !empty($_SESSION['id'])) 
		{
			$userConnectedId = $_SESSION['id'];
		}

		// Ici on recupere avant tout le nombre de view sur le produit
		$nbView = $this->countSelect('views','elementId = '.$elementId.' AND type ="'.$type.'" ');

		//Si le view de l'utilisateur existe deja sur ce produit
		if ($this->getSimple('views','userId ='.$userConnectedId.' AND elementId ='.$elementId.' AND type ="'.$type.'" ')) 
		{
			return $nbView;
		}
		//Si le view de l'utilisateur n'existe pas sur ce produit
		else
		{
			// On l'ajoute au nombre total de view sur ce produit
			if ($this->insertObject('views(userId,elementId,type)',
								'(:userId,:elementId,:type)',
								['userId'=>$userConnectedId,'elementId'=>$elementId,'type'=>$type])) 
			{	

				if ($this->updateObject($type.'s','views = :views WHERE id ='.$elementId,
											['views'=>$nbView + 1])) 
				{
					return ($nbView + 1);
				}
			}
			else
			{

			}
		}
		
	}


	// Pour les commentaire
	public function setElementComment($type,$content,$elementId)
	{
		$receiverId = $this->getSimple(strtolower($type).'s','id ='.$elementId,'userId');

		$this->setNotice($receiverId['userId'],$_SESSION['id'],$elementId,'Commentaire',
			'a commenter un de vos '.$type.' ','mdi mdi-comment-plus');

		$commentAction =  new commentManager();
		if ($commentAction->setComment($type,$content,$elementId)) 
		{
			return $this->getAllElementComment($type,$elementId);
		}
	}
	public function updateComment($class,$type,$content,$commentId)
	{
		$commentAction =  new commentManager();
		if ($commentAction->setUpdateComment($class,$type,$content,$commentId)) 
		{
			return true;
		}
		else
		{
			return $commentAction->setUpdateComment($class,$type,$content,$commentId);
		}
	}
	public function deleteComment($class,$type,$commentId)
	{
		$commentAction =  new commentManager();
		if ($commentAction->deleteComment($class,$type,$commentId)) 
		{
			return true;
		}
		else
		{
			return $commentAction->deleteComment($class,$type,$commentId);
		}
	}
	public function setElementReplyComment($type,$content,$replyedId)
	{
		// $this->setNotice($receiverId['userId'],$_SESSION['id'],$elementId,'Commentaire',
		// 	'a commenter un de vos '.$type.' ','mdi-comment-plus');
		$commentAction =  new commentManager();
		return $commentAction->setReplyComment($type,$content,$replyedId);
	}

	public function getElementReplyComment($type,$replyedId)
	{
		$commentAction =  new commentManager();
		return $commentAction->getReplyComment($type,$replyedId);
	}


	public function getAllElementComment($type,$elementId)
	{
		$commentAction =  new commentManager();
		return $commentAction->getAllComment($type,$elementId);
	}


































	public function photoUpdateUpload($domain,$fileUrl)
	{
		$userPath = "";

		if ($fileUrl != 'null') 
		{
			if (is_dir('../../../img/Users')) 
			{
				$userPath.= '../../../img/Users';
			}
			else
			{
				mkdir('../../../img/Users');
				$userPath.= '../../../img/Users';
			}
			file_put_contents($userPath.'/'.$_SESSION['id'].'.png',file_get_contents($fileUrl));
		}

		$finalFilePath = $domain.'img/users/'.$_SESSION['id'].'.png';
		return $finalFilePath;
	}
}
 ?>