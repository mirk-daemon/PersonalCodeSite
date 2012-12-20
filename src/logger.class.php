<?php

	/**
	 * Dummy class for logging, needs to be replaced with the real thing when decided upon. For now, echos html comments.
	 * Generates a probably unique identifier to identify the script execution. Used to track individual script executions in an aggregator.
	 */
	class Logger
	{
		private $id;
		
		function __construct()
		{
			$this->id = uniqid('log:',true);
		}
		
		function perf($measurement, $value)
		{
			echo "\n\n<!-- [".$this->id."]:[$measurement=$value] -->\n\n";
		}
		
		/**
		 * General information tracking
		 */
		function log($text)
		{
			echo "\n\n<!-- [".$this->id."]:$text -->\n\n"; 
		}
		
		/**
		 * Should be none of these.
		 */
		function error($text)
		{
			echo "\n\n<!-- [".$this->id."]:$text -->\n\n";
		}
		
		/**
		 * Kills the script.
		 */
		function fatal($text)
		{
			echo "\n\n<!-- [".$this->id."]:$text -->\n\n";
			die(-1);
		}
	}

?>