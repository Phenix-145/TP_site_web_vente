<?php
require_once "bdd/bdd.php";
$log = $_SESSION["login"];
$bdd = new Bdd();

$ProduitPanierP = $bdd->getAffichePanierP($log);
$ProduitPanierB = $bdd->getAffichePanierB($log);

$NBPanierB = count($ProduitPanierB);
$NBPanierP = count($ProduitPanierP);

?>