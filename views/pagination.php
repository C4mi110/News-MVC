<div class="container">
  <ul class="pagination">
  <?php
        //print_r($data[$i]);
        if(isset($_SESSION['group']))
        {
            if($_SESSION['group']=='Administrator')
            {        
                for ($i=1; $i <= $data; $i++) { 
                    echo "<li><a href=index.php?c=Admin&f=main&nr=" .$i . ">" . $i . "</a></li> ";
                }
            }
            elseif($_SESSION['group']=='Uzytkownik')
            {        
                for ($i=1; $i <= $data; $i++) { 
                    echo "<li><a href=index.php?c=User&f=main&nr=" .$i . ">" . $i . "</a></li> ";
                }
            }
        }
        else
        {
            for ($i=1; $i <= $data; $i++) { 
                echo "<li><a href=index.php?c=main&f=start&nr=" .$i . ">" . $i . "</a></li> ";
            }
        }
	?>
  </ul>
</div>

