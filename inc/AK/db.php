<?php
	namespace AK;
	use PDO;
	
	class Db{
		
		private $settings = array();
		private $bConnected;
		private $pdo;
		
		public function __construct(){
			$this->settings = parse_ini_file("settings.ini");
			
			$this->log = new \Katzgrau\KLogger\Logger(__DIR__.'/'.$this->settings['logdir']);
			$this->_connect();
			
		}
		
		private function _connect(){
			
			$dsn = 'mysql:dbname='.$this->settings["dbname"].';host='.$this->settings["host"].'';
			try 
			{
				$this->pdo = new PDO($dsn, $this->settings["user"], $this->settings["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$this->bConnected = true;
			}
			catch (PDOException $e) 
			{
				
				echo $this->ExceptionLog($e->getMessage());
				die();
			}
		}
		
		private function ExceptionLog($message , $sql = "")
		{
			$exception  = 'Unhandled Exception. <br />';
			$exception .= $message;
			$exception .= "<br /> You can find the error back in the log.";
			if(!empty($sql)) {
				$message .= "\r\nRaw SQL : "  . $sql;
			}
			# Write into log
			$this->log->error($message);
			return $exception;
		}	
		
		
		public function get_records($filters = array()){
			// @todo: Populate filters. 
			$query = "(select 'table1' as tablename,t1.* from table1 t1 ) UNION (select 'table2' as tablename, t2.* from table2 t2)";
			
			$sQuery = $this->pdo->prepare($query);
			$sQuery->execute();
			$ret = $sQuery->fetchAll(PDO::FETCH_ASSOC);
			
			return $ret;
		}
		
		
		
		
	}