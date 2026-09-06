<?php

require_once "../bdd/bdd.php";
$rechecheC = $_GET['recherche'];
$rechecheC = preg_replace("/[^A-Za-z0-9'êéè° ]/", '', $rechecheC);
$bdd = new Bdd();
$RechercheProduit = $bdd->getRechercheProduits($rechecheC);

?>