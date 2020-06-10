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
                        <a class="nav-link link_enable " href="../php/home.php">Page d'accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="about_us.html">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="community.html">Communauté</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link_enable" href="../php/profil.php">Profil</a>
                    </li>  
                </ul>

                <div class="form-group row">
                    <div class="col-xs-2 input_search_box">
                    <label for="search"></label>
                        <input class="form-control input_search_style" type="text" placeholder="trouvez un livre..." required />
                    </div>
                </div>

                <a href="research.html" style="margin-left:1%;"><button class="bouton_style valider_bouton" type="submit">Rechercher</button></a>
            </nav>


            

            <div class="container content" style="background-color:yellow;height:1500px;"> 

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
                 affiche tous les livres qui correspondent qux mots clés de la recherche
                 informations: titre auteur et photo
                 liens qui renvoie vers book.html -->
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
                <div class=" container no_error_research" id="no_error_div" style="display:block;background-color:blue">

                    <!-- dans cette div on affiche les livres ou utlisateyrs qui répondent aux critères de recherche-->
                    <h2 style="font-size:20px;margin:0;margin-bottom:5%;width:100%;"> /nbr/ résultats pour votre recherche : "php mots clés"</h2>
                    
                    <!-- 1 élément par ligne avec: image, titre et auteur ou pseudo faire une fonction en php avec
                    comme paramètre la liste des livres ou utilisateur
                    for each element in list do :-->

                        <div class="container-fluid element">
                            <a href="../html/wanted_element.html"><img name="photo_element" src="###" alt="photo résultat de recherche" /></a>
                        </div>

                
                </div>


            </div>
        </div>

        
   </body>
</html>