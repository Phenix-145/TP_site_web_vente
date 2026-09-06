<?php
require('controlleur/ConseilC.php');
?>

<label for="conseil">Piéce choisie : </label>

<select name="conseil" id="conseil" onchange="displaySelectedValue()">
  <option value="">Choisir une piéce</option>
  <?php for ($i = 0; $i < $NBretour; $i++) { ?>
    <option value="<?php echo $retour[$i][1]; ?>"><?php echo $retour[$i][0]; ?></option>
  <?php } ?>
</select>
<div id="selectedValue"></div>

<script>
  function displaySelectedValue() {
    
    var selectElement = document.getElementById('conseil');

    var selectedValueElement = document.getElementById('selectedValue');

    selectedValueElement.innerHTML = "Conseil : " + selectElement.value;
  }
</script>