<?php 

/**
 * 
 */
class Villes
{
	private $_id;
	private $_ville;
	// private $_icon;

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
	public function setVille($ville)
	{
		if (is_string($ville)) 
		{
			$this->_ville = $ville;
		}
	}
	public function set()
	{
		
	}

	// GETTER
	public function getId()
	{
		return $this->_id;
	}
	public function getVille()
	{
		return $this->_ville;
	}
	public function get()
	{
		
	}
}

 ?>