<?php

if (!empty($_POST['client'] && !empty($_POST['numP']) xor !empty($_POST['numB']))) {

    $client = $_POST['client'];
    $numPiece = $_POST['numP'];
    $numBoite = $_POST['numB'];

    if (is_null($numPiece)) {
        $numPiece = 0;
    }

    if (is_null($numBoite)){
        $numBoite = 0;
    }



    if (is_numeric($client) && is_numeric($numPiece) && is_numeric($numBoite)) {
       
        require_once "../bdd/bdd.php";
        $bdd = new Bdd();
        
        
        $verif = $bdd->getSupprimeProduitPanier($client, $numPiece, $numBoite);
        header("Location: ../panier.php");
        echo "produit ajouter au panier";
    }

}
header("Location: ../index.php");
?>