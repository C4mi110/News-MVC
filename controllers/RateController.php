<?php

include ".//views/view.php";
include './/controllers/Controller.php';
include './/models/UsersModel.php';
include './/models/RateModel.php';
include './/controllers/Admin.php';

class RateController
{
	

	public function Rate()
	{
		$model = new RateModel("localhost","root","","news");
        $model->rateThis();
        $newsyID=$_SESSION['newsid'];
		header('Location: index.php?c=Main&f=CurrentNewsView&id='. $newsyID);
		
    }

    public function rateAvg($dataTable)
	{
		$id = $_GET['id'];
		$model= new RateModel('localhost', 'root', '', 'news');
		$data=$model->rateAvg();
		$view = new View();
		$view->load("rateAvgView", $data);
		
	}
    

}

	





?>