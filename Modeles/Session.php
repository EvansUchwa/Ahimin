<?php 

/**
 * 
 */
class Session
{
	static $_currentSession;
	function __construct()
	{
		session_start();
	}

	static function getInstanceSession()
	{
		if (!self::$_currentSession) 
		{
			self::$_currentSession = new Session;
		}

		return self::$_currentSession;
	}
}

 ?>