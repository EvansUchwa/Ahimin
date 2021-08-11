<?php 	

/**
 * 	
 */
class categorieManager extends Requete
{
	
	public function getAllProductCategorie()
	{
		$this->databaseConnect();
		return $this->getAllSimpleObject('product_categories','ORDER BY categorie','Categories');
	}

	public function getAllServiceCategorie()
	{
		$this->databaseConnect();
		return $this->getAllSimpleObject('service_categories','ORDER BY categorie','Categories');
	}
}

 ?>


 	