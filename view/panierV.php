<div id="panier">
    <?php
    $totalPanierP = 0;
    $totalPanierB = 0;
    if (isset($_SESSION["login"])) {
        require('controlleur/panierAffiche.php');

        ?>
        <div class="corp" id="panier">
            <div>
                <?php
                for ($i = 0; $i < $NBPanierP; $i++) {
                    $recupnomP = $ProduitPanierP[$i][2];
                    $numP = $ProduitPanierP[$i][0];
                    $quantitéP = $ProduitPanierP[$i][3];
                    $PrixP = $ProduitPanierP[$i][4] / 100;
                    $login = $_SESSION["login"];

                    $prixTotalPiece = $quantitéP * $PrixP;
                    $totalPanierP += $prixTotalPiece;
                    ?>

                    <div class="case">
                        <?php echo "$recupnomP" ?><br>
                        <?php echo "prix unitaire $PrixP €" ?>
                    
                    <?php echo "<img src='objets/" . $ProduitPanierP[$i][1] . "'>"; ?>
                    <div>Quantité :
                        <?php echo "$quantitéP" ?>
                    </div>
                    <div>Prix totale :
                    <?php echo number_format($prixTotalPiece, 2, ',', '') . '€'; ?>
                    </div>
                    <a class="lien" href='panier.php?produit=<?php echo "$numP" ?>'>
                        <button class="btnpanier">Modifier l'article</button>
                    </a>
                    <form method="POST" action="controlleur/deleteproduitPanier.php">
                        <input hidden type="texte" value="<?= $login; ?>" name="client">
                        <input hidden type="texte" value="<?= $numP; ?>" name="numP">
                        <button class="btnpanier" type="submit" id='submit' value=''>Supprimer l'article</button>
                    </form>
                </div>

                <?php } ?>
            </div>
            <div id="totaleP">prix total pour les pieces:<br>
            <?php   echo number_format($totalPanierP, 2, ',', '') . '€'; ?></div>
            <div id="BoiteB">

                <?php
                for ($i = 0; $i < $NBPanierB; $i++) {
                    $recupnomB = $ProduitPanierB[$i][1];
                    $numB = $ProduitPanierB[$i][0];
                    $quantitéB = $ProduitPanierB[$i][2];
                    $PrixB = $ProduitPanierB[$i][3] / 100;
                    $login = $_SESSION["login"];
                    $prixTotalBoite = $quantitéB * $PrixB;
                    $totalPanierB += $prixTotalBoite;
                    ?>

                    <div clas="case">
                        <?php echo "$recupnomB" ?><br>
                        <?php echo "prix unitaire $PrixB €" ?>
                    
                    <?php echo "<img src='image/boite.png'class='boite-img' id='boiteN_$numB' data-nom='$recupnomB'> "; ?>
                    <div>Quantité :
                        <?php echo "$quantitéB" ?>
                    </div>
                    <div>Prix total :
                    <?php echo number_format($prixTotalBoite, 2, ',', '') . '€'; ?>
                    </div>
                    <a class="lien" href='panier.php?boite=<?php echo "$numB" ?>'>
                        <button class="btnpanier">Modifier l'article</button>
                    </a>
                    <form method="POST" action="controlleur/deleteproduitPanier.php">
                        <input hidden type="texte" value="<?= $login; ?>" name="client">
                        <input hidden type="texte" value="<?= $numB; ?>" name="numB">
                        <button class="btnpanier" type="submit" id='submit' value=''>Supprimer l'article</button>
                    </form>
                </div></div>
                <div id="totaleB">prix total pour les boites:<br>
            <?php   echo number_format($totalPanierB, 2, ',', '') . '€'; ?></div>
            </div>
        <?php }
    } else {
        header("Refresh: 0; Login.php");
        exit;
    } ?>
</div>
<form method="POST" action="controlleur/AchatPanierC.php">
    <input hidden type="texte" value="<?= $login; ?>" name="client">
    <div id="CommandePanier">
        <div>
        prix total pour le panier :<br>
            <?php   echo number_format($totalPanierB + $totalPanierP, 2, ',', '') . '€'; ?></div>
        <button type="submit" id='submit' value=''>Commander</button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var boiteImages = document.querySelectorAll('.boite-img');

            boiteImages.forEach(function (boiteImage) {
                boiteImage.addEventListener('click', function () {
                    var nom = this.getAttribute('data-nom');
                    var numB = this.id.split('_')[1];
                    var popupDiv = document.createElement('div');
                    popupDiv.innerHTML = "<p>Nom: " + nom + "</p>";

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'view/presentationBoite.php?boite=' + numB, true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            popupDiv.innerHTML = xhr.responseText;
                            popupDiv.classList.add('popup');

                            document.body.appendChild(popupDiv);

                            var closeButton = document.createElement('button');
                            closeButton.innerText = 'Fermer';
                            closeButton.addEventListener('click', function () {
                                document.body.removeChild(popupDiv);
                            });

                            document.body.addEventListener('click', function (event) {
                                if (!popupDiv.contains(event.target) && event.target !== boiteImage) {
                                    document.body.removeChild(popupDiv);
                                }
                            });
                        }
                    };

                    xhr.send();
                });
            });
        });
    </script>