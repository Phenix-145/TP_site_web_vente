<?php
if (!isset($_GET['boite'])) { 
    header("Location: index.php");
}
require_once "bdd/bdd.php";

$bdd = new Bdd();
$quantiteR = $bdd->retourquantitéB($_SESSION["login"] ,$_GET['boite']);
    if (count($quantiteR) != 0){
      $quantiteR = $quantiteR[0][0];
    }else{
      $quantiteR = 1;
    }

?>