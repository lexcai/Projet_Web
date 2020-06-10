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

         <a href="../hmtl/index.html"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
               
         <div class="title_page">Modifier vos données</div>
         
         <form method="POST" action="modif_donnees_membre.php">
                  
            <label for="pseudo" class="input_inscription">
               <div>Nom utilisateur</div>
               <input name="pseudo" type="text" value="<?php echo"$pseudo"?>"required/>
            </label>

            <label for="mail" class="input_inscription">
               <div>Adresse Email</div>
               <input name="mail" type="email" value="<?php echo"$mail"?>"required/>
            </label>

            <label for="pays" class="input_inscription">
               <div>Pays</div>
               <input name="pays" type="text" value="<?php echo"$pays"?>"required/>
            </label>

            <label for="age" class="input_inscription">
               <div>Votre âge</div>
               <input class="age" name="age" type="number" value="<?php echo"$age"?>" required/>
            </label>

            <label for="bio" class="input_inscription">
               <div>Votre bio</div>
               <textarea class="bio" name="bio" type="text" value="<?php echo"$bio"?>" required></textarea>
            </label>

            
            <div class=div_buttons>
               <input class="inscription_boutons" type="button" name="home" value="Retour" onclick="self.location.href='./profil.php'">
               <input class="inscription_boutons" type="submit" name="inscription_membre"/>
            </div>
         </form>
      </div>      
   </body>
</html>