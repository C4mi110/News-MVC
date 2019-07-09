<form class="form-horizontal" method="POST" action="index.php?c=NewsController&f=editNewsSql" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2">Tytuł:</label>
    <div class="col-sm-10">
      <input type="text" name="tytul" class="form-control" value="<?php echo $dataTable[1]?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Treść:</label>
    <div class="col-sm-10"> 
	<textarea class="form-control" rows="10" name="tresc"><?php echo $dataTable[2] ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Obraz (jpeg):</label>
    <div class="col-sm-10"> 
	<input type="file" name="file_upload" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Autor:</label>
    <div class="col-sm-10"> 
	<select class="form-control" name="autor">
		<option value="<?php $dataTable[4] ?>" selected > <?php echo $dataTable[5] . " " . $dataTable[6] ?> </option>
		<?php 
		for($i = 7; $i<count($dataTable); $i++)
		{
			echo "<option value='".$dataTable[$i][0]."'>" .$dataTable[$i][2] . " " . $dataTable[$i][1]. "</option>";
		}
		?>
	</select>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Wyślij</button>
    </div>
  </div>
</form>