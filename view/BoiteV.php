<?php
    require('../controlleur/BoiteC.php');

for ($i = 0; $i < $NB_Boite; $i++) {
    $recupnom = $Boite[$i][1];
    $num = $Boite[$i][0] ?>
    <div>
        <a class="lien" href='index.php?boite=<?php echo "$num" ?>'>
            <div><?php echo "$recupnom" ?></div><?php
                                                echo "<img src='image/boite.png'>"; ?>
        </a>
    </div>

<?php } ?>