<?php

require_once "bdd/bdd.php";

$bdd = new Bdd();
$quantiteR = $bdd->retourquantitéP($_SESSION["login"] ,$_GET['produit']);
    if (count($quantiteR) != 0){
      $quantiteR = $quantiteR[0][0];
    }else{
      $quantiteR = 1;
    }

if (!isset($_GET['produit'])) { 
    header("Location: ../index.php");
} else {
  $produitVente = $bdd->getProduitVente($_GET['produit']);
    $identifientP = $_GET['produit'];
    $prix = $produitVente[0][3] / 100;
    $nomProduit = $produitVente[0][2];
    $img = $produitVente[0][1];
    
}?>