<?php 


/**
 * 
 */
class Notification
{
	
	private $_id;
	private $_receiverId;
	private $_noticerId;
	private $_elementId;
	private $_titre;
	private $_statut;
	private $_type;


	private $_icon;
	private $_content;
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
	public function setReceiverId($receiverId)
	{
		if (is_numeric($receiverId)) 
		{
			$this->_receiverId = $receiverId;
		}
	}
	public function setNoticerId($noticerId )
	{
		if (is_numeric($noticerId)) 
		{
			$this->_noticerId = $noticerId;
		}
		
	}
	public function setElementId($elementId)
	{
		if (is_numeric($elementId)) 
		{
			$this->_elementId = $elementId;
		}
	}
	public function setStatut($Statut)
	{
		if (is_numeric($Statut)) 
		{
			$this->_statut = $Statut;
		}
	}
	public function setType($type)
	{
		if (is_string($type)) 
		{
			$this->_type = $type;
		}
	}
	public function setContent($Content)
	{
		if (is_string($Content)) 
		{
			$this->_content = $Content;
		}
	}

	public function setIcon($icon)
	{
		if (is_string($icon)) 
		{
			$this->_icon = $icon;
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
	public function getReceiverId()
	{
		return $this->_receiverId;
	}
	public function getNoticerId()
	{
		return $this->_noticerId;
	}
	public function getElementId()
	{
		return $this->_elementId ;
	}
	public function getTitre()
	{
		return $this->_titre;
	}
	public function getStatut()
	{
		return $this->_statut;
	}
	public function getType()
	{
		return $this->_type;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function getIcon()
	{
		return $this->_icon;
	}
	

	public function getCreatedAt()
	{
		return $this->_createdAt;
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
 