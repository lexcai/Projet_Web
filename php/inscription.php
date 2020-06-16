<!DOCTYPE html>
<html>
   <head>
      <title>BookClub - Inscription</title>
      <meta charset="utf-8">

      <!-- fichiers css dans un dossier css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style_starter.css">
   </head>

   <body class="container-fluid windows">
      <div class="container content" style="margin-top:2px;">
         <a href="../html/index.html"><img class='logo' src="../logo/logo_lighter.png" alt="BookClub logo" /></a>
               
         <div class="title_page">Inscrivez-vous</div>
         
         <form style="margin-left:4%;" method="POST" action="creation_membre.php">
            <div class="row">
               <div class="col-6">
                  <label for="pseudo" style="" class="input_form">
                     <div>Nom utilisateur</div>
                     <input name="pseudo" type="text" required/>
                  </label>
               </div>

               <div class="col-6">
                  <label for="mail" style="" class="input_form">
                     <div>Adresse Email</div>
                     <input name="mail" type="text" required/>
                  </label>
               </div>
            </div>

            <div class="row">
               <div class="col-6">
                  <label for="mdp" style="" class="input_form">
                     <div>Mot de passe</div>
                     <input name="mdp" type="text" required/>
                  </label>
               </div>

               <div class="col-6">
                  <label for="pays" style="" class="input_form">
                     <div>Pays</div>
                     <input name="pays" type="text" required/>
                  </label>
               </div>
            </div>

            <div class="row">
               <div class="col-6" style="padding-top:5%;">
                  <label for="sexe" style="" class="input_form">
                     <input name="sex" type="radio" value="H"> Homme <input type="radio" name="sex" value="F"> Femme
                  </label>
               </div>

               <div class="col-6" style="padding-left:0;">
                  <label for="age" class="input_form">
                     <div>Votre âge</div>
                     <input class="age" name="age" type="text" required/>
                  </label>
               </div>
            </div>

            <div class=div_buttons>
               <input class="inscription_boutons" type="button" name="home" value="Retour" onclick="self.location.href='../html/index.html'">
               <input class="inscription_boutons" type="submit" name="inscription_membre"/>
            </div>
         </form>
      </div>      
   </body>
</html>