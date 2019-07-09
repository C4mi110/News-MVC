<div class="container">
<ul>
	<?php
		for($i = 0; $i<count($dataTable); $i++)
		{
		echo "<li class='newsview'>";
		echo "<a href='index.php?c=Main&f=CurrentNewsView&id=" . $dataTable[$i][0] . "'>";

		echo "<div class='photo'>";
		echo "<img src='" .$dataTable[$i][4] ."' class='img-responsive' alt='News Photo'>";
		echo "</div>";

		echo "<div class='intro'>";
			echo "<div class='date'>";
				echo "<p class='small'>" . $dataTable[$i][1] . '</p>';
			echo "</div>";
			echo "<div class='author'>";
				echo "<p class='small'>" . $dataTable[$i][6] . " " . $dataTable[$i][7] . '</p>';;
			echo "</div>";
			echo "<div class='tittle'>";
				echo "<h1>" . $dataTable[$i][2] . "</h1>";
			echo "</div>";
			echo "<div class='content'>";
				echo "<p>" . substr($dataTable[$i][3], 0, 900).'...' . "</p>";
			echo "</div>";
			echo "</a>";

			if(isset($_SESSION['group']))
			{
				if($_SESSION['group']=='Administrator')
					echo "<a href='index.php?c=NewsController&f=editNews&id=" . $dataTable[$i][0] . "''><b>Edytuj</b></a>";
			}
			
		echo "</div>";

		echo "</li>";
		echo "<hr>";
		} 
	?>
</ul>
</div>