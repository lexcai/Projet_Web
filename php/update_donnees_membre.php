<?php
    include_once('bdd.php');
    session_start();
    
    $pseudo = $_POST['pseudo'];
    $role = htmlspecialchars($_POST['role']);
    $query1 = $pdo->prepare("UPDATE bookclub.membres SET role=\"$role\" WHERE pseudo_membre=\"$pseudo\";");
    $query1->execute();


    header('Location:http://localhost:8080/TP/Projet_Web/php/moderation_membres.php');
    exit;
?>