<?php 


/**
 * 
 */
class searchManager extends Requete
{
	
	public function __construct()
	{
		Session::getInstanceSession();
		$this->databaseConnect();
	}

	public function getOneParamSearchResult($elementTypeSelect,$elementType,$param,$elementClass)
	{
		if ($elementType == 'produits') 
		{
			return $this->getAllJoinObject($elementTypeSelect,'produits',$param,$elementClass);
		}
		elseif($elementType == 'services')
		{
			return $this->getAllJoinObject($elementTypeSelect,'services',$param,$elementClass);
		}
		
	}


	public function getFilterResult($elementTypeSelect,$elementType,$param,$elementClass)
	{
		if ($elementType == 'produits') 
		{
			return $this->getAllJoinObject($elementTypeSelect,'produits',$param,$elementClass);
		}
		elseif($elementType == 'services')
		{
			return $this->getAllJoinObject($elementTypeSelect,'services',$param,$elementClass);
		}
	}
}

 ?>