<?php
    include_once('bdd.php');
    session_start();
    
    if(isset($_POST['modif_l'])) {
    $titre = $_POST['titre'];
    $query1 = $pdo->prepare("SELECT * FROM livres WHERE titre='" . $_POST['titre'] . "'");
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
        <meta charset="utf-8">
        <title>BookClub - Modifiez un livre</title>
        <meta name="description" content="Formulaire modification livre"/>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="../js/search.js"></script>

        <!-- fichiers css dans un dossier css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style_starter.css">
    </head>

    <body class="container-fluid windows">
        <div class="container content" style="width:800px;border:none;">
            <a href="../php/home.php"><img class='logo' style="padding-left:32%;" src="../logo/logo_lighter.png" alt="BookClub logo"/></a>

            <button class="bouton_retour" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/moderation_livres.php';">Retour</button>

            <h1 class="title_page2">Modifier un livre</h1>

            <h2 class="subtitle">- Espace Administrateurs -</h2>

            <div class="text" style="padding:5%;padding-bottom:0;">
                <p style="margin-left:5%;">Modifier les données de ce livre 
                </br>en remplissant ce formulaire!</p>
            </div>  


            <form action="update_livres.php" style="margin-top:5%;" method="post">
                <div class="container" style="padding:3%;background-color:rgba(206, 192, 51, 0.44);">
                    <div style="margin-left:4%;">
                        <label class="input_form">
                            <div>Titre</div>
                            <input type="text" name="titre" value="<?php echo "$titre" ?>" required/> 
                        </label>

                        <label class="input_form">
                            <div>Auteur</div>
                            <input type="text" name="auteur" value="<?php echo "$auteur" ?>" required/>
                        </label>
                        
                        <label class="input_form">
                            <div>Éditeur</div>
                            <input type="editeur" name="editeur" value="<?php echo "$editeur" ?>" required/> 
                        </label>
                    </div>

                    <div style="margin-left:4%;">
                        <div class="row" style="padding-top:5%;">
                            <div class="col-md-1 col-lg-1 col-xl-1"></div>

                            <div class="col-md-5 col-lg-5 col-xl-5">
                                <label class="input_form">                  
                                    <div>Date de parution</div>
                                    <input type="text" name="date" value="<?php echo "$date_parrution" ?>" required/> 
                                </label>
                            </div>                 
                        
                            <div class="col-md-5 col-lg-5 col-xl-5">
                                <label class="input_form">
                                    <div>Note</div>
                                    <input type="text" name="note" value="<?php echo "$note" ?>" required/>
                                </label>
                            </div>

                            <div class="col-md-1 col-lg-1 col-xl-1"></div>
                        </div>
                    </div>

                    <div style="margin-left:5%;margin-bottom:20px;">
                        <div class="row" style="padding-top:5%;">
                            <div class="col-md-1 col-lg-1 col-xl-1"></div>

                            <div class="col-md-10 col-lg-10 col-xl-10">
                                <textarea class="resume_area" placeholder="Un petit résumé?" name="resume" rows="4" cols="50" value="<?php echo "$resume" ?>" ></textarea>
                            </div>

                            <div class="col-md-1 col-lg-1 col-xl-1"></div>
                        </div>
                    </div>

                    <button class="valider_bouton" style="margin-left:40%;" type="submit">Envoyer</button>
                </div>        
            </form>
        </div>
    </body>
</html>




