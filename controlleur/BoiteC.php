<?php
    require_once "../bdd/bdd.php";

$bdd = new Bdd();

$Boite = $bdd->getBoite();

$NB_Boite = count($Boite);

?>