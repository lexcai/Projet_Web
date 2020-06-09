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
            <input type="text" name="titre" placeholder="Titre"  /> <br/>
            <input type="text" name="auteur" placeholder="Auteur" /> <br/>
            <input type="editeur" name="editeur" placeholder="Editeur" /> <br/>
            <input type="text" name="resume" placeholder="Resume"  /> <br/>
            <input type="" name="date_parrution" placeholder="Date de parrution"  /> <br/>
            <input type="text" name="note" placeholder="Note" /> <br/>
            <button type="submit">Modifier</button>
        </form>
</body>
</html>