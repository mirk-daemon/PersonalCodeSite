<?php

function class_autoloader($class)
{
	$local = app_root.'src/' . strtolower($class) . '.class.php';

	if(dev)
		echo "\n<!--".$local."-->\n";

	if( file_exists($local) )
		require_once($local);
	else if(dev)
		echo "\n<!-- Failed to load $class -->\n";
}

spl_autoload_register('class_autoloader', true);
?>
