<?php

	include ".//controllers//Controller.php";
	include ".//models//NewsModel.php";
	include ".//models//CommentModel.php";
	include ".//models//UsersModel.php";
	include ".//models//RateModel.php";
	include ".//views/view.php";
	
	class Main extends Controller
	{
		public $newsModel;
		
		public function __construct()
		{
			parent::__construct();
			$this->newsModel = new NewsModel('localhost','root','','news');
		}
		
		public function start($dataTable)
		{	
			if(empty($_SESSION['login'])){
			$dataTable['header']=$this->loadView('headerView', $dataTable, true);
			$dataTable['menu']=$this->loadView('menuView',$dataTable,true);
			$news = new NewsModel('localhost', 'root', '', 'news');
			$pageNr=$_GET['nr'];
			$dataTable['content']=$this->loadView('newsView',$this->newsModel->pageofrecords($pageNr),true);
			$dataTable['footer']=NULL;
			$this->loadView('mainView',$dataTable);

			$data=$news->countNews();
			$view = new View();
			$view->load("pagination", $data);

			$dataTable['header']=NULL;
			$dataTable['menu']=NULL;
			$dataTable['content']=NULL;
			$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
			$this->loadView('mainView',$dataTable);
			
			}

		}
		public function endsession($dataTable)
		{
			session_destroy();
			session_start();
			

			header('Location: index.php?c=main&f=start&nr=1');
		}
		public function CurrentNewsView($dataTable){
			$id = $_GET['id'];
			$_SESSION['newsid']=$id;
			$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
			$dataTable['menu']=$this->loadView('homeView',$dataTable,true);
			$news = new NewsModel('localhost', 'root', '', 'news');
			$dataTable['content']=$this->loadView('CurrentNewsView',$this->newsModel->CurrentNews(),true);
			$dataTable['footer']=NULL;
			$this->loadView('mainView', $dataTable);

			if(!empty($_SESSION['login'])){
				echo "<br>";
				$view = new View();
				$view->load('rateView');
			}

			$model= new RateModel('localhost', 'root', '', 'news');
			$data=$model->rateAvg();
			$view = new View();
			$view->load("rateAvgView", $data);
			echo "<br>";

			if(!empty($_SESSION['login'])){
				$view = new View();
				$view->load('commentAdd');
			}

			$comment = new CommentModel('localhost', 'root', '', 'news');
			$data=$comment->ShowCommentAll();
			$view = new View();
			$view->load("commentView", $data);

			$dataTable['header']=NULL;
			$dataTable['menu']=NULL;
			$dataTable['content']=NULL;
			$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
			$this->loadView('mainView', $dataTable);

		}
	}
?>