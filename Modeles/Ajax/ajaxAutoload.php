<?php 

spl_autoload_register('ajax_autoloader');

function ajax_autoloader($class)
{
	if (file_exists($class.'.php')) 
	{
		require_once($class.'.php');
	}
	elseif(file_exists('../'.$class.'.php'))
	{
		require_once('../'.$class.'.php');
	}
	else
	{
		require_once('../../'.$class.'.php');
	}
	
}


 ?>