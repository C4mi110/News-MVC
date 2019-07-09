<form class="form-horizontal" method="POST" action="index.php?c=Users&f=register">
  <div class="form-group">
    <label class="control-label col-sm-2">Login:</label>
    <div class="col-sm-3">
      <input type="text" name="login" class="form-control" placeholder="Wprowadź login" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Password:</label>
    <div class="col-sm-3"> 
      <input type="password" name="password" class="form-control" placeholder="Wprowadź hasło" required>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Płeć:</label>
    <div class="col-sm-3"> 
        <input type="radio" name="plec" value="M" required> Meżczyzna 
        <input type="radio" name="plec" value="K"> Kobieta
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Data urodzenia:</label>
    <div class="col-sm-3">
      <input type="text" name="dataUr" class="form-control" placeholder="Wprowadź datę urodzenia (RRRR-MM-DD)" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="RRRR-MM-DD">
    </div>
  </div>
  
  <div class="form-group">
  <label class="control-label col-sm-2">Województwo:</label>
  <div class="col-sm-3">
   <select class="form-control" name="wojewodztwo">
    <option value="0" selected disabled required>Proszę wybrać województwo</option>
    <option value="dolnoslaskie">dolnośląskie</option>
    <option value="kujawsko-pomorskie<kujawsko-pomorskie<">kujawsko-pomorskie</option>
    <option value="lubelskie">lubelskie</option>
    <option value="lubuskie">lubuskie</option>
    <option value="lo dzkie">łódzkie</option>
    <option value="malopolskie">małopolskie</option>
    <option value="mazowieckie">mazowieckie</option>
    <option value="opolskie">opolskie</option>
    <option value="podkarpackie">podkarpackie</option>
    <option value="podlaskie">podlaskie</option>
    <option value="pomorskie">pomorskie</option>
    <option value="slaskie">śląskie</option>
    <option value="swietokrzyskie">świętokrzyskie</option>
    <option value="warminsko-mazurskie">warmińsko-mazurskie</option>
    <option value="wielkopolskie">wielkopolskie</option>
    <option value="zachodniopomorskie">zachodniopomorskie</option>
   </select>
  </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Zarejestruj się</button>
    </div>
  </div>
</form>