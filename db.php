<?php
	class db {
		private $_db;
		public static $mysqli = null;
		const HOST = 'localhost';
		const USER = 'root';
		const PASSWORD = '';
		const BASE = 'base';
		
		private function __construct() {
			$ob_mysqli = new mysqli(self::HOST, self::USER, self::PASSWORD, self::BASE);
			if(!$ob_mysqli->conect_error) {
				$this->_db = $ob_mysqli;
				$this->_db->query("SET NAMES 'utf8'");
				return $this->_db;
			} else {
				exit("No connect to server!");
			}
		}
		
		public static function getObject() {
			if(self::$mysqli==null) { 
				self::$mysqli = new db();
			}
			return self::$mysqli;
		}
		public function query($sql) {
			return $this->_db->query($sql);
		}
		
		public function assoc($result) {
			return $result->fetch_assoc();
		}
	}
?>