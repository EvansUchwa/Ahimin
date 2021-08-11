<?php 

/**
 * 
 */
class domaineManager extends Requete
{
	
	public function getDomaineUrl()
	{
		$this->databaseConnect();

		return $this->getSimpleObject('domaine','id = 1','Domaine');
	}
}

 ?>