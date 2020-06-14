<!DOCTYPE html>
<html>
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">

      <!-- fichiers css dans un dossier css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style_starter.css">
   </head>

   <body class="container-fluid windows">
      <div class="container content">

         <a href="index.html"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
               
         <div class="title_page">Inscrivez-vous</div>
         
         <form style="margin-left:4%;" method="POST" action="creation_membre.php">
                  
            <label for="pseudo" class="input_form">
               <div>Nom utilisateur</div>
               <input name="pseudo" type="text" required/>
            </label>

            <label for="mail" class="input_form">
               <div>Adresse Email</div>
               <input name="mail" type="text" required/>
            </label>

            <label for="mdp" class="input_form">
               <div>Mot de passe</div>
               <input name="mdp" type="text" required/>
            </label>

            <label for="pays" class="input_form">
               <div>Pays</div>
               <input name="pays" type="text" required/>
            </label>

            <label for="sexe" class="input_form">
               <input name="sex" type="radio" value="H"> Homme <input type="radio" name="sex" value="F"> Femme
            </label>

            <label for="age" class="input_form">
               <div>Votre âge</div>
               <input class="age" name="age" type="text" required/>
            </label>

            
            <div class=div_buttons>
               <input class="inscription_boutons" type="button" name="home" value="Retour" onclick="self.location.href='../html/index.html'">
               <input class="inscription_boutons" type="submit" name="inscription_membre"/>
            </div>
         </form>
      </div>      
   </body>
</html>