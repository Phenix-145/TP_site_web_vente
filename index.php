<?php
require('view/HeaderV.php'); ?>
<div class="corp">
    <div id="left">
        <div>
            <div class="soustitre">Recherche</div>
            <form>
                <input type="text" placeholder="" id="recherche">
            </form>
        </div>
        <div>
            <div class="soustitre">Catégories</div>
            <?php require('view/categorieV.php'); ?>
        </div>
    </div>
    <div>
        <div id="menuarticle" class="corp">
            <div id="catalogue" class="choix-menu">Catalogue</div>
            <div id="promotionbouton" class="choix-menu">Promotion</div>
            <div id="VenteBoite" class="choix-menu">vente par boite</div>
        </div>
        <div id=resultats>
            <?php
            if (isset($_GET['categorie'])) {
                require('view/CategorieSelectV.php');
            }
            if (isset($_GET['boite'])) {
                require('view/boite.php');
            }
            if (isset($_GET['produit'])) {
                require('view/Produit_choisiV.php');
            } else if (!isset($_GET['recherche']) && !isset($_GET['produit']) && !isset($_GET['categorie']) && !isset($_GET['boite'])) {
                require('view/PromotionV.php');
            }
            ?>
        </div>
        <div id="Derniereventes">
            <div class="soustitre">dernières ventes</div>
            <?php require('view/dernierVenteV.php'); ?>
        </div>
    </div>
</div>
<?php require('view/BottomV.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    //recherche ajax pour la crecher des produit via la barre de recherche
    $(document).ready(function () {
        $('#recherche').on('input', function () {
            var recherche = $(this).val();
            $.ajax({
                type: 'GET',
                url: 'view/rechercheV.php',
                data: {
                    recherche: recherche
                },
                success: function (RechercheProduit) {
                    $('#resultats').html(RechercheProduit);
                    $("#VenteBoite").css("background-color", "rgb(47, 47, 47)");
                    $("#promotionbouton").css("background-color", "rgb(47, 47, 47)");
                    $("#catalogue").css("background-color", "rgb(47, 47, 47)");
                }
            });
        });

        var input = $('#recherche');
        var div = $('#Promotion');

        input.on('input', function () {
            var valeurInput = input.val();

            if (valeurInput.trim() !== '') {
                div.hide();
            }
        });


        $('#catalogue').on('click', function () {
            var recherche = '';
            $.ajax({
                type: 'GET',
                url: 'view/rechercheV.php',
                data: {
                    recherche: recherche
                },
                success: function (RechercheProduit) {
                    $('#resultats').html(RechercheProduit);
                }
            });

        });

        $('#promotionbouton').on('click', function () {
            $.ajax({
                type: 'GET',
                url: 'view/PromotionV.php',
                success: function (RechercheProduit) {
                    $('#resultats').html(RechercheProduit);
                }
            });
        });

        $('#VenteBoite').on('click', function () {
            $.ajax({
                type: 'GET',
                url: 'view/BoiteV.php',
                success: function (RechercheProduit) {
                    $('#resultats').html(RechercheProduit);
                }
            });
        });


        var lastClickedElementId = null;

        function applyGradient(element) {
            element.css("background", "linear-gradient(to bottom, rgb(150, 150, 150), rgb(47, 47, 47))");
        }

        function applyGradient2(element) {
            element.css("background", "linear-gradient(to bottom, rgb(80, 80, 80), rgb(150, 150, 150), rgb(80, 80, 80))");
        }

        function applysombre(element) {
            element.css("background", "rgb(47, 47, 47)");
        }

        function applySolidColor(element, color) {
            element.css("background", color);
        }

        function blinkText(element) {
            var count = 0;
            var interval = setInterval(function () {
                if (count % 2 === 0) {
                    element.css("color", "red");
                } else {
                    element.css("color", ""); // Réinitialise la couleur à la valeur par défaut
                }

                count++;

                if (count >= 5) { // 5 itérations pour 0.5 seconde
                    clearInterval(interval);
                    element.css("color", ""); // Assurez-vous que la couleur est réinitialisée à la fin
                }
            }, 100); // Chaque 100 millisecondes
        }

        $(".choix-menu").hover(
            function () {
                if ($(this).attr("id") !== lastClickedElementId) {
                    applyGradient($(this));
                } else {
                    applyGradient2($(this));
                }

            },
            function () {
                if ($(this).attr("id") == lastClickedElementId) {
                    $(this).css("background", "rgb(80, 80, 80)");
                } else {
                    $(this).css("background", "rgb(47, 47, 47)");
                }
            }
        );

        $(".choix-menu").on('click', function () {
            var currentElementId = $(this).attr("id");

            if (currentElementId === lastClickedElementId) {
                blinkText($(this));
            }

            $(".choix-menu").not($(this)).each(function () {
                applysombre($(this));
            });

            applySolidColor($(this), "rgb(80, 80, 80)");

            lastClickedElementId = currentElementId;
        });




    });
</script>