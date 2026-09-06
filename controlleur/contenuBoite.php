<?php
$idboite  = $_GET['boite'];
if (!is_numeric($idboite)){
    header("Location: index.php");
}

if (file_exists('bdd/bdd.php')) {
    require_once "bdd/bdd.php";
} else {
    require_once "../bdd/bdd.php";
}

$bdd = new Bdd();

$boiteinfo = $bdd->getcontenuboite($idboite);

$boiteNUM = $boiteinfo[0]["boite_ID"];
$boiteNOM = $boiteinfo[0]["Boitenom"];
$prix = $boiteinfo[0]["boitePrix"] / 100;
$NBcontenu = count($boiteinfo);

?>