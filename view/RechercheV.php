
<?php
require('../controlleur/rechercheC.php');

$NBRetour = count($RechercheProduit);

for($i=0;$i<$NBRetour;$i++){
    $recupnom = $RechercheProduit[$i][1];
    $num = $RechercheProduit[$i][2]?>
    <div >
    <a class="lien" href='index.php?produit=<?php echo "$num"?>'>
    <div><?php echo "$recupnom" ?></div><?php
    echo "<img src='objets/" . $RechercheProduit[$i][0] ."'>";?></a>
    </div>
  
<?php } ?>