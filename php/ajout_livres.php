<?php
    include_once('bdd.php');
    session_start();
    $ancien_titre = $_SESSION['titre'];
    $titre = $_POST['titre'];
    $auteur = htmlspecialchars($_POST['auteur']);
    $genre = htmlspecialchars($_POST['genre']);
    $editeur= htmlspecialchars($_POST['editeur']);
    $resume = htmlspecialchars($_POST['resume']);
    $date_parrution = htmlspecialchars($_POST['date_parrution']);
    $note = htmlspecialchars($_POST['note']);

    $requete = "INSERT INTO bookclub.livres (titre, auteur, genre, editeur, resume, date_parrution, note) VALUES (:titre, :auteur, :genre, :editeur, :resume, :date_parrution, :note)" ;
    $query1 = $pdo->prepare($requete);
    $query1->bindParam(":titre", $titre);
    $query1->bindParam(":auteur", $auteur);
    $query1->bindParam(":genre", $genre);
    $query1->bindParam(":editeur", $editeur);
    $query1->bindParam(":resume", $resume);
    $query1->bindParam(":date_parrution", $date_parrution);
    $query1->bindParam(":note", $note, PDO::PARAM_INT);
    $query1->execute();
    header('Location:http://localhost:8080/TP/Projet_Web/php/form_ajout_livres.php');
    exit;
?>