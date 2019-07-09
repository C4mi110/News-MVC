<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <?php
    if(isset($_SESSION['group']))
    {  
    if($_SESSION['group']=='Administrator') echo "<a class='navbar-brand' href='index.php?c=Admin&f=main&nr=1'><b>Home</b></a>";
       elseif($_SESSION['group']=='Uzytkownik') echo "<a class='navbar-brand' href='index.php?c=User&f=main&nr=1'><b>Home</b></a>";
    }
    else echo "<a class='navbar-brand' href='index.php?c=main&f=start&nr=1'><b>Home</b></a>";
    ?>
    </div>
  </div>
</nav>