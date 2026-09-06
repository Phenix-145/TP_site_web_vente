<div id="dernierVente">
<?php
require('controlleur/DernierVenteC.php');

for($i=0;$i<$NBRetour;$i++){
    $recupnom = $Produitvendu[$i][2];
    $num = $Produitvendu[$i][0]?>
    <div >
    <a class="lien" href='index.php?produit=<?php echo "$num"?>'>
    <div><?php echo "$recupnom" ?></div><?php
    echo "<img src='objets/" . $Produitvendu[$i][1] ."'>";?></a>
    </div>
  
<?php } ?>
</div>