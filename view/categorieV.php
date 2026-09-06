<div id="categorieV">
<?php
require('controlleur/CategorieC.php');

for($i=0;$i<$NBcategorie;$i++){
    $recupnom = $categorie[$i][0];?>
    <div class="catégorieVA">
    <a class="lien" href='index.php?categorie=<?php echo "$recupnom"?>'>
    <div><?php echo "$recupnom" ?></div></a>
    </div>
  
<?php } ?>
</div>