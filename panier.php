
<?php

require('view/HeaderV.php');


if (isset($_GET['produit']) && !isset($_GET['boite'])) {
    require('view/produit_choisiV.php');
} else if (!isset($_GET['produit']) && isset($_GET['boite'])){
    require('view/boite.php');
} else {
    require('view/panierV.php');
}
?>
    
<?php require('view/BottomV.php'); ?>