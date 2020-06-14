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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Livre</title>

        <!-- css -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <div class='body_box'>
        <!-- la barre de navigation responsive avec Bootstrap -->
        <nav class="navbar fixed_top navbar-expand-sm nav_bar_style">
            <!-- Logo en haut à gauche -->
            <a href="../php/home.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
            
            <!-- liens, celui de la page actuelle est désactivé -->
            <ul class="navbar-nav links_position">
                <li class="nav-item">
                    <a class="nav-link link_enable " href="home.php">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/about_us.html">A propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link_enable" href="../html/community.html">Communauté</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled link_disable">Profil</a>
                </li>  
            </ul>

            <div class="form-group row">
                <div class="col-xs-2 input_search_box">
                    <label for="search"></label>
                    <input class="form-control input_search_style" type="text" placeholder="trouvez un livre..." required />
                </div>
            </div>

            <a href="../html/research.html" style="margin-left:1%;"><button class="bouton_style valider_bouton" type="submit">Rechercher</button></a>
        </nav>

        <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
        <div class="container content" style="padding:2%;"> 
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-6"style="padding-left:2%;">                    
                    <div class="row" style="">
                        <div class="col-md-1 col-lg-1 col-xl-1"></div>

                        <div class="col-md-10 col-lg-10 col-xl-10">
                            <?php echo "<img style=\"width: 300px; height: 300px; border: 1px solid rgba(123, 94, 56, 0.61)\" src=$photo >" ?>
                        </div>

                        <div class="col-md-1 col-lg-1 col-xl-1"></div>
                    </div>

                    <div class="container" style="margin-top:5px;" name="tag_box">
                        <div name="type_tag" style="margin-left:11%" class="tag_style">
                            genre<?php echo $genre?> 
                        </div>

                        <div name="editor_tag" class="tag_style">
                            éditeur<?php echo $editeur?>
                        </div>

                        <div name="author_tag" class="tag_style">
                            auteur<?php echo $auteur?>
                        </div>
                    </div>

                    <div class="row" style="margin-top:5%;">
                        <div class="col-md-4 col-lg-4 col-xl-4"></div>

                        <div class="col-md-4 col-lg-4 col-xl-4">
                            Note <?php echo $note?>                        
                        </div>

                        <div class="col-md-4 col-lg-4 col-xl-4"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl-6">
                    <h1 style="text-align:left;margin-left:0;margin-top:5%;">//TITRE//<?php echo $titre?></h1> 
                    <h1 style="text-align:left;margin-left:0;margin-bottom:20px;">De //AUTEUR//<?php echo $auteur?></h1>

                    <h3 style="margin-right:5%;font-size:16px;">Publié le <?php echo $date_parrution?></h3>

                    <h3 style="text-align:left;margin-top:10%;">Résumé</h3>
                    <div style="width:70%;height:100px;background-color:white;border:1px solid rgba(123, 94, 56, 0.61);"><?php echo $resume?></div>
                </div>
            </div>            
        </div>
    </body>
</html>