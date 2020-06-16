<?php
include_once('bdd.php');
session_start();
$query1 = $pdo->prepare('SELECT * FROM membres');
$query1->execute();
$liste_membres = $query1->fetchAll();
foreach ($liste_membres as $membres) {
        $pseudo = $membres['pseudo_membre'];
        $mail = $membres['mail_membre'];
        $pays = $membres['pays'];
        $age = $membres['age'];
        $bio = $membres['bio'];
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Modification données</title>
    </head>
      <!-- fichiers css dans un dossier css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style_starter.css">
   </head>

   <body class="container-fluid windows">
      <div class="container content">

         <a href="../php/home.php"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
               
         <div class="title_page">Modifier vos données</div>
         
         <form method="POST" action="modif_donnees_membre.php">
            
            <div class="row">
               <div class="col-6">
                  <label for="pseudo" class="input_inscription">
                     <div>Nom utilisateur</div>
                     <input name="pseudo" type="text" value="<?php echo"$pseudo"?>"required/>
                  </label>
               </div>

               <div class="col-6">
                  <label for="mail" class="input_inscription">
                     <div>Adresse Email</div>
                     <input name="mail" type="email" value="<?php echo"$mail"?>"required/>
                  </label>
               </div>
            </div>

            <div class="row">
               <div class="col-6">
                  <label for="pays" class="input_inscription">
                     <div>Pays</div>
                     <input name="pays" type="text" value="<?php echo"$pays"?>"required/>
                  </label>
               </div>

               <div class="col-6" style="padding-left:0;">
                  <label for="age" class="input_inscription">
                     <div style="padding-left:7%;">Votre âge</div>
                     <input class="age" name="age" type="number" value="<?php echo"$age"?>" required/>
                  </label>
               </div>
            </div>

            <div class="row">
               <div class="col-2"></div>

               <div class="col-8" style="padding-left:10%;">
                  <label for="bio" class="input_inscription">
                     <div>Votre bio</div>
                     <textarea class="bio" name="bio" type="text" value="<?php echo"$bio"?>" required></textarea>
                  </label>
               </div>

               <div class="col-2"></div>
            </div>

            <div class=div_buttons>
               <input class="inscription_boutons" type="button" name="home" value="Retour" onclick="self.location.href='./profil.php'">
               <input class="inscription_boutons" type="submit" name="inscription_membre"/>
            </div>
         </form>
      </div>      
   </body>
</html>