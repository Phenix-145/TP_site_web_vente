<?php
require_once "bdd/bdd.php";

$bdd = new Bdd();

$retour = $bdd->renvoi_conseil();

$NBretour = count($retour);

?>