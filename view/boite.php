<?php

if ( !is_numeric($_GET['boite'])){
        header("Location: index.php");
    }

require('controlleur/contenuboite.php');
if (isset($_SESSION["login"])) {
    require('controlleur/TestPanierControlleB.php');?>
    <div id="Cboite"> Contenu de la boite : <?php echo $boiteNOM ?></div>
<div class="corp" id="contenuboite">
    <div>
<?php
for ($i = 0; $i < $NBcontenu; $i++) {?>

    
    
        
            <div><?php echo $boiteinfo[$i]["nom_pieces"] ?></div>
            <?php echo "<img src='objets/" . $boiteinfo[$i]['img_pieces'] . "'>"; ?>
            <div> quantité : <?php echo $boiteinfo[$i]['quantité'] ?></div>
    
    <?php }?>
</div>
    <div id="az">
        
    <form method="POST"  action="controlleur/PanierAjout.php">
                <br>
                <?php $login=$_SESSION["login"] ?>
                <input hidden type="texte" value="<?=$login;?>" name="client">
                <input hidden type="texte" value="<?=$boiteNUM;?>" name="boite">
                <label><b>Nombre de boite : </b></label>
                <input type="number" value="<?=$quantiteR;?>" id="quantiteInput" name="quantite" min="1" onchange="updatePrice()" required>
                <br>
                <label><b>prix </b></label>
                <input type="number" value="<?=$prix * $quantiteR;?>" disabled id="prixInput" name="pix" min="0" required>
                <br>
                <input type="submit" id='submit' value='Mettre dans le panier' >
                <?php
                if (isset($_GET['error'])){ ?>
                  <div class="alert" role="alert">
                  <?php echo $_GET['error']; ?>
                  </div>
                <?php }?>
                </div>
            </form>
    <?php 
    } else {
        header("Refresh: 0; Login.php");
        exit;
    }?>
   
    </div>
</div>
<script>
    function updatePrice() {
        var quantite = document.getElementById('quantiteInput').value;
        var prixUnitaire = <?= $prix; ?>; 
        var prixTotal = (quantite * prixUnitaire).toFixed(2);
        document.getElementById('prixInput').value = prixTotal;
    }
</script>

