<?php
if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];

    if (is_string($categorie)) {
        $categorie = preg_replace("/[^A-Za-zé, ]/", '', $categorie);

        require_once "bdd/bdd.php";
        $bdd = new Bdd();

        $ProduitCategorie = $bdd->getAffichecategorieProduit($categorie);

        $NBPieces = count($ProduitCategorie);
    }
}
