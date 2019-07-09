<?php

include './/controllers/Controller.php';
include './/models/newsModel.php';
include './/models/UsersModel.php';
include './/controllers/Admin.php';
require_once ".//views/view.php";


class Users extends Controller{
	public $usersModel;

	public function __construct(){
		$this->usersModel = new UsersModel('localhost', 'root', '', 'news');
		$this->newsModel = new NewsModel('localhost','root','','news');
		parent::__construct();
	}


	public function startlogin($dataTable){
		
		if(empty($_SESSION['login'])){
			$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
			$dataTable['menu']=$this->loadView('menuView',$dataTable,true);
			$dataTable['content']=$this->loadView('loginview',$dataTable,true);
			$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
			$this->loadView('mainView', $dataTable);
		}
	}
	public function startregister($dataTable){
			$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
			$dataTable['menu']=$this->loadView('menuView',$dataTable,true);
			$dataTable['content']=$this->loadView('registerView',$dataTable,true);
			$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
			$this->loadView('mainView', $dataTable);
	}
	public function login($dataTable){
	
		$login = $dataTable['login'];
		$password = $dataTable['password'];

			$loginInfo = $this->usersModel->login($login, $password);
			
			if($loginInfo!=NULL){
				$_SESSION['zablokowany'] = $loginInfo['zablokowany'];
				if($_SESSION['zablokowany'] == 0){
				
				$_SESSION['zalogowany']= TRUE;
				$_SESSION['group']=$loginInfo['nazwa'];
				$_SESSION['login']=$loginInfo['login'];
				$_SESSION['userid']=$loginInfo['uzytkownicyID'];
				

				
				if($_SESSION['group'] == 'Administrator'){
					
					header("Location: index.php?c=Admin&f=main&nr=1");
	
				}
				elseif ($_SESSION['group'] == 'Uzytkownik'){
					header("Location: index.php?c=User&f=main&nr=1");

				}
				}else{
					$dataTable['blad']="Bląd: Zostałeś zablokowany";
					$dataTable['header']=$this->loadView('headerView', NULL, true);
					$dataTable['menu']=$this->loadView('menuView',NULL,true);
					$dataTable['content']=$this->loadView('errorView',$dataTable,true);
					$dataTable['footer']=$this->loadView('footerView',NULL,true);
					$this->loadView('mainView', $dataTable);
				}

			}else{
				$dataTable['blad']="Bląd: nie poprawny login/hasło";
				$dataTable['header']=$this->loadView('headerView', NULL, true);
				$dataTable['menu']=$this->loadView('menuView',NULL,true);
				$dataTable['content']=$this->loadView('errorView',$dataTable,true);
				$dataTable['footer']=$this->loadView('footerView',NULL,true);
				$this->loadView('mainView', $dataTable);
			}


		
		}
	public function register($dataTable){
		$login = $dataTable['login'];
		$password = $dataTable['password'];
		$plec = $dataTable['plec'];
		$data = $dataTable['dataUr'];
		$woj = $dataTable['wojewodztwo'];


		$loginInfo = $this->usersModel->register($login, $password, $plec, $data, $woj);
		//print_r($loginInfo);
		
		$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
		$dataTable['menu']=$this->loadView('menuView',$dataTable,true);
		$dataTable['content']=$this->loadView('loginview',$dataTable,true);
		$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
		$this->loadView('mainView', $dataTable);



	}

	public function startBlock($dataTable)
	{
		$dataTable['header']=$this->loadView('headerView', $dataTable, true);
		$dataTable['menu']=$this->loadView('adminView',$dataTable,true);
		$model = new UsersModel('localhost', 'root', '', 'news');
		$dataTable['content']=$this->loadView('blockUserView',$model->startBlockAll(),true);
		$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
		$this->loadView('mainView',$dataTable);
	}

	public function Block($userid)
	{
		$userid=$_GET['userid'];
		$model= new UsersModel('localhost', 'root', '', 'news');
		$data=$model->blockUser();
		header("Location: index.php?c=Users&f=startBlock");
	}

	public function unBlock($userid)
	{
		$userid=$_GET['userid'];
		$model= new UsersModel('localhost', 'root', '', 'news');
		$data=$model->unblockUser();
		header("Location: index.php?c=Users&f=startBlock");
	}

}




?>