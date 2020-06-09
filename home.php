<?php 
session_start();
include_once('bdd.php');
   $query1 = $pdo->prepare('SELECT * FROM livres');
                  $query1->execute();
                  $liste_livres = $query1->fetchAll();
                  foreach ($liste_livres as $livres) {
                           $id_livres = $livres['id_livre'];
                           $photo= $livres['photo'];
                           $titre = $livres['titre'];
                           $auteur = $livres['auteur'];
                           $genre = $livres['genre'];
                           $editeur = $livres['editeur'];
                           $resume = $livres['resume'];
                           $date_parrution = $livres['date_parrution'];
                           $note = $livres['note'];
                     }
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Accueil</title>

      <!-- css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <script src="js/bootstrap.js"></script>

   </head>
   <body>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <!-- la barre de navigation responsive avec Bootstrap -->
      <div class="fullscreen_bg">
         <nav class="navbar fixed_top navbar-expand-sm nav_bar_style">
            <!-- Logo en haut à gauche -->
            <a href="index.html"><img class='logo' src="logo/logo_lighter.png" alt="BookClub logo" /></a>
            
            <!-- liens, celui de la page actuelle est désactivé -->
            <ul class="navbar-nav links_position">
               <li class="nav-item">
                  <a class="nav-link disabled link_disable" href="home.php">Page d'accueil</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link link_enable" href="about_us.html">A propos</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link link_enable" href="community.html">Communauté</a>
               </li>

               <!-- php ici si utilisateur connecté alors redirection vers page profil.php sinon redirection vers page index.html -->
               <li class="nav-item">
                  <a class="nav-link link_enable" href="profil.php">Profil</a>
               </li>  
            </ul>

            <!-- php ici
            barre de recherche simple (titre ou auteur), bouton 'rechercher' 
            envoie formulaire recherche dans la BDD, recherche par mot clé et redirection vers 
            page research.html avec résultats de la recherche (affiche nombre de résultats)
            si aucun mot clé rentré; nombre de résultat = 0 -->
            <div class="form-group row">
               <div class="col-xs-2 input_search_box">
                  <label for="search"></label>
                  <input class="form-control input_search_style" type="text" placeholder="trouvez un livre..." required />
               </div>
            </div>
            <a href="research.html" style="margin-left:1%;"><button class="bouton_style valider_bouton" type="submit">Rechercher</button></a>
         </nav>

         <!-- Message de bienvenue -->
         <div class="message_box">
           <p class="welcome">Bienvenue sur BookClub</p>
           <p class="text">Répertoriez vos livres préférés
           <br>Et partagez votre avis.</p>  
         </div>
      </div>
      <?php /*Liens de moderation[en cours]
               Probleme :
               mise en page
               suppresion d'une colonne dans la bdd
               */ ?>
         <?php if (isset($_SESSION['IS_CONNECTED'])) {
               if ($_SESSION['table']  == 'root') {
                     
         ?>
         <a href="./moderation_livres.php">Moderation livres</a>
         <a href="./moderation_membres.php">Moderation membres</a>
         

         <?php }
               }
      ?>
      <!-- le container de la page avec tous les éléments de la page -->
      <div class="container content_box_home"> 

         <div name="title" style="padding-top:20px;">
            <hr>
            <h1>Nos livres séléctionnés rien que pour vous</h1>
            <hr>
         </div>

         <div class="container" name="selectionS">
            
            <!--Selection 2 seulement si utilisateur est connecté = séléction personnelle-->
            <div id="selection1" class="carousel slide selection1" data-ride="carousel">
               <div class="carousel-inner">

                  <!--slide1-->
                  <div class="carousel-item active" name="slide_1">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img6.png" alt=""></div>
                     </div>
                  </div>
               </div>
            
               <a class="carousel-control-prev" href="#selection1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#selection1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>



            <!--Selection 3 = livres récemment ajoutés-->
            <div id="selection2" class="carousel slide selection" data-ride="carousel">
               <div class="carousel-inner">

                  <!--slide1-->
                  <div class="carousel-item active" name="slide_1">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img6.png" alt=""></div>
                     </div>
                  </div>
               </div>
            
               <a class="carousel-control-prev" href="#selection2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#selection2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>



            <!--Selection 4 = livres adorés (les mieux notés)-->
            <div id="selection3" class="carousel slide selection" data-ride="carousel">
               <div class="carousel-inner">

                  <!--slide1-->
                  <div class="carousel-item active" name="slide_1">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img1.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img2.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                     </div>
                  </div>

                  <!--slide 2-->
                  <div class="carousel-item" name="slide_2">
                     <div class="row">
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img3.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img4.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img5.png" alt=""></div>
                        <div class="col-3"><img class="d-block w-100" src="selection_livres/img6.png" alt=""></div>
                     </div>
                  </div>
               </div>
            
               <a class="carousel-control-prev" href="#selection3" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#selection3" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>

         <?php
                  echo "<h2>Liste des livres :</h2>";
                  foreach ($liste_livres as $livres) {
                     $photo = $livres['photo'];
                     $titre = $livres['titre'];
                     $auteur = $livres['auteur'];
                     $genre = $livres['genre'];
                     $editeur = $livres['editeur'];
                     $resume = $livres['resume'];
                     $date_parrution = $livres['date_parrution'];
                     $note = $livres['note'];
                     $parametre = "photo=$photo&titre=$titre&auteur=$auteur&genre=$genre&editeur=$editeur&resume=$resume&date_parrution=$date_parrution&note=$note";
         ?>
                     <div class="livres">
                     <?php
                           echo "<a class=\"decoration\" href=\"livre.php?$parametre\">";
                     ?>
                     <h2>
                     <?php
                           echo "<img style=\"width: 100px; height: 100px\" src=$photo ><br>";
                           echo "$titre<br>";
                           echo "$auteur<br>";
                     ?>
                     </h2>
                     </a>
         </div>
         <?php } ?>

      


   





   </body>
</html>