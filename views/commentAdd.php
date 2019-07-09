<form action="index.php?c=CommentController&f=addComment" method="post" hidden>
</form>

<form class="form-horizontal" method="POST" action="index.php?c=CommentController&f=addComment">
   <div class="form-group">
    <label class="control-label col-sm-2">Dodaj Komentarz:</label>
    <div class="col-sm-3">
	<textarea type='text' class="form-control" rows="4" name="commenttxt"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Dodaj</button>
    </div>
  </div>
</form>
