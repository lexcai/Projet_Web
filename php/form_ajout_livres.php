<?php
include_once('bdd.php');
session_start();
  $query1 = $pdo->prepare('SELECT * FROM livres');
  $query1->execute();
  $liste = $query1->fetchAll(); 
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BookClub - Ajoutez un livre</title>
    <meta name="description" content="Formulaire modification livre"/>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>

    <!-- fichiers css dans un dossier css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_starter.css">
  </head>

  <body class="container-fluid windows">
    <div class="container content" style="width:800px;">

      <a href="../php/home.php"><img class='logo' style="padding-left:37%;" src="../logo/logo_lighter.png" alt="BookClub logo"/></a>

      <button class="bouton_retour" onclick="window.location.href = 'http://localhost:8080/TP/Projet_Web/php/home.php';">Retour</button>

      <h1 class="title_page" style="color:rgb(62, 70, 3);">Partagez un nouveau livre</h1>

      <div class="text" style="padding:5%;padding-bottom:0;">
        <p>Vous connaissez ce livre par coeur?
        </br>Aidez-nous en remplissant ce formulaire!</p>
      </div>  

    
      <form action="ajout_livres.php" method="post">
        <div class="container" style="margin-left:3%;">
          <div>
            <label class="input_form">                  
              <div>Titre</div>
              <input type="text" name="titre" required/> 
            </label>

            <label class="input_form">
              <div>Auteur</div>
              <input type="text" name="auteur" required/>
            </label>
            
            <label class="input_form">
              <div>Éditeur</div>
              <input type="editeur" name="editeur" required/> 
            </label>
          </div>

          <div>
            <div class="row" style="padding-top:5%;">
              <div class="col-md-1 col-lg-1 col-xl-1"></div>

              <div class="col-md-5 col-lg-5 col-xl-5">
                <label class="input_form">                  
                  <div>Date de parution</div>
                  <input type="text" name="date" required/> 
                </label>
              </div>                 
            
              <div class="col-md-5 col-lg-5 col-xl-5">
                <label class="input_form">
                  <div>Genre</div>
                  <input type="text" name="genre" required/>
                </label>
              </div>

              <div class="col-md-1 col-lg-1 col-xl-1"></div>
            </div>
          </div>

          <div style="margin-left:5%;margin-bottom:20px;">
            <div class="row" style="padding-top:5%;">
              <div class="col-md-1 col-lg-1 col-xl-1"></div>

              <div class="col-md-10 col-lg-10 col-xl-10">
                <textarea placeholder="Un petit résumé?" style="resize:none;color:rgb(39, 44, 4);padding:10px;border:1px solid black;" name="resume" rows="4" cols="50"></textarea>
              </div>

              <div class="col-md-1 col-lg-1 col-xl-1"></div>
            </div>
          </div>
        </div>

        <button class="valider_bouton" style="margin:0;margin-left:40%;" type="submit">Envoyer</button>
      </form>
     
      <div class="text" style="padding:5%;padding-bottom:0;padding-top:0;">
        <hr style="background-color:rgb(3, 66, 35);margin:5%;margin-bottom:10%;margin-top:0;">
        <p style="margin-top:20px;">Un trou de mémoire?
        </br>On s'en charge! Indiquez-nous juste le titre.</p>
      </div>  


      <input type="text" placeholder="Titre d'un livre" id="terms" />
      <button class="valider_bouton" style="font-size:small;margin:0;padding:5px;" onClick="search()">Rechercher</button>
      <ul id="results"></ul>

      <tbody>
        <table>
          <thead>
            <tr>
              <th>Titre</th>
              <th>Auteur</th>
              <th>Genre</th>
            </tr>
          </thead>

          <tr>
              <?php foreach ($liste as $donnees) { ?>
            <td><?php echo $donnees['titre']; ?></td>
            <td><?php echo $donnees['auteur']; ?></td>
            <td><?php echo $donnees['genre']; ?></td> <br>
          </tr>

          <?php
          }
          ?>
          
        </table>
      </tbody>
    </div>
  </body>
</html>