<!DOCTYPE html>
<html>
<head>
    <title>Livre</title>
</head>
<body>
<?php
    $photo = $_GET['photo'];
    $titre = $_GET['titre'];
    $auteur = $_GET['auteur'];    
    $genre = $_GET['genre'];
    $editeur = $_GET['editeur'];
    $resume = $_GET['resume'];
    $date_parrution = $_GET['date_parrution'];
    $note = $_GET['note'];
    
?>
<p>
    <?php echo "<img style=\"width: 100px; height: 100px\" src=$photo ><br>" ?>
    Titre : <?php echo $titre?> <br>
    Auteur : <?php echo $auteur?> <br>
    Genre : <?php echo $genre?> <br>
    Editeur : <?php echo $editeur?> <br>
    Description : <?php echo $resume?> <br>
    Date de parrution : <?php echo $date_parrution?> <br>
    Note : <?php echo $note?>
</p>