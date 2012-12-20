<?php

	/**
	 * MySQL Connector Class - It connects if and only if the Execute command is invoked.
	 */
	class MySQL
	{
		private $dbHandler;
		private $Logger;
		private $username;
		private $password;
		private $hostname;
		private $database;
		private $connected;
		
		/**
		 * Sets the private variables for when the connection is actually triggered. It can trigger the connection if $force_connect is set to true.
		 * 
		 * @param string $username Username for the MySQL database
		 * @param string $password Password for the MySQL database
		 * @param string $hostname Hostname for the MySQL database
		 * @param string $database Database for the MySQL database
		 * @param string $logger Logger class instance for managing the logging.
		 * @param bool $force_connect Defaults to false. If set to true, forces the connection to the database at the start.
		 *  
		 */
		public function __construct($username, $password, $hostname, $database, $Logger, $force_connect = false)
		{
			$this->username = $username;
			$this->password = $password;
			$this->hostname = $hostname;
			$this->database = $database;
			
			$this->Logger = $Logger;
			
			$this->connected = false;
			
			if($force_connect)
				$this->connect();
		}
		
		/**
		 * Private function to connect to MySQL whenever if it is invoked, but only if $this->connected is false.
		 */
		private function connect()
		{
			if(!$this->connected)
			{
				try
				{
					$this->connected = true; 
					$this->dbHandler = new PDO("mysql:host=".$this->hostname.";dbname=".$this->database, $this->username, $this->password);
						
					if(dev)
						$this->dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);						
				}
				catch(PDOException $e)
				{
					$this->connected = false;
					$this->Logger->fatal('PDO Connection Failed: '.$e->getMessage() );
				}
				
			}
		}
		
		/**
		 * Execute a SQL instruction at the MySQL server.
		 * 
		 * @todo Add a $this->Logger->perf() call that measures the run time of all queries / aggregate time spent in queries, etc. Measure everything external to the script.
		 * 
		 * @param string $sql The SQL string to execute.
		 * @param string $preparedArray Optional array to be used for replacing the prepared tokens.
		 * @param int $fetchMode Do not use unless you need to break the coding standard for some bizarre reason. Changes the type and/or keys of object returned.
		 * 
		 * @return bool || array It returns FALSE on failure, TRUE on success (with no data to return), and an array on successful SELECT/SHOW SQL statements. Test carefully.
		 */
		 
		 public function execute($sql, $preparedArray = null, $fetchMode=PDO::FETCH_ASSOC)
		 {
		 	$this->connect();
			
		 	try
		 	{
		 		$statement = $this->dbHandler->prepare($sql);
				$error = $this->dbHandler->errorInfo();
				$this->Logger->log("[Prepare]\n $sql \n\n SQL Error State: ".var_export($error, true)."\n");
				
				if($preparedArray == null)
					$statement->execute();
				else
					$statement->execute($preparedArray);
				
				$error = $this->dbh->errorInfo();
				$this->Logger->log("[Execute]\n".stripslashes(var_export($preparedArray, true))." \n\n \n");
				
				if(strpos(strtoupper($sql), 'SELECT') === false && strpos(strtoupper($sql), 'SHOW') === false)
					return true;
				else
					return $statement->fetchAll($fetchMode);
		 	}
			catch(PDOException $e)
			{
				$this->Logger->error( 'PDO Error: '.$e->getMessage() );
				return false;
			}
		 }
		 
	}

?>