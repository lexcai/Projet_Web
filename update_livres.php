<?php
    include_once('bdd.php');
    session_start();
    $ancien_titre = $_SESSION['titre'];
    $titre = $_POST['titre'];
    $auteur = htmlspecialchars($_POST['auteur']);
    $editeur= htmlspecialchars($_POST['editeur']);
    $resume = htmlspecialchars($_POST['resume']);
    $date_parrution = htmlspecialchars($_POST['date_parrution']);
    $note = htmlspecialchars($_POST['note']);
    $query1 = $pdo->prepare("UPDATE bookclub.livres SET titre=\"$titre\", auteur=\"$auteur\", editeur=\"$editeur\", resume=\"resume\", date_parrution=\"date_parrution\", note=\"note\"  WHERE titre=\"$ancien_titre\";");
    $query1->execute();
    header('Location:http://localhost:8080/TP/Projet_Web/moderation_livres.php');
    exit;
?>