<?php

if(dev)
	echo '<!-- config loading... -->';

define('app_root', '/var/www/mirkdaemon.com/'); # always end this with a slash, always first as the autoloader depends on it.

if(dev)
	echo '<!-- config loaded -->';

$mysqlUsername = '';
$mysqlPassword = '';
$hostname = '';
$database = 'PersonalCodeSite';

?>
