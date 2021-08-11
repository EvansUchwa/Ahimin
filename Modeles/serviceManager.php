<?php 		

class serviceManager extends Requete
{
	public function __construct($serviceId = null)
	{
		$this->databaseConnect();
		Session::getInstanceSession();
		if ($serviceId != null) 
		{
			$this->serviceExist($serviceId);
		}
	}

	public function serviceExist($serviceId)
	{
		$this->databaseConnect();

		if ($this->countSelect('services','id ='.$serviceId) == 0) 
		{
			header('Location: dashboard');
		}
		
	}

	public function add($photo1,$photo2,$photo3,$photo4,
						$titre,$categorie,$subCategorie,$openHour,$closeHour,
						$description,$domain)
	{
		$this->databaseConnect();

		$photoFinal1 = $this->photoUpload($domain,$titre,$photo1);
		$photoFinal2 =$this->photoUpload($domain,$titre,$photo2);
		$photoFinal3 =$this->photoUpload($domain,$titre,$photo3);
		$photoFinal4 =$this->photoUpload($domain,$titre,$photo4);

		$insertPhoto = $this->insertObject('photos(photo1,photo2,photo3,photo4)',
							'(:photo1,:photo2,:photo3,:photo4)',
							['photo1'=>$photoFinal1,
							'photo2'=>$photoFinal2,
							'photo3'=>$photoFinal3,
							'photo4'=>$photoFinal4]);
		$lastId = $this->lastInsert();
		if($insertPhoto)
		{
			date_default_timezone_set('Africa/Porto-Novo');

			$userLocalisation = new userManager();
    		$localisation = $userLocalisation->getUserConnectedInfo($_SESSION['id'])->getLocalisation();

			$insertService = $this->insertObject('services(userId,titre,categorie,subCategorie,openHour,closeHour,
										 localisation,description,photosId,createdAt)',
								'(:userId,:titre,:categorie,:subCategorie,:openHour,:closeHour,
										:localisation,:description,:photosId,:createdAt)',
								['userId'=>$_SESSION['id'],'titre'=>$titre,
								'openHour'=>$openHour,'closeHour'=>$closeHour,
								'categorie'=>$categorie,'subCategorie'=>$subCategorie,
								'localisation'=>$localisation,
								'description'=>$description,
								'photosId'=>$lastId,
								'createdAt'=>date('Y-m-d H:i:s')]);

			if ($insertService) 
			{
				$li = $this->lastInsert();
			 	return $li;
			 }
			 else
			 {
			 	return $insertService;
			 }
		}
		else
		{
			return $insertPhoto;
		}

		
		
	}

	public function update($photo1,$photo2,$photo3,$photo4,
     						$oldNm1,$oldNm2,$oldNm3,$oldNm4,
                        	$titre,$categorie,$subCategorie,$openHour,$closeHour,
                            $description,$domain,$serviceId)
	{
		$this->databaseConnect();


		if ($photo1 != 'null') 
		{
			$this->photoUpdateUpload($domain,$photo1,$oldNm1);
		}
		if ($photo2 != 'null') 
		{
			$this->photoUpdateUpload($domain,$photo2,$oldNm2);
		}
		if ($photo3 != 'null') 
		{
			$this->photoUpdateUpload($domain,$photo3,$oldNm3);
		}
		if ($photo4 != 'null') 
		{
			$this->photoUpdateUpload($domain,$photo4,$oldNm4);
		}

		$userLocalisation = new userManager();
    	$localisation = $userLocalisation->getUserConnectedInfo($_SESSION['id'])->getLocalisation();

		return $this->updateObject('services',
								'titre = :titre,categorie = :categorie,subCategorie = :subCategorie,
								openHour = :openHour,closeHour = :closeHour,
								localisation = :localisation,
								description = :description
								WHERE id ='.$serviceId,
								['titre'=>$titre,'categorie'=>$categorie,'subCategorie'=>$subCategorie,
								'openHour'=>$openHour,'closeHour'=>$closeHour,
								'localisation'=>$localisation,
								'description'=>$description]);
		
	}

	public function setProductComment($content,$serviceId)
	{
		$commentAction =  new commentManager();
		if ($commentAction->setComment('product',$content,$serviceId)) 
		{
			return $this->getAllProductComment($serviceId);
		}
	}

	public function setProductReplyComment($content,$replyedId)
	{
		$commentAction =  new commentManager();
		return $commentAction->setReplyComment('product',$content,$replyedId);
	}

	public function getProductReplyComment($replyedId)
	{
		$commentAction =  new commentManager();
		return $commentAction->getReplyComment('product',$replyedId);
	}


	public function getAllServiceComment($serviceId)
	{
		$commentAction =  new commentManager();
		return $commentAction->getAllComment('product',$serviceId);
	}

	public function getLastPublished()
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('services.id,titre,openHour,closeHour,
										localisation,photosId,loves,createdAt,
										photos.photo1','services',
			'LEFT JOIN photos ON services.photosId = photos.id LIMIT 6','Service');
	}

	public function getServiceInfos($serviceId)
	{
		$this->databaseConnect();
		return $this->getOneJoinObject('services.id,userId,titre,
										categorie,subCategorie,openHour,closeHour,
										localisation,description,
										photosId,loves,views,
										photos.photo1,photos.photo2,
										photos.photo3,photos.photo4','services',
			'LEFT JOIN photos ON services.photosId = photos.id 
			WHERE services.id = '.$serviceId,'Service');
	}

	public function getAllServices()
	{
		return $this->getAllJoinObject('services.id,titre,loves,
										photosId,createdAt,openHour,closeHour,
										photos.photo1','services',
										'LEFT JOIN photos ON services.photosId = photos.id 
										ORDER BY id desc','Service');
	}
	public function getAllServicePostedByUser($profilId)
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('services.id,titre,
										photosId,createdAt,
										photos.photo1','services',
										'LEFT JOIN photos ON services.photosId = photos.id 
										WHERE services.userId ='.$profilId,'Service');
	}

	public function love($serviceId,$posterId)
	{
		$this->databaseConnect();
		Session::getInstanceSession();

		$userConnectedId = $_SESSION['id'];
		$userCInfo = $this->getSimpleObject('users','id ='.$userConnectedId,'User');
		
		$this->setNotice($posterId,$userConnectedId,$serviceId,'loves',
		'<a href="Produit/'.$serviceId.'">'.
		$userCInfo->getPseudo().' a adoré un de vos produit</a>');

		// Ici on recupere avant tout le nombre de love sur le produit
		$nbLove = $this->countSelect('loves','serviceId = '.$serviceId);

		//Si le love de l'utilisateur existe deja sur ce produit
		if ($this->getSimple('loves','userId ='.$userConnectedId.' AND serviceId ='.$serviceId)) 
		{
			// On le retire du nombre total de love sur ce produit
			$this->delete('loves','serviceId = '.$serviceId.' AND userId ='.$userConnectedId);
			$this->updateObject('produits','loves = :loves WHERE id ='.$serviceId,
											['loves'=>$nbLove - 1]);

			return $nbLove - 1;
		}
		//Si le love de l'utilisateur n'existe pas sur ce produit
		else
		{
			// On l'ajoute au nombre total de love sur ce produit
			if ($this->insertObject('loves(userId,serviceId)',
								'(:userId,:serviceId)',
								['userId'=>$userConnectedId,'serviceId'=>$serviceId])) 
			{	

				if ($this->updateObject('produits','loves = :loves WHERE id ='.$serviceId,
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

	public function getLoved($serviceId)
	{
		$this->databaseConnect();
		$userConnectedId = $_SESSION['id'];

		return $this->countSelect('loves','userId ='.$userConnectedId.' AND serviceId ='.$serviceId);
	}


	public function setNotice($receiverId,$noticerId,$elementId,$type,$content,$url = false)
	{
		if ($receiverId != $noticerId) 
		{
			if ($this->countSelect('notification','elementId ='.$elementId.' AND noticerId ='.$noticerId) == 0) 
			{
				$this->insertObject('notification(receiverId,noticerId,elementId,
											type,content,statut)',
								'(:receiverId,:noticerId,:elementId,
								:type,:content,:statut)',
								['receiverId'=>$receiverId,
								'noticerId'=>$noticerId,
								'elementId'=>$elementId,
								'type'=>$type,
								'content'=>$content,
								'statut'=>(-1)]);
			}
			
		}
	}



	public function getServiceResult($base = null,$categorie = null)
	{
		$searchAction = new searchManager();

		if ($base != null) {
			if ($base == 'All') 
			{
			return $this->getAllServices();
			}
			else
			{
				return $searchAction->getOneParamSearchResult('services.id,openHour,closeHour,createdAt,
				photo1','services',
				"LEFT JOIN photos ON services.photosId = photos.id 
				WHERE services.titre LIKE '%".$base."%' ",'Service');
			}
		}
		elseif($categorie != null)
		{
			return $searchAction->getOneParamSearchResult('services.id,titre,categorie,openHour,closeHour,createdAt,
				photo1','services',
				"LEFT JOIN photos ON services.photosId = photos.id 
				WHERE services.categorie = '".$categorie."' ",'Service');
		}
		
	}

	public function getServiceFilterResult($base = null,$baseCategorie = null,
											$categorie,$disponibility,$nbLove,
										  $ville,$date)
	{
		$searchAction = new searchManager();

		if ($base != null)
		{
			if ($base == 'All') 
			{
				$baseQuery = " WHERE services.id > 0 ";
			}
			else
			{
				$baseQuery = " WHERE services.titre LIKE '%".$base."%' ";
			}
		}
		elseif($baseCategorie != null)
		{
			$baseQuery = " WHERE services.categorie = '".$baseCategorie."' ";
		}
		

		if ($categorie != '') 
		{
			$baseQuery.= " AND categorie = '".$categorie."' ";
		}
		if ($ville != '') 
		{
			$baseQuery.= " AND localisation = '".$ville."' ";
		}
		if ($disponibility != '') 
		{
			date_default_timezone_set('Africa/Porto-Novo');
			$dtb = date('Y-m-d');

			if ($disponibility == 'Disponible') 
			{
				$baseQuery.= " AND CURTIME() >= TIME_FORMAT(openHour, '%H %i') 
							   AND CURTIME() <= TIME_FORMAT(closeHour, '%H %i') ";
			}
			elseif ($disponibility == 'Indisponible') 
			{
				$baseQuery.= " AND CURTIME() <= TIME_FORMAT(openHour, '%H %i') 
							   OR CURTIME() >= TIME_FORMAT(closeHour, '%H %i') ";
			}
		}
		if ($date != '') 
		{
			if ($date == '1h') 
			{
				$baseQuery.= " AND TIMESTAMPDIFF(HOUR,createdAt,NOW()) <= 1 ";
			}
			elseif($date == '1d')
			{
				$baseQuery.= " AND TIMESTAMPDIFF(DAY,createdAt,NOW()) <= 1 
								AND TIMESTAMPDIFF(HOUR,createdAt,NOW()) >= 12";
			}
			elseif($date == '1w')
			{
				$baseQuery.= " AND TIMESTAMPDIFF(WEEK,createdAt,NOW()) <= 1 
								AND TIMESTAMPDIFF(DAY,createdAt,NOW()) >= 5 ";
			}
			elseif($date == '1m')
			{
				$baseQuery.= " AND TIMESTAMPDIFF(MONTH,createdAt,NOW()) <= 1 
								AND TIMESTAMPDIFF(WEEK,createdAt,NOW()) >= 2";
			}
		}
		
		if ($nbLove != '') 
		{
			if ($nbLove == "0to10") 
			{
				$baseQuery.= " AND loves <= 10 ";
			}
			elseif($nbLove == "10to20")
			{
				$baseQuery.= " AND loves >= 10 AND love <= 20 ";
			}
			elseif($nbLove == "20to30")
			{
				$baseQuery.= " AND loves >= 20 AND love <= 30 ";
			}
			elseif($nbLove == "30to+")
			{
				$baseQuery.= " AND loves >= 30 ";
			}
			
		}

		return $searchAction->getFilterResult('services.id,titre,openHour,
											closeHour,createdAt,localisation,loves,
												photo1','services',
			"LEFT JOIN photos ON services.photosId = photos.id ".$baseQuery." ",
													'Service');

		// return $baseQuery;
	}









	public function photoUpload($domain,$elementName,$fileUrl)
	{
		$filename ="Service_";
		$userPath = "";
		// On verifie si l'url du fichier n'est pas vide
		if ($fileUrl != 'null') 
		{
			// On verifie si le dossier si dessous existe deja
			if (is_dir('../../../clientImg/'.$_SESSION['id'])) 
			{
				// Si oui le repertoire devient celui de l'utilisateur
				$userPath.= '../../../clientImg/'.$_SESSION['id'];
			}
			else
			{
				//Si non on le cree et il devient celui de l'utilisateur
				mkdir('../../../clientImg/'.$_SESSION['id']);
				$userPath.= '../../../clientImg/'.$_SESSION['id'];
			}
			$filename.= $elementName.'_'.rand(0,100000).'.png';
			file_put_contents($userPath.'/'.$filename, file_get_contents($fileUrl));
			$filename = $domain.'clientImg/'.$_SESSION['id'].'/'.$filename;
		}
		else
		{
			$filename = $domain.'img/png/defaultPic.png';
		}
		return $filename;
	}

	public function photoUpdateUpload($domain,$fileUrl,$filenameUrl)
	{
		$userPath = "";
		$filename = "Service_";
		// On verifie si l'url du fichier n'est pas vide
		if ($fileUrl != 'null') 
		{
			$filenameExp = explode('/', $filenameUrl);
			$filename.= $filenameExp[count($filenameExp) - 1];

			// On verifie si le dossier si dessous existe deja
			if (is_dir('../../../clientImg/'.$_SESSION['id'])) 
			{
				// Si oui le repertoire devient celui de l'utilisateur
				$userPath.= '../../../clientImg/'.$_SESSION['id'];
			}
			else
			{
				//Si non on le cree et il devient celui de l'utilisateur
				mkdir('../../../clientImg/'.$_SESSION['id']);
				$userPath.= '../../../clientImg/'.$_SESSION['id'];
			}
			file_put_contents($userPath.'/'.$filename,file_get_contents($fileUrl));
		}
		else
		{
			$filename = $domain.'img/png/defaultPic.png';
		}
		return $filename;
	}
	
}



 ?>