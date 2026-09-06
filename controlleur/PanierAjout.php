<?php

if (!empty($_POST['client']  && !empty($_POST['quantite']) && (!empty($_POST['num']) xor !empty($_POST['boite'])))) {

    $client = $_POST['client'];
    $produit = $_POST['num'];
    $boite = $_POST['boite'];
    $quantite =   $_POST['quantite'];

    if($produit == null){
        $produit = 0;
    }
    if($boite == null){
        $boite = 0;
    }


    if (is_numeric($client) && is_numeric($produit) && is_numeric($quantite) && is_numeric($boite)) {
       
        if (file_exists('../bdd/bdd.php')) {
            require_once "../bdd/bdd.php";
        } else {
            require_once "bdd/bdd.php";
        }
        $bdd = new Bdd();
        
        $NumPanier = $bdd->gettestPanier($client);
            $NumPanier = $NumPanier[0][0];
        print_r($NumPanier);
        if ($NumPanier == 0){  //
            $NumPanier = $bdd->getNEWPanier($client);
            $NumPanier = $NumPanier[0][0];
          }
        
        print_r($produit);
        print_r($boite);
        $verif = $bdd->getGestionPanier($client, $produit, $boite, $quantite);
        header("Location: ../index.php");
        echo "produit ajouter au panier";
    }else {
        $_GET['error'] = "Erreur , donnée incorrecte";
        header("Refresh: 2; ../index.php?error=". htmlspecialchars($_GET['error']));
        exit;
    }

}
?>