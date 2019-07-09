<?php 

class View
{
	public function load($viewName, $data=NULL)
	{
		include ".\\views\\$viewName" . ".php";
		
	}
}
	


?>