<?php



include ".//views/view.php";
include './/controllers/Controller.php';
include './/models/NewsModel.php';
include './/models/UsersModel.php';
include './/controllers/Admin.php';




class NewsController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getNews($dataTable)
	{
		
		$news = new NewsModel('localhost', 'root', '', 'news');
		$dataTable['content']=$this->loadView('form',$dataTable=$news->authorList(),true);
		$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
		$dataTable['menu']=$this->loadView('adminView',$dataTable,true);
		$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
		$this->loadView('mainView', $dataTable);
				
	}

	public function editNews($dataTable)
	{
		$id = $_GET['id'];
		$_SESSION['newsid']=$id;
		$news = new NewsModel('localhost', 'root', '', 'news');
		$dataTable['content']=$this->loadView('editNewsView',$dataTable=$news->editNewsView(),true);
		$dataTable['header'] = $this->loadView('headerView', $dataTable, TRUE);
		$dataTable['menu']=$this->loadView('homeView',$dataTable,true);
		//$dataTable['content']=$this->loadView('editNewsView',$dataTable,true);
		$dataTable['footer']=$this->loadView('footerView',$dataTable,true);
		$this->loadView('mainView', $dataTable);
				
	}


	public function addNews($dataTable)
	{
		
		$model = new NewsModel("localhost","root","","news");
		$model->addNews($dataTable);
		header('Location: index.php?c=Admin&f=main&nr=1');
		
	}
	
	public function editNewsSql($dataTable)
	{
		$model = new NewsModel("localhost","root","","news");
		$model->editNews($dataTable);
		header('Location: index.php?c=Admin&f=main&nr=1');

		

	

	}

	

}

	





?>