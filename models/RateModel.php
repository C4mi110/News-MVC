<?php

require_once  './models/models.php';

class RateModel extends Model{

	public function __construct($host, $user, $password, $database){
		parent::__construct($host, $user, $password, $database);
	}
	
	public function rateThis(){

	$rate=$_POST['ocena'];
	$newsyID = $_SESSION['newsid'];
	$uzytkownicyID = $_SESSION['userid'];
	$data = date("Y-m-d G:i:s");

	$result = $this->mysqli->query("SELECT count(ocenyID) FROM oceny WHERE uzytkownicyID='$uzytkownicyID' AND newsyID='$newsyID'");
	while($row=mysqli_fetch_row($result))
	{	
		$dataTable=$row;
	}
	print_r($dataTable);
	if($dataTable[0]==0) 
	{
		$query= "INSERT INTO oceny (data, uzytkownicyID, newsyID, ocena) values ('$data', '$uzytkownicyID', '$newsyID', '$rate') ";
		$this->mysqli->query($query); 
	}else{
		$query= "UPDATE oceny SET ocena='$rate', data='$data' WHERE uzytkownicyID='$uzytkownicyID' ";
		$this->mysqli->query($query); 
	}
	
	}

	public function rateAvg(){
		$newsyID = $_SESSION['newsid'];
		$result = $this->mysqli->query("SELECT sum(ocena)/count(ocenyID), count(ocenyID) FROM oceny WHERE newsyid='$newsyID'");
		//echo "result: "; 
		//print_r($result); 
		//echo "<br>";
		$dataTable = NULL;
		while($row=mysqli_fetch_row($result))
		{	
			$dataTable=$row;
			
		}
		return $dataTable;
	}
	
}



?>