<?php require('view/HeaderV.php') ?>

<div id="login" class="center">
  <?php require('view/LoginV.php'); ?>
  <br>
  <p>
    Vous n'avez pas de compte ?
    <button type="button" onclick="toggleForms('inscription')">Inscrivez-vous ici</button>
  </p>
</div>

<div id="inscription" class="center" style="display: none;">
  <?php require('view/InscriptionV.php'); ?>
  <p>
    Vous avez déjà un compte ?
    <button type="button" onclick="toggleForms('login')">Connectez-vous ici</button>
  </p>
</div>


<script>
  function toggleForms(formToShow) {
    var loginForm = document.getElementById('login');
    var inscriptionForm = document.getElementById('inscription');

    if (formToShow === 'login') {
      loginForm.style.display = 'block';
      inscriptionForm.style.display = 'none';
    } else if (formToShow === 'inscription') {
      loginForm.style.display = 'none';
      inscriptionForm.style.display = 'block';
    }
  }
</script>

<?php require('view/BottomV.php'); ?>