<form method="POST" action="controlleur/gestion_login.php">
  <h1>Connexion</h1>
  <br>
  <label><b>Nom d'utilisateur</b></label>
  <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" autocomplete="off" required>
  <br>
  <label><b>Mot de passe</b></label>
  <input type="password" placeholder="Entrer le mot de passe" name="password" autocomplete="off" required>
  <br>
  <input type="submit" id='submit' value='LOGIN'>
  <?php
  if (isset($_GET['error'])) { ?>
    <div class="alert" role="alert">
      <?php echo $_GET['error']; ?>
    </div>
  <?php } ?>
</form>
