<?php
    include_once('bdd.php');
    session_start();

    $ancien_pseudo = $_SESSION['pseudo'];
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['mail']);
    $pays = htmlspecialchars($_POST['pays']);
    $age = htmlspecialchars($_POST['age']);
    $bio = htmlspecialchars($_POST['bio']);
    $query1 = $pdo->prepare("UPDATE membres SET pseudo_membre=\"$pseudo\", mail_membre=\"$email\", pays=\"$pays\", age=\"$age\", bio=\"$bio\" WHERE pseudo_membre=\"$ancien_pseudo\";");
    $query1->execute();
    $query2 = $pdo->prepare('SELECT * FROM membres');
    $query2->execute();
    $liste_membre = $query2->fetchAll();
    foreach ($liste_membre as $membre) {
        if ($membre['pseudo_membre'] == $pseudo) {
            $pseudo = $membre['pseudo_membre'];
            $email = $membre['mail_membre'];
            $pays = $membre['pays'];
            $age = $membre['age'];
            $bio =  $membre['bio'];
        }

    }
    $_SESSION['pseudo'] = $pseudo;
    header('Location:http://localhost:8080/TP/Projet_Web//php/profil.php');
    exit;
?>