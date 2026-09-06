<div id="Vente">
    <?php
    if (!is_numeric($_GET['produit'])) {
        header("Location: index.php");
    } else {
        require('controlleur/recherchemontage.php');
    }


    if (isset($_SESSION["login"])) {
        require('controlleur/TestPanierControle.php'); ?>

        <div>
            <?php echo "$nomProduit" ?>
        </div>
        <?php
        echo "<img src='objets/" . $img . "'>"; ?>






        <form method="POST" action="controlleur/PanierAjout.php">
            <br>
            <?php $login = $_SESSION["login"] ?>
            <input hidden type="texte" value="<?= $login; ?>" name="client">
            <input hidden type="texte" value="<?= $identifientP; ?>" name="num">
            <label><b>quantité</b></label>
            <input type="number" value="<?= $quantiteR; ?>" id="quantiteInput" name="quantite" min="1"
                onchange="updatePrice()">
            <br><br>
            <label><b>Prix</b></label>
            <input type="number" value="<?= $prix * $quantiteR; ?>" disabled id="prixInput" name="pix" min="0" required>
            <br><br>
            <input type="submit" id='submit' value='Mettre dans le panier'>
            <?php
            if (isset($_GET['error'])) { ?>
                <div class="alert" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
    </div>
    </form>
    <?php if ($nombremontage != 0) { ?>
        <div id="montage">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < $nombremontage; $i++) {
                        ?>
                        <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                        <img src="montages/<?php echo $montage[$i]['image_montage']; ?>" class="d-block w-100 img-fluid" alt="
                        <?php echo $montage[$i]['nom_montage']; ?>">
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    <?php } ?>





<?php } else {
        header("Refresh: 0; Login.php");
        exit;
    } ?>

</div>


<script>
    function updatePrice() {
        var quantite = document.getElementById('quantiteInput').value;
        var prixUnitaire = <?= $prix; ?>;
        var prixTotal = (quantite * prixUnitaire).toFixed(2);
        document.getElementById('prixInput').value = prixTotal;
    }
</script>