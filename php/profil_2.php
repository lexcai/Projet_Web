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
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
                    
   </head>
   
   <body>

   
        <div class='body_box'>
            <!-- la barre de navigation responsive avec Bootstrap -->
            <nav class="navbar fixed_top navbar-expand-sm nav_bar_style">
                <!-- Logo en haut à gauche -->
                <a href="../html/index.html"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
                
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
                        <a class="nav-link disabled link_disable" href="../html/profil.html">Profil</a>
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
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 left_box">

                        
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
                        <!-- contenu bio de l'utilisateur php -->
                        <div class="bio_box">
                            <h2 class="bio_title">Votre bio</h2>
                            <textarea id="bio_box" name="Bio" onclick="showButton()" rows="3" cols="17">
                               
                            </textarea>
                            
                            <!--bouton qui envoie la bio dans la bdd de l'utilisateur
                                rajoute onclick = envoi de la bio dans la bdd -->
                            <button class="bouton_style" id="save_bio" type="submit" name="save_bio" style="display:none;" onclick="hideButton()">Modifier</button>
                        </div>                    
                    </div>

                    

                    <div class="col-md-9 col-lg-9 col-xl-9 right_box">
                            
                        <div class="container" style="padding-bottom:50px;padding-top:2px;">
                            <form style="float:right;width:min-content;display:inline;" action="deconnexion.php" method="post">
                                <button class="bouton_style deconnexion" type="submit">Deconnexion</button>
                            </form>

                            <button class="bouton_style edit_profil" name="edit_profil" style="float:right;" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/modification_membre.php';">Compte</button>
                        </div>

                        
                        <h1>Statistiques de votre bibliothèque</h1>
                        
                            
                        <div class="books_div" style="margin-top:10%;">
                            <h2 style="text-align:left;">Vos livres enregistrés</h2>
                            <--!entrez php pourcentage ici-->
                            
                            <div class="progress" style="margin-left:15px;margin-right:15px;height:30px">
                                <div class="progress-bar progress-bar-success" role="progressbar" style="font-size:small;width:40%;background-color:green">
                                    livres lus
                                </div>
                                <div class="progress-bar progress-bar-warning" role="progressbar" style="font-size:small;width:10%;background-color:purple;">
                                    en lecture
                                </div>
                                <div class="progress-bar progress-bar-danger" role="progressbar" style="font-size:small;width:20%;background-color:orange;">
                                    livres à lire
                                </div>
                            </div> 

                            <--!nombre de livres total en php-->
                            <div class="container">
                                <div class="d-inline">Total livres enregistrés:</div>
                                <div class="d-inline" style="float:right;">PHP number</div>
                            </div>
                           
                            <div class="row" style="margin-top:10%;">
                                <div class="col-md-4 col-lg-4 col-xl-4 finished" style="background-color:green;height:1000px;text-align:center;">
                                    <h2>Livres lus</h2>
                                    <div class="container" style="margin-top:75px"> 
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100        
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4 reading" style="background-color:purple;text-align:center;">
                                    <h2>Livres en cours de lecture</h2>
                                    <div class="container" style="margin-top:39px">
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100        
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-md-4 col-lg-4 col-xl-4 next_books" style="background-color:orange;text-align:center;">
                                    <h2>Livres à lire</h2>
                                    <div class="container" style="margin-top:77px">
                                        <div class="d-inline" style="margin-right:60px;">Total</div>
                                        <div class="d-inline">PHP</div>
                                    </div>

                                    <h4 style="margin-top:50px;">Derniers ajouts</h4>

                                    <div class="row" name="line_1" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>

                                    <div class="row" name="line_2" style="margin-top:10%;height:150px;">
                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" style="background-color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100        
                                        </div>

                                        <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" style="background-color:black;color:white;padding:25px;">
                                            livre avec photo titre auteur en 100*100
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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