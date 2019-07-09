<form class="form-horizontal" method="POST" action="index.php?c=users&f=login">
  <div class="form-group">
    <label class="control-label col-sm-2">Login:</label>
    <div class="col-sm-2">
      <input type="text" name="login" class="form-control" placeholder="Wprowadź login" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Password:</label>
    <div class="col-sm-2"> 
      <input type="password" name="password" class="form-control" placeholder="Wprowadź hasło" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Zaloguj</button>
    </div>
  </div>
</form>