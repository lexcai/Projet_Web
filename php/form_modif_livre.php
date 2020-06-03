<?php
    include_once('bdd.php');
    session_start();
    if(isset($_POST['modif_l'])) {
    $titre = $_POST['titre'];
    $query1 = $pdo->prepare('SELECT * FROM livres');
    $query1->execute();
    $liste_livres = $query1->fetchAll();
    foreach ($liste_livres as $livres) {
            $photo = $livres['photo'];
            $titre = $livres['titre'];
            $auteur = $livres['auteur'];
            $editeur = $livres['editeur'];
            $resume = $livres['resume'];
            $date_parrution = $livres['date_parrution'];
            $note = $livres['note'];
        }
    $_SESSION['titre'] = $livres['titre'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire modification livre</title>
    <meta name="description" content="Formulaire modification livre"/>
</head>
<body>
    <h1>Formulaire Modification Livre</h1>
    <button onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/moderation_livres.php';">Retour</button>
        <form action="update_livres.php" method="post">
            <input type="text" name="titre" placeholder="Titre" value="<?php echo "$titre" ?>" /> <br/>
            <input type="text" name="auteur" placeholder="Auteur" value="<?php echo "$auteur" ?>" /> <br/>
            <input type="editeur" name="editeur" placeholder="Editeur" value="<?php echo "$editeur" ?>" /> <br/>
            <input type="text" name="resume" placeholder="Resume" value="<?php echo "$resume" ?>" /> <br/>
            <input type="" name="date_parrution" placeholder="Date de parrution" value="<?php echo "$date_parrution" ?>" /> <br/>
            <input type="text" name="note" placeholder="Note" value="<?php echo "$note" ?>" /> <br/>
            <button type="submit">Modifier</button>
        </form>
</body>
</html>