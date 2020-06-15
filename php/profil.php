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
        $bio = $membres['bio'];
    }
    $query2 = $pdo->prepare("SELECT * FROM root WHERE pseudo_root='" . $_SESSION['pseudo'] . "'");
    $query2->execute();
    $liste_root = $query2->fetchAll();
    foreach ($liste_root as $membres) {
        $pseudo_root = $membres['pseudo_root'];
        $role_root = $membres['role'];
        $mail_root = $membres['mail_root'];
        $pays_root = $membres['pays'];
        $sexe_root = $membres['sex'];
        $age_root = $membres['age'];
        $photo_root = $membres['photo'];
        $bio_root = $membres['bio'];
    }
    
?>

<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <title>BookClub - Profil</title>

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
                        <a class="nav-link disabled link_disable" href="profil.php">| Profil</a>
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
     


            <!-- contenu de la page dans la div content divisée en grilles avec Bootstrap -->
            <div class="container content"  style="padding-left:4%;padding-right:5%;"> 
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
            

                <div class="row">                    
                    <!--bloc gauche profil utilisateur -->
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="col-md-12" style="background-color:rgba(149, 91, 49, 0.06);padding-top:30px;padding-bottom:30px;"> 
                            <div class="pic_parent" style="margin-top:2px;">
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                    if ($_SESSION['table']  == 'membres') { ?>
                                <img class='profil_pic' src="<?php echo $membres['photo']; ?>"/>
                                <?php }
                                       }
                                ?>
                                <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                    if ($_SESSION['table']  == 'root') { ?>
                                <img class='profil_pic' src="<?php echo $photo_root; ?>"/>
                                <?php }
                                       }
                                ?>
                                <button class='profil_pic edit_pic_button' onclick="showDiv()"></button>                                                      
                            </div>

                            <div id="new_pic" class="container" style="display:none;"> 
                                <form action="ajout_photo.php" method="post" enctype="multipart/form-data">
                                    <label for "avatar" style="text-align:center;"> Choisissez une photo de profil :</label>
                                    <input type="file" name="file" id="file" style="color:rgb(3, 54, 4);padding:10px;" accept="image/png, image/jpeg">
                                    <button class="bouton_style" style="margin-right:25%;border:none;" type="submit">Envoyer</button>
                                    <button class="bouton_style" style="border:none;" onclick="hideDiv()">Annuler</button>
                                </form>     
                            </div>  
                            
                            <div class="items_box">
                            <?php 
                                if (isset($_SESSION['IS_CONNECTED'])) {
                                    if ($_SESSION['table']  == 'membres') { ?>
                                        <h1 class='pseudo'><?php echo $pseudo?></h1>
                                        <?php echo'<img class="icon_gender" src="icons/icon_',$sexe, '.png"/>';?>
                            <?php 
                                }
                               }
                            ?>
                            <?php 
                                if (isset($_SESSION['IS_CONNECTED'])) {
                                        if ($_SESSION['table']  == 'root') { ?>
                                            <h1 class='pseudo'><?php echo $pseudo_root?></h1>
                                            <?php echo'<img class="icon_gender" src="icons/icon_',$sexe_root, '.png"/>';?>
                            <?php 
                                }
                               }
                            ?>
                            </div>

                            <div class="three_infos">
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                        if ($_SESSION['table']  == 'membres') { ?>
                                <h3 class="three_infos_style">Statut: <?php echo $role?>
                                </br>Membre depuis: <?php echo $date?></h3>
                            <?php }
                               }
                            ?>
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                        if ($_SESSION['table']  == 'root') { ?>
                                <h3 class="three_infos_style">Statut: <?php echo $role_root?>
                            <?php }
                               }
                            ?>
                            </div>
                            
                            <!-- multi-lines input pour la BIO -->
                            <!-- contenu bio de l'utilisateur php -->
                            <div class="bio_box">
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                        if ($_SESSION['table']  == 'membres') { ?>
                                <h3 class="bio_title" style="text-align:center;">Votre bio</h3>
                                <?php echo $bio?>
                            <?php }
                               }
                            ?>
                            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                                        if ($_SESSION['table']  == 'root') { ?>
                                <h3 class="bio_title" style="text-align:center;">Votre bio</h3>
                                <?php echo $bio_root?>
                            <?php }
                               }
                            ?>
                            </div>      
                        </div>              
                    </div>

                    <!-- bloc droit stats -->
                    <div class="col-md-9 col-lg-9 col-xl-9">
                        <div class="col-md-12" style="background-color:rgba(149, 91, 49, 0.06);padding:30px;"> 
                            <div class="container" style="padding-top:2px;">
                                <form style="float:right;width:min-content;display:inline;" action="deconnexion.php" method="post">
                                    <button class="bouton_style deconnexion" type="submit">Deconnexion</button>
                                </form>

                                <button class="bouton_style edit_profil" name="edit_profil" style="float:right;" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/modification_membre.php';">Compte</button>
                            </div>

                            
                            <h1 style="padding:50px;padding-bottom:0;">Statistiques de votre bibliothèque</h1>
                            
                                
                            <div class="books_div" style="margin-top:10%;">
                            
                                <h2 style="text-align:left;">Vos livres enregistrés</h2>
                                                                                              
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

                                <div class="container">
                                    <div class="d-inline">Total livres enregistrés:</div>
                                    <div class="d-inline" style="float:center;">PHP number</div>
                                    <div class="d-inline"">
                                        <a href="../html/library.html" class="more" style="margin-left:30%;">Voir plus...</a>
                                    </div>
                                </div>
                            

                                <div class="row" style="margin-top:10%;">
                                    <div class="col-md-4 col-lg-4 col-xl-4 book_statut">
                                        <h3>Livres lus</h3>
                                        <div class="container" style="margin-top:75px"> 
                                            <div class="d-inline" style="margin-right:60px;">Total</div>
                                            <div class="d-inline">PHP</div>
                                        </div>

                                        <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                        <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="row" name="line_2" style="height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100        
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="container more_box">
                                            <a href="../html/finished.html" class="more">Voir plus...</a>
                                        </div>

                                    </div>

                                    <div class="col-md-4 col-lg-4 col-xl-4 book_statut">
                                        <h3>Livres en cours de lecture</h3>
                                        <div class="container" style="margin-top:48px;">
                                            <div class="d-inline" style="margin-right:60px;">Total</div>
                                            <div class="d-inline">PHP</div>
                                        </div>

                                        <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                        <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="row" name="line_2" style="height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100        
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="container more_box">
                                            <a href="../html/reading.html" class="more">Voir plus...</a>
                                        </div>

                                    </div>
                                        
                                    <div class="col-md-4 col-lg-4 col-xl-4" style="text-align:center;">
                                        <h3>Livres à lire</h3>
                                        <div class="container" style="margin-top:75px">
                                            <div class="d-inline" style="margin-right:60px;">Total</div>
                                            <div class="d-inline">PHP</div>
                                        </div>

                                        <h4 style="font-size:20px;margin-top:50px;">Derniers ajouts</h4>

                                        <div class="row" name="line_1" style="margin-top:10%;height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="row" name="line_2" style="height:200px;">
                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_left" class="show_book">
                                                livre avec photo titre auteur en 100*100        
                                            </div>

                                            <div class="col-md-6 col-lg-6 col-xl-6" name="pic_right" class="show_book">
                                                livre avec photo titre auteur en 100*100
                                            </div>
                                        </div>

                                        <div class="container more_box">
                                            <a href="../html/next_books.html" class="more">Voir plus...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                                        
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