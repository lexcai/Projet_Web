<?php
    include_once('bdd.php');
    session_start();
    if(isset($_POST['modif_m'])) {
    $pseudo = $_POST['pseudo'];
    $query1 = $pdo->prepare('SELECT * FROM membres');
    $query1->execute();
    $liste_membres = $query1->fetchAll();
    foreach ($liste_membres as $membre) {
        if ($membre['pseudo_membre'] == $pseudo) {
            $role = $membre['role'];
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire modification membre</title>
        <meta name="description" content="Formulaire modification membre"/>
    </head>
    <body>
        <h1>Formulaire Modification membre</h1>
        <button onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/moderation_membres.php';">Retour</button>
            <form action="update_donnees_membre.php" method="post"> </br>
                <select name="role">
                    <option value="Membre">Membre</option>
                    <option value="Super_Membre">Super Membre</option>
                </select>
                <input type="hidden" name="pseudo" value="<?php echo $pseudo ?>" /> <button type=submit> Modifier </button>
            </form>
    </body>
</html>