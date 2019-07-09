<?php

require_once  './models/models.php';

class UsersModel extends Model{
	public function __construct($host, $user, $password, $database){
		parent::__construct($host, $user, $password, $database);
	}

	public function login($login, $password)
	{
		$query = "Select * FROM uzytkownicy u INNER JOIN grupy g ON (u.grupyID=g.grupyID) WHERE login = '$login' AND haslo =  sha1('$password')";
		$resul = NULL;
		$row = NULL;
		$result = $this->mysqli->query($query);
		if($result->num_rows==1){
			$row = $result->fetch_array();
		}
		return $row;	
	}

	public function register($login, $haslo, $plec, $dataUr, $wojewodztwo)
	{
		$query = "INSERT INTO uzytkownicy (login, haslo, grupyID, plec, dataUr, wojewodztwo)
		VALUES ('$login', sha1('$haslo'), '2', '$plec', '$dataUr', '$wojewodztwo')";
		$resul = NULL;
		$this->mysqli->query($query);

	}

	public function startBlockAll()
	{
		$id=$_SESSION['userid'];
		$result = $this->mysqli->query("SELECT * FROM uzytkownicy WHERE uzytkownicyID !='$id' ORDER BY uzytkownicyID DESC");
		//echo "result: "; 
		//print_r($result); 
		//echo "<br>";
		$dataTable = NULL;
		while($row=$result->fetch_array())
		{	
			$dataTable[]=$row;
			
		}
		return $dataTable;
	}

	public function blockUser()
	{
		$userid=$_GET['userid'];
		$query= "UPDATE uzytkownicy SET zablokowany=1 WHERE uzytkownicyID='$userid' ";
		//print_r($query);
		$this->mysqli->query($query);	
	}
	public function unblockUser()
	{
		$userid=$_GET['userid'];
		$query= "UPDATE uzytkownicy SET zablokowany=0 WHERE uzytkownicyID='$userid' ";
		//print_r($query);
		$this->mysqli->query($query);	
	}
}

?>