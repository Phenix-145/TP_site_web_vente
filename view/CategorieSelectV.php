<div id="produitCatégorie">
    
<?php
require('controlleur/ProduitCategorieC.php');

for($i=0;$i<$NBPieces;$i++){
    $recupnom = $ProduitCategorie[$i][2];
    $num = $ProduitCategorie[$i][0]?>
    <div>
    <a class="lien" href='index.php?produit=<?php echo "$num"?>'>
    <div><?php echo "$recupnom" ?></div><?php
    echo "<img src='objets/" . $ProduitCategorie[$i][1] ."'>";?></a>
    </div>
  
<?php } ?>
</div>