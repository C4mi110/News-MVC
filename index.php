<!DOCTYPE html>
<html lang="pl-PL">
<head>
<title>News System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php 

	session_start();

	error_reporting(0);
	if($_GET['c']==NULL) 
	{
		$_GET['c']="Main";
		$_GET['f']="start";
		$_GET['nr']="1";
	}
	error_reporting(1);
	//$_SESSION['group']="anonim";
	
	//echo "\$_POST: "; print_r($_POST); echo "<br>";
	//echo "\$_GET: "; print_r($_GET); echo "<br>";
	//echo "\$_REQUEST: "; print_r($_REQUEST); echo "<br>";

	//print_r($_GET);
	$controllerClassName = $_GET['c']; 
	$functionName = $_GET['f']; 
	//$parameters = array_slice($_GET, 2, 2);
	//echo "controllerClassName=$controllerClassName functionName=$functionName";
	unset($_REQUEST['c']);
	unset($_REQUEST['f']);
	$parametersTable=$_REQUEST;

	//echo "controller: ". $controllerClassName . "<br>";
	//echo "function: ". $functionName . "<br>";
	//echo "parametersTable: "; print_r($parametersTable); echo "<br>";

	include ".\\controllers\\" . $controllerClassName . ".php"; 
	//echo "<br>";

	$controller = new $controllerClassName();
    $controller->$functionName($parametersTable);
        
	$tab = $_GET = array();

?>
</head>
<body>
	
</body>
</html>