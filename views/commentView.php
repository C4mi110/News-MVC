<div class="container">
<div class="col-xs-10">
	<?php
		//print_r($data[$i]);
		for($i = 0; $i<count($data); $i++)
	{
		echo "<div class='author'>";
			echo "<p class='small'>" . $data[$i][3] . '</p>';
		echo "</div>";

		echo "<div class='date'>";
			echo "<p class='small'>" . $data[$i][6]. '</p>';;
		echo "</div>";

        
		if($data[$i][5]==1)
		{
			echo "<p class='text-danger'> Komentarz zostal zablokowany </p>";
			if(isset($_SESSION['group'])){
				if($_SESSION['group'] == 'Administrator')
					if($data[$i][5]==1)	echo "<a href='index.php?c=CommentController&f=unBlock&id=" . $data[$i][0] . "''><b>Odblokuj</b></a>";
			}
		}else{
			echo "<div class='content'>";
				echo "<p>" . $data[$i][4] . "</p>";
			echo "</div>";
			if(isset($_SESSION['group'])){
				if($_SESSION['group'] == 'Administrator')
					if($data[$i][5]!==1)	echo "<a href='index.php?c=CommentController&f=Block&id=" . $data[$i][0] . "''><b>Zablokuj</b></a>";
			}
		}
		
		echo "<hr>";
		
	}	

	?>
</div>
</div>