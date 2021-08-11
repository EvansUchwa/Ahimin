<?php 

/**
 * 
 */
class FormValidator extends Requete
{

	private $_dataPostedArray;
	private $_errorArray = [];

	public function __construct($dataPostedArray)
	{
		$this->_dataPostedArray = $dataPostedArray;
	}

	public function getData($dataField)
	{
		if (isset($this->_dataPostedArray[$dataField])) 
		{
			return $this->isStringed($this->_dataPostedArray[$dataField]);
		}
	}


	public function existed($field,$table,$column,$error_msg,$updated = null)
	{
		$oldInfo = "";
		$this->databaseConnect();

		$info = $this->getSimple($table,''.$column.' = "'.$this->getData($field).'"');
		if($info == true)
		{
			if($updated != null)
			{
				Session::getInstanceSession();
				$oldInfo = $this->getSimple($table,'id = "'.$_SESSION['id'].'"');
				if ($info[$column] == $oldInfo[$column]) 
				{
					// $this->_errorArray[$field] = $column.' non modifier';
				}
				else
				{
					$this->_errorArray[$field] = $error_msg;
				}
			}
			else
			{
				$this->_errorArray[$field] = $error_msg;
			}
				
		}
		
	}

	public function notExisted($field,$table,$column,$error_msg)
	{
		$this->databaseConnect();
		if($this->getSimple($table,''.$column.' = "'.$this->getData($field).'"') == false)
		{
			$this->_errorArray[$field] = $error_msg;
		}
	}

	public function notExistedOnDom($field,array $array,$error_msg)
	{
		if(!in_array($this->getData($field), $array))
		{
			$this->_errorArray[$field] = $error_msg;
		}
	}

	public function isAlphaNumeric($field,$error_msg)
	{
		if (!preg_match('/^[a-zA-Z0-9]+| $/', $this->getData($field))) 
		{
			$this->_errorArray[$field] = $error_msg;
		}
		
	}

	public function isPhoneNumber($countryIndice,$field,$error_msg)
	{
		if (!preg_match('%\+'.$countryIndice.'([0-9]){8}+%', $this->getData($field))) 
		{
			$this->_errorArray[$field] = $error_msg;
		}
		
	}

	public function isHour($field,$error_msg,$fieldErr)
	{
		if ($this->isLenghtValid($field,5,5,$fieldErr) != false) 
		{
			if (!preg_match('%([0-9]){2}:([0-9]){2}%', $this->getData($field))) 
			{
				$this->_errorArray[$field] = $error_msg;
			}
		}
		else
		{
			$this->isLenghtValid($field,5,5,$fieldErr);
		}
		
	}

	public function isMail($field,$error_msg)
	{
		if (!filter_var($this->getData($field),FILTER_VALIDATE_EMAIL)) 
		{
			$this->_errorArray[$field] = $error_msg;
		}
	}

	public function isLenghtValid($field,$min,$max,$fieldName)
	{
		if (strlen($this->getData($field)) > $max) 
		{
			$this->_errorArray[$field] = 'Format '.$fieldName." incorrect(maximum ".$max." caractères)";
			return false;
		}
		elseif (strlen($this->getData($field)) < $min) 
		{
			$this->_errorArray[$field] = 'Format '.$fieldName." incorrect(minimum ".$min." caractères)";
			return false;
		}
	}

	public function isPasswordConfirm($field,$error)
	{
		if ($this->getData($field) != $this->getData($field.'_confirm')) 
		{
			$this->_errorArray[$field] = "Les mot de passe ne correspondent pas";
		}
	}

	public function isfielDataExist($field)
	{
		if (!empty($this->getData($field))) 
		{
			return true;
		}
	}

	public function isStringed($word)
	{
		$isStringed = addslashes($word);
		$isStringed = trim($isStringed);
		$isStringed = htmlspecialchars($isStringed);
		
		return $isStringed;
	}

	public function isValidate()
	{
		if(empty($this->_errorArray))
		{
			return true;
		}
	}

	public function getError()
	{
		return $this->_errorArray;
	}
}


 ?>