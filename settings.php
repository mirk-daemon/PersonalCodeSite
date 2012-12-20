<?php

define('env', trim(strtolower(file_get_contents('env'))) );

if(env == 'dev')
	define('dev',1);
else
	define('dev',0);

if( isset($_GET['ajax']) )
	if($_GET['ajax'] === true)
		define('ajax',1);
	else
		define('ajax',0);
else
	define('ajax',0);

if( !isset($_GET['action']) )
	$_GET['action'] = 'Home';

require_once('autoload.php');

require_once('config.'.env.'.php');

$Logger = new Logger();
$Mysql = new Mysql($mysqlUsername, $mysqlPassword, $hostname, $database, $Logger);


?>
