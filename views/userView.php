<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php?c=user&f=main&nr=1">Home</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <p class="navbar-text"> <?php echo "Witaj<b> " . $_SESSION['login'] . "</b>! " ?> </p>
      <li><a href="index.php?c=Main&f=endsession">Wyloguj</a></li>
    </ul>
  </div>
</nav>