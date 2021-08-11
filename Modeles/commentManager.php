<?php 


/**
 * 
 */
class commentManager extends Requete
{
	
	function __construct()
	{
		Session::getInstanceSession();
	}

	public function setComment($type,$content,$commentedId)
	{
		$this->databaseConnect();
		date_default_timezone_set('Africa/Porto-Novo');
		return $this->insertObject('comments(autorId,type,elementId,content)',
								'(:autorId,:type,:elementId,:content)',
								['autorId'=>$_SESSION['id'],
								'type'=>$type,
								'elementId'=>$commentedId,
								'content'=>$content]);
	}
	
	
	public function setUpdateComment($class,$type,$content,$commentId)
	{
		$this->databaseConnect();
		return $this->updateObject($class,'content = :content WHERE type = "'.$type.'" AND id ='.$commentId,['content'=>$content]);
	}

	public function deleteComment($class,$type,$commentId)
	{
		$this->databaseConnect();
		return $this->delete($class,'type = "'.$type.'" AND id ='.$commentId);
	}
	public function setReplyComment($type,$content,$replyedId)
	{
		$this->databaseConnect();
		return $this->insertObject('reply_comments(autorId,type,commentId,content)',
								'(:autorId,:type,:commentId,:content)',
								['autorId'=>$_SESSION['id'],
								'type'=>$type,
								'commentId'=>$replyedId,
								'content'=>$content]);
	}

	public function getAllComment($type,$commentedId)
	{
		$this->databaseConnect();
		return $this->getAllJoinObject('comments.id,content,autorId,
				comments.createdAt,users.photo,users.pseudo','comments','LEFT JOIN users ON comments.autorId = users.id WHERE elementId ='.$commentedId.' AND type = "'.$type.'" ORDER BY id desc',
								'Comment');
	}

	public function getReplyComment($type,$replyedId)
	{
		$this->databaseConnect();
		
		return $this->getAllJoinObject('reply_comments.id,content,autorId,commentId,
				reply_comments.createdAt,users.photo,users.pseudo','reply_comments','LEFT JOIN users
				ON reply_comments.autorId = users.id WHERE commentId ='.$replyedId.' AND type = "'.$type.'" ORDER BY id desc',
				'ReplyComment');
	}

}
 ?>