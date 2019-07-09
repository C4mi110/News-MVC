<?php
	Class Controller
	{
		public function __construct()
		{
				//echo "Controller::construct()<br>";
		}
		
		public function loadView($viewName, $dataTable, $returnHTML=false)
		{
			if($returnHTML==true) ob_start();
			include ".\\views\\$viewName.php";
			$content=NULL;
			if($returnHTML==true)
			{
				$content = ob_get_contents();
				ob_end_clean();
				return $content;
			}
			return NULL;
		}
	}
?>