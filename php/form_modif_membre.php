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
        <meta charset="utf-8">
        <title>BookClub - Modifiez rôle</title>
        <meta name="description" content="Modification rôle membre"/>

        <!-- fichiers css dans un dossier css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style_starter.css">
    </head>

    <body class="container-fluid windows">
        <div class="container content" style="width:800px;border:none;padding:5%;margin-top:20px;background-color:rgba(206, 192, 51, 0.44);">
            <div class="container" style="padding:10%;padding-top:2%;background-color:white;">
                <a href="../php/home.php"><img class='logo' style="padding-left:33%;" src="../logo/logo_lighter.png" alt="BookClub logo"/></a>

                <button class="bouton_retour" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/moderation_membres.php';">Retour</button>

                <h2 class="subtitle">- Espace Administrateurs -</h2>
                
                <div class="text" style="padding:5%;text-align:center;font-size:25px;border:1px solid;border-left:none;border-right:none;">
                Quel doit être le rôle de <?php echo $pseudo ?>?
                </div>

                <div class="row" style="margin-top:5%;">
                    <div class="col-md-1 col-lg-1 col-xl-1"></div>

                    <div class="col-md-10 col-lg-10 col-xl-10">
                        <form action="update_donnees_membre.php" style="margin-left:10%;" method="post">
                            <select name="role" class="form_select">
                                <option value="Membre">Membre</option>
                                <option value="Super_Membre">Super Membre</option>
                            </select>

                            <input type="hidden" name="pseudo" value="<?php echo $pseudo ?>" /> <button  class="inscription_boutons" style="height:40px;border-color:gray;color:black;" type=submit> Modifier </button>
                        </form>
                    </div>

                    <div class="col-md-1 col-lg-1 col-xl-1"></div>
                </div>
            </div>
        </div>
    </body>
</html>