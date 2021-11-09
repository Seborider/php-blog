<?php require __DIR__ . "/../layout/header.php"; ?>

<br />
<br />

<form method="POST" method="login" class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-md-3">
      Benutzername:
    </label>
    <div class="col-md-9">
      <input type="text" name="username" class="form-control" placeholder="Username" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3">
      Passwort:
    </label>
    <div class="col-md-9">
      <input type="password" name="password" class="form-control" placeholder="Password"/>
    </div>
  </div>

  <input type="submit" value="Einloggen" class="btn btn-primary" />
</form>

<?php require __DIR__ . "/../layout/footer.php"; ?>