<?php 


/**
  * 
  */
 class ReplyComment extends Comment
 {
 	
 	private $_id;
	private $_autorId;
	private $_commentId;
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
	public function setCommentId($commentId)
	{
		if (is_numeric($commentId)) 
		{
			$this->_commentId = $commentId;
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
	public function getCommentId()
	{
		return $this->_commentId;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function getCreatedAt()
	{
		return $this->_createdAt;
	}
 } ?>