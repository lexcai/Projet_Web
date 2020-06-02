<?php
session_start();

include_once('bdd.php');
                $pseudo = $_SESSION['pseudo'];
                $query1 = $pdo->prepare("SELECT * FROM membres WHERE pseudo_membre='" . $_SESSION['pseudo'] . "'");
                $query1->execute();
                $liste_membres = $query1->fetchAll();
                foreach ($liste_membres as $membres) {
                        $id_membre = $membres['id_membre'];
                        $pseudo = $membres['pseudo_membre'];
                        $role = $membres['role'];
                        $mail = $membres['mail_membre'];
                        $pays = $membres['pays'];
                        $sexe = $membres['sex'];
                        $age = $membres['age'];
                        $date = $membres['date_creation'];
                        $photo = $membres['photo'];
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
                    
   </head>
   
   <body>

   
        <div class='body_box'>
            <!-- la barre de navigation responsive avec Bootstrap -->
            <nav class="navbar fixed_top navbar-expand-sm nav_bar_style">
                <!-- Logo en haut à gauche -->
                <a href="index.html"><img class='logo' src="logo/logo_lighter.png" alt="BookClub logo" /></a>
                
                <!-- liens, celui de la page actuelle est désactivé -->
                <ul class="navbar-nav links_position">
                    <li class="nav-item">
                        <a class="nav-link link_enable " href="home.php">Page d'accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="about_us.html">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="community.html">Communauté</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled link_disable" href="profil.html">Profil</a>
                    </li>  
                </ul>

                <div class="form-group row">
                    <div class="col-xs-2 input_search_box">
                        <label for="search"></label>
                        <input class="form-control input_search_style" type="text" placeholder="trouvez un livre..." required />
                    </div>
                </div>

                <button class="bouton_style valider_bouton" type="submit">Rechercher</button>
            </nav>



            <div class="container content"> 
            <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->

                <script>
                        function showDiv() {
                            document.getElementById('new_pic').style.display = "block";
                        }
                        function hideDiv() {
                            document.getElementById('new_pic').style.display = "none";
                        }
                        function showButton() {
                            document.getElementById('save_bio').style.display = "block";
                        }
                        function hideButton() {
                            document.getElementById('save_bio').style.display = "none";
                        }
                </script>
            
                <div class="row" style="height:100%;">
                    
                    <div class="col-md-4 col-lg-4 col-xl-4 left_box">

                        
                        <div class="pic_parent">
                            <img class='profil_pic' src="<?php echo $membres['photo']; ?>"/>
                            <button class='profil_pic edit_pic_button' onclick="showDiv()"></button>                                                      
                        </div>

                        <div id="new_pic" class="container" style="display:none;"> 
                            <form action="ajout_photo.php" method="post" enctype="multipart/form-data">
                                <label for "avatar"> Choisissez une photo de profil :</label>
                                <input type="file" name="file" id="file" style="color:rgb(3, 54, 4);padding:10px;" accept="image/png, image/jpeg">
                                <button class="bouton_style" style="margin-right:52%;" type="submit">Envoyer</button>
                                <button class="bouton_style" onclick="hideDiv()">Annuler</button>
                            </form>     
                        </div>  
                        
                        <div class="items_box">
                            <h1 class='pseudo'><?php echo $pseudo?></h1>
                            <?php echo'<img class="icon_gender" src="icons/icon_',$sexe, '.png"/>';?>
                        </div>

                        <div class="three_infos">
                            <h3 class="three_infos_style">Statut: <?php echo $role?>
                            </br>Membre depuis: <?php echo $date?></h3>
                        </div>
                        
                        <!-- multi-lines input pour la BIO -->
                        <div class="bio_box">
                            <h2 class="titles">Votre bio</h2>
                            <textarea id="bio_box" name="Bio" onclick="showButton()" rows="4" cols="20">
                               <!-- contenu bio de l'utilisateur php -->
                            </textarea>
                            
                            <!--bouton qui envoie la bio dans la bdd de l'utilisateur
                                rajoute onclick = envoi de la bio dans la bdd -->
                            <button class="bouton_style" id="save_bio" type="submit" name="save_bio" style="display:none;" onclick="hideButton()">Modifier</button>
                        </div>                    
                    </div>

                    <div class="col-md-8 col-lg-8 col-xl-8 right_box">
                            
                        
                    <form style="margin-left:75%;width:min-content;display:inline;" action="deconnexion.php" method="post">
                        <button class="bouton_style deconnexion" type="submit">Deconnexion</button>
                    </form>

                    <button class="bouton_style edit_profil" name="edit_profil" style="display:inline;" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/modification_membre.php';">Compte</button>
                    
                                

                            
                    </div>
                </div>
                    



               
                <!-- ajouter boutons:
                amis
                livres lus (lien vers page finished.html)
                livres à lire (lien vers page next_book.html)
                livres en cours (lien vers page reading.html)
                 -->
            </div>
        </div>

        
   </body>
</html>