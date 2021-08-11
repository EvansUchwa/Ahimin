<?php 


/**
 * 
 */
class User
{
	private $_id;
	private $_pseudo;
	private $_mail;
	private $_sexe;
	private $_numero;
	private $_whatsapp;

	private $_followers;
	private $_stars;

	private $_statut;
	private $_description;
	private $_localisation;
	private $_nomEntreprise;
	private $_photo;
	
	private $_activation;
	private $_token;
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
	public function setPseudo($pseudo)
	{
		if (is_string($pseudo)) 
		{
			$this->_pseudo = $pseudo;
		}
	}
	public function setMail($mail)
	{
		if (filter_var($mail,FILTER_VALIDATE_EMAIL)) 
		{
			$this->_mail = $mail;
		}
	}
	public function setSexe($sexe)
	{
		if (is_string($sexe)) 
		{
			$this->_sexe = $sexe;
		}
	}
	public function setNumero($numero)
	{
		if (is_string($numero)) 
		{
			$this->_numero = $numero;
		}
	}
	public function setWhatsapp($whatsapp)
	{
		if (is_string($whatsapp)) 
		{
			$this->_whatsapp = $whatsapp;
		}
	}
	public function setFollowers($followers)
	{
		if (is_string($followers)) 
		{
			$this->_followers = $followers;
		}
	}
	public function setStars($stars)
	{
		if (is_numeric($stars)) 
		{
			$this->_stars = $stars;
		}
	}

	public function setStatut($statut)
	{
		if (is_string($statut)) 
		{
			$this->_statut = $statut;
		}
	}

	public function setPhoto($photo)
	{

		if (is_string($photo)) 
		{
			$this->_photo = $photo;
		}
		
	}

	public function setDescription($description)
	{
		if (is_string($description)) 
		{
			$this->_description = $description;
		}
	}

	public function setLocalisation($localisation)
	{
		if (is_string($localisation)) 
		{
			$this->_localisation = $localisation;
		}
	}

	public function setNomEntreprise($nomEntreprise)
	{
		if (is_string($nomEntreprise)) 
		{
			$this->_nomEntreprise = $nomEntreprise;
		}
	}

	public function setActivation($activation)
	{
		if (is_numeric($activation)) 
		{
			$this->_activation = $activation;
		}
	}
	public function setToken($token)
	{
		if (is_numeric($token)) 
		{
			$this->_token = $token;
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
	public function getPseudo()
	{
		return $this->_pseudo;
	}
	public function getMail()
	{
		return $this->_mail;
	}
	public function getSexe()
	{
		return $this->_sexe;
	}
	public function getNumero()
	{
		return $this->_numero;
	}
	public function getWhatsapp()
	{
		return $this->_whatsapp;
	}
	public function getFollowers()
	{
		return $this->_followers;
	}
	public function getStars()
	{
		return $this->_stars;
	}
	public function getStatut()
	{
		return $this->_statut;
	}
	public function getDescription()
	{
		return $this->_description;
	}
	public function getLocalisation()
	{
		return $this->_localisation;
	}
	public function getNomEntreprise()
	{
		return $this->_nomEntreprise;
	}
	public function getPhoto()
	{
		return $this->_photo;
	}
	public function getActivation()
	{
		return $this->_activation;
	}
	public function getToken()
	{
		return $this->_token;
	}
	public function getCreatedAt()
	{
		return $this->_createdAt;
	}
	
}
 ?>