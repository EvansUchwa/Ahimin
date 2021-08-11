<?php 

/**
 * 
 */
class Categories
{
	private $_id;
	private $_categorie;
	private $_icon;

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
	public function setCategorie($categorie)
	{
		if (is_string($categorie)) 
		{
			$this->_categorie = $categorie;
		}
	}
	public function setIcon($icon)
	{
		if (is_string($icon)) 
		{
			$this->_icon = $icon;
		}
	}

	// GETTER
	public function getId()
	{
		return $this->_id;
	}
	public function getCategorie()
	{
		return $this->_categorie;
	}
	public function getIcon()
	{
		return $this->_icon;
	}
}

 ?>