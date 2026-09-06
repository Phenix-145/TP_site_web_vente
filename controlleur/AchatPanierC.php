<?php

if (!empty($_POST['client'])) {

    $client = $_POST['client'];

    if (is_numeric($client)) {
       
        require_once "../bdd/bdd.php";
        $bdd = new Bdd();
        
        
        $bdd->getAchatPanier($client);


        header("Location: ../index.php");
        echo "produit ajouter au panier";
    }

}
?>