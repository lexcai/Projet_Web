<?php
include_once('bdd.php');

if (! empty($_POST['mot_cle'])) {
    $mot_cle = $_POST['mot_cle'];
    $liste_mot_cle = explode(' ', $mot_cle);
} else {
    $mot_cle = '';
}
if (! empty($_POST['titre'])) {
    $titre = $_POST['titre'];
} else {
    $titre = '';
}
if (! empty($_POST['auteur'])) {
    $auteur = $_POST['auteur'];
} else {
    $auteur = '';
}

if (! empty($_POST['genre'])) {
    $genre = $_POST['genre'];
} else {
    $genre = '';
}

if (! empty($_POST['editeur'])) {
    $editeur = $_POST['editeur'];
} else {
    $editeur = '';
}
if (! empty($_POST['note_min'])) {
    $note_min = $_POST['note_min'];
} else {
    $note_min = 0;
}
if (! empty($_POST['note_max'])) {
    $note_max = $_POST['note_max'];
} else {
    $note_max = 5;
}
$query_prepare_requete = "SELECT * FROM livres WHERE titre LIKE '%$titre%' AND auteur LIKE '%$auteur%' AND genre LIKE '%$genre%' AND editeur LIKE '%$editeur%' AND note BETWEEN $note_min AND $note_max"; 
$query1= $pdo->prepare($query_prepare_requete);
$query1->execute();
$liste = $query1->fetchAll();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BookClub - Résultats de recherche</title>

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
                        <a class="nav-link link_enable" href="../php/home.php">| Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="../html/about_us.html">| A propos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link_enable" href="../html/community.html">| Communauté</a>
                    </li>

                    <!-- php ici si utilisateur connecté alors redirection vers page profil.php sinon redirection vers page index.html -->
                    <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="profil.php">| Profil</a>
                    </li> 
                    <?php }?>  
                    
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="../html/form_recherche.html">| Rechercher un livre</a>            
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="../html/message.html">| Messages</a>                
                    </li>               
                </ul>
            </nav>

            <div class="container content" style="height:1500px;">
                <script>
                    function error() {
                        document.getElementById('error_div').style.display = "block";
                        document.getElementById('no_error_div').style.display = "none";
                    }
                    function no_error() {
                        document.getElementById('no_error_div').style.display = "block";
                        document.getElementById('error_div').style.display = "none";
                    }
                </script>

                <!-- php et js ici
                 affiche tous les livres qui correspondent aux mots clés de la recherche
                 informations: titre auteur et photo
                 liens qui renvoie vers book.html -->

                <!-- 1/ calcul nombre de résultats de la recherche
                     2/ if nbr=0; affiche cette div: (fonction js)-->

                <div class=" container error_research" id="error_div" style="display:none;background-color:pink">
                
                    <h2 style="font-size:20px;margin:0;margin-bottom:5%;width:100%;">Il semblerait qu'il n'y ait pas de résultats de votre recherche : "php mots clés"</h2>
                    <h3 style="margin-left:4%;"> Voici quelques conseils pour vous aider à trouver votre bonheur:</h3>
                    <ul style="list-style-type: none;">
                        <li style="margin:3px;">- Vérifiez l'orthographe des mots utilisés</li>
                        <li style="margin:3px;">- Évitez les abréviations</li>
                        <li style="margin:3px;">- Tapez un minimum de mots clés dans votre recherche</li>
                    </ul>               
                </div>

                <!--else: affiche cette div: (fonction js)-->
                <div class=" container no_error_research" id="no_error_div" style="display:block;">

                    <!-- dans cette div on affiche les livres ou utlisateurs qui répondent aux critères de recherche-->
                    
                    <!-- 1 élément par ligne avec: image, titre et auteur ou pseudo faire une fonction en php avec
                    comme paramètre la liste des livres ou utilisateur
                    for each element in list do :-->


                    <h1>Liste des livres</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Genre</th>
                                <th>Editeur</th>
                                <th>Note</th>
                            </tr>
                            
                            <tr>
                            <?php foreach ($liste as $donnees) { ?>
                                <td><?php echo $donnees['titre']; ?></td>
                                <td><?php echo $donnees['auteur']; ?></td> 
                                <td><?php echo $donnees['genre']; ?></td> 
                                <td><?php echo $donnees['editeur']; ?></td>
                                <td><?php echo $donnees['note']; ?></td><br>
                            </tr>
                            <?php
                            }
                            ?>
                        </thead>
                    </table>                
                </div>
            </div>
            
            <div class="container-fluid footer">
                <div class="row" style="width:80%;margin-left:10%;">
                    <div class="col-4" name="us_col" style="padding-left:3%;">
                        <div style="margin-left:30%;margin-bottom:0%;">
                            <img class='logo' style="height:135px;width:135px;" src="../logo/logo_lighter.png" alt="BookClub logo"/>
                        </div>
                        
                        <p class="footer_text" style="font-size:medium;text-align:center;"style="font-size:medium">
                        Répertoriez vos livres préférés
                        </br>Et partagez votre avis.</p>
                    </div> 

                    <div class="col-4" name="pages_col" style="padding:0;border:1px solid #4d3c20;border-top:none;border-bottom:none;">
                        <p class="footer_text" style="margin-top:15%;">Visitez nos pages</p>
                        
                        <ul style="padding-left:0;margin-bottom:5%;margin-top:8%;">
                            <li class="footer_li">
                                <a href="../php/home.php" class="footer_links">Accueil</a>
                            </li>
                                
                            <li class="footer_li">
                                <a href="../html/about_us.html" class="footer_links">A propos</a>
                            </li>
                                
                            <li class="footer_li">
                                <a href="../html/community.html" class="footer_links">Communauté</a>
                            </li>
                                
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {?>
                            <li class="footer_li">
                                <a href="../php/profil.php" class="footer_links">Profil</a>
                            </li>
                            <?php }?>

                            <li class="footer_li">
                                <a href="../html/form_recherche.html"" class="footer_links">Rechercher un livre</a>
                            </li>

                            <li class="footer_li">
                                <a href="../html/message.html" class="footer_links">Messages</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-4" name="contact_col" style="padding-left:3%;">
                        <p class="footer_text" style="margin-top:17%;">Contact</p>
                        
                        <ul style="padding-left:0;margin-bottom:5%;margin-top:10%;">
                            <li class="footer_li" style="margin:2%;">
                                <div class="row">
                                    <div class="col-3">
                                    <div style="padding-left:70%;">
                                        <img style="height:25px;width:25px;" src="../icons/phone.png" alt="telephone number"/>
                                    </div>
                                    </div>

                                    <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                    (+33)06.47.20.69.01
                                    </div>
                                </div>
                            </li>

                            <li class="footer_li" style="margin:3%;">
                                <div class="row">
                                    <div class="col-3">
                                    <div style="padding-left:70%;padding-top:2%;">
                                        <img style="height:25px;width:25px;" src="../icons/email.png" alt="email"/>
                                    </div>
                                    </div>

                                    <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                    axel.boudeau@ynov.com
                                    </div>
                                </div>
                            </li>

                            <li class="footer_li" style="margin:2%;">
                                <div class="row">
                                    <div class="col-3">
                                    <div style="padding-left:70%;padding-top:5%;">
                                        <img style="height:25px;width:25px;" src="../icons/adresse.png" alt="address"/> 
                                    </div>
                                    </div>
                                    <div class="col-9 footer_text" style="font-size:medium;text-align:left;padding-left:5%;">
                                    89 quai des Chartrons, 33300 Bordeaux, France.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>