<?php 

/**
 * 
 */
class Domaine
{
	private $_id;
	private $_domaine;

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
	public function setDomaine($domaine)
	{
		if (is_string($domaine)) 
		{
			$this->_domaine = $domaine;
		}
	}

	// GETTER
	public function getId()
	{
		return $this->_id;
	}
	public function getDomaine()
	{
		return $this->_domaine;
	}
}

 ?>