<?php
require_once "bdd/bdd.php";

$bdd = new Bdd();

$categorie = $bdd->getAffichecategorie();

$NBcategorie = count($categorie);

?>