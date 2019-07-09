<div class="container">
	<?php
		//print_r($dataTable[0]);
		echo "<div class='date'>";
			echo "<p class='small'>" . $dataTable[0][1] . '</p>';
		echo "</div>";
		echo "<div class='author'>";
			echo "<p class='small'>" . $dataTable[0][7] . " " . $dataTable[0][6] . '</p>';;
		echo "</div>";
		
		echo "<div class='tittle'>";
			echo "<h3 class='text-center'>" . $dataTable[0][2] . "</h3>";
		echo "</div>";

		echo "<div class='currentphoto'>";
			echo "<img src='" .$dataTable[0][4] ."' class='img-responsive' alt='News Photo'>";
		echo "</div>";
		
		echo "<div class='content'>";
			echo "<p>" . $dataTable[0][3] . "</p>";
		echo "</div>";
			
		echo "<br><hr>";	
	?>
</div>