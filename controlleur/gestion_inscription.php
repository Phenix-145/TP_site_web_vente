<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['username'])) {
    $login = $_POST['username'];

    if (textutilisateur($login) == true) {

    if ($_POST['password'] == $_POST['password2']) {
        $mdp = hash("sha512", $_POST['password']);

        require_once "../bdd/bdd.php";
        $bdd = new Bdd();
        $bdd->getInscription($login, $mdp);
        $log = $bdd->getConnexion($login,$mdp);
        if (!empty($log)) {    
            $speudo = $log[0]['speudo'];
            $log = $log[0]['NumClient'];

        }
    } else {
        $_GET['error'] = "Erreur , les mot de passe ne correspondent pas.";
    echo "Erreur,  Mot de passe différend";
    header("Refresh: 2; ../Login.php?error=" . htmlspecialchars($_GET['error']));
    exit;
    }
}else{
    $_GET['error'] = "Erreur , le login et déja utiliser";
    echo "Erreur,  le login et déja utiliser";
    header("Refresh: 2; ../Login.php?error=" . htmlspecialchars($_GET['error']));
    exit;
}
}

if (!empty($log)) {

    session_start([]);

    $_SESSION["login"] = $log;
    $_SESSION["speudo"] = $speudo;

    header("Location: ../index.php");
    echo "Vous êtes connecté !";
} else {
    $_GET['error'] = "Erreur , le login et/ou le mot de passe ne correspondent pas.";
    echo "Erreur,  Vous allez etre redirigé";
    header("Refresh: 2; ../Login.php?error=" . htmlspecialchars($_GET['error']));
    exit;
}


function textutilisateur ($login){
    require_once "../bdd/bdd.php";
        $bdd = new Bdd();
        $log = $bdd->testuser($login);
        if (!empty($log)) {
            return false;
        } else {
            return true;
        }
}



?>