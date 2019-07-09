<?php

include ".//views/view.php";
include './/controllers/Controller.php';
include './/models/CommentModel.php';
include './/models/UsersModel.php';
include './/models/RateModel.php';
include './/controllers/Admin.php';

class CommentController
{
	

	public function addComment($dataTable)
	{
		$newsyID = $_SESSION['newsid'];
		$model = new CommentModel("localhost","root","","news");
		$model->addComment($dataTable);
		header('Location: index.php?c=Main&f=CurrentNewsView&id='. $newsyID);
		
    }
    
    public function ShowComment($dataTable)
	{
		$model= new CommentModel('localhost', 'root', '', 'news');
		$data=$model->ShowCommentAll();
		$view = new View();
		$view->load("commentView", $data);
		
	}

	public function Block()
	{
		$commentid=$_GET['id'];
		$model = new CommentModel("localhost","root","","news");
		$model->blockComment($commentid);
		$id=$_SESSION['newsid'];
		header ('Location: index.php?c=Main&f=CurrentNewsView&id=' . $id . ')');
		
	}

	public function unBlock()
	{
		$commentid=$_GET['id'];
		$model = new CommentModel("localhost","root","","news");
		$model->unblockComment($commentid);
		$id=$_SESSION['newsid'];
		header ('Location: index.php?c=Main&f=CurrentNewsView&id=' . $id . ')');
		
	}
	


}

	





?>