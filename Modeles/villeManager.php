<?php 	

class villeManager extends Requete
{
	
	public function getCitys()
	{
		$this->databaseConnect();
		
		return	$this->getAllSimpleObject('villes','ville ORDER BY ville','Villes');
	}
}

 ?>