<?php

require('../controlleur/contenuboite.php');


for ($i = 0; $i < $NBcontenu; $i++) { ?>

    <div>
        <?php echo $boiteinfo[$i]["nom_pieces"] ?>
    </div>
    <?php echo "<img src='objets/" . $boiteinfo[$i]['img_pieces'] . "'>"; ?>
    <div> quantité :
        <?php echo $boiteinfo[$i]['quantité'] ?>
    </div>
    <?php
}
?>