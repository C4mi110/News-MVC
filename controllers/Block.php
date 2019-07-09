<?php
	
include './/controllers/Controller.php';
include './/models/newsModel.php';
include './/models/UsersModel.php';
include './/controllers/Admin.php';
		
	class Block extends Controller
	{	
		public $usersModel;

		public function __construct()
		{
				$this->usersModel = new UsersModel('localhost', 'root', '', 'news');
				$this->newsModel = new NewsModel('localhost','root','','news');
				parent::__construct();
		}
				
		public function startBan()
		{
			$dataTable['header']=$this->loadView('headerView', NULL, true);
			$dataTable['menu']=$this->loadView('adminView',NULL,true);
			$dataTable['content']=$this->loadView('banView',NULL,true);
			$dataTable['footer']=$this->loadView('footerView',NULL,true);
			$this->loadView('mainView', $dataTable);				
		}
		
		public function Ban($dataTable)
		{
			
			$login = $dataTable['login'];
			
			$loginInfo = $this->usersModel->banning($login);

			$dataTable['header']=$this->loadView('headerView', NULL, true);
			$dataTable['menu']=$this->loadView('adminView',NULL,true);
			$dataTable['content']=$this->loadView('banedView',NULL,true);
			$dataTable['footer']=$this->loadView('footerView',NULL,true);
			$this->loadView('mainView', $dataTable);
			
		}
	}
?>	