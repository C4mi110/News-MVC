<?php

require_once  './models/models.php';

class CommentModel extends Model{

	public function __construct($host, $user, $password, $database){
		parent::__construct($host, $user, $password, $database);
	}
	
	public function addComment($row){
	echo "addComment()<br>";
	print_r($row);
	echo "sesja<br>";
	print_r($_SESSION);

	$newsyID = $_SESSION['newsid'];
	$uzytkownicyID = $_SESSION['userid'];
	$data = date("Y-m-d G:i:s");
	$tresc = $row['commenttxt'];
	
	$query= "INSERT INTO komentarze(newsyID, uzytkownicyID, data, tresc, zablokowany) values ('$newsyID', '$uzytkownicyID', '$data', '$tresc', '0')";
	$this->mysqli->query($query); 
	}
	
	public function ShowCommentAll(){
		$newsyID = $_SESSION['newsid'];
		$result = $this->mysqli->query("SELECT k.komentarzeID, k.newsyID, k.uzytkownicyID, k.data, k.tresc, k.zablokowany, u.login FROM komentarze k INNER JOIN uzytkownicy u USING(uzytkownicyID) WHERE newsyID='$newsyID' ORDER BY data DESC");
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

	public function blockComment($commentid)
	{
		$commentid=$_GET['id'];
		$query11= "UPDATE komentarze SET zablokowany=1 WHERE komentarzeID='$commentid' ";
		print_r($query11);
		$this->mysqli->query($query11);	

	}

	public function unblockComment($commentid)
	{
		$commentid=$_GET['id'];
		$query11= "UPDATE komentarze SET zablokowany=0 WHERE komentarzeID='$commentid' ";
		print_r($query11);
		$this->mysqli->query($query11);	

	}
	
}



?>