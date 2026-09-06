<?php
if (file_exists('controlleur/PromotionControle.php')) {
    require('controlleur/PromotionControle.php');
} else {
    require('../controlleur/PromotionControle.php');
}
for ($i = 0; $i < $NBPromo; $i++) {
    $recupnom = $ProduitPromo[$i][1];
    $num = $ProduitPromo[$i][2] ?>
    <div>
        <a class="lien" href='index.php?produit=<?php echo "$num" ?>'>
            <div><?php echo "$recupnom" ?></div><?php
                                                echo "<img src='objets/" . $ProduitPromo[$i][0] . "'>"; ?>
        </a>
    </div>

<?php } ?>