<?php
	$exec_start = microtime(true);
	session_start();
	
	require_once('settings.php');
	
	
	
	
	
	$exec_end = microtime(true);
	$exec = $exec_end - $exec_start;
	$Logger->perf('runTime',$exec);
?>