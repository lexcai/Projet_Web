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
        <div class="container content"  style="background-color:yellow"> 
            <?php echo "<img style=\"width: 300px; height: 300px\" src=$photo ><br>" ?>
            Titre : <?php echo $titre?> <br>
            Auteur : <?php echo $auteur?> <br>
            Genre : <?php echo $genre?> <br>
            Editeur : <?php echo $editeur?> <br>
            Description : <?php echo $resume?> <br>
            Date de parrution : <?php echo $date_parrution?> <br>
            Note : <?php echo $note?>
        </div>
    </body>
</html>