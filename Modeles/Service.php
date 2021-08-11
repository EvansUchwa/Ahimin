<?php 


/**
 * 
 */
class Service
{
	
	private $_id;
	private $_userId;
	private $_titre;
	private $_categorie;
	private $_subCategorie;

	private $_openHour;
	private $_closeHour;
	private $_loves;
	private $_views;

	private $_photo1;
	private $_photo2;
	private $_photo3;
	private $_photo4;

	private $_localisation;
	private $_description;
	private $_photosId;
	private $_createdAt;

	function __construct(array $dataArray)
	{
		$this->hydrate($dataArray);
	}

	private function hydrate(array $dataArray)
	{
		foreach ($dataArray as $key => $value) 
		{
			$entityMethod = 'set'.ucfirst($key);
			if (method_exists($this,$entityMethod)) 
			{
				$this->$entityMethod($value);
			}
		}
	}



	//SETTER
	public function setId($id)
	{
		if (is_numeric($id)) 
		{
			$this->_id = $id;
		}
	}
	public function setUserId($userId)
	{
		if (is_numeric($userId)) 
		{
			$this->_userId = $userId;
		}	
	}
	public function setTitre($titre)
	{
		if (is_string($titre)) 
		{
			$this->_titre = $titre;
		}
	}
	public function setOpenHour($openHour)
	{
		if (is_string($openHour)) 
		{
			$this->_openHour = $openHour;
		}
	}
	public function setCloseHour($closeHour)
	{
		if (is_string($closeHour)) 
		{
			$this->_closeHour = $closeHour;
		}
	}
	public function setLoves($loves)
	{
		if (is_numeric($loves)) 
		{
			$this->_loves = $loves;
		}
	}
	public function setViews($views)
	{
		if (is_numeric($views)) 
		{
			$this->_views = $views;
		}
	}
	public function setCategorie($categorie)
	{
		if (is_string($categorie)) 
		{
			$this->_categorie = $categorie;
		}
	}
	public function setSubCategorie($subCategorie)
	{
		if (is_string($subCategorie)) 
		{
			$this->_subCategorie = $subCategorie;
		}
	}
	public function setDescription($description)
	{
		if (is_string($description)) 
		{
			$this->_description = $description;
		}
	}

	public function setLivraison($livraison)
	{
		if (is_string($livraison)) 
		{
			$this->_livraison = $livraison;
		}
	}

	public function setLocalisation($localisation)
	{
		if (is_string($localisation)) 
		{
			$this->_localisation = $localisation;
		}
	}

	public function setPhotosId($photosId)
	{
		if (is_string($photosId)) 
		{
			$this->_photosId = $photosId;
		}
	}

	public function setPhoto1($photo1)
	{
		if (is_string($photo1)) 
		{
			$this->_photo1 = $photo1;
		}
	}
	public function setPhoto2($photo2)
	{
		if (is_string($photo2)) 
		{
			$this->_photo2 = $photo2;
		}
	}
	public function setPhoto3($photo3)
	{
		if (is_string($photo3)) 
		{
			$this->_photo3 = $photo3;
		}
	}
	public function setPhoto4($photo4)
	{
		if (is_string($photo4)) 
		{
			$this->_photo4 = $photo4;
		}
	}

	public function setCreatedAt($createdAt)
	{
		if (is_string($createdAt)) 
		{
			$this->_createdAt = $createdAt;
		}
	}


	// GETTER
	public function getId()
	{
		return $this->_id;
	}
	public function getUserId()
	{
		return $this->_userId;
	}
	public function getTitre()
	{
		return $this->_titre;
	}
	public function getOpenHour()
	{
		return $this->_openHour;
	}
	public function getCloseHour()
	{
		return $this->_closeHour;
	}
	public function getLoves()
	{
		return $this->_loves;
	}
	public function getViews()
	{
		return $this->_views;
	}
	public function getCategorie()
	{
		return $this->_categorie;
	}
	public function getSubCategorie()
	{
		return $this->_subCategorie;
	}
	public function getDescription()
	{
		return $this->_description;
	}
	public function getLocalisation()
	{
		return $this->_localisation;
	}
	public function getPhotosId()
	{
		return $this->_photosId;
	}
	public function getPhoto1()
	{
		return $this->_photo1;
	}
	public function getPhoto2()
	{
		return $this->_photo2;
	}
	public function getPhoto3()
	{
		return $this->_photo3;
	}
	public function getPhoto4()
	{
		return $this->_photo4;
	}
	public function getCreatedAt()
	{
		return $this->_createdAt;
	}
	public function getStatut()
	{
		date_default_timezone_set('Africa/Porto-Novo');
		$dateBase = date('Y-m-d H:i:s');

		$ohd = date('Y-m-d '.$this->getOpenHour());
		$chd = date('Y-m-d '.$this->getCloseHour());

		$ohDT = date('Y-m-d H:i',strtotime($ohd));
		$chDT = date('Y-m-d H:i',strtotime($chd));


		if (strtotime($dateBase) >= strtotime($ohDT) && strtotime($dateBase) <= strtotime($chDT))
		{
			return 'Disponible';
		}
		else
		{
			return 'Indisponible';
		}		
		
	}
	public function getHourEcart()
	{
		$date_now = date('Y-m-d H:i:s');

		$last_h = strtotime($this->getCreatedAt());
		$hour_now = strtotime($date_now);

		$timestamp_ecart = $hour_now - $last_h;

		$nb_jour = $timestamp_ecart / (3600 * 24);
		$nb_heures = $nb_jour * 24;
		$nb_minutes  = $nb_heures * 60;
		$nb_seconde  =  $nb_minutes * 60;

		if ($nb_jour < 1) 
		{
			if ($nb_heures < 1) 
			{
				if ($nb_minutes < 1) 
				{
					return ceil($nb_seconde).' sec';
				}
				else
				{
					return ceil($nb_minutes).' min';
				}
				
			}
			else
			{
				return ceil($nb_heures).' hrs';
			}
			
		}
		else
		{
			return ceil($nb_jour).' jrs';
		}
	}
}


 ?>
 