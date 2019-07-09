<?php

require_once  './models/models.php';

class NewsModel extends Model{

	public function __construct($host, $username, $password, $database)
	{
		parent::__construct($host,  $username, $password, $database);
		
	}


	public function allRecords(){
		$result = $this->mysqli->query("SELECT n.news_id, n.Data, n.Tytul, n.Tresc, n.obrazek, n.autorzyID, a.imie, a.nazwisko  FROM news n INNER JOIN autorzy a USING(autorzyID) ORDER BY data DESC");
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


	public function pageofrecords($pageNr)
	{
		$pageNr=$_GET['nr'];
		$recordsperpage = 5;
		$offset = ($pageNr-1)*$recordsperpage;


		$limit = $recordsperpage;
		
		//echo "numer strony: " .$pageNr. " limit: " . $limit . " offset: " . $offset; 
		//$result = $this->mysqli->query("SELECT n.news_id, n.Data, n.Tytul, n.Tresc, n.obrazek, n.autorzyID, a.imie, a.nazwisko  FROM news n INNER JOIN autorzy a USING(autorzyID) LIMIT $limit, $offset ORDER BY data DESC");

		$result = $this->mysqli->query("SELECT n.news_id, n.Data, n.Tytul, n.Tresc, n.obrazek, n.autorzyID, a.imie, a.nazwisko FROM news n INNER JOIN autorzy a USING(autorzyID) ORDER BY data DESC LIMIT $limit OFFSET $offset ");
		$data=NULL;
		while($row=$result->fetch_array())
		{
			$data[]=$row;
		}
			return $data;
	}
	
	public function addNews($row){
	//echo "addNews()<br>";
	//print_r($row);

	$orginal_name=$_FILES['file_upload']['name'];

	$array = explode('.jpg', $_FILES['file_upload']['name']);
	$actual_name=$array[0];
	$extension = "jpeg";

	if($_FILES['file_upload']['error'] > 0){
		die('Bład podczas wysyłania.');
	}
	
	if(!getimagesize($_FILES['file_upload']['tmp_name'])){
		die('Upewnij się, że wysyłasz obraz.');
	}
	
	// sprawdz rozszezenie
	if($_FILES['file_upload']['type'] != 'image/jpeg'){
		die('Nie wspierany format obrazu, wymagane rozszerzenie jpeg.');
	}
	
	// sprawdz rozmiar
	if($_FILES['file_upload']['size'] > 1000000){
		die('Obraz przekroczył maksymalny rozmiar 1MB.');
	}
	
	// sprwadz czy obraz istnieje
	if(file_exists('./images/uploads/' . $_FILES['file_upload']['name'])){
		$i=1;
		while(file_exists('./images/uploads/' . $_FILES['file_upload']['name']))
		{
			$name=(string)$actual_name . $i . "." . $extension;
			$_FILES['file_upload']['name']=$name;
			$i++;
			
		}
		//die('obraz już istnieje');
	}
	
	// wrzuc obraz
	if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], './images/uploads/' . $_FILES['file_upload']['name'])){
		die('Bład podczas wysyłania - sprawdź komentarz.');
	}
	$imageurl= './images/uploads/' . $_FILES['file_upload']['name'];

	$data = date("Y-m-d G:i:s");
	$tytul = $row['tytul'];
	$tresc = $row['tresc']; 
	$autorzyID = $row['autor']; 
	

	$query11= "INSERT INTO news(Data, Tytul, Tresc, obrazek, autorzyID) values ('$data', '$tytul', '$tresc', '$imageurl', '$autorzyID')";
	$this->mysqli->query($query11); 

	}
	public function CurrentNews(){
		$newsid = $_GET['id']; 
		$result = $this->mysqli->query("SELECT n.news_id, n.Data, n.Tytul, n.Tresc, n.obrazek, n.autorzyID, a.imie, a.nazwisko FROM news n INNER JOIN autorzy a USING(autorzyID) WHERE news_id='$newsid'");
		
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

	public function editNews($row){
		//echo "editNews()<br>";
		//print_r($row);
		//$data = date("Y-m-d G:i:s");
	$tytul = $row['tytul'];
	$tresc = $row['tresc']; 
	$autor = $row['autor']; 
	$id=$_SESSION['newsid'];
	

	if($_FILES['file_upload']['name']!=NULL)
	{

	$result = $this->mysqli->query("SELECT obrazek FROM news WHERE news_id = '$id'");

	$dataTable = NULL;
	while($row=mysqli_fetch_row($result))
	{	
		$fileA=$row;
	}

	$deletefile=$fileA[0];
	unlink($deletefile);

	$orginal_name=$_FILES['file_upload']['name'];
	
	$array = explode('.jpg', $_FILES['file_upload']['name']);
	$actual_name=$array[0];
	$extension = "jpeg";
	
	if($_FILES['file_upload']['error'] > 0){
		die('Bład podczas wysyłania.');
	}
			
		if(!getimagesize($_FILES['file_upload']['tmp_name'])){
		die('Upewnij się, że wysyłasz obraz.');
		}
			
	// sprawdz rozszezenie
	if($_FILES['file_upload']['type'] != 'image/jpeg'){
		die('Nie wspierany format obrazu, wymagane rozszerzenie jpeg.');
	}
			
	// sprawdz rozmiar
	if($_FILES['file_upload']['size'] > 1000000){
		die('Obraz przekroczył maksymalny rozmiar 1MB.');
	}
			
	// sprwadz czy obraz istnieje
	if(file_exists('./images/uploads/' . $_FILES['file_upload']['name'])){
		$i=1;
		while(file_exists('./images/uploads/' . $_FILES['file_upload']['name']))
		{
		$name=(string)$actual_name . $i . "." . $extension;
		$_FILES['file_upload']['name']=$name;
		$i++;
		
		}
		//die('obraz już istnieje');
	}
		
	// wrzuc obraz
	if(!move_uploaded_file($_FILES['file_upload']['tmp_name'], './images/uploads/' . $_FILES['file_upload']['name'])){
		die('Bład podczas wysyłania - sprawdź komentarz.');
	}
	$imageurl= './images/uploads/' . $_FILES['file_upload']['name'];

	if($autor!=NULL){
		$query11= "UPDATE news SET Tytul='$tytul', Tresc='$tresc', obrazek='$imageurl', autorzyID='$autor' WHERE news_id='$id' ";
		$this->mysqli->query($query11);
	}

	$query11= "UPDATE news SET Tytul='$tytul', Tresc='$tresc', obrazek='$imageurl' WHERE news_id='$id' ";
	$this->mysqli->query($query11);
	}

	if($autor!=NULL){
		$query11= "UPDATE news SET Tytul='$tytul', Tresc='$tresc', autorzyID='$autor' WHERE news_id='$id' ";
		$this->mysqli->query($query11);
	}
	$query11= "UPDATE news SET Tytul='$tytul', Tresc='$tresc' WHERE news_id='$id' ";
	$this->mysqli->query($query11);
	}

	public function editNewsView()
	{
			
		$id=$_GET['id'];
		$result = $this->mysqli->query("SELECT n.news_id, n.Tytul, n.Tresc, n.obrazek, a.autorzyid, a.imie, a.nazwisko FROM news n INNER JOIN autorzy a USING(autorzyID) WHERE news_id = '$id'");
		
		//echo "result: "; 
		//print_r($result); 
		//echo "<br>";
		$dataTable = NULL;
		while($row=mysqli_fetch_row($result))
		{	
			$dataTable1=$row;
			
		}

		$autorid=$dataTable1[4];
		$result2 = $this->mysqli->query("SELECT autorzyid, imie, nazwisko FROM autorzy WHERE autorzyID !='$autorid'");
		while($row=$result2->fetch_array())
		{	
			$dataTable2[]=$row;
			
		}
		$dataTable= array_merge($dataTable1, $dataTable2);
		//print_r($dataTable);
		return $dataTable;	
		
	}

	public function countNews()
	{
		$recordsperpage = 5;
		$result = $this->mysqli->query("SELECT count(*) FROM news");
		$dataTable = NULL;
		while($row=mysqli_fetch_row($result))
		{	
			$dataTable1=$row;
			
		}
		$dataTable= ceil($dataTable1[0]/$recordsperpage);
		return $dataTable;
	}

	public function authorList()
	{
		$result = $this->mysqli->query("SELECT * FROM autorzy");
		
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
	
}



?>