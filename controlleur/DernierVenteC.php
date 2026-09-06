<?php
require_once "bdd/bdd.php";
$limit = 5; //limit des produits a affiché dans Dernière ventes

$bdd = new Bdd();

$Produitvendu = $bdd->derniereVente($limit);

$NBRetour = count($Produitvendu);

?>