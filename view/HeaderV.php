<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if ($_SESSION != null) {
        $speudo = $_SESSION['speudo'];
    } else {
        $speudo = "";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>P.M.U</title>
    <link href="css/global.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div id="head">
        <div class="corp">
            <div id="titre">P.M.U</div>
            <div id="user">
                <?php
            if (isset($_SESSION['login'])) {
                ?>
            <form method="post" action="controlleur/deconnexion.php">
                <button type="submit">Déconnexion</button>
            </form>

                <?php echo "<div>$speudo</div>"; }?>
            </div>
        </div>
        <div id="menu">
            <a href="index.php" class="lien">
                <div class="navigation">Accueil</div>
            </a>
            <a href=conseils.php class="lien">
                <div class="navigation">Conseils</div>
            </a>
            <a href=panier.php class="lien">
                <div class="navigation">Panier</div>
            </a>
            <a href="Login.php" class="lien">
                <div class="navigation">Compte</div>
            </a>
        </div>
    </div>