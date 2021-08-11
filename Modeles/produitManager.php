<?php 		

class produitManager extends Requete
{
	public function __construct($productId = null)
	{
		$this->databaseConnect();
		Session::getInstanceSession();
		if ($productId != null) 
		{
			$this->productExist($productId);
		}
	}

	public function productExist($productId)
	{
		$this->databaseConnect();

		if ($this->countSelect('produits','id ='.$productId) == 0) 
		{
			header('Location: dashboard');
		}
		
	}

	public function add($photo1,$photo2,$photo3,$photo4,
						$titre,$type,$prix,$etat,$categorie,
						$subCategorie,$description,$livraison,$domain)
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
			$userAction = new userManager();
    		$localisation = $userAction->getUserConnectedInfo($_SESSION['id'])->getLocalisation();

    		$insertProduct = $this->insertObject('produits(userId,titre,prix,type,categorie,subCategorie,etat,
				 localisation,description,livraison,photosId,createdAt)',
								'(:userId,:titre,:prix,:type,:categorie,:subCategorie,:etat,
								:localisation,:description,:livraison,:photosId,:createdAt)',
								['userId'=>$_SESSION['id'],'titre'=>$titre,
								'prix'=>$prix,'type'=>$type,'etat'=>$etat,
								'categorie'=>$categorie,'subCategorie'=>$subCategorie,
								'localisation'=>$localisation,
								'description'=>$description,'livraison'=>$livraison,
								'photosId'=>$lastId,
								'createdAt'=>date('Y-m-d H:i:s')]);
			if ($insertProduct) 
			{
				$li = $this->lastInsert();
				$followerExist = $this->countSelect('follows','profilId ='.$_SESSION['id']);
				if ($followerExist) 
				{
					$getFollowers = $this->getSimpleAll('follows','profilId='.$_SESSION['id'],'id,followerId');
					foreach ($getFollowers as $getFollower) 
					{
						$insertNotice = $userAction->setNotice($getFollower['followerId'],$_SESSION['id'],
												$li,'Produit',' a ajouter un nouveau produit','mdi mdi-comment-plus');
					}

				}
			 	return $li;
			 }
			 else
			 {
			 	return $insertProduct;
			 }
		}
		else
		{
			return $insertPhoto;
		}

		
		
	}

	public function update($photo1,$photo2,$photo3,$photo4,
						$oldNm1,$oldNm2,$oldNm3,$oldNm4,
						$titre,$type,$prix,$etat,$categorie,
						$subCategorie,$description,$livraison,$domain,$productId)
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

		return $this->updateObject('produits',
								'titre = :titre,prix = :prix,etat = :etat,
								type =:type,categorie = :categorie,
								subCategorie = :subCategorie,
								localisation = :localisation,
								description = :description,livraison = :livraison
								WHERE id ='.$productId,
								['titre'=>$titre,'etat'=>$etat,
								'prix'=>$prix,'type'=>$type,
								'categorie'=>$categorie,'subCategorie'=>$subCategorie,
								'localisation'=>$localisation,
								'description'=>$description,
								'livraison'=>$livraison]);
		
	}

	

	public function getLastPublished()
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('produits.id,titre,localisation,
										photosId,prix,loves,createdAt,
										photos.photo1','produits',
			'LEFT JOIN photos ON produits.photosId = photos.id ORDER by id desc LIMIT 6','Produit');
	}
	public function getBestPublished()
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('produits.id,titre,localisation,
										photosId,prix,loves,createdAt,
										photos.photo1','produits',
			'LEFT JOIN photos ON produits.photosId = photos.id 
			ORDER by loves desc LIMIT 5 ','Produit');
	}

	public function getPopularPublished()
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('produits.id,titre,localisation,
										photosId,prix,loves,createdAt,
										photos.photo1','produits',
			'LEFT JOIN photos ON produits.photosId = photos.id 
			ORDER by views desc LIMIT 5 ','Produit');
	}


	public function getProductInfos($productId)
	{
		$this->databaseConnect();
		return $this->getOneJoinObject('produits.id,userId,titre,type,
										categorie,subCategorie,etat,
										localisation,description,livraison,
										photosId,prix,loves,views,
										photos.photo1,photos.photo2,
										photos.photo3,photos.photo4','produits',
			'LEFT JOIN photos ON produits.photosId = photos.id 
			WHERE produits.id = '.$productId,'Produit');
	}

	public function getAllProductsFind()
	{
		return $this->countSelect('produits','WHERE id > 0');
	}
	public function getAllProducts($nbOutputed = null,$atLast = null,$rangeBy = null)
	{
		$queryEnd = '';
		$order = 'ORDER BY produits.id desc';

		if ($rangeBy != null) 
		{
			$order = 'ORDER BY '.$rangeBy.' ';
		}

		if ($nbOutputed != null && $atLast == null) 
		{
			$queryEnd.= ' '.$order.' LIMIT '.$nbOutputed.' ';
		}
		elseif ($nbOutputed != null && $atLast != null) 
		{
			$queryEnd.= '  WHERE produits.id < '.$atLast. ' '.$order.' LIMIT '.$nbOutputed.' ';
		}
		else
		{
			$queryEnd.= $order;
		}

		return $this->getAllJoinObject('produits.id,titre,prix,loves,
										photosId,createdAt,localisation,
										photos.photo1','produits',
										'LEFT JOIN photos ON produits.photosId = photos.id 
										'.$queryEnd.' ','Produit');
		
		
	}
	public function getAllProductPostedByUser($profilId)
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('produits.id,titre,
										photosId,createdAt,
										photos.photo1','produits',
										'LEFT JOIN photos ON produits.photosId = photos.id 
										WHERE produits.userId ='.$profilId,'Produit');
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



	public function getProductResult($base = null,$categorie = null,$nbOutputed)
	{
		$searchAction = new searchManager();

		if ($base != null) {
			if ($base == 'All') 
			{
				return $this->getAllProducts($nbOutputed,null);
			}
			else
			{
				return $searchAction->getOneParamSearchResult('produits.id,titre,prix,createdAt,localisation,photo1','produits',
				"LEFT JOIN photos ON produits.photosId = photos.id 
				WHERE produits.titre LIKE '%".$base."%' LIMIT ".$nbOutputed." ",'Produit');
			}
			
		}
		if($categorie != null)
		{
			return $searchAction->getOneParamSearchResult('produits.id,titre,categorie,prix,createdAt,localisation,photo1','produits',
				"LEFT JOIN photos ON produits.photosId = photos.id 
				WHERE produits.categorie = '".$categorie."' LIMIT ".$nbOutputed." ",'Produit');
		}
		
	}

	public function getProductFilterResult($base = null,$baseCategorie = null,
											$categorie,$subCategorie,$nbLove,
										  $ville,$date,$prixMin,$prixMax,$etat,$atLast = null)
	{
		
		$searchAction = new searchManager();
		$baseQuery = null;
		
		if ($base != null)
		{
			if ($base == 'All') 
			{
				$baseQuery = " WHERE produits.id > 0 "; 
			}
			else
			{
				$baseQuery = " WHERE produits.titre LIKE '%".$base."%' ";
			}
		}
		elseif($baseCategorie != null)
		{
			$baseQuery = " WHERE produits.categorie = '".$baseCategorie."' ";
		}
		

		if ($categorie != '') 
		{
			$baseQuery.= " AND categorie = '".$categorie."' ";
		}
		if ($subCategorie != '') 
		{
			$baseQuery.= " AND subCategorie = '".$subCategorie."' ";
		}
		if ($ville != '') 
		{
			$baseQuery.= " AND localisation = '".$ville."' ";
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
							   AND TIMESTAMPDIFF(WEEK,createdAt,NOW()) >= 2	";
			}
		}
		if ($prixMin != '') 
		{
			$baseQuery.= " AND prix >= ".$prixMin;
		}
		if ($prixMax != '') 
		{
			$baseQuery.= " AND prix <= ".$prixMax;
		}
		if ($prixMin != '' || $prixMax != '') 
		{
			$baseQuery.= " ORDER BY prix ";
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
		if ($etat != '') 
		{
			$baseQuery.= " AND etat = '".$etat."' ";
		}
		if ($atLast != null) 
		{
			$baseQuery.= " AND produits.id < ".$atLast." ";
		}
		return $searchAction->getFilterResult('produits.id,titre,loves,
											prix,createdAt,localisation,
												photo1','produits',
			"LEFT JOIN photos ON produits.photosId = photos.id ".$baseQuery." ORDER BY id desc LIMIT 1 ",
													'Produit');
	}









	public function photoUpload($domain,$elementName,$fileUrl)
	{
		$filename ="Produit_";
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
		$filename = "";
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
			$filename.= $domain.'img/png/defaultPic.png';
		}
		return $filename;
	}
	
}



 ?>