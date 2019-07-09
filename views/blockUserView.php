<div class="container">          
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Login</th>
        <th>Operacja</th>
      </tr>
    </thead>
    <tbody>

	<?php
		//print_r($dataTable);
		for($i = 0; $i<count($dataTable); $i++)
		{
			echo "<tr>";
			echo "<th>" . $dataTable[$i][1] . "</th>";
      if($dataTable[$i][7]==0) echo "<th> <a href=index.php?c=Users&f=Block&userid=" . $dataTable[$i][0] . "><span class='glyphicon glyphicon-remove'></span> Zablokuj </a></th>";
      if($dataTable[$i][7]==1) echo "<th> <a href=index.php?c=Users&f=unBlock&userid=" . $dataTable[$i][0] . "><span class='glyphicon glyphicon-ok'></span> Odblokuj </a></th>";
			echo "</tr>";
		}	
	?>

    </tbody>
  </table>
</div>
