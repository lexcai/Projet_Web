<?php 
include_once('bdd.php');
session_start();


if(empty($_POST)) {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./moderation_offres.php\">Réesayer</a>";
        }


$titre = htmlspecialchars($_POST['titre']);

$sql = "DELETE FROM livres WHERE titre = \"$titre\"";
$query1=$pdo->prepare($sql);
$query1->execute();

if ($_SESSION['table']  == 'root') {
    header('Location: http://localhost:8080/TP/Projet_Web/php/moderation_livres.php');
    exit;
}
?>