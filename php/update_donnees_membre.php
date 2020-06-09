<?php
    include_once('bdd.php');
    session_start();

    $ancien_pseudo = $_SESSION['pseudo'];
    $role = $_POST['role'];
    $query1 = $pdo->prepare("UPDATE bookclub.membres SET role=\"$role\" WHERE pseudo_membre=\"$ancien_pseudo\";");
    $query1->execute();


    header('Location:http://localhost:8080/TP/Projet_Web/php/moderation_membres.php');
    exit;
?>