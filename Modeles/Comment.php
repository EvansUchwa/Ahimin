<?php 


/**
  * 
  */
 class Comment extends User
 {
 	
 	private $_id;
	private $_autorId;
	private $_productId;
	private $_content;
	private $_createdAt;


	function __construct(array $data)
	{
		$this->hydrate($data);
	}

	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$methodEntity = 'set'.ucfirst($key);

			if (method_exists($this, $methodEntity)) 
			{
				$this->$methodEntity($value);
			}
		}
	}


	// SETTER
	public function setId($id)
	{
		if (is_numeric($id)) 
		{
			$this->_id = $id;
		}
	}
	public function setAutorId($autorId)
	{
		if (is_numeric($autorId)) 
		{
			$this->_autorId = $autorId;
		}
	}
	public function setProductId($productId)
	{
		if (is_numeric($productId)) 
		{
			$this->_productId = $productId;
		}
	}
	public function setContent($content)
	{
		if (is_string($content)) 
		{
			$this->_content = $content;
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
	public function getAutorId()
	{
		return $this->_autorId;
	}
	public function getProductId()
	{
		return $this->_productId;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function getCreatedAt()
	{
		return $this->_createdAt;
	}

	public function convertedDate()
	{
		date_default_timezone_set('Africa/Porto-Novo');

		if (date('d-m-Y') == date('d-m-Y',strtotime($this->getCreatedAt()))) 
		{
			return date('H:i',strtotime($this->getCreatedAt()));
		}
		else
		{
			return date('D,d M y  H:i',strtotime($this->getCreatedAt()));
		}
		
	}
 } ?>