<?php
if (file_exists('bdd/bdd.php')) {
    require_once "bdd/bdd.php";
} else {
    require_once "../bdd/bdd.php";
}

$bdd = new Bdd();

$ProduitPromo = $bdd->getPromoProduit();

$NBPromo = count($ProduitPromo);

?>