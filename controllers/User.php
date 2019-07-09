<?php
	require_once ".\\controllers\Controller.php";
	require_once ".\\models\NewsModel.php";
	require_once ".//views/view.php";

class User extends Controller{
	public $newsModel;
	
	public function __construct()
	{
		parent::__construct();
		$this->newsModel = new NewsModel('localhost','root','','news');
	}
	public function main($dataTable){
		
		if(isset($_SESSION['login']))
			{
				if($_SESSION['login']==true)
				{
					if($_SESSION['group']=='Uzytkownik')
					{
						$dataTable['header']=$this->loadView('headerView', $dataTable, true);
						$dataTable['menu']=$this->loadView('userView',$dataTable,true);
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
					else{
						echo "<h1>Brak uprawnien</h1>";
						die();
					}
				}else echo "<h1>Nie jesteś zalogowany</h1>";
			}else echo "<h1>Nie jesteś zalogowany</h1>";
		}
	}

?>