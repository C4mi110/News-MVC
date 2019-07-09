<?php  

class Model{
	public $mysqli;
	public $host;
	public $database;
	public $username;
	public $password;

	public function __construct($host,  $username, $password, $database){
		$this->mysqli = new mysqli($host, $username, $password, $database);
		//echo "Połączono z bazą danych";

	}

}






?>