<?php 

/**
 * 
 */
class Requete
{
	private static $_bdd;
	public static function databaseConnect()
	{
		self::$_bdd = new PDO('mysql:host=localhost;dbname=ahime;charset=utf8','root','');
		self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	}

	public function insertObject($table,$paramSql,$paramInsert)
	{
		try 
		{
			$sql = self::$_bdd->prepare('INSERT INTO '.$table.' VALUES '.$paramSql);
			$resultQuery = $sql->execute($paramInsert);

			return $resultQuery;
		} 
		catch (Exception $e) 
		{
			return $e->getMessage();
		}
	}

	public function updateObject($table,$paramSql,$paramInsert)
	{
		try 
		{
			$sql = self::$_bdd->prepare('UPDATE '.$table.' SET '.$paramSql);
			$resultQuery = $sql->execute($paramInsert);

			return $resultQuery;
		} 
		catch (Exception $e) 
		{
			return $e->getMessage();
		}
	}

	public function lastInsert()
	{
		try 
		{
			$sql = self::$_bdd->lastInsertId();
			return $sql;
		} 
		catch (Exception $e) 
		{
			return $e->getMessage();
		}
	}

	public static function countSelect($table,$sqlParam)
	{
		try 
		{
			$requete = self::$_bdd->prepare('SELECT * FROM '.$table.' WHERE '.$sqlParam);
			$requete->execute();
			$result = $requete->rowCount();

			return $result;
		} 
		catch (Exception $e) 
		{
			return  $e->getMessage();
		}
		
	}

	public static function delete($table,$sqlParam)
	{
		try 
		{
			$requete = self::$_bdd->prepare('DELETE FROM '.$table.' WHERE '.$sqlParam);
			$requete->execute();
			$result = $requete->rowCount();

			return $result;
		} 
		catch (Exception $e) 
		{
			return  $e->getMessage();
		}
		
	}


	public function getSimple($table,$sqlParam,$selected = null)
	{
		try 
		{
			$sql = self::$_bdd->prepare('SELECT * FROM '.$table.' WHERE '.$sqlParam);
			if ($selected != null) 
			{
				$sql = self::$_bdd->prepare('SELECT '.$selected.' FROM '.$table.' WHERE '.$sqlParam);
			}
			$sql->execute();
			$result = $sql->fetch();

			return $result;
		}
		 catch (Exception $e) 
		{
			 $e->getMessage();
		}
	}

	public function getSimpleAll($table,$sqlParam,$selected = null)
	{
		try 
		{
			$sql = self::$_bdd->prepare('SELECT * FROM '.$table.' WHERE '.$sqlParam);
			if ($selected != null) 
			{
				$sql = self::$_bdd->prepare('SELECT '.$selected.' FROM '.$table.' WHERE '.$sqlParam);
			}
			
			$sql->execute();
			$result = $sql->fetchAll();

			return $result;
		}
		 catch (Exception $e) 
		{
			 $e->getMessage();
		}
	}


	public function getSimpleObject($table,$param,$object)
	{
		try 
		{
			$objectData = '';

			$sql = self::$_bdd->prepare('SELECT * FROM '.$table.' WHERE '.$param);
			$sql->execute();

			if ($result = $sql->fetch()) 
			{
				$objectData = new $object($result);
				return $objectData;
			}
			else
			{
				throw new Exception('Une erreur est survenue pendant le recup des categorie');
			}
		}
		 catch (Exception $e) 
		{
			$e->getMessage();
		}
	}


	public function getOneJoinObject($select,$table,$param,$object)
	{
		try 
		{
			$objectData = '';

			$sql = self::$_bdd->prepare('SELECT '.$select.' FROM '.$table.' '.$param);
			$sql->execute();

			if ($result = $sql->fetch()) 
			{
				$objectData = new $object($result);
				return $objectData;
			}
			else
			{
				throw new Exception('Une erreur est survenue pendant le recup des categorie');
			}
		}
		 catch (Exception $e) 
		{
			$e->getMessage();
		}
	}


	
	public function getAllSimpleObject($table,$order,$object)
	{
		try 
		{
			$objectArray = [];

			$sql = self::$_bdd->prepare('SELECT * FROM '.$table.' '.$order);
			if ($sql->execute()) 
			{
				while ($data = $sql->fetch()) 
				{
					$objectArray[] = new $object($data);
				}

				return $objectArray;
			}
			else
			{
				throw new Exception('Une erreur est survenue pendant le recup des categorie');
			}
		}
		 catch (Exception $e) 
		{
			$e->getMessage();
		}
	}

	public function getAllJoinObject($select,$table,$order,$object)
	{
		try 
		{
			$objectArray = [];

			$sql = self::$_bdd->prepare('SELECT '.$select.' FROM '.$table.' '.$order);
			if ($sql->execute()) 
			{
				while ($data = $sql->fetch()) 
				{
					$objectArray[] = new $object($data);
				}

				return $objectArray;
			}
			else
			{
				throw new Exception('Une erreur est survenue pendant le recup des categorie');
			}
		}
		 catch (Exception $e) 
		{
			$e->getMessage();
		}
	}
	public function getAllParamObject($table,$sqlParam,$object)
	{
		try 
		{
			$objectArray = [];

			$sql = self::$_bdd->prepare('SELECT * FROM '.$table.' '.$sqlParam);
			$sql->execute();
				while ($data = $sql->fetch()) 
				{
					$objectArray[] = new $object($data);
				}

				return $objectArray;
		}
		 catch (Exception $e) 
		{
			 $e->getMessage();
		}
	}
}

 ?>