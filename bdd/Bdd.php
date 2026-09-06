<?php

class Bdd
{
  private $bdd;

  public function __construct(){
    require_once 'data.php';
    $dsn = 'mysql:dbname=pmu_bdd;host=localhost:3306'; 
    $dbUser = recupnam();
    $dbPwd = recuppwd();

    try {
      $this->bdd = new PDO($dsn, $dbUser, $dbPwd);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function getRechercheProduits($nom_pieces)
  {
    $sql = "SELECT img_pieces, nom_pieces, Id_pieces FROM pmu_bdd.pieces WHERE nom_pieces LIKE CONCAT(:nom_pieces, '%');";
    $query =  $this->bdd->prepare($sql);
    $query->execute(array(":nom_pieces" => $nom_pieces));
    return $query->fetchAll();
  }

  public function getPromoProduit()
  {
    $sql = "SELECT img_pieces, nom_pieces, Id_pieces FROM pmu_bdd.enpromotion;";
    $query =  $this->bdd->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }


public function getProduitVente($produitV)
  {
    if (is_numeric($produitV)){
    $sql = "SELECT Id_pieces, img_pieces, nom_pieces, prix FROM pmu_bdd.pieces WHERE Id_pieces = :produitV;";
    $query =  $this->bdd->prepare($sql);
    $query->execute(array(":produitV" => $produitV));
    return $query->fetchAll();}
  }


  public function getConnexion($login,$mdp){
    $sql = "SELECT idclient AS NumClient, client_nam AS speudo FROM pmu_bdd.client WHERE mdp = :pwd and client_nam = :login  ";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":login" => $login, ":pwd" => $mdp));
    return $query->fetch();
  }

  public function getGestionPanier($client, $produit, $boite, $quantite){
    $numPanier = $this->getNumPanier($client);
    $sql = "INSERT INTO panier (id_panier, idclient, idpieces, idboite, quantité) VALUES (:NumPanier, :client, :produit, :boite, :quantite)
    ON DUPLICATE KEY UPDATE  quantité = :quantite";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":produit" => $produit, ":boite" => $boite, ":quantite" => $quantite, ":NumPanier" => $numPanier));
    return $query->fetchAll();
  }

  public function getAffichePanierP($client){
    $numPanier = $this->getNumPanier($client);
    $sql = "SELECT Pieces.Id_pieces, Pieces.img_pieces , Pieces.nom_pieces, Panier.quantité, Pieces.prix FROM pieces Pieces 
    INNER JOIN panier Panier on Pieces.Id_pieces = Panier.idpieces WHERE idclient = :client AND id_panier = :numPanier";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":numPanier" => $numPanier));
    return $query->fetchAll();
  }

  public function getAffichePanierB($client){
    $numPanier = $this->getNumPanier($client);
    $sql = "SELECT Boite.idboite, Boite.Boitenom, Panier.quantité, Boite.prix FROM boite Boite 
    INNER JOIN panier Panier on Boite.idboite = Panier.idboite WHERE idclient = :client AND id_panier = :numPanier";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":numPanier" => $numPanier));
    return $query->fetchAll();
  }

  public function retourquantitéP($client, $produit){
    $numPanier = $this->getNumPanier($client);
    $sql = "SELECT quantité FROM pmu_bdd.panier WHERE idclient = :client AND idpieces = :produit AND id_panier = :numPanier";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":produit" => $produit, ":numPanier" => $numPanier));
    return $query->fetchAll();
  }

  public function retourquantitéB($client, $boite){
    $numPanier = $this->getNumPanier($client);
    $sql = "SELECT quantité FROM pmu_bdd.panier WHERE idclient = :client AND idboite = :boite AND id_panier = :numPanier";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":boite" => $boite, ":numPanier" => $numPanier));
    return $query->fetchAll();
  }

  public function gettestPanier($client){
    $sql = "SELECT NumPanier FROM pmu_bdd.client where idclient = :client";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client));
    return $query->fetchAll();
  }

  public function getNEWPanier($client){
    $sql = "SELECT id_panier FROM pmu_bdd.panier ORDER BY id_panier DESC LIMIT 1;";
    $query = $this->bdd->prepare($sql);
    $query->execute(array());
    $numPanier = $query->fetchAll();
    $numPanier = $numPanier[0][0]+1;
    $sql = "UPDATE pmu_bdd.client SET NumPanier = :numPanier WHERE idclient = :client";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":numPanier" => $numPanier, ":client" => $client));

    $numPanier = $this->getNumPanier($client);
    return $query->fetchAll();
  }


  public function getSupprimeProduitPanier($client, $piece, $boite){
    
    $numPanier = $this->getNumPanier($client);
    $sql = "DELETE FROM pmu_bdd.panier WHERE id_panier = :numPanier AND idclient = :client AND idpieces = :piece AND idboite = :boite";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":numPanier" => $numPanier, ":client" => $client , ":piece" => $piece, ":boite" => $boite));
    return true;
  }


  public function getAchatPanier($client){
    
    $numPanier = $this->getNumPanier($client);
    $dateActuelle = date("Y-m-d H:i:s");
    $sql = "UPDATE pmu_bdd.panier SET dateAchat = :date WHERE idclient = :client AND id_panier = :numPanier";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":numPanier" => $numPanier, ":client" => $client, ":date" => $dateActuelle));

    $numPanier = 0;
    $sql = "UPDATE pmu_bdd.client SET NumPanier = :numPanier WHERE idclient = :client";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":numPanier" => $numPanier, ":client" => $client));
    return true;
  }

  public function getNumPanier($client) {
    $sql = "SELECT NumPanier FROM pmu_bdd.client WHERE idclient = :client";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client));
    $result = $query->fetch();
    return $result[0][0];
  }

  public function derniereVente($limit) {
    if (is_numeric($limit)){
    $sql = "SELECT Id_pieces, img_pieces, nom_pieces FROM pmu_bdd.derniervente limit :limitProduit";
    $query = $this->bdd->prepare($sql);
    $query->bindValue(":limitProduit", $limit, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();}
  }

  public function getAffichecategorie() {
    $sql = "SELECT nom FROM pmu_bdd.categorie";
    $query = $this->bdd->prepare($sql);
    $query->execute(array());
    $result = $query->fetchAll();
    return $result;
  }

  public function getAffichecategorieProduit($categorie) {
    $sql = "SELECT Id_pieces, img_pieces, nom_pieces FROM pmu_bdd.piecescategorie WHERE nom = :categorie";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":categorie" => $categorie));
    return $query->fetchAll();
  }

  public function getBoite() {
    $sql = "SELECT idboite, boitenom FROM pmu_bdd.boite";
    $query = $this->bdd->prepare($sql);
    $query->execute(array());
    $result = $query->fetchAll();
    return $result;
  }

  public function getcontenuboite($idboite) {
    $sql = "SELECT boite_ID, Boitenom, boitePrix, nom_pieces, img_pieces, quantité FROM pmu_bdd.afficheinterboite WHERE boite_ID = :boite";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":boite" => $idboite));
    $result = $query->fetchAll();
    return $result;
  }

  public function getInscription($client, $mdp){
    $sql = "INSERT INTO client (client_nam, mdp) VALUES (:client, :mdp)";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":client" => $client, ":mdp" => $mdp));
    return $query->fetch();
  }

  public function testuser($user) {
    $sql = "SELECT client_nam FROM pmu_bdd.client WHERE client_nam = :Newuser;";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":Newuser" => $user));
    $result = $query->fetch();
    return $result;
  }

  public function renvoismontage($piece) {
    $sql = "SELECT nom_montage, image_montage FROM pmu_bdd.appartient_a_montage where piece = :piece;";
    $query = $this->bdd->prepare($sql);
    $query->execute(array(":piece" => $piece));
    $result = $query->fetchAll();
    return $result;
  }

  public function renvoi_conseil() {
    $sql = "SELECT nom_pieces, conseil FROM pmu_bdd.pieces WHERE conseil IS NOT NULL;";
    $query = $this->bdd->prepare($sql);
    $query->execute(array());
    $result = $query->fetchAll();
    return $result;
  }

}
?>


