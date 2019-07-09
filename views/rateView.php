<form class="form-horizontal" method="POST" action="index.php?c=RateController&f=Rate">
<div class="form-group">
    <label class="control-label col-sm-2">Oceń artykuł</label>
    <div class="col-sm-3">
      <input class="form-control" type="range" name="ocena" min="1" max="5">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" class="btn btn-default">Oceń</button>
    </div>
  </div>
</form