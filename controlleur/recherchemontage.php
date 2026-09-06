    <?php
if (is_numeric($_GET['produit'])) {
    $piece = $_GET['produit'];
} else {
    header("Location: index.php");
}
require_once "bdd/bdd.php";

$bdd = new Bdd();
$montage = $bdd->renvoismontage($piece);
if (is_null($montage)) {
    $nombremontage = 0;
} else {
    $nombremontage = count($montage);
}
?>